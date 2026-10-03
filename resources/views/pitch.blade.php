@php
    $money = fn ($value) => number_format($value, 0);
    $million = fn ($value) => number_format($value / 1000000, 2);
    $percent = fn ($value) => number_format($value, 1) . '%';
    $base = $scenarios['base'];
    $last = $years[4];
    $price = $assumptions['annualPrice'];
    $setup = $assumptions['setupPrice'];
    $partnerSub = $price * $assumptions['partnerSubscriptionShare'];
    $partnerSetup = $setup * $assumptions['partnerSetupShare'];
@endphp
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>AlexiaSoft — โอกาสซื้อกิจการและร่วมลงทุน</title>
    <link rel="stylesheet" href="{{ asset('css/pitch.css') }}?v={{ filemtime(public_path('css/pitch.css')) }}">
</head>
<body>
<main class="deck" id="deck" aria-label="AlexiaSoft investor presentation">
    <section class="slide cover" id="opportunity" aria-label="Investment opportunity">
        <img class="company-logo" src="{{ asset('images/logo-alexia.png') }}" alt="โลโก้บริษัท AlexiaSoft" width="220" height="88">
        <div class="eyebrow">AlexiaSoft / โอกาสซื้อกิจการและร่วมลงทุน</div>
        <div class="split">
            <div>
                <h1>สร้างระบบธุรกิจ<br><em>เติบโตไปด้วยกัน</em></h1>
                <p class="intro">ซื้อฐานธุรกิจซอฟต์แวร์<br>ต่อยอด MintERP ด้วยเครือข่ายพาร์ทเนอร์</p>
                <p class="muted">MintERP เป็นผลิตภัณฑ์หลัก · MintPOS สำหรับหน้าร้าน<br>พร้อมบริการพัฒนาและเชื่อมระบบธุรกิจ</p>
                <div class="stat-strip">
                    <div><strong>2 ผลิตภัณฑ์ปัจจุบัน</strong><small>นำเสนอบนเว็บไซต์บริษัท</small></div>
                    <div><strong>แผนเติบโต 5 ปี</strong><small>แบบจำลองรายได้ผ่านตัวแทนจำหน่าย</small></div>
                </div>
            </div>
            <div class="cover-art" aria-label="Product and partner strategy">
                <div class="orbit-title">แนวทางสร้างการเติบโตที่เสนอ</div>
                <div class="product-node"><strong>MintERP</strong><span>ผลิตภัณฑ์หลัก</span></div>
                <div class="connector">+ วางระบบ อบรม และดูแลลูกค้า</div>
                <div class="product-node"><strong>พาร์ทเนอร์</strong><span>ตัวแทนจำหน่าย</span></div>
                <div class="connector">↓ รายได้จากสมาชิกและการต่ออายุ</div>
                <div class="product-node"><strong>เติบโตร่วมกัน</strong><span>บริษัท + พาร์ทเนอร์</span></div>
            </div>
        </div>
        <div class="disclosure">Discussion draft · ราคา ส่วนแบ่ง ต้นทุน และการเติบโตใน deck เป็นข้อเสนอและสมมติฐาน ไม่ใช่ผลประกอบการจริงหรือการรับประกันผลตอบแทน</div>
    </section>

    <section class="slide" id="investment-thesis" aria-label="Investment thesis">
        <div class="eyebrow">01 / เหตุผลที่น่าลงทุน</div>
        <h2>จากรับงานเป็นโปรเจกต์<br>สู่รายได้ที่ <em>ขายซ้ำและต่ออายุได้</em></h2>
        <p class="intro">แนวทางสร้างมูลค่า: ให้แพลตฟอร์มเป็นแกน ให้พาร์ทเนอร์ช่วยขายและติดตั้ง ไม่เพิ่มทีมกลางตามจำนวนลูกค้าแบบหนึ่งต่อหนึ่ง</p>
        <div class="grid">
            <article class="card"><div class="index">01 — PLATFORM</div><h3>ต่อยอดสินค้าที่นำเสนออยู่</h3><p>MintERP สำหรับหลังบ้าน และ MintPOS สำหรับหน้าร้าน ตรวจเดโมและคุณภาพสินค้าจริงก่อนกำหนดแผนขยาย</p></article>
            <article class="card"><div class="index">02 — DISTRIBUTION</div><h3>กระจายช่องทางขาย</h3><p>สำนักงานบัญชี ผู้วางระบบ IT และที่ปรึกษา ERP เข้าถึงธุรกิจในเครือข่ายตนเอง พร้อมรับรายได้ต่ออายุ</p></article>
            <article class="card featured"><div class="index">03 — VALUE CREATION</div><h3>วัดด้วยรายได้ประจำ</h3><p>ติดตามลูกค้าที่จ่ายจริง การต่ออายุ ต้นทุนบริการ และรายได้ต่อพาร์ทเนอร์ ไม่ใช้เพียงจำนวนผู้สมัคร</p></article>
        </div>
    </section>

    <section class="slide" id="evidence" aria-label="Current evidence">
        <div class="eyebrow">02 / สิ่งที่มีอยู่และสิ่งที่ต้องตรวจสอบ</div>
        <h2>แยกสิ่งที่มีข้อมูลอ้างอิง<br>ออกจากสิ่งที่ต้องพิสูจน์</h2>
        <div class="grid">
            <article class="card"><span class="badge">ข้อมูลตามเว็บไซต์</span><div class="num">6+ / 20+</div><h3>ปีประสบการณ์ / โปรเจกต์</h3><p>ตัวเลขตามหน้า About ของบริษัท ยังไม่ใช่ข้อมูลที่ตรวจสอบโดยบุคคลภายนอก</p></article>
            <article class="card"><span class="badge">ผลิตภัณฑ์ที่นำเสนอ</span><div class="num">2</div><h3>MintERP และ MintPOS</h3><p>มีหน้ารายละเอียด ลิงก์สินค้า และภาพหน้าเว็บใน repository นี้ ไม่ใช่หลักฐานว่าทุกโมดูลผ่าน production audit แล้ว</p></article>
            <article class="card"><span class="badge proposal">ต้องตรวจสอบเพิ่มเติม</span><div class="num">รอยืนยัน</div><h3>รายได้และฐานลูกค้าปัจจุบัน</h3><p>ยังไม่ได้รับงบ รายการลูกค้าที่จ่ายเงิน MRR, churn, สัญญา และรายละเอียดทีม จึงไม่ใช้เป็นฐานประมาณการ</p></article>
        </div>
        <p class="note">เว็บไซต์มีโลโก้ในส่วน Trusted By แต่ไม่นับเป็นจำนวนลูกค้าปัจจุบันหรือการรับรองจากองค์กรเหล่านั้น ต้องยืนยันสิทธิ์ใช้และสถานะสัญญา</p>
    </section>

    <section class="slide" id="problem" aria-label="Customer problem and positioning">
        <div class="eyebrow">03 / ลูกค้าเป้าหมายและตำแหน่งทางการตลาด</div>
        <h2>เลือกตลาดที่ต้องการมากกว่าโปรแกรม<br>แต่ยังไม่ต้องการ ERP โครงการใหญ่</h2>
        <p class="intro">กลุ่มเป้าหมายเสนอ: ธุรกิจค้าส่งและกระจายสินค้า ที่มีงานขาย จัดซื้อ และคลังหลายขั้นตอน ต้องการผู้ช่วยวางระบบใกล้ตัว</p>
        <div class="grid">
            <article class="card"><h3>Excel / ระบบแยกส่วน</h3><p>เริ่มง่าย แต่ต้องส่งข้อมูลข้ามทีมและกระทบยอดเอง โอกาสขายอยู่ที่ลดงานซ้ำและเห็นสถานะธุรกิจร่วมกัน</p></article>
            <article class="card featured"><h3>MintERP + Partner</h3><p>เสนอแพ็กเกจมาตรฐานพร้อม onboarding และผู้ดูแลท้องถิ่น ทดสอบความคุ้มค่าด้วย pilot ก่อนทำซ้ำ</p></article>
            <article class="card"><h3>ERP โครงการเฉพาะทาง</h3><p>เหมาะกับความซับซ้อนสูง ไม่แข่งทุกฟีเจอร์ เลือกงานที่ template มาตรฐานครอบคลุมและส่งมอบได้จริง</p></article>
        </div>
        <p class="note">นี่คือ positioning hypothesis ไม่ใช่ผลสำรวจตลาดหรือข้อสรุปว่าคู่แข่งด้อยกว่า เป้าหมายปี 5 มาจากกำลังขายพาร์ทเนอร์ ไม่ใช่ TAM ที่แต่งขึ้น</p>
    </section>

    <section class="slide" id="product-map" aria-label="ภาพรวมผลิตภัณฑ์ MintERP และ MintPOS">
        <div class="eyebrow">ผลิตภัณฑ์ / สองระบบ สองโจทย์ธุรกิจ</div>
        <h2>MintERP เป็นแกนหลัก<br><em>MintPOS ตอบโจทย์การขายหน้าร้าน</em></h2>
        <div class="grid two">
            <article class="card featured"><span class="badge">ผลิตภัณฑ์หลัก · ฐานแผนธุรกิจ 5 ปี</span><h3 class="product-name">MintERP</h3><p>ระบบบริหารงานภายในองค์กร ตั้งแต่จัดซื้อ ขาย คลังสินค้า บัญชี ไปจนถึงรายงานผู้บริหาร</p><ul><li><strong>ผู้ใช้หลัก:</strong> ฝ่ายจัดซื้อ ฝ่ายขาย คลัง บัญชี และผู้บริหาร</li><li><strong>กลุ่มเป้าหมายเสนอ:</strong> ธุรกิจค้าส่งและกระจายสินค้า</li><li><strong>กลยุทธ์:</strong> สมาชิก + วางระบบผ่านตัวแทนจำหน่าย</li><li><strong>รายได้ในประมาณการ:</strong> นับเฉพาะช่องทางนี้</li></ul></article>
            <article class="card pos-card"><span class="badge">ผลิตภัณฑ์สำหรับหน้าร้าน · แยกจาก ERP</span><h3 class="product-name">MintPOS</h3><p>ระบบขายหน้าร้านบนคลาวด์ ช่วยจัดการการขาย สต็อก และรายงานประจำวัน</p><ul><li><strong>ผู้ใช้หลัก:</strong> พนักงานขายและเจ้าของร้าน</li><li><strong>กลุ่มเป้าหมาย:</strong> ร้านค้าปลีกและร้านอาหารตามเว็บไซต์</li><li><strong>กลยุทธ์เสนอ:</strong> เริ่มใช้งานง่าย พร้อมบริการติดตั้ง</li><li><strong>รายได้ในประมาณการ:</strong> ยังไม่นับในแผน ERP 5 ปี</li></ul></article>
        </div>
        <div class="disclosure">สองผลิตภัณฑ์มีบทบาทต่างกัน ไม่ถือว่าเชื่อมข้อมูลถึงกันแล้วจนกว่าจะตรวจเดโม ส่วน MintCollect และ MintApprove เป็นแนวคิดผลิตภัณฑ์อนาคต ยังไม่ได้พัฒนา</div>
    </section>

    <section class="slide" id="minterp" aria-label="MintERP ผลิตภัณฑ์หลักสำหรับองค์กร">
        <div class="eyebrow">04 / MintERP · ผลิตภัณฑ์หลักของบริษัท</div>
        <div class="split">
            <div><span class="badge">แกนหลักของรายได้สมาชิกและตัวแทนจำหน่าย</span><h2>MintERP<br><em>บริหารหลังบ้านทั้งองค์กร</em></h2><p class="intro">เชื่อมงานจัดซื้อ ฝ่ายขาย สต็อก บัญชี และรายงานผู้บริหาร ตามคำอธิบายสินค้าบนเว็บไซต์</p>
                <ul class="list"><li><strong>งานหลัก:</strong> เชื่อมกระบวนการขาย คลังสินค้า และบัญชี</li><li><strong>ผู้ตัดสินใจ:</strong> เจ้าของธุรกิจและผู้บริหารฝ่ายปฏิบัติการ</li><li><strong>แนวทางเติบโต:</strong> รูปแบบติดตั้งมาตรฐานรายอุตสาหกรรม ให้พาร์ทเนอร์ส่งมอบซ้ำได้</li></ul>
                <a href="https://minterp.alexiasoft.co/" target="_blank" rel="noopener noreferrer">เปิดเว็บไซต์ MintERP ↗</a>
            </div>
            <figure class="product-frame"><div class="browser">MintERP · ภาพหน้าเว็บไซต์ผลิตภัณฑ์</div><img src="{{ asset('images/products/minterp.png') }}" alt="ภาพหน้าเว็บไซต์ MintERP ที่อยู่ใน repository"></figure>
        </div>
        <p class="note">ก่อนขายผ่าน partner: ตรวจ multi-tenant isolation, backup/restore, สิทธิ์ผู้ใช้, data export, billing และความถูกต้องของเอกสารบัญชี ภาพนี้ไม่ใช่ live application demo</p>
    </section>

    <section class="slide" id="portfolio" aria-label="MintPOS ระบบขายหน้าร้าน">
        <div class="eyebrow">05 / MintPOS · ผลิตภัณฑ์สำหรับหน้าร้าน</div>
        <div class="split">
            <div><span class="badge pos-badge">จัดการงานขายประจำวัน · ไม่ใช่ระบบ ERP</span><h2>MintPOS<br><em>ขายหน้าร้าน เห็นยอดชัดเจน</em></h2><p class="intro">ระบบขายหน้าร้านบนคลาวด์ สำหรับร้านค้าปลีกและร้านอาหาร ตามคำอธิบายสินค้าบนเว็บไซต์</p>
                <ul class="list"><li><strong>งานหลัก:</strong> จัดการการขายและสต็อกสินค้า</li><li><strong>ผู้ใช้:</strong> พนักงานขายและเจ้าของร้าน ดูรายงานประจำวันและใช้งานหลายอุปกรณ์</li><li><strong>รายได้เสนอ:</strong> ค่าสมาชิกและติดตั้ง ราคา/ขอบเขตต้องยืนยันแยกจาก MintERP</li></ul>
                <a href="https://mintpos.alexiasoft.co" target="_blank" rel="noopener noreferrer">เปิดเว็บไซต์ MintPOS ↗</a>
            </div>
            <figure class="product-frame"><div class="browser">MintPOS · ภาพหน้าเว็บไซต์ผลิตภัณฑ์</div><img src="{{ asset('images/products/mintpos.png') }}" alt="ภาพหน้าเว็บไซต์ MintPOS ที่อยู่ใน repository"></figure>
        </div>
        <div class="disclosure">โมเดล 5 ปีนับเฉพาะ MintERP ผ่าน reseller ไม่รวมรายได้ MintPOS งาน custom หรือฐานลูกค้าเดิม เพื่อลดการนับรายได้ซ้ำ การเชื่อม POS–ERP ต้องยืนยันด้วยเดโม</div>
    </section>

    <section class="slide" id="buyer-assets" aria-label="What the buyer receives">
        <div class="eyebrow">06 / ขอบเขตการซื้อกิจการที่เสนอ</div>
        <h2>ผู้ซื้อได้อะไร?<br><em>ซื้อสินทรัพย์พร้อมทางไปต่อ</em></h2>
        <div class="grid two">
            <article class="card"><div class="index">01 — TECHNOLOGY</div><h3>สิทธิ์ในซอฟต์แวร์และเอกสาร</h3><p>เสนอรวม source code ของ MintERP / MintPOS, repository, schema, deployment guide และ test assets เฉพาะส่วนที่บริษัทเป็นเจ้าของและมีสิทธิ์โอน</p></article>
            <article class="card"><div class="index">02 — BRAND & CHANNEL</div><h3>แบรนด์และช่องทางดิจิทัล</h3><p>ชื่อแบรนด์ เว็บไซต์ โดเมน สื่อการขาย และบัญชีที่เกี่ยวข้องตามรายการทรัพย์สิน ต้องตรวจผู้ถือครองและเงื่อนไขผู้ให้บริการ</p></article>
            <article class="card"><div class="index">03 — COMMERCIAL</div><h3>สัญญาและความสัมพันธ์ลูกค้า</h3><p>สัญญาที่โอนได้ pipeline และประวัติการให้บริการ ภายใต้ consent / PDPA ไม่ตีมูลค่าโลโก้เป็นรายได้และไม่ขายข้อมูลส่วนบุคคลโดยไม่มีฐานกฎหมาย</p></article>
            <article class="card featured"><div class="index">04 — CONTINUITY</div><h3>ส่งมอบความรู้และการดำเนินงาน</h3><p>เสนอ transition 90 วัน: walkthrough ระบบ คู่มือ support และ training ทีมใหม่ การอยู่ต่อของ founder/ทีมต้องทำสัญญาแยก ไม่ใช่ทรัพย์สินที่รับประกันว่าจะโอน</p></article>
        </div>
        <p class="note">ขอบเขตนี้เป็นข้อเสนอ ยังไม่ใช่รายการทรัพย์สินที่ตรวจรับแล้ว งานลูกค้าอาจเป็น IP ของลูกค้า และซอฟต์แวร์ third-party ยังอยู่ภายใต้ license เดิม การซื้อหุ้นอาจรวมภาระหนี้ซึ่งต้องตรวจเพิ่ม</p>
    </section>

    <section class="slide" id="revenue" aria-label="Revenue channels">
        <div class="eyebrow">07 / ราคาที่เสนอ · บาท ไม่รวมภาษีมูลค่าเพิ่ม</div>
        <h2>รายได้ 4 ช่องทาง<br>นับในแผนเฉพาะส่วนที่ตั้งสมมติฐานได้</h2>
        <div class="grid four">
            <article class="card featured"><span class="badge">IN MODEL</span><h3>สมาชิก MintERP</h3><div class="num">{{ $money($price) }}</div><div class="unit">บาท / ลูกค้า / ปี</div><p>เทียบ {{ $money($price / 12) }} บาท/เดือน สัญญารายปี ขอบเขต users / storage / modules ต้องยืนยันก่อนออกใบเสนอราคา</p></article>
            <article class="card"><span class="badge">IN MODEL</span><h3>วางระบบมาตรฐาน</h3><div class="num">{{ $money($setup) }}</div><div class="unit">บาท / ลูกค้าใหม่ / ครั้ง</div><p>เสนอ: setup, import template และอบรม remote 2 ครั้ง ไม่รวม clean data, เดินทาง, hardware และ custom code</p></article>
            <article class="card"><span class="badge proposal">NOT IN FORECAST</span><h3>พัฒนาและเชื่อมระบบ</h3><div class="num">30k+</div><div class="unit">ราคาเริ่มต้นเสนอ / scope</div><p>คิดแยกตาม SOW และคน-วัน ต้องประเมินก่อนรับงาน ไม่ใช้รายได้ส่วนนี้มาช่วยให้แผนดูคุ้มทุน</p></article>
            <article class="card"><span class="badge proposal">NOT IN FORECAST</span><h3>MintPOS / ส่วนเสริม</h3><div class="num">ต่อยอด</div><div class="unit">ราคาและ conversion ยังไม่ยืนยัน</div><p>ขายเพิ่มเมื่อพบความต้องการจริง ไม่คิด premium support ซ้ำกับ support มาตรฐานที่รวมในสมาชิก</p></article>
        </div>
    </section>

    <section class="slide" id="reseller" aria-label="Reseller operating model">
        <div class="eyebrow">08 / ตัวแทนจำหน่าย MintERP · เงื่อนไขที่เสนอ</div>
        <h2>Partner ขายและดูแลหน้างาน<br>AlexiaSoft ดูแลแพลตฟอร์ม</h2>
        <div class="grid">
            <article class="card"><h3>Partner รับผิดชอบ</h3><ul><li>หา lead, demo และเก็บ requirement</li><li>ติดตั้งมาตรฐาน ย้ายข้อมูลตาม template และอบรม</li><li>Support ระดับ 1 และติดตามต่ออายุ</li><li>ออกเอกสารค่าติดตั้งให้ลูกค้า</li></ul></article>
            <article class="card featured"><h3>AlexiaSoft รับผิดชอบ</h3><ul><li>ผลิตภัณฑ์ cloud, security, backup และ release</li><li>Support ระดับ 2 / 3 และแก้ product bug</li><li>ออก invoice subscription / รับชำระ</li><li>สื่อขาย sandbox และ certification</li></ul></article>
            <article class="card"><h3>กติกาที่เสนอ</h3><ul><li>ไม่มีค่าแรกเข้าใน pilot; non-exclusive</li><li>Deal registration คุ้มครอง lead 90 วัน</li><li>แบ่ง subscription หลังรับเงินจริง 30 วัน หักคืนเมื่อ refund</li><li>Renewal share เฉพาะ partner ที่ยังดูแลบัญชีและผ่าน SLA</li></ul></article>
        </div>
        <p class="note">Partner รับค่าติดตั้งและจ่ายส่วน technical enablement ให้บริษัท ส่วน subscription บริษัทรับจากลูกค้าแล้วจ่าย commission; ต้องกำหนด VAT/หัก ณ ที่จ่าย, consent, escalation และการย้ายบัญชีหาก partner เลิกบริการในสัญญา</p>
    </section>

    <section class="slide" id="split" aria-label="Revenue split per customer">
        <div class="eyebrow">09 / รายได้ต่อการขายหนึ่งลูกค้า</div>
        <h2>ลูกค้าจ่ายเท่าไร<br><em>Partner ได้เท่าไร — เราได้เท่าไร</em></h2>
        <p class="intro">ตัวอย่างลูกค้า 1 รายใช้งานเต็ม 12 เดือน ตัวเลขเป็นรายรับก่อนต้นทุนและภาษี ไม่ใช่กำไร</p>
        <div class="table-wrap"><table>
            <thead><tr><th scope="col">รายการ / บาท</th><th scope="col">ลูกค้าจ่าย</th><th scope="col">Partner ได้</th><th scope="col">AlexiaSoft เหลือ</th></tr></thead>
            <tbody>
                <tr><td>Subscription / ปี</td><td>{{ $money($price) }}</td><td>{{ $money($partnerSub) }} (30%)</td><td>{{ $money($price - $partnerSub) }} (70%)</td></tr>
                <tr><td>Onboarding / ครั้งแรก</td><td>{{ $money($setup) }}</td><td>{{ $money($partnerSetup) }} (70%)</td><td>{{ $money($setup - $partnerSetup) }} (30%)</td></tr>
                <tr class="highlight"><td>รวม 12 เดือนแรก + setup</td><td>{{ $money($price + $setup) }}</td><td>{{ $money($partnerSub + $partnerSetup) }}</td><td>{{ $money($price + $setup - $partnerSub - $partnerSetup) }}</td></tr>
                <tr><td>ปีต่ออายุ / ไม่มี setup</td><td>{{ $money($price) }}</td><td>{{ $money($partnerSub) }}</td><td>{{ $money($price - $partnerSub) }}</td></tr>
            </tbody>
        </table></div>
        <div class="flow">
            <div><small>ค่าใช้บริการเทียบรายเดือน</small><strong>{{ $money($price / 12) }} ฿</strong><small>ไม่รวม onboarding / VAT</small></div>
            <div><small>ส่วนแบ่ง partner เทียบรายเดือน</small><strong>{{ $money($partnerSub / 12) }} ฿</strong><small>ต่อบัญชีที่ใช้บริการเต็มเดือน</small></div>
            <div><small>บริษัทเหลือเทียบรายเดือน</small><strong>{{ $money(($price - $partnerSub) / 12) }} ฿</strong><small>ก่อน cloud, support และ overhead</small></div>
        </div>
    </section>

    <section class="slide" id="partner-income" aria-label="Partner five-year income">
        <div class="eyebrow">10 / แผนรายได้ของตัวแทนจำหน่าย</div>
        <h2>Partner 1 ราย<br>ขายใหม่ 6 ลูกค้า/ปี ได้อะไร?</h2>
        <p class="intro">ใช้สมมติฐานต่ออายุ 90% และขายกระจายทั้งปีเช่นเดียวกับโมเดลบริษัท ไม่มีค่าแรกเข้าใน pilot</p>
        <div class="table-wrap"><table>
            <thead><tr><th scope="col">รายได้ partner / บาท</th>@foreach($partnerYears as $row)<th scope="col">ปี {{ $row['year'] }}</th>@endforeach</tr></thead>
            <tbody>
                <tr><td>ลูกค้าใหม่</td>@foreach($partnerYears as $row)<td>{{ $row['new'] }}</td>@endforeach</tr>
                <tr><td>ลูกค้าปลายปี (ค่าคาดหมาย)</td>@foreach($partnerYears as $row)<td>{{ number_format($row['active'], 1) }}</td>@endforeach</tr>
                <tr><td>ส่วนแบ่ง subscription</td>@foreach($partnerYears as $row)<td>{{ $money($row['subscription'] * $assumptions['partnerSubscriptionShare']) }}</td>@endforeach</tr>
                <tr><td>ส่วนแบ่ง onboarding</td>@foreach($partnerYears as $row)<td>{{ $money($row['setup'] * $assumptions['partnerSetupShare']) }}</td>@endforeach</tr>
                <tr class="highlight"><td>รายรับรวมก่อนต้นทุน</td>@foreach($partnerYears as $row)<td>{{ $money($row['partnerRevenue']) }}</td>@endforeach</tr>
            </tbody>
        </table></div>
        <div class="grid two">
            <article class="card"><h3>ลองหักต้นทุนปี 1 ให้เห็นภาพ</h3><p>ต้นทุน partner สมมติ: ติดตั้ง 12,000 × 6 = 72,000; support 3,000 × 3 customer-years = 9,000; ขาย/เดินทาง 30,000 บาท</p></article>
            <article class="card featured"><h3>เหลือ {{ $money($partnerYears[0]['partnerRevenue'] - 111000) }} บาท ในปี 1</h3><p>จากรายรับ {{ $money($partnerYears[0]['partnerRevenue']) }} − ต้นทุน 111,000 ก่อน overhead และภาษีของ partner เอง เหมาะเป็นรายได้เสริมจากฐานลูกค้าเดิม ไม่ใช่คำรับประกันรายได้เต็มเวลา</p></article>
        </div>
        <p class="note">ทำไมไม่ใช่ 6 × 39,000? โมเดลปีปฏิทินนับลูกค้าใหม่เฉลี่ยเพียง 6 เดือน ส่วนตารางก่อนหน้าแสดง 12 เดือนเต็มต่อหนึ่งดีล; เงินสดรับล่วงหน้าอาจต่างจากรายได้ที่แสดง</p>
    </section>

    <section class="slide" id="assumptions" aria-label="Financial assumptions">
        <div class="eyebrow">11 / สมมติฐานกรณีฐาน</div>
        <h2>ตัวขับเคลื่อนที่ต้องทำให้เกิดจริง</h2>
        <div class="grid four">
            <article class="card"><div class="index">PRODUCTIVE PARTNERS</div><div class="num">10 → 70</div><p>ปี 1–5: 10 / 20 / 35 / 50 / 70 ราย หมายถึงกำลังขายเทียบเต็มปี ไม่ใช่ยอดลงทะเบียน</p></article>
            <article class="card"><div class="index">SALES PRODUCTIVITY</div><div class="num">6</div><p>ลูกค้าใหม่ต่อ partner ต่อปี หรือ 1 ดีลทุก 2 เดือน → ปี 5 ต้องปิด 420 ดีล</p></article>
            <article class="card"><div class="index">ANNUAL RETENTION</div><div class="num">90%</div><p>หัก churn 10% ของลูกค้าปีก่อน ไม่มี upsell หรือขึ้นราคาในแบบจำลอง</p></article>
            <article class="card"><div class="index">STARTING CUSTOMER BASE</div><div class="num">0</div><p>เริ่มนับช่องทาง reseller ใหม่จากศูนย์ ไม่ใช่ข้ออ้างว่าบริษัทไม่มีลูกค้าปัจจุบัน</p></article>
        </div>
        <div class="disclosure">สมมติรายได้ลูกค้าเก่าหลังต่ออายุครบปี และลูกค้าใหม่เฉลี่ยครึ่งปี ไม่คิด churn ระหว่างปีแรก การขึ้นราคา หนี้เสีย และผลกระทบ partner churn แยกต่างหาก</div>
        <p class="note">หาก partner เริ่มกลางปี ต้องเพิ่มจำนวนที่ recruit หรือปรับเป้าลง; 10 productive partner-years อาจต้องมี 20 รายที่ active เฉลี่ยครึ่งปี ราคาและอัตราต่ออายุจำเป็นต้องทดสอบก่อน scale</p>
    </section>

    <section class="slide" id="growth" aria-label="Five-year growth projection">
        <div class="eyebrow">12 / ภาพการเติบโต 5 ปี · กรณีฐาน ไม่ใช่ยอดจริง</div>
        <h2>รายได้บริษัทจากช่องทางนี้<br><em>{{ $million($years[0]['companyRevenue']) }} → {{ $million($last['companyRevenue']) }} ล้านบาท/ปี</em></h2>
        <div class="chart" role="img" aria-label="รายได้บริษัทหลังหักส่วนแบ่ง partner จากปี 1 ถึงปี 5 ดูตัวเลขในตารางถัดไป">
            @foreach($years as $row)
                <div class="chart-col"><span class="chart-value">{{ $million($row['companyRevenue']) }} ลบ.</span><div class="bar" style="--height: {{ round($row['companyRevenue'] / $last['companyRevenue'] * 80, 2) }}%"></div><span class="chart-label">ปี {{ $row['year'] }}</span></div>
            @endforeach
        </div>
        <div class="grid three">
            <article class="card featured"><div class="unit">Revenue CAGR · ปี 1 → 5</div><div class="num">{{ $percent($base['cagr']) }}</div><p>โตเฉลี่ยทบต้นต่อปีใน 4 ช่วงปี เริ่มจากฐานเล็ก ไม่ใช่ historical growth</p></article>
            <article class="card"><div class="unit">ลูกค้าปลายปี 5 · ค่าคาดหมาย</div><div class="num">{{ $money($last['active']) }}</div><p>จาก 70 productive partners ขาย 6 ดีล/ปี และ retention 90%</p></article>
            <article class="card"><div class="unit">Net subscription ARR · สิ้นปี 5</div><div class="num">{{ $million($last['netArr']) }} ลบ.</div><p>run-rate 12 เดือนหลังหักส่วนแบ่ง ไม่รวม setup และไม่ใช่รายได้ที่รับรู้ในปีนั้น</p></article>
        </div>
    </section>

    <section class="slide" id="forecast" aria-label="Five-year revenue table">
        <div class="eyebrow">13 / ตารางรายได้ 5 ปี · กรณีฐาน</div>
        <h2>เงินเข้าระบบเท่าไร<br>แบ่งให้ partner และบริษัทเท่าไร</h2>
        <div class="table-wrap"><table>
            <thead><tr><th scope="col">หน่วยเงิน: ล้านบาท / ปี</th>@foreach($years as $row)<th scope="col">ปี {{ $row['year'] }}</th>@endforeach</tr></thead>
            <tbody>
                <tr><td>Productive partners (ราย)</td>@foreach($years as $row)<td>{{ $row['partners'] }}</td>@endforeach</tr>
                <tr><td>ลูกค้าใหม่ (ราย)</td>@foreach($years as $row)<td>{{ $row['new'] }}</td>@endforeach</tr>
                <tr><td>ลูกค้าปลายปี (ค่าคาดหมาย)</td>@foreach($years as $row)<td>{{ number_format($row['active'], 1) }}</td>@endforeach</tr>
                <tr><td>มูลค่าบริการลูกค้ารวม¹</td>@foreach($years as $row)<td>{{ $million($row['customerSpend']) }}</td>@endforeach</tr>
                <tr><td>ส่วนแบ่ง partner ทั้งเครือข่าย</td>@foreach($years as $row)<td>{{ $million($row['partnerRevenue']) }}</td>@endforeach</tr>
                <tr class="highlight"><td>บริษัทหลังหักส่วนแบ่ง²</td>@foreach($years as $row)<td>{{ $million($row['companyRevenue']) }}</td>@endforeach</tr>
                <tr><td>การเติบโตบริษัท YoY</td>@foreach($years as $row)<td>{{ $row['growth'] === null ? '—' : $percent($row['growth']) }}</td>@endforeach</tr>
                <tr><td>Net subscription ARR สิ้นปี</td>@foreach($years as $row)<td>{{ $million($row['netArr']) }}</td>@endforeach</tr>
            </tbody>
        </table></div>
        <p class="note">¹ Subscription ตามช่วงบริการ + onboarding; ไม่ใช่เงินสดรับล่วงหน้าหรือ bookings ² ใช้มุมมองเศรษฐศาสตร์หลังแบ่งรายได้ ไม่ใช่ข้อสรุปการรับรู้รายได้ทางบัญชีแบบ gross/net ต้องให้ผู้สอบบัญชียืนยัน ตัวเลขปัดเพื่อแสดงผล แต่คำนวณจากค่าจริงก่อนปัด</p>
        <div class="stat-strip"><div><strong>{{ $million($totals['companyRevenue']) }} ลบ.</strong><small>บริษัทสะสม 5 ปี ก่อนต้นทุน</small></div><div><strong>{{ $million($totals['partnerRevenue']) }} ลบ.</strong><small>partner ทั้งเครือข่ายสะสม ก่อนต้นทุน</small></div></div>
    </section>

    <section class="slide" id="costs" aria-label="Costs and operating profitability">
        <div class="eyebrow">14 / ต้นทุนการให้บริการ · ยังไม่ใช่กำไรสุทธิ</div>
        <h2>เติบโตแล้วเหลือเท่าไร?<br><em>ต้องหักต้นทุนก่อนพูดถึงผลตอบแทน</em></h2>
        <div class="table-wrap"><table>
            <thead><tr><th scope="col">สมมติฐาน / ล้านบาท</th>@foreach($years as $row)<th scope="col">ปี {{ $row['year'] }}</th>@endforeach</tr></thead>
            <tbody>
                <tr><td>บริษัทหลังหักส่วนแบ่ง</td>@foreach($years as $row)<td>{{ $million($row['companyRevenue']) }}</td>@endforeach</tr>
                <tr><td>ต้นทุนผันแปรบริษัท</td>@foreach($years as $row)<td>{{ $million($row['variableCost']) }}</td>@endforeach</tr>
                <tr><td>Contribution ก่อน fixed OPEX</td>@foreach($years as $row)<td>{{ $million($row['contribution']) }}</td>@endforeach</tr>
                <tr><td>Fixed OPEX ตามแผน</td>@foreach($years as $row)<td>{{ $million($row['opex']) }}</td>@endforeach</tr>
                <tr class="highlight"><td>ผลดำเนินงานจำลองก่อนภาษีฯ</td>@foreach($years as $row)<td><span class="{{ $row['operatingResult'] < 0 ? 'negative' : '' }}">{{ $million($row['operatingResult']) }}</span></td>@endforeach</tr>
            </tbody>
        </table></div>
        <div class="grid two">
            <article class="card"><h3>ต้นทุนที่สมมติไว้</h3><p>Cloud / L2 support = 12% ของ subscription ก่อนแบ่ง; งาน technical onboarding = 20% ของ setup ก่อนแบ่ง Fixed OPEX 1.8 → 6.0 ลบ./ปี ครอบคลุม core product, partner success, sales และ admin ไม่ซ้ำค่าบริการผันแปร</p></article>
            <article class="card"><h3>สิ่งที่ยังไม่ใช่ในตัวเลขนี้</h3><p>ไม่รวม VAT, ภาษีเงินได้ ดอกเบี้ย ค่าเสื่อม CAPEX ค่าซื้อกิจการ หนี้เดิม และเงินทุนหมุนเวียน ผลดำเนินงานนี้ไม่ใช่กำไรสุทธิหรือกระแสเงินสด</p></article>
        </div>
        <p class="note">Unit contribution ต่อ renewal เต็มปี = 42,000 − 7,200 = 34,800 บาท จุดคุ้ม fixed OPEX ปี 1 โดยไม่พึ่ง setup ≈ {{ (int) ceil($assumptions['opex'][0] / 34800) }} customer-years; base case ปี 1 มีเพียง 30 customer-years จึงยังขาดทุน</p>
    </section>

    <section class="slide" id="scenarios" aria-label="Scenario sensitivity">
        <div class="eyebrow">15 / เปรียบเทียบ 3 สถานการณ์ · ไม่รับประกันผลลัพธ์</div>
        <h2>ถ้าขายไม่ถึงเป้า<br>แผนยังรับไหวแค่ไหน?</h2>
        <div class="grid">
            @foreach($scenarios as $key => $scenario)
                @php $end = $scenario['years'][4]; @endphp
                <article class="card {{ $key === 'base' ? 'featured' : '' }}">
                    <span class="badge {{ $key === 'base' ? '' : 'proposal' }}">{{ $scenario['label'] }}</span>
                    <div class="num">{{ $million($end['companyRevenue']) }} ลบ.</div><div class="unit">รายได้บริษัทปี 5 หลังแบ่ง</div>
                    <ul><li>Partners: {{ implode(' / ', $scenario['partners']) }}</li><li>{{ $scenario['deals'] }} ดีล/partner/ปี · retention {{ $scenario['retention'] * 100 }}%</li><li>Revenue CAGR {{ $percent($scenario['cagr']) }}</li><li>ผลดำเนินงานปี 5: {{ $million($end['operatingResult']) }} ลบ.</li><li>ผลดำเนินงานสะสม 5 ปี: {{ $million(array_sum(array_column($scenario['years'], 'operatingResult'))) }} ลบ.</li></ul>
                </article>
            @endforeach
        </div>
        <div class="disclosure">Sensitivity ใช้ราคา ส่วนแบ่ง และ fixed OPEX ชุดเดียวกันเพื่อเปรียบเทียบตัวขับเคลื่อน Upside อาจต้องจ้างเพิ่มจึงทำกำไรต่ำกว่าที่แสดง; conservative ต้องลด burn ไม่ใช่เพิ่มงบโดยอัตโนมัติ</div>
        <p class="note">Gate ที่เสนอ: หากยอดขาย/partner ต่ำกว่า 4 ดีลต่อปี หรือ retention ต่ำกว่า 85% ให้หยุดเร่ง recruit ปรับ onboarding และราคา แล้ว reforecast รายเดือน</p>
    </section>

    <section class="slide" id="execution" aria-label="Execution plan">
        <div class="eyebrow">16 / แผนเข้าสู่ตลาดและเกณฑ์วัดผล</div>
        <h2>ทำให้ partner ขายได้จริง<br>ก่อนเร่งจำนวน partner</h2>
        <div class="grid four">
            <article class="card"><div class="index">DAY 01–30</div><h3>ยืนยันความต้องการ</h3><p>ตรวจ IP / security / demo; สัมภาษณ์ SME 10 รายและ candidate partner 10 ราย ยืนยันราคาและ scope ที่ลูกค้ายอมจ่าย</p></article>
            <article class="card"><div class="index">DAY 31–60</div><h3>เตรียมทีมขาย</h3><p>คัด pilot partner 3 ราย ทำ demo script, sandbox, สัญญา, lead registration และ certification 1 sales + 1 implementer ต่อราย</p></article>
            <article class="card"><div class="index">DAY 61–90</div><h3>ทดลองใช้งานจริง</h3><p>เป้าทดลอง 3 paid pilots วัด go-live ไม่เกิน 30 วันสำหรับ scope มาตรฐาน ติดตามชั่วโมงติดตั้งและ ticket จริง</p></article>
            <article class="card featured"><div class="index">MONTH 04–12</div><h3>ขยายอย่างมีหลักฐาน</h3><p>ขยายเมื่อ contribution เป็นบวกและส่งมอบได้ สร้าง case study ที่ได้รับอนุญาต วัด productive partner-years แทนยอดสมัคร</p></article>
        </div>
        <div class="stat-strip"><div><strong>2 qualified demos / เดือน</strong><small>ต่อ productive partner · สมมติ 25% win rate</small></div><div><strong>24 × 25% = 6 ดีล / ปี</strong><small>funnel ที่ต้องพิสูจน์ใน pilot</small></div><div><strong>70 × 6 = 420 ดีล</strong><small>ปี 5 · เฉลี่ย 35 go-lives / เดือนทั้งเครือข่าย</small></div></div>
        <p class="note">แผน pilot ใช้เวลา ramp-up; ปี 1 ของแบบจำลองหมายถึงปีดำเนินช่องทางที่มี productive capacity ตามสมมติฐาน หากเริ่มจากวันลงทุนต้องใส่ช่วง ramp เพิ่มและลดรายได้ปีแรกตามจริง</p>
    </section>

    <section class="slide" id="product-trends" aria-label="Current research and product opportunities">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 01 · ศึกษาข้อมูล 2 ต.ค. 2026</div>
        <h2>Trend ที่ควรตาม:<br><em>ลดงานตามเรื่อง ไม่ใช่เพิ่มอีกหนึ่ง chatbot</em></h2>
        <div class="grid">
            <article class="card"><span class="badge">MICROSOFT · MAY 2026</span><div class="num">86%</div><h3>AI ยังต้องมีคนตัดสินใจ</h3><p>ของผู้ใช้ AI ที่สำรวจมองผลลัพธ์เป็นจุดเริ่มต้น ไม่ใช่คำตอบสุดท้าย งานวิจัยครอบคลุมผู้ใช้ AI 20,000 คนใน 10 ประเทศ ไม่ใช่ตัวแทนทุกองค์กรไทย</p><p><a href="https://www.microsoft.com/en-us/worklab/work-trend-index/agents-human-agency-and-the-opportunity-for-every-organization" target="_blank" rel="noopener noreferrer">[R1] Work Trend Index 2026 ↗</a></p></article>
            <article class="card"><span class="badge">UK GOVERNMENT · JUL 2026</span><div class="num">86 ชม.</div><h3>เวลาที่เสียไปกับการตามเงิน</h3><p>ต่อปีโดยเฉลี่ยต่อธุรกิจที่ได้รับผลกระทบจาก late payment ใน UK เอกสารอ้างงานวิจัยปี 2025 สะท้อน pain ของงานติดตาม ไม่ใช่ขนาดตลาดไทย</p><p><a href="https://www.gov.uk/government/consultations/late-payments-tackling-poor-payment-practices/outcome/late-payment-consultation-time-to-pay-up-government-response-web-version" target="_blank" rel="noopener noreferrer">[R2] UK government response ↗</a></p></article>
            <article class="card featured"><span class="badge proposal">ข้อเสนอของเรา</span><h3>Automation ที่มีหลักฐาน</h3><p>รู้ว่าเรื่องค้างที่ใคร ส่งต่ออย่างไร และจบเมื่อไร เป็นปัญหาที่พบได้ข้ามอุตสาหกรรม เหมาะกับ workflow + data + integration มากกว่าสร้างโมเดล AI เอง</p><p>เริ่มระบบกฎที่ตรวจสอบได้ AI ช่วยร่าง/สรุปภายหลัง และไม่อนุมัติหรือส่งทวงเงินเอง</p></article>
        </div>
        <p class="note">ข้อสรุปผลิตภัณฑ์เป็นการวิเคราะห์จากแหล่งข้างต้น ไม่ใช่ข้อค้นพบว่าทุกองค์กรต้องซื้อ ต้องทดสอบ willingness to pay กับลูกค้าไทยก่อนลงทุนเต็มก้อน</p>
    </section>

    <section class="slide" id="product-selection" aria-label="Two recommended future products">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 02 · ต่อยอดความเชี่ยวชาญของทีม</div>
        <h2>เลือก 2 ปัญหาที่ต่อยอด<br><em>ERP + Workflow + Integration</em></h2>
        <div class="grid two">
            <article class="card featured"><span class="badge">เสนอให้ทดสอบก่อน</span><h3>MintCollect — ตามเงินให้เป็นระบบ</h3><p>สำหรับทีมบัญชีธุรกิจ B2B ขายเชื่อ เช่น ค้าส่งและบริการ ที่มีใบแจ้งหนี้ 100–1,500 ใบ/เดือน ผู้ซื้อ: เจ้าของกิจการหรือหัวหน้าการเงิน</p><ul><li>รายรับคือ pain ใกล้ตัว และวัดชั่วโมงงานติดตามได้</li><li>เข้าถึงผ่าน partner บัญชี/ERP เดิม</li><li>ไม่เหมาะกับร้านที่รับเงินสดครบทุกบิล</li></ul></article>
            <article class="card"><span class="badge proposal">เสนอเป็นลำดับถัดไป</span><h3>MintApprove — ขอซื้อ/ขอจ่ายไม่ตกหล่น</h3><p>สำหรับองค์กรเริ่มต้น 10–30 ผู้ใช้ หลายแผนกหรือสาขา ที่อนุมัติในแชต/อีเมล ผู้ซื้อ: เจ้าของกิจการ ฝ่ายธุรการหรือการเงิน</p><ul><li>ใช้ข้ามอุตสาหกรรมและเริ่มจาก template ได้</li><li>ขายตั้งค่ากระบวนการโดย partner</li><li>ไม่เหมาะกับบริษัทที่ระบบเดิมตอบโจทย์ครบแล้ว</li></ul></article>
        </div>
        <div class="disclosure">ความเชี่ยวชาญที่อนุมานจากโปรเจกต์: Laravel, ระบบธุรกิจ และงานเชื่อมระบบตามเว็บไซต์ ไม่ได้ตรวจ code ของ MintERP/POS หรือกำลังทีมจริง จึงไม่สมมติว่ายกโมดูลเดิมมาใช้ได้ทันที</div>
        <p class="note">ไม่เลือกตอนนี้: ERP ใหม่, payroll/tax compliance เต็มรูปแบบ หรือ AI agent อิสระหลายระบบ เพราะ scope และความเสี่ยงสูงกว่า MVP 12 สัปดาห์</p>
    </section>

    <section class="slide" id="mintcollect" aria-label="MintCollect value proposition">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 03 · แนวคิด MintCollect · ยังไม่ได้พัฒนา</div>
        <h2>MintCollect<br><em>รู้ว่าเงินค้าง เพราะอะไร และใครตามต่อ</em></h2>
        <p class="intro">ไม่สร้างโปรแกรมบัญชีอีกตัว แต่เป็นโต๊ะทำงานติดตามลูกหนี้ที่เริ่มจาก CSV และวางข้าง ERP เดิมได้</p>
        <div class="flow"><div><small>01 · IMPORT</small><strong>บิล → คิวติดตาม</strong><small>นำเข้าบิล/ยอดชำระ จัดอายุหนี้และผู้รับผิดชอบ</small></div><div><small>02 · FOLLOW UP</small><strong>ตรวจ → ส่งเตือน</strong><small>ตั้งเตือนแบบมีคนตรวจ ยกเว้นบิลมีข้อพิพาท</small></div><div><small>03 · CLOSE THE LOOP</small><strong>นัดจ่าย → ชำระ</strong><small>บันทึกนัดจ่าย เหตุผลค้าง และหลักฐานติดตาม</small></div></div>
        <div class="grid two"><article class="card featured"><h3>จุดขายที่ตั้งใจพิสูจน์</h3><p>Template ติดตามภาษาไทย + สถานะนัดชำระ/ข้อพิพาท + partner ช่วยจับคู่ข้อมูลใน 1 วันทำการเมื่อ CSV พร้อม ไม่บังคับเปลี่ยน ERP</p></article><article class="card"><h3>คุณค่าที่วัดได้</h3><p>เป้าทดลองลดเวลาตามบิล ≥30% ใน 4 สัปดาห์ เทียบ baseline ของลูกค้ารายเดิม ติดตาม overdue ratio / DSO ต่อ แต่ไม่รับประกันว่าจะได้เงินเร็วขึ้นเท่าไร</p></article></div>
        <p class="note">ความต่างนี้เป็น hypothesis ไม่ใช่ฟีเจอร์ที่คู่แข่งทำไม่ได้ ความได้เปรียบต้องเกิดจาก setup เร็ว ข้อมูลถูกต้อง และต้นทุนบริการต่ำกว่าอย่างพิสูจน์ได้</p>
    </section>

    <section class="slide" id="mintcollect-mvp" aria-label="MintCollect twelve-week MVP scope">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 04 · ขอบเขต MintCollect รุ่นทดลอง 12 สัปดาห์</div>
        <h2>จบ flow การตามบิลให้ครบ<br><em>ไม่ทำระบบการเงินทั้งหมด</em></h2>
        <div class="grid">
            <article class="card featured"><h3>IN · ต้องส่งมอบ</h3><ul><li>1 บริษัท/tenant, THB, 5 staff accounts</li><li>CSV invoice/payment, ตรวจซ้ำและรองรับยอดชำระบางส่วน</li><li>Aging, owner, นัดชำระ, dispute/pause</li><li>Email template 3 ระยะ + คิวให้คนตรวจและอนุมัติ</li><li>Activity log และรายงาน CSV</li></ul></article>
            <article class="card"><h3>OUT · ไม่อยู่ใน 3 เดือน</h3><ul><li>Bank feed / โอนเงิน / payment gateway</li><li>OCR, e-Tax, credit scoring หรือบริการทวงหนี้แทน</li><li>AI ส่งข้อความเองหรือพยากรณ์เงินเข้า</li><li>WhatsApp / LINE / native mobile app</li><li>เขียนข้อมูลกลับหลาย ERP พร้อมกัน</li></ul></article>
            <article class="card"><h3>QUALITY · ห้ามตัด</h3><ul><li>Tenant isolation, RBAC และ audit log</li><li>หยุดเตือนเมื่อ paid/disputed; ตรวจยอดก่อนส่ง</li><li>ถ้าไม่ยืนยันสถานะชำระใน 24 ชม. ให้ hold คิว</li><li>Idempotent send, retries และ bounce tracking</li><li>Backup/restore, data export และ retention</li></ul></article>
        </div>
        <p class="note">ขอบเขต pilot เสนอ: สูงสุด 2,000 open invoices / 5,000 emails ต่อเดือน/tenant; เริ่ม CSV ก่อน API ของ MintERP เป็น optional หลังยืนยันสิทธิ์และ endpoint ไม่เป็นเงื่อนไขที่ทำให้ MVP ล่าช้า</p>
    </section>

    <section class="slide" id="mintapprove" aria-label="MintApprove value proposition">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 05 · แนวคิด MintApprove · ยังไม่ได้พัฒนา</div>
        <h2>MintApprove<br><em>คำขอเดียว เห็นคนรับช่วงต่อชัดเจน</em></h2>
        <p class="intro">ขอซื้อ/ขออนุมัติค่าใช้จ่ายผ่านเว็บมือถือ พร้อมเอกสารและประวัติ โดยไม่ต้องซื้อ ERP ใหม่หรือออกแบบ workflow จากกระดาษเปล่า</p>
        <div class="flow"><div><small>01 · REQUEST</small><strong>2 แบบคำขอ</strong><small>คำขอซื้อ + ขออนุมัติค่าใช้จ่าย แนบเอกสาร</small></div><div><small>02 · DECIDE</small><strong>อนุมัติ 1–3 ขั้น</strong><small>เลือกสายอนุมัติจากแผนก/วงเงิน แบบลำดับ</small></div><div><small>03 · HAND OFF</small><strong>ส่งต่อพร้อมหลักฐาน</strong><small>ส่งออก CSV/PDF ให้บัญชีพร้อม audit trail</small></div></div>
        <div class="grid two"><article class="card featured"><h3>จุดขายที่ตั้งใจพิสูจน์</h3><p>แพ็กเกจภาษาไทยพร้อม template และ partner ตั้งค่าจบใน 1 วันเมื่อ policy พร้อม ราคาองค์กรไม่ไล่ซื้อ workflow builder หลายชิ้น</p></article><article class="card"><h3>ไม่ซ้ำ ERP แบบไม่มีเหตุผล</h3><p>ขายเฉพาะทีมที่พนักงานยังอยู่นอก ERP หรือใช้หลายระบบ ถ้า MintERP/เครื่องมือเดิมอนุมัติได้ครบ ให้ใช้ของเดิม ไม่ขาย add-on ซ้ำ</p></article></div>
        <p class="note">MVP นี้เป็นการอนุมัติภายใน ไม่ใช่ qualified e-signature, ระบบบังคับใช้ budget หรือคำสั่งจ่ายเงิน แยกสิทธิ์ผู้ยื่นกับผู้อนุมัติอย่างชัดเจน</p>
    </section>

    <section class="slide" id="mintapprove-mvp" aria-label="MintApprove twelve-week MVP scope">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 06 · ขอบเขต MintApprove รุ่นทดลอง 12 สัปดาห์</div>
        <h2>Template ก่อน workflow builder<br><em>กฎน้อย แต่ตรวจสอบได้ครบ</em></h2>
        <div class="grid">
            <article class="card featured"><h3>IN · ต้องส่งมอบ</h3><ul><li>1 บริษัท/tenant, 30 users, 500 requests/เดือน</li><li>2 forms มาตรฐาน + attachments</li><li>เส้นทางคงที่จากแผนก/วงเงิน สูงสุด 3 ขั้น</li><li>Approve/reject/return, email reminder</li><li>ประวัติแก้ไข ระยะเวลาค้าง CSV/PDF export</li></ul></article>
            <article class="card"><h3>OUT · ไม่อยู่ใน 3 เดือน</h3><ul><li>Drag-and-drop BPMN / no-code builder</li><li>Parallel approvals / delegation ซับซ้อน</li><li>Payroll, ลางาน, จ่ายเงินและ budget reservation</li><li>OCR / AI อนุมัติแทนคน</li><li>SSO enterprise / on-prem / app native</li></ul></article>
            <article class="card"><h3>QUALITY · ห้ามตัด</h3><ul><li>ห้าม self-approve และตรวจ role ทุก action</li><li>แก้จำนวนเงินหลังยื่นต้องเริ่มอนุมัติใหม่</li><li>Version ของ policy/คำขอ และกันกดอนุมัติซ้ำ</li><li>ไฟล์ private: ตรวจชนิด/ขนาด/มัลแวร์</li><li>Audit export, tenant isolation, restore test</li></ul></article>
        </div>
        <p class="note">หาก approver ไม่อยู่ ใช้ยกเลิกและยื่นใหม่พร้อม log ก่อน ยังไม่เพิ่มระบบ delegation เป้าทดลองลด median approval lead time ≥30% และไม่มี critical authorization defect</p>
    </section>

    <section class="slide" id="product-competition" aria-label="Competitive analysis">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 07 · คู่แข่งและจุดต่างที่ต้องพิสูจน์</div>
        <h2>ไม่ขายว่า “ไม่มีใครทำ”<br><em>ขายว่าเหมาะกับลูกค้ากลุ่มไหนกว่า</em></h2>
        <div class="grid">
            <article class="card"><h3>Chaser → MintCollect</h3><p><a href="https://www.chaserhq.com/" target="_blank" rel="noopener noreferrer">[R3] Chaser</a> มี automated reminders, receivables และ integrations อยู่แล้ว เราไม่แข่งฟีเจอร์ทั้งหมด</p><ul><li>ทดสอบช่องว่าง: Thai templates และ partner-assisted CSV onboarding</li><li>ถ้าลูกค้าต้องการ bank sync/forecast เต็มรูปแบบ ไม่ใช่ ICP ของ MVP</li></ul></article>
            <article class="card"><h3>Power Automate → MintApprove</h3><p><a href="https://learn.microsoft.com/en-us/power-automate/get-started-approvals" target="_blank" rel="noopener noreferrer">[R4] Microsoft Approvals</a> มี sequential approvals และใช้กับ Office 365 บางสิทธิ์ได้แล้ว</p><ul><li>ไม่อ้างว่าทางเลือก Microsoft ต้องซื้อใหม่เสมอ</li><li>ชนะได้ด้วย ready-to-use policy + บริการ ไม่ใช่แค่ปุ่มอนุมัติภาษาไทย</li></ul></article>
            <article class="card"><h3>Kissflow / ระบบเดิม</h3><p><a href="https://kissflow.com/workflow/" target="_blank" rel="noopener noreferrer">[R5] Kissflow</a> มี workflow platform กว้างกว่า ส่วน ERP/โปรแกรมบัญชีอาจมีฟีเจอร์ใกล้เคียงอยู่แล้ว</p><ul><li>เริ่มถาม “ทำไมของเดิมไม่พอ?” ก่อนขาย</li><li>ถ้า 7 ใน 10 รายใช้ของเดิมจบและไม่ยอมจ่ายเพิ่ม ให้หยุด/เปลี่ยน segment</li></ul></article>
        </div>
        <p class="note">หน้าผลิตภัณฑ์เป็นคำอธิบายจากผู้ขาย ไม่ใช่ผล benchmark อิสระ ยังไม่มีหลักฐานว่าเราถูกกว่าหรือมี conversion สูงกว่า ต้องทดลองขายจริง</p>
    </section>

    <section class="slide" id="product-economics" aria-label="Future product pricing and reseller economics">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 08 · สมมติฐานราคา · บาท ไม่รวมภาษีมูลค่าเพิ่ม</div>
        <h2>สินค้าเล็ก ราคาเริ่มง่าย<br><em>แต่ต้องเหลือพอให้ partner และทีม support</em></h2>
        <div class="table-wrap"><table><thead><tr><th scope="col">ต่อบริษัท / ใช้งานเต็ม 12 เดือน</th>@foreach($roadmap as $product)<th scope="col">{{ $product['name'] }}</th>@endforeach</tr></thead><tbody>
            <tr><td>รายเดือน / หรือรายปีราคาพิเศษ</td>@foreach($roadmap as $product)<td>{{ $money($product['monthly']) }} / {{ $money($product['annual']) }}</td>@endforeach</tr>
            <tr><td>Setup ครั้งแรก</td>@foreach($roadmap as $product)<td>{{ $money($product['setup']) }}</td>@endforeach</tr>
            <tr><td>Partner: subscription 30% + setup 70%</td>@foreach($roadmap as $product)<td>{{ $money($product['partnerAnnual']) }} + {{ $money($product['partnerSetup']) }} = {{ $money($product['partnerAnnual'] + $product['partnerSetup']) }}</td>@endforeach</tr>
            <tr class="highlight"><td>บริษัทปีแรก หลังแบ่ง ก่อนต้นทุน</td>@foreach($roadmap as $product)<td>{{ $money($product['companyFirstYear']) }}</td>@endforeach</tr>
            <tr><td>ต้นทุนบริการผันแปรสมมติ / เดือน</td>@foreach($roadmap as $product)<td>{{ $money($product['monthlyCost']) }}</td>@endforeach</tr>
            <tr><td>Contribution ต่อ renewal เต็มปี¹</td>@foreach($roadmap as $product)<td>{{ $money($product['annualContribution']) }}</td>@endforeach</tr>
        </tbody></table></div>
        <p class="note">¹ รายปี − commission 30% − ต้นทุนบริการ 12 เดือน ไม่รวมพัฒนา CAC และ overhead; setup ยังไม่หักต้นทุน onboarding ราคา/limits และส่วนแบ่งเป็นข้อเสนอ ต้องยืนยัน willingness to pay และต้นทุนจริง</p>
        <div class="disclosure">ตัวอย่าง 20 บัญชีต่อสินค้า: gross ARR {{ $money(array_sum(array_column($roadmap, 'annual')) * 20) }} บาท; บริษัทหลังแบ่ง {{ $money(array_sum(array_column($roadmap, 'annual')) * 20 * (1 - $assumptions['partnerSubscriptionShare'])) }} บาท/ปี ก่อนต้นทุน ไม่ใช่ forecast และยังไม่รวมในแผน MintERP 5 ปี ห้ามนับซ้ำหากขายแบบ bundle</div>
    </section>

    <section class="slide" id="product-delivery" aria-label="Twelve-week roadmap and funding gates">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 09 · เป้าหมาย 12 สัปดาห์ต่อสินค้า ภายใต้ทีมและขอบเขตที่กำหนด</div>
        <h2>แผนทำ MVP ให้จบจริง<br><em>ทีมเดียวทำทีละสินค้า ไม่ทำสองตัวพร้อมกัน</em></h2>
        <div class="grid four">
            <article class="card"><div class="index">WEEK 01–02</div><h3>ยืนยันและล็อกขอบเขต</h3><p>สัมภาษณ์ 10 บริษัท/สินค้า ดู flow และข้อมูลจริง ปิด scope + acceptance criteria หา design partners 3 ราย และอย่างน้อย 2 รายตกลง paid pilot</p></article>
            <article class="card"><div class="index">WEEK 03–06</div><h3>พัฒนางานหลักให้ครบ</h3><p>Tenant, RBAC, schema, CSV/forms และ status flow ทำ end-to-end ให้ครบ 1 เส้นทางก่อนเพิ่มลูกเล่น</p></article>
            <article class="card"><div class="index">WEEK 07–09</div><h3>ทดสอบความน่าเชื่อถือ</h3><p>Reminders, audit/export, retry/idempotency, privacy, security tests และ restore drill ทดสอบกับข้อมูล pilot</p></article>
            <article class="card featured"><div class="index">WEEK 10–12</div><h3>ทดลองและตัดสินใจ</h3><p>ใช้งานจริง 3 บริษัท แก้ critical bugs วัดเวลางานเทียบ baseline และยืนยันอย่างน้อย 2 รายยอมจ่ายราคาทดลอง</p></article>
        </div>
        <div class="stat-strip"><div><strong>2 dev + QA 0.5 + founder 0.25</strong><small>FTE ต่อสินค้า · ต้องจัดทีมและตัด scope ก่อนเริ่ม</small></div><div><strong>561,000 บาท / MVP</strong><small>งบสมมติรวมแรงงานและ buffer ไม่ใช่ใบเสนอราคา</small></div><div><strong>MintCollect → MintApprove</strong><small>สองรอบรวม 24 สัปดาห์ หากผ่าน gate / ไม่ใช่ 2 ตัวใน 90 วัน</small></div></div>
        <p class="note">งบ: dev 360k + QA 60k + founder 60k + tools/security 30k + buffer 51k; สองสินค้ารวม 1.122 ลบ. ต้องอนุมัติแยกหรือปรับ allocation เดิม ไม่ถือว่ารวมในกรอบ ERP 3 ลบ. แล้ว หากทำคนเดียวหรือไม่มี pilot data ต้องลด scope/ประเมินเวลาใหม่</p>
    </section>

    <section class="slide" id="product-research" aria-label="Internet research sources and launch criteria">
        <div class="eyebrow">แผนผลิตภัณฑ์ใหม่ / 10 · แหล่งอ้างอิงและเกณฑ์อนุมัติลงทุน</div>
        <h2>ก่อนอนุมัติลงทุน<br><em>ขอหลักฐานลูกค้า ไม่ใช่แค่ trend</em></h2>
        <div class="grid two">
            <article class="card"><h3>แหล่งที่อ่านจริงจากอินเทอร์เน็ต</h3><ul>
                <li><a href="https://www.microsoft.com/en-us/worklab/work-trend-index/agents-human-agency-and-the-opportunity-for-every-organization" target="_blank" rel="noopener noreferrer">R1 · Microsoft WTI — 5 May 2026</a>: AI users, human judgment, organizational readiness</li>
                <li><a href="https://www.gov.uk/government/consultations/late-payments-tackling-poor-payment-practices/outcome/late-payment-consultation-time-to-pay-up-government-response-web-version" target="_blank" rel="noopener noreferrer">R2 · GOV.UK — updated 24 Jul 2026</a>; อ้าง <a href="https://www.gov.uk/government/publications/late-payments-research-impact-on-the-uk-economy" target="_blank" rel="noopener noreferrer">งานวิจัย 30 Jul 2025</a></li>
                <li><a href="https://www.chaserhq.com/" target="_blank" rel="noopener noreferrer">R3 · Chaser</a> / <a href="https://learn.microsoft.com/en-us/power-automate/get-started-approvals" target="_blank" rel="noopener noreferrer">R4 · Power Automate Approvals</a> / <a href="https://kissflow.com/workflow/" target="_blank" rel="noopener noreferrer">R5 · Kissflow Workflow</a>: ตรวจความสามารถคู่แข่ง ไม่ใช้ testimonial เป็นผลลัพธ์ของเรา</li>
            </ul></article>
            <article class="card featured"><h3>Go / No-go ต่อสินค้า</h3><ul>
                <li>ข้อมูลจริง 3 pilot companies; ≥2 รายตกลงจ่าย ไม่ใช่แค่ตอบว่าสนใจ</li>
                <li>Collect: เวลาตามบิลลด ≥30%; ไม่ส่งซ้ำหรือส่งบิล paid/disputed ใน acceptance tests</li>
                <li>Approve: median approval time ลด ≥30%; ไม่ bypass สิทธิ์หรือแก้วงเงินโดยไม่เริ่มใหม่</li>
                <li>ไม่มี critical security defect; partner เริ่มใช้งาน scope มาตรฐานได้ ≤1 วันหลังข้อมูลพร้อม</li>
                <li>สัปดาห์ 12 ถ้าไม่ผ่าน ให้ปรับ/หยุด ไม่เปิดสินค้าใหม่เพิ่มเพื่อกลบปัญหา</li>
            </ul></article>
        </div>
        <div class="disclosure">ต่างประเทศให้หลักฐานว่าปัญหามีอยู่ แต่ยังไม่ยืนยันตลาดไทย ชื่อ MintCollect / MintApprove เป็นชื่อทำงาน ต้องตรวจเครื่องหมายการค้า/โดเมนก่อนใช้จริง รายงานวิเคราะห์ฉบับเต็ม: presentations/product-roadmap-research.md</div>
    </section>

    <section class="slide" id="capital" aria-label="Capital plan">
        <div class="eyebrow">17 / เงินทุนเพื่อเติบโตที่เสนอ · ไม่ใช่ราคาขายบริษัท</div>
        <h2>กรอบเงินทุนเริ่มต้นเสนอ <em>3 ล้านบาท</em><br>ปล่อยงบตาม milestone ไม่ใช่ตามความหวัง</h2>
        <div class="budget" aria-hidden="true"><span></span><span></span><span></span><span></span></div>
        <div class="grid four">
            <article class="card"><div class="num">1.20 ลบ.</div><h3>ผลิตภัณฑ์ · 40%</h3><p>Hardening, security review, onboarding template และเอกสารส่งมอบ</p></article>
            <article class="card"><div class="num">0.90 ลบ.</div><h3>ช่องทางขาย · 30%</h3><p>Partner success, training, demo และ co-marketing แบบวัด conversion</p></article>
            <article class="card"><div class="num">0.60 ลบ.</div><h3>เงินทุนหมุนเวียน · 20%</h3><p>สำรองช่วง ramp-up การเก็บเงินล่าช้า และการให้บริการลูกค้าเริ่มต้น</p></article>
            <article class="card"><div class="num">0.30 ลบ.</div><h3>เงินสำรอง · 10%</h3><p>Legal, IP review และเหตุการณ์ไม่คาดคิด อนุมัติงบเป็นรายกรณี</p></article>
        </div>
        <p class="note">กรอบนี้เป็นการจัดสรรเงินทุน ไม่ใช่ค่าใช้จ่ายเพิ่มเหนือ OPEX อีก 3 ล้านบาท ต้องทำ cash-flow รายเดือนเพื่อ reconcile รายการซ้ำ Base case ปี 1 ขาดทุนดำเนินงาน {{ $million(-$years[0]['operatingResult']) }} ลบ. แต่ไม่ได้แปลว่าเงินทุนเท่านี้พอ หรือว่า 3 ล้านบาทมี runway แน่นอน</p>
        <div class="disclosure">เสนอแบ่ง funding 1.0 / 1.0 / 1.0 ลบ.: ตรวจสินค้าและ IP → ผ่าน paid pilots → ผ่าน delivery/contribution gate ยังไม่กำหนด % หุ้นหรือ valuation จนกว่าจะมีงบและ cap table</div>
    </section>

    <section class="slide" id="risk" aria-label="Risks and mitigation">
        <div class="eyebrow">18 / ความเสี่ยงและแผนควบคุม</div>
        <h2>ความเสี่ยงที่ผู้ซื้อควรรู้<br>และสิ่งที่เราจะใช้ควบคุม</h2>
        <div class="grid two">
            <article class="card"><h3>Product / IP ไม่พร้อมโอน</h3><p>ตรวจเจ้าของ code, งานผู้รับจ้าง, OSS licenses และ product repositories จริง แยกงานที่เป็น IP ลูกค้าออกจาก asset list</p></article>
            <article class="card"><h3>Partner ขายได้แต่ส่งมอบไม่ได้</h3><p>Certification ก่อนขายจริง จำกัดจำนวน concurrent implementations และมี quality review ก่อนขยาย volume</p></article>
            <article class="card"><h3>Custom มากจน margin หาย</h3><p>กำหนด template และ acceptance criteria; scope เพิ่มต้องมี SOW/ราคาแยก วัด onboarding hours และ contribution ต่อ account</p></article>
            <article class="card"><h3>Churn / ข้อมูล / Founder dependency</h3><p>วัด cohort renewal, export/backup/restore, access control และ PDPA ทำ runbook กับ transition plan ลดการพึ่งบุคคลเดียว</p></article>
        </div>
        <p class="note">ข้อเสนอ SLA เริ่มต้น: รับเรื่องภายใน 1 วันทำการและมีช่องทาง incident ร้ายแรง ระยะเวลาแก้ไข/การดูแลนอกเวลาต้องตกลงหลังวัดกำลังทีม ไม่อ้าง 24/7 หรือ uptime 100% โดยไม่มีหลักฐาน</p>
    </section>

    <section class="slide" id="deal" aria-label="Deal structure and next steps">
        <div class="eyebrow">19 / รูปแบบการซื้อกิจการและร่วมลงทุน</div>
        <h2>เลือกซื้อฐานธุรกิจ<br>หรือร่วมสร้างเครื่องยนต์การเติบโต</h2>
        <div class="grid">
            <article class="card"><h3>ซื้อกิจการ</h3><p>ซื้อหุ้นหรือซื้อทรัพย์สินตามขอบเขตที่ตรวจสอบแล้ว ราคาต้องอิงงบ IP สัญญาและภาระหนี้ เสนอใช้ holdback / earn-out ผูกกับการโอนและลูกค้าที่รักษาได้</p></article>
            <article class="card featured"><h3>ร่วมลงทุนเชิงกลยุทธ์</h3><p>กรอบเงินทุนเติบโตเสนอ 3 ลบ. แลก equity ตาม valuation ที่ตกลงหลัง diligence พร้อมสิทธิ์รายงาน KPI และการปล่อยเงินตาม milestone</p></article>
            <article class="card"><h3>พาร์ทเนอร์ทางธุรกิจ</h3><p>เริ่มจาก pilot reseller โดยไม่ซื้อหุ้น ใช้สัญญาและส่วนแบ่งใน deck ทดสอบการขาย/ส่งมอบก่อนขยายเป็น strategic partnership</p></article>
        </div>
        <p class="intro">ขั้นตอนถัดไป: NDA → data room → product & financial review → term sheet → definitive agreement</p>
        <p class="note">ไม่เสนอ ROI, exit multiple หรือราคาขายบริษัทที่ไม่มีข้อมูลรองรับ ตัวเลขในโมเดลไม่ใช่การประเมินมูลค่ากิจการ</p>
    </section>

    <section class="slide" id="next-step" aria-label="Contact and invitation">
        <div class="eyebrow">20 / ร่วมสร้างการเติบโตระยะถัดไป</div>
        <img class="company-logo" src="{{ asset('images/logo-alexia.png') }}" alt="โลโก้บริษัท AlexiaSoft" width="220" height="88">
        <h1>ต่อยอดผลิตภัณฑ์<br><em>ขยายผ่านพาร์ทเนอร์</em></h1>
        <p class="intro">สิ่งที่นำมาคุย: โอกาสต่อยอด MintERP + MintPOS<br>สิ่งที่ต้องทำร่วมกัน: ยืนยันสินค้า รายได้จริง และ unit economics ก่อนขยาย</p>
        <div class="grid two">
            <article class="card"><h3>นัดคุยธุรกิจและดูเดโม</h3><p><a href="mailto:sale@alexiasoft.co">sale@alexiasoft.co</a><br><a href="tel:0616975959">061-697-5959</a><br>Khon Kaen, Thailand</p></article>
            <article class="card"><h3>เอกสารที่ต้องเตรียมก่อนกำหนดราคา</h3><p>งบและ bank reconciliation 24 เดือน · customer cohorts · สัญญา/IP · team/cap table · product access · ภาระหนี้และภาษี</p></article>
        </div>
    </section>

    <section class="slide" id="methodology" aria-label="Model methodology and sources">
        <div class="eyebrow">ภาคผนวก / แหล่งข้อมูลและวิธีคำนวณ</div>
        <h2>ตรวจสอบตัวเลขได้<br><em>ไม่ซ่อนสมมติฐานไว้หลังกราฟ</em></h2>
        <div class="grid two">
            <article class="card"><h3>สูตรแบบจำลอง</h3><ul>
                <li>ลูกค้าใหม่ = productive partners × deals/partner</li>
                <li>ลูกค้าเก่าที่อยู่ต่อ = ลูกค้าปลายปีก่อน × retention</li>
                <li>Customer-years = ลูกค้าเก่าที่อยู่ต่อ + ลูกค้าใหม่ × 0.5</li>
                <li>Subscription = customer-years × 60,000</li>
                <li>Setup = ลูกค้าใหม่ × 30,000</li>
                <li>บริษัท = subscription × 70% + setup × 30%</li>
                <li>Partner = subscription × 30% + setup × 70%</li>
                <li>CAGR = (รายได้ปี 5 ÷ ปี 1)<sup>1/4</sup> − 1</li>
            </ul></article>
            <article class="card"><h3>แหล่งข้อมูลและขอบเขต</h3><ul>
                <li>Products: resources/views/products-section.blade.php และภาพ public/images/products/</li>
                <li>ประสบการณ์/โปรเจกต์: about-section.blade.php เป็นคำอธิบายบริษัท ไม่ใช่ audited traction</li>
                <li>Services / Contact: services-section.blade.php และ contact-section.blade.php</li>
                <li>ราคา ส่วนแบ่ง conversion, retention, cost และ funding เป็นสมมติฐานเสนอทั้งหมด</li>
                <li>จำนวนลูกค้าทศนิยมเป็นค่าคาดหมาย ไม่ใช่จำนวนบัญชีจริง; ไม่ปัดระหว่างคำนวณ</li>
                <li>ค่าคาดการณ์ทั้งหมดเป็น THB ไม่รวม VAT และต้องทบทวนเมื่อมีข้อมูล pilot</li>
            </ul></article>
        </div>
        <p class="note">เอกสารติดป้าย Confidential เพื่อสื่อเจตนาเท่านั้น URL นี้ยังเป็น public route และไม่มี access control ห้ามใส่รายชื่อลูกค้า ข้อมูลการเงินลับ หรือ credentials จนกว่าจะเพิ่มการจำกัดสิทธิ์</p>
    </section>
</main>

<div class="controls" aria-label="ควบคุมสไลด์">
    <div class="progress" id="progress" aria-hidden="true"></div>
    <div class="brand"><img src="{{ asset('images/logo-alexia.png') }}" alt="AlexiaSoft" width="108" height="40"></div>
    <div class="status">ฉบับหารือ · ตัวเลขประมาณการ ไม่ใช่ผลประกอบการจริง</div>
    <div class="control-group">
        <button class="optional" id="print" type="button">พิมพ์ / PDF</button>
        <button class="optional" id="fullscreen" type="button" aria-label="แสดงเต็มจอ">⛶</button>
        <button id="prev" type="button" aria-label="สไลด์ก่อนหน้า">←</button>
        <span class="counter" id="count" aria-live="polite" aria-atomic="true"></span>
        <button id="next" type="button" aria-label="สไลด์ถัดไป">→</button>
    </div>
</div>
<script>
(() => {
    const slides = [...document.querySelectorAll('.slide')];
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const count = document.getElementById('count');
    const progress = document.getElementById('progress');
    let index = 0;
    function fromHash() {
        const hash = location.hash.slice(1);
        const found = slides.findIndex(slide => slide.id === hash);
        return found >= 0 ? found : (/^\d+$/.test(hash) ? Math.min(slides.length - 1, Math.max(0, Number(hash) - 1)) : 0);
    }
    const deck = document.getElementById('deck');
    const controls = document.querySelector('.controls');
    function fitSlide() {
        const slide = slides[index];
        const availableHeight = Math.max(1, window.innerHeight - controls.offsetHeight - 8);
        const height = Math.max(slide.offsetHeight, slide.scrollHeight);
        const width = Math.max(deck.offsetWidth, slide.scrollWidth);
        const scale = Math.min(document.documentElement.clientWidth / width, availableHeight / height);
        deck.style.setProperty('--deck-scale', scale);
        deck.style.setProperty('--deck-top', `${Math.max(0, (availableHeight - height * scale) / 2)}px`);
    }
    new ResizeObserver(fitSlide).observe(deck);
    new ResizeObserver(fitSlide).observe(controls);
    addEventListener('resize', fitSlide);
    addEventListener('load', fitSlide);
    document.fonts.ready.then(fitSlide);
    function render(focus = false) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            slide.tabIndex = -1;
        });
        prev.disabled = index === 0;
        next.disabled = index === slides.length - 1;
        count.textContent = `${index + 1} / ${slides.length}`;
        progress.style.width = `${(index + 1) / slides.length * 100}%`;
        fitSlide();
        if (focus) slides[index].focus({preventScroll: true});
        window.scrollTo(0, 0);
    }
    function go(target) {
        index = Math.min(slides.length - 1, Math.max(0, target));
        history.replaceState(null, '', '#' + slides[index].id);
        render(true);
    }
    document.documentElement.classList.add('js');
    index = fromHash();
    render();
    prev.addEventListener('click', () => go(index - 1));
    next.addEventListener('click', () => go(index + 1));
    document.getElementById('print').addEventListener('click', () => window.print());
    const fullscreen = document.getElementById('fullscreen');
    fullscreen.hidden = !document.fullscreenEnabled;
    fullscreen.addEventListener('click', async () => {
        try {
            if (document.fullscreenElement) await document.exitFullscreen();
            else await document.documentElement.requestFullscreen();
        } catch (_) { fullscreen.textContent = 'ใช้ F11'; }
    });
    addEventListener('hashchange', () => { index = fromHash(); render(true); });
    addEventListener('keydown', event => {
        if (event.altKey || event.ctrlKey || event.metaKey || event.target.closest('button,a,input,textarea,select,[contenteditable]')) return;
        let target = index;
        if (['ArrowRight', 'PageDown', ' '].includes(event.key)) target += event.shiftKey ? -1 : 1;
        else if (['ArrowLeft', 'PageUp'].includes(event.key)) target--;
        else if (event.key === 'Home') target = 0;
        else if (event.key === 'End') target = slides.length - 1;
        else return;
        event.preventDefault();
        go(target);
    });
})();
</script>
</body>
</html>
