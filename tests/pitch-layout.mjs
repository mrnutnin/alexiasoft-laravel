// Start Laravel, then Chrome with --headless --remote-debugging-port=9222
// --user-data-dir=/tmp/pitch-layout-chrome. Run: node tests/pitch-layout.mjs http://127.0.0.1:8000/pitch
import assert from 'node:assert/strict';

const url = process.argv[2] || 'http://127.0.0.1:8000/pitch';
const target = await fetch('http://127.0.0.1:9222/json/new?about:blank', {method: 'PUT'}).then(r => r.json());
const socket = new WebSocket(target.webSocketDebuggerUrl);
await new Promise((resolve, reject) => { socket.onopen = resolve; socket.onerror = reject; });
let id = 0;
const pending = new Map();
socket.onmessage = ({data}) => {
    const message = JSON.parse(data);
    if (!pending.has(message.id)) return;
    const {resolve, reject, timer} = pending.get(message.id);
    clearTimeout(timer);
    pending.delete(message.id);
    message.error ? reject(new Error(message.error.message)) : resolve(message.result);
};
function call(method, params = {}) {
    return new Promise((resolve, reject) => {
        const key = ++id;
        const timer = setTimeout(() => reject(new Error(`Timeout: ${method}`)), 15000);
        pending.set(key, {resolve, reject, timer});
        socket.send(JSON.stringify({id: key, method, params}));
    });
}
async function evaluate(expression) {
    const result = await call('Runtime.evaluate', {expression, awaitPromise: true, returnByValue: true});
    assert.ok(!result.exceptionDetails, JSON.stringify(result.exceptionDetails));
    return result.result.value;
}
try {
    await call('Page.navigate', {url});
    for (let n = 0; n < 100; n++) {
        if (await evaluate('document.readyState === "complete" && !!document.querySelector(".slide.active")')) break;
        await new Promise(resolve => setTimeout(resolve, 100));
    }
    await evaluate('document.fonts.ready.then(() => true)');
    const ids = await evaluate('[...document.querySelectorAll(".slide")].map(s => s.id)');
    assert.ok(ids.length >= 33, 'Presentation did not load');
    for (const required of ['product-map', 'minterp', 'portfolio', 'mintcollect', 'mintapprove', 'product-research']) {
        assert.ok(ids.includes(required), `Missing product section: ${required}`);
    }
    assert.ok(await evaluate('[...document.querySelectorAll("img")].every(img => img.complete && img.naturalWidth > 0)'), 'Product images or company logos failed to load');
    for (const [width, height] of [[1920,1080], [1366,768], [1280,720], [1024,768], [1024,600], [390,844]]) {
        await call('Emulation.setDeviceMetricsOverride', {width, height, deviceScaleFactor: 1, mobile: false});
        for (const slide of ids) {
            const result = await evaluate(`(async () => {
                location.hash = ${JSON.stringify(slide)};
                await new Promise(r => setTimeout(r, 60));
                const active = document.querySelector('.slide.active');
                const bottom = document.querySelector('.controls').getBoundingClientRect().top;
                const overflow = [...active.querySelectorAll('*')].filter(el => {
                    const b = el.getBoundingClientRect();
                    return b.width && b.height && (b.top < -1 || b.bottom > bottom + 1 || b.left < -1 || b.right > innerWidth + 1);
                }).map(el => el.tagName + '.' + el.className);
                return {id: active.id, overflow, scroll: document.documentElement.scrollHeight > innerHeight};
            })()`);
            assert.equal(result.id, slide);
            assert.deepEqual(result.overflow, [], `${width}x${height} #${slide}: clipped content`);
            assert.equal(result.scroll, false, `${width}x${height} #${slide}: vertical scroll`);
        }
        console.log(`PASS ${width}x${height}: ${ids.length} slides fit without clipping or scrolling`);
    }
} finally {
    socket.close();
    await fetch(`http://127.0.0.1:9222/json/close/${target.id}`);
}
