@extends('layouts.app')
@section('title', 'JSON Encoder & Decoder PHP | AlexiaSoft')
@section('content')
<section style="padding:120px 20px; min-height:100vh; display:flex; justify-content:center; ">
    <div style="max-width:1100px; width:100%;">

        {{-- Header --}}
        <div style="text-align:center; margin-bottom:30px;">
            <h1 style="font-size:2.5rem; font-weight:700; color: #2d3436;" 
                data-en="JSON Encoder & Decoder PHP" 
                data-th="เครื่องมือแปลง JSON และ PHP Array">
                JSON Encoder & Decoder PHP
            </h1>
            <p style="color:#64748b;" 
               data-en="Enter PHP Array on the left to Encode, or JSON on the right to Decode."
               data-th="ป้อน PHP Array ทางซ้ายเพื่อ Encode หรือป้อน JSON ทางขวาเพื่อ Decode">
               Enter PHP Array on the left to Encode, or JSON on the right to Decode.
            </p>
        </div>

        {{-- Main Card --}}
        <div style="background:rgba(255,255,255,.7); backdrop-filter:blur(12px); padding:30px; border-radius:24px; box-shadow:0 10px 30px rgba(0,0,0,.05); border: 1px solid rgba(255,255,255,0.3);">

            {{-- Textareas --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:25px;">

                {{-- Left --}}
                <div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                        <button onclick="copyText('leftBox')" style="border:none; background:none; color:#22c55e; font-weight:600; cursor:pointer;"
                                data-en="Copy Left" data-th="คัดลอกฝั่งซ้าย">Copy Left</button>
                        <span onclick="leftBox.value=''" style="cursor:pointer; font-size:.85rem; color:#999;"
                              data-en="Clear Left" data-th="ล้างฝั่งซ้าย">Clear Left</span>
                    </div>
                    <textarea id="leftBox" placeholder="Enter PHP Array here..." 
                              data-placeholder-en="Enter PHP Array here..." 
                              data-placeholder-th="ป้อน PHP Array ที่นี่..."
                              style="width:100%; height:380px; padding:15px; border-radius:14px; border:1px solid #e5e7eb; font-family:monospace; resize:none; outline:none;"></textarea>
                </div>

                {{-- Right --}}
                <div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                        <button onclick="copyText('rightBox')" style="border:none; background:none; color:#22c55e; font-weight:600; cursor:pointer;"
                                data-en="Copy Right" data-th="คัดลอกฝั่งขวา">Copy Right</button>
                        <span onclick="rightBox.value=''" style="cursor:pointer; font-size:.85rem; color:#999;"
                              data-en="Clear Right" data-th="ล้างฝั่งขวา">Clear Right</span>
                    </div>
                    <textarea id="rightBox" placeholder="Enter JSON String here..." 
                              data-placeholder-en="Enter JSON String here..." 
                              data-placeholder-th="ป้อน JSON String ที่นี่..."
                              style="width:100%; height:380px; padding:15px; border-radius:14px; border:1px solid #e5e7eb; font-family:monospace; resize:none; outline:none;"></textarea>
                </div>
            </div>

            {{-- Buttons --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                <button onclick="encodeJSON()" style="border:none; padding:16px; border-radius:50px; background:linear-gradient(135deg,#22c55e,#3b82f6); color:white; font-weight:600; cursor:pointer; transition: 0.3s;"
                        data-en="JSON Encode" data-th="แปลงเป็น JSON">
                    JSON Encode
                </button>
                <button onclick="decodeJSON()" style="border:none; padding:16px; border-radius:50px; background:linear-gradient(135deg,#7c3aed,#a78bfa); color:white; font-weight:600; cursor:pointer; transition: 0.3s;"
                        data-en="JSON Decode" data-th="แปลงเป็น PHP Array">
                    JSON Decode
                </button>
            </div>

        </div>
    </div>
</section>

<script>
    const leftBox = document.getElementById("leftBox");
    const rightBox = document.getElementById("rightBox");

    // ฟังก์ชันช่วยดึงภาษาปัจจุบัน (ตรวจสอบจากคลาสของ body หรือตัวแปรภาษาที่คุณมี)
    function getCurrentLang() {
        // อ้างอิงจากสวิตช์ภาษาของคุณ โดยปกติจะเช็คจากคลาส active ของปุ่มภาษา
        // หากสคริปต์หลักของคุณเก็บภาษาไว้ใน localStorage ให้ใช้ตัวนั้น
        return localStorage.getItem('selectedLang') || 'en';
    }

    /* Copy Function */
    function copyText(id) {
        const el = document.getElementById(id);
        el.select();
        document.execCommand("copy");
        
        const msg = getCurrentLang() === 'th' ? "คัดลอกเรียบร้อยแล้ว" : "Copied to clipboard!";
        alert(msg);
    }

    /* ============ PHP Array -> JSON ============ */
    function encodeJSON() {
        try {
            let txt = leftBox.value.trim();
            if (!txt) {
                const msg = getCurrentLang() === 'th' ? "กรุณาใส่ PHP Array" : "Please enter PHP Array";
                return alert(msg);
            }

            let jsLike = txt;
            jsLike = jsLike.replace(/<\?php/gi, "");
            jsLike = jsLike.replace(/\$[a-zA-Z0-9_]+\s*=\s*/g, "");
            jsLike = jsLike.replace(/=>/g, ":");
            jsLike = jsLike.replace(/\[/g, "{");
            jsLike = jsLike.replace(/\]/g, "}");
            jsLike = jsLike.replace(/array\s*\(/gi, "{");
            jsLike = jsLike.replace(/\)/g, "}");
            jsLike = jsLike.replace(/;/g, "");

            const obj = Function("return (" + jsLike + ")")();
            rightBox.value = JSON.stringify(obj, null, 2);
        } catch (e) {
            const msg = getCurrentLang() === 'th' ? "รูปแบบ PHP Array ไม่ถูกต้อง" : "Invalid PHP Array format";
            alert(msg);
            console.error(e);
        }
    }

    /* ============ JSON -> PHP Array ============ */
    function decodeJSON() {
        try {
            let json = rightBox.value.trim();
            if (!json) {
                const msg = getCurrentLang() === 'th' ? "กรุณาใส่ JSON" : "Please enter JSON";
                return alert(msg);
            }

            const obj = JSON.parse(json);
            const phpArray = toPhp(obj, 0);
            leftBox.value = "$arrayVar = " + phpArray + ";\n";

        } catch (e) {
            const msg = getCurrentLang() === 'th' ? "รูปแบบ JSON ไม่ถูกต้อง" : "Invalid JSON format";
            alert(msg);
            console.error(e);
        }
    }

    function toPhp(obj, indent) {
        const space = "    ".repeat(indent);
        let out = "[\n";
        for (const key in obj) {
            out += space + "    ";
            if (isNaN(key)) {
                out += `"${key}" => `;
            } else {
                out += key + " => ";
            }
            const val = obj[key];
            if (val !== null && typeof val === "object") {
                out += toPhp(val, indent + 1);
            } else if (typeof val === "string") {
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