@extends('layouts.app')

@section('content')
<section style="padding:120px 20px; min-height:100vh; display:flex; justify-content:center;">
    <div style="max-width:1100px; width:100%;">

        {{-- Header --}}
        <div style="text-align:center; margin-bottom:30px;">
            <h1 style="font-size:2.5rem; font-weight:700;">JSON Encoder & Decoder PHP</h1>
            <p style="color:#64748b;">ป้อน PHP Array ทางซ้ายเพื่อ Encode หรือป้อน JSON ทางขวาเพื่อ Decode</p>
        </div>

        {{-- Main Card --}}
        <div style="background:rgba(255,255,255,.7); backdrop-filter:blur(12px); padding:30px; border-radius:24px; box-shadow:0 10px 30px rgba(0,0,0,.05);">

            {{-- Textareas --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:25px;">

                {{-- Left --}}
                <div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                        <button onclick="copyText('leftBox')" style="border:none; background:none; color:#22c55e; font-weight:600;">Copy Left</button>
                        <span onclick="leftBox.value=''" style="cursor:pointer; font-size:.85rem; color:#999;">Clear Left</span>
                    </div>
                    <textarea id="leftBox" placeholder="ป้อน PHP Array ที่นี่..." style="width:100%; height:380px; padding:15px; border-radius:14px; border:1px solid #e5e7eb; font-family:monospace; resize:none;"></textarea>
                </div>

                {{-- Right --}}
                <div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                        <button onclick="copyText('rightBox')" style="border:none; background:none; color:#22c55e; font-weight:600;">Copy Right</button>
                        <span onclick="rightBox.value=''" style="cursor:pointer; font-size:.85rem; color:#999;">Clear Right</span>
                    </div>
                    <textarea id="rightBox" placeholder="ป้อน JSON String ที่นี่..." style="width:100%; height:380px; padding:15px; border-radius:14px; border:1px solid #e5e7eb; font-family:monospace; resize:none;"></textarea>
                </div>
            </div>

            {{-- Buttons --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                <button onclick="encodeJSON()" style="border:none; padding:16px; border-radius:50px; background:linear-gradient(135deg,#22c55e,#3b82f6); color:white; font-weight:600;">
                    JSON Encode
                </button>
                <button onclick="decodeJSON()" style="border:none; padding:16px; border-radius:50px; background:linear-gradient(135deg,#7c3aed,#a78bfa); color:white; font-weight:600;">
                    JSON Decode
                </button>
            </div>

        </div>
    </div>
</section>

<script>
    // ประกาศตัวแปร Global
    const leftBox = document.getElementById("leftBox");
    const rightBox = document.getElementById("rightBox");

    /* Copy Function */
    function copyText(id) {
        const el = document.getElementById(id);
        el.select();
        document.execCommand("copy");
        alert("คัดลอกแล้ว");
    }

    /* ============ PHP Array -> JSON ============ */
    function encodeJSON() {
        try {
            let txt = leftBox.value.trim();
            if (!txt) return alert("กรุณาใส่ PHP Array");

            // แปลง PHP Syntax ให้คล้าย JS Object เพื่อ parse
            let jsLike = txt;
            jsLike = jsLike.replace(/<\?php/gi, "");
            jsLike = jsLike.replace(/\$[a-zA-Z0-9_]+\s*=\s*/g, "");
            jsLike = jsLike.replace(/=>/g, ":");
            jsLike = jsLike.replace(/\[/g, "{");
            jsLike = jsLike.replace(/\]/g, "}");
            jsLike = jsLike.replace(/array\s*\(/gi, "{");
            jsLike = jsLike.replace(/\)/g, "}");
            jsLike = jsLike.replace(/;/g, "");

            // รัน string ให้เป็น Object
            const obj = Function("return (" + jsLike + ")")();
            
            // แสดงผล JSON
            rightBox.value = JSON.stringify(obj, null, 2);
        } catch (e) {
            alert("PHP Array ไม่ถูกต้อง");
            console.error(e);
        }
    }

    /* ============ JSON -> PHP Array ============ */
    function decodeJSON() {
        try {
            let json = rightBox.value.trim();
            if (!json) return alert("กรุณาใส่ JSON");

            const obj = JSON.parse(json);
            const phpArray = toPhp(obj, 0);
            
            // แสดงผลลัพธ์: $arrayVar = [ ... ];
            leftBox.value = "$arrayVar = " + phpArray + ";\n";

        } catch (e) {
            alert("JSON ไม่ถูกต้อง");
            console.error(e);
        }
    }

    /* ============ Helper: Object -> PHP Short Array Syntax ============ */
    function toPhp(obj, indent) {
        const space = "    ".repeat(indent);
        let out = "[\n";

        for (const key in obj) {
            out += space + "    ";
            
            // Key
            if (isNaN(key)) {
                out += `"${key}" => `;
            } else {
                out += key + " => ";
            }

            // Value
            const val = obj[key];
            if (val !== null && typeof val === "object") {
                out += toPhp(val, indent + 1);
            } else if (typeof val === "string") {
                // ใช้ JSON.stringify เพื่อจัดการ escape string ให้อัตโนมัติ
                out += JSON.stringify(val);
            } else {
                out += val;
            }
            out += ",\n";
        }

        out += space + "]";
        return out;
    }
</script>
@endsection