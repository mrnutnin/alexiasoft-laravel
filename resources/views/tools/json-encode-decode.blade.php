@extends('layouts.app')
@section('title', 'JSON Encoder & Decoder PHP | AlexiaSoft')
@section('content')

<style>
    /* CSS สำหรับจัด Layout มือถือ/PC */
    .editor-grid {
        display: grid;
        grid-template-columns: 1fr 1fr; /* PC: แบ่งครึ่ง */
        gap: 20px;
        margin-bottom: 25px;
    }

    /* บนมือถือ (หน้าจอเล็กกว่า 768px) ให้เรียงแนวตั้ง */
    @media (max-width: 768px) {
        .editor-grid {
            grid-template-columns: 1fr; /* Mobile: เต็มจอแถวเดียว */
        }
    }

    .code-textarea {
        width: 100%;
        height: 380px;
        padding: 15px;
        border-radius: 14px;
        border: 1px solid rgba(0,0,0,0.1);
        background: rgba(255,255,255,0.8);
        font-family: 'Consolas', 'Monaco', monospace;
        font-size: 0.9rem;
        resize: vertical;
        outline: none;
        transition: 0.3s;
        line-height: 1.5;
    }

    .code-textarea:focus {
        border-color: #17eb92;
        box-shadow: 0 0 0 4px rgba(23, 235, 146, 0.1);
        background: #fff;
    }

    .action-btn {
        border: none;
        padding: 16px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        font-size: 1rem;
        color: white;
    }
    
    .action-btn:active {
        transform: scale(0.98);
    }
</style>

<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; flex-direction: column; align-items: center;">
    
    <div class="container" style="max-width: 1000px; width: 100%;">

        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;" 
                data-en="JSON Encoder & Decoder PHP" 
                data-th="เครื่องมือแปลง JSON และ PHP Array">
                JSON Encoder & Decoder PHP
            </h1>
            <p style="color: #636e72; font-size: 1rem;" 
               data-en="Enter PHP Array on the left to Encode, or JSON on the right to Decode."
               data-th="ป้อน PHP Array ทางซ้ายเพื่อ Encode หรือป้อน JSON ทางขวาเพื่อ Decode">
               Enter PHP Array on the left to Encode, or JSON on the right to Decode.
            </p>
        </div>

        {{-- Main Card --}}
        <div style="
            background: rgba(255, 255, 255, 0.7); 
            backdrop-filter: blur(10px); 
            -webkit-backdrop-filter: blur(10px); 
            padding: 40px; 
            border-radius: 24px; 
            border: 1px solid rgba(255, 255, 255, 0.3); 
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        ">

            {{-- Grid Area (ใช้ Class .editor-grid เพื่อคุม Responsive) --}}
            <div class="editor-grid">

                {{-- Left Side --}}
                <div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; align-items: center;">
                        <label style="font-weight: 600; color: #2d3436;">PHP Array</label>
                        <div style="display: flex; gap: 15px;">
                            <button onclick="copyText('leftBox')" style="border: none; background: none; color: #17eb92; font-weight: 600; cursor: pointer; font-size: 0.9rem;"
                                    data-en="Copy" data-th="คัดลอก">Copy</button>
                            <span onclick="leftBox.value=''" style="cursor: pointer; font-size: 0.9rem; color: #ff7675;"
                                  data-en="Clear" data-th="ล้าง">Clear</span>
                        </div>
                    </div>
                    <textarea id="leftBox" class="code-textarea" spellcheck="false"
                              placeholder="Enter PHP Array here...&#10;Ex:&#10;$arr = array(&#10;  'key' => 'value'&#10;);" 
                              data-placeholder-en="Enter PHP Array here..." 
                              data-placeholder-th="ป้อน PHP Array ที่นี่..."></textarea>
                </div>

                {{-- Right Side --}}
                <div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; align-items: center;">
                        <label style="font-weight: 600; color: #2d3436;">JSON</label>
                        <div style="display: flex; gap: 15px;">
                            <button onclick="copyText('rightBox')" style="border: none; background: none; color: #17eb92; font-weight: 600; cursor: pointer; font-size: 0.9rem;"
                                    data-en="Copy" data-th="คัดลอก">Copy</button>
                            <span onclick="rightBox.value=''" style="cursor: pointer; font-size: 0.9rem; color: #ff7675;"
                                  data-en="Clear" data-th="ล้าง">Clear</span>
                        </div>
                    </div>
                    <textarea id="rightBox" class="code-textarea" spellcheck="false"
                              placeholder="Enter JSON String here...&#10;Ex:&#10;{&#10;  &quot;key&quot;: &quot;value&quot;&#10;}" 
                              data-placeholder-en="Enter JSON String here..." 
                              data-placeholder-th="ป้อน JSON String ที่นี่..."></textarea>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="editor-grid" style="margin-bottom: 0;">
                <button onclick="encodeJSON()" class="action-btn"
                        style="background: linear-gradient(135deg, #17eb92 0%, #00d2ff 100%); box-shadow: 0 4px 15px rgba(23, 235, 146, 0.3);"
                        data-en="PHP Array ➔ JSON" data-th="แปลง PHP Array เป็น JSON">
                    PHP Array ➔ JSON
                </button>
                <button onclick="decodeJSON()" class="action-btn"
                        style="background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%); box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);"
                        data-en="JSON ➔ PHP Array" data-th="แปลง JSON เป็น PHP Array">
                    JSON ➔ PHP Array
                </button>
            </div>

        </div>
    </div>
</section>

<script>
    const leftBox = document.getElementById("leftBox");
    const rightBox = document.getElementById("rightBox");

    // ฟังก์ชันช่วยดึงภาษาปัจจุบัน
    function getCurrentLang() {
        return localStorage.getItem('selectedLang') || 'en';
    }

    /* Copy Function */
    function copyText(id) {
        const el = document.getElementById(id);
        el.select();
        document.execCommand("copy");
        
        // ใช้ Toast หรือ Alert สั้นๆ
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

            // Clean PHP syntax to make it JS-parsable (Basic implementation)
            let jsLike = txt;
            jsLike = jsLike.replace(/<\?php/gi, "");
            jsLike = jsLike.replace(/\$[a-zA-Z0-9_]+\s*=\s*/g, ""); // remove variable assignment
            jsLike = jsLike.replace(/=>/g, ":");
            jsLike = jsLike.replace(/array\s*\(/gi, "["); // Convert array( to [
            jsLike = jsLike.replace(/\)/g, "]"); // Convert ) to ] (careful with this one)
            // Note: The previous logic relied on bracket replacement. 
            // Better regex for array() to [] conversion is complex in pure Regex.
            // Keeping user's original logic pattern but refining slightly for bracket/brace mix:
            
            // Re-apply original logic strictly as it works for simple cases:
            let temp = txt;
            temp = temp.replace(/<\?php/gi, "");
            temp = temp.replace(/\$[a-zA-Z0-9_]+\s*=\s*/g, "");
            temp = temp.replace(/=>/g, ":");
            temp = temp.replace(/array\s*\(/gi, "{"); // Treat as object start
            temp = temp.replace(/\[/g, "{");
            temp = temp.replace(/\]/g, "}");
            temp = temp.replace(/\)/g, "}");
            temp = temp.replace(/;/g, "");

            // Attempt to parse properly
            const obj = Function("return (" + temp + ")")();
            rightBox.value = JSON.stringify(obj, null, 2);
        } catch (e) {
            const msg = getCurrentLang() === 'th' ? "รูปแบบ PHP Array ไม่ถูกต้อง หรือซับซ้อนเกินไป" : "Invalid PHP Array format or too complex";
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
            leftBox.value = "$data = " + phpArray + ";";

        } catch (e) {
            const msg = getCurrentLang() === 'th' ? "รูปแบบ JSON ไม่ถูกต้อง" : "Invalid JSON format";
            alert(msg);
            console.error(e);
        }
    }

    function toPhp(obj, indent) {
        // ใช้ 4 spaces หรือ Tab
        const space = "    ".repeat(indent);
        
        // ตรวจสอบว่าเป็น Array [] หรือ Object {}
        if (Array.isArray(obj)) {
            let out = "[\n";
            for (let i = 0; i < obj.length; i++) {
                out += space + "    ";
                const val = obj[i];
                if (val !== null && typeof val === "object") {
                    out += toPhp(val, indent + 1);
                } else if (typeof val === "string") {
                    out += JSON.stringify(val); // ใช้ JSON.stringify เพื่อ escape quote
                } else {
                    out += val;
                }
                out += ",\n";
            }
            // ลบ comma ตัวสุดท้ายออก (Optional for PHP 7.3+ allow trailing comma but clearer without)
            out = out.replace(/,\n$/, "\n"); 
            out += space + "]";
            return out;
        } 
        else if (typeof obj === 'object' && obj !== null) {
            let out = "[\n";
            for (const key in obj) {
                out += space + "    ";
                // เช็ค Key ว่าต้องใส่ quote ไหม (ปกติ PHP array keys ใส่ quote ปลอดภัยสุด)
                out += `"${key}" => `;
                
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
            out = out.replace(/,\n$/, "\n");
            out += space + "]";
            return out;
        }
        return "";
    }
</script>
@endsection