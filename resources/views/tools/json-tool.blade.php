@extends('layouts.app')

@section('content')
<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; align-items: center; justify-content: center;">
    <div class="container" style="max-width: 900px; width: 100%;">

        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;" 
                data-en="JSON Encoder & Decoder" data-th="เครื่องมือจัดการ JSON">
                JSON Encoder & Decoder
            </h1>
            <p style="color: #636e72; font-size: 1.1rem;" 
               data-en="Beautify, Minify, and Validate your JSON code." 
               data-th="จัดรูปแบบ ย่อขนาด และตรวจสอบความถูกต้องของ JSON">
                Beautify, Minify, and Validate your JSON code.
            </p>
        </div>

        {{-- Main Interface --}}
        <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); padding: 30px; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);">
            
            <div style="margin-bottom: 20px;">
                <textarea id="json-input" placeholder='Paste your JSON here... e.g. {"name":"AlexiaSoft","active":true}' 
                          style="width: 100%; height: 300px; padding: 20px; border-radius: 15px; border: 1px solid rgba(0,0,0,0.1); font-family: 'Courier New', Courier, monospace; font-size: 0.9rem; outline: none; transition: 0.3s; background: rgba(255,255,255,0.8);"></textarea>
            </div>

            {{-- Validation Message --}}
            <div id="status-msg" style="display: none; padding: 10px 20px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem;"></div>

            {{-- Action Buttons --}}
            <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
                <button onclick="processJSON('beautify')" class="btn-consult" style="cursor: pointer; border: none; padding: 10px 25px; border-radius: 50px; font-weight: 600;"
                        data-en="Beautify" data-th="จัดรูปแบบสวยงาม">
                    Beautify
                </button>
                <button onclick="processJSON('minify')" style="cursor: pointer; border: 1px solid #2d3436; background: transparent; padding: 10px 25px; border-radius: 50px; font-weight: 600;"
                        data-en="Minify" data-th="ย่อขนาด (บรรทัดเดียว)">
                    Minify
                </button>
                <button onclick="copyJSON()" style="cursor: pointer; border: 1px solid #17eb92; background: white; color: #17eb92; padding: 10px 25px; border-radius: 50px; font-weight: 600;"
                        data-en="Copy JSON" data-th="คัดลอก">
                    Copy JSON
                </button>
                <button onclick="clearAll()" style="cursor: pointer; border: 1px solid #ff7675; background: white; color: #ff7675; padding: 10px 25px; border-radius: 50px; font-weight: 600;"
                        data-en="Clear" data-th="ล้างข้อมูล">
                    Clear
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    function processJSON(action) {
        const input = document.getElementById('json-input');
        const statusMsg = document.getElementById('status-msg');
        
        if (!input.value.trim()) return;

        try {
            const parsed = JSON.parse(input.value);
            let result = "";

            if (action === 'beautify') {
                result = JSON.stringify(parsed, null, 4); // จัดรูปแบบเว้นวรรค 4 space
                showStatus("Valid JSON", "success");
            } else if (action === 'minify') {
                result = JSON.stringify(parsed); // ย่อเหลือบรรทัดเดียว
                showStatus("JSON Minified", "success");
            }

            input.value = result;
        } catch (e) {
            showStatus("Invalid JSON: " + e.message, "error");
        }
    }

    function showStatus(msg, type) {
        const statusMsg = document.getElementById('status-msg');
        statusMsg.style.display = "block";
        statusMsg.innerText = msg;

        if (type === "success") {
            statusMsg.style.background = "rgba(23, 235, 146, 0.1)";
            statusMsg.style.color = "#00b894";
            statusMsg.style.border = "1px solid #17eb92";
        } else {
            statusMsg.style.background = "rgba(255, 118, 117, 0.1)";
            statusMsg.style.color = "#d63031";
            statusMsg.style.border = "1px solid #ff7675";
        }
    }

    function copyJSON() {
        const input = document.getElementById('json-input');
        input.select();
        document.execCommand('copy');
        alert("Copied to clipboard!");
    }

    function clearAll() {
        document.getElementById('json-input').value = "";
        document.getElementById('status-msg').style.display = "none";
    }

    // สไตล์ตอน Focus
    const textArea = document.getElementById('json-input');
    textArea.addEventListener('focus', () => {
        textArea.style.borderColor = '#17eb92';
        textArea.style.boxShadow = '0 0 0 4px rgba(23, 235, 146, 0.1)';
    });
    textArea.addEventListener('blur', () => {
        textArea.style.borderColor = 'rgba(0,0,0,0.1)';
        textArea.style.boxShadow = 'none';
    });
</script>
@endsection