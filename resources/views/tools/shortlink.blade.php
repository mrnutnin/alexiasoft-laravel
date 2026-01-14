@extends('layouts.app')

@section('content')
<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; align-items: center; justify-content: center;">
    <div class="container" style="max-width: 600px; width: 100%;">

        {{-- Header ส่วนหัว --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;" 
                data-en="URL Shortener" data-th="เครื่องมือย่อลิงก์">
                URL Shortener
            </h1>
            <p style="color: #636e72; font-size: 1.1rem;" 
               data-en="Make your long links short and easy to share." 
               data-th="เปลี่ยนลิงก์ที่ยาวของคุณให้สั้นลงและแชร์ได้ง่ายขึ้น">
                Make your long links short and easy to share.
            </p>
        </div>

        {{-- การ์ดแบบโปร่งใส (Glassmorphism) --}}
        <div style="
            background: rgba(255, 255, 255, 0.7); 
            backdrop-filter: blur(10px); 
            -webkit-backdrop-filter: blur(10px); 
            padding: 40px; 
            border-radius: 24px; 
            border: 1px solid rgba(255, 255, 255, 0.3); 
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        ">
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 12px; font-weight: 600; color: #2d3436;" 
                       data-en="Paste your long URL" data-th="วางลิงก์ที่ยาวของคุณ">
                    Paste your long URL
                </label>
                <input type="url" id="long-url" 
                       placeholder="https://example.com/very-long-link-here" 
                       style="width: 100%; padding: 14px; border: 1px solid rgba(0,0,0,0.1); border-radius: 12px; font-size: 1rem; background: rgba(255,255,255,0.8); outline: none; transition: 0.3s;">
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; gap: 20px;">
                {{-- ปุ่มกด --}}
                <button onclick="shortenLink()" class="btn-consult" id="btn-text"
                        style="cursor: pointer; border: none; padding: 12px 40px; border-radius: 50px; font-weight: 600; font-size: 1rem;"
                        data-en="Shorten URL" data-th="ย่อลิงก์">
                    Shorten URL
                </button>

                {{-- ผลลัพธ์ --}}
                <div id="result-container" style="display: none; width: 100%; margin-top: 20px; padding: 20px; background: #fff; border-radius: 15px; border: 1px dashed #17eb92;">
                    <label style="display: block; margin-bottom: 8px; font-size: 0.9rem; color: #666;" 
                           data-en="Your Short Link:" data-th="ลิงก์ที่ย่อแล้วของคุณ:">Your Short Link:</label>
                    <div style="display: flex; gap: 10px;">
                        <input type="text" id="short-url" readonly 
                               style="flex: 1; padding: 10px; border: 1px solid #eee; border-radius: 8px; background: #f9f9f9; color: #333;">
                        <button onclick="copyLink()" 
                                style="padding: 10px 15px; background: #2d3436; color: white; border: none; border-radius: 8px; cursor: pointer;"
                                data-en="Copy" data-th="คัดลอก">
                            Copy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    async function shortenLink() {
        const longUrl = document.getElementById('long-url').value;
        const btnText = document.getElementById('btn-text');
        const resultContainer = document.getElementById('result-container');
        const shortUrlInput = document.getElementById('short-url');

        if (!longUrl) {
            alert("Please enter a URL");
            return;
        }

        // เปลี่ยนสถานะปุ่มตอนกำลังโหลด
        const originalTextEn = btnText.getAttribute('data-en');
        const originalTextTh = btnText.getAttribute('data-th');
        btnText.innerText = "Processing...";
        btnText.disabled = true;

        try {
            // เรียกใช้ TinyURL API (แบบง่ายผ่าน proxy หรือ direct fetch)
            const response = await fetch(`https://tinyurl.com/api-create.php?url=${encodeURIComponent(longUrl)}`);
            
            if (response.ok) {
                const data = await response.text();
                shortUrlInput.value = data;
                resultContainer.style.display = 'block';
            } else {
                alert("Error shortening URL. Please try again.");
            }
        } catch (error) {
            console.error(error);
            alert("Something went wrong.");
        } finally {
            // คืนค่าปุ่มเดิม (ตรวจสอบภาษาปัจจุบันจาก attribute ของปุ่ม)
            btnText.disabled = false;
            // หมายเหตุ: ตรงนี้ถ้าคุณมีฟังก์ชันเปลี่ยนภาษาในเว็บ มันจะกลับมาเป็นภาษาตามที่ตั้งไว้เอง
            btnText.innerText = document.documentElement.lang === 'th' ? originalTextTh : originalTextEn;
        }
    }

    function copyLink() {
        const copyText = document.getElementById("short-url");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // สำหรับมือถือ
        navigator.clipboard.writeText(copyText.value);
        
        alert("Copied to clipboard!");
    }

    // รองรับการกด Enter
    document.getElementById('long-url').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') shortenLink();
    });

    // สไตล์ Input โฟกัส
    const inputField = document.getElementById('long-url');
    inputField.addEventListener('focus', () => {
        inputField.style.borderColor = '#17eb92';
        inputField.style.boxShadow = '0 0 0 4px rgba(23, 235, 146, 0.1)';
    });
    inputField.addEventListener('blur', () => {
        inputField.style.borderColor = 'rgba(0,0,0,0.1)';
        inputField.style.boxShadow = 'none';
    });
</script>
@endsection