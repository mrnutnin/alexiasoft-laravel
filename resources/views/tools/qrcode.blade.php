@extends('layouts.app')
@section('title', 'QR Code | AlexiaSoft')
@section('content')

{{-- แก้ไข: เอา justify-content: center ออก และใส่ flex-direction: column แทน --}}
{{-- เพื่อให้เนื้อหาเริ่มจากด้านบน (80px) ไม่ใช่ลอยอยู่กลางจอ --}}
<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; flex-direction: column; align-items: center;">
    
    <div class="container" style="max-width: 600px; width: 100%;">

        {{-- Header ส่วนหัว --}}
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;"
                data-en="QR Code Generator" data-th="เครื่องมือสร้าง QR Code">
                QR Code Generator
            </h1>
            <p style="color: #636e72; font-size: 1rem;" data-en="Generate QR Codes in seconds."
                data-th="สร้าง QR Code ได้ในไม่กี่วินาที">
                Generate QR Codes in seconds.
            </p>
        </div>

        {{-- การ์ดแบบโปร่งใส --}}
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
                    data-en="Enter Text or URL" data-th="ใส่ข้อความหรือลิงก์ที่นี่">
                    Enter Text or URL
                </label>
                <input type="text" id="qr-input" placeholder="https://alexiasoft.com"
                    style="width: 100%; padding: 14px; border: 1px solid rgba(0,0,0,0.1); border-radius: 12px; font-size: 1rem; background: rgba(255,255,255,0.8); outline: none; transition: 0.3s;">
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; gap: 25px;">
                {{-- พื้นที่แสดง QR Code --}}
                <div id="qrcode-container"
                    style="padding: 20px; background: #fff; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); display: none; text-align: center;">
                    <div id="qrcode" style="margin-bottom: 15px;"></div>
                    
                    <button onclick="downloadQR()" 
                            style="cursor: pointer; border: 1px solid #17eb92; background: white; color: #17eb92; padding: 8px 20px; border-radius: 50px; font-weight: 600; font-size: 0.9rem; transition: 0.3s;"
                            data-en="Download Image" data-th="ดาวน์โหลดรูปภาพ">
                        Download Image
                    </button>
                </div>

                {{-- ปุ่มสร้าง QR --}}
                <button onclick="generateQR()" class="btn-consult"
                    style="cursor: pointer; border: none; padding: 12px 30px; border-radius: 50px; font-weight: 600; transition: transform 0.2s;"
                    data-en="Generate QR Code" data-th="สร้าง QR Code">
                    Generate QR Code
                </button>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
let qrcode = null;

function generateQR() {
    const input = document.getElementById('qr-input').value;
    const container = document.getElementById('qrcode-container');
    const qrcodeElement = document.getElementById('qrcode');

    if (input.trim() === "") {
        alert("Please enter some text or a URL");
        return;
    }

    qrcodeElement.innerHTML = "";
    container.style.display = "block";

    qrcode = new QRCode(qrcodeElement, {
        text: input,
        width: 180,
        height: 180,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
}

function downloadQR() {
    const qrImage = document.querySelector('#qrcode img');
    if (qrImage) {
        const link = document.createElement('a');
        link.href = qrImage.src;
        link.download = 'qrcode.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    } else {
        const canvas = document.querySelector('#qrcode canvas');
        if (canvas) {
            const link = document.createElement('a');
            link.href = canvas.toDataURL("image/png");
            link.download = 'qrcode.png';
            link.click();
        }
    }
}

document.getElementById('qr-input').addEventListener('keypress', (e) => {
    if (e.key === 'Enter') generateQR();
});

const qrInput = document.getElementById('qr-input');
qrInput.addEventListener('focus', () => {
    qrInput.style.borderColor = '#17eb92';
    qrInput.style.boxShadow = '0 0 0 4px rgba(23, 235, 146, 0.1)';
});
qrInput.addEventListener('blur', () => {
    qrInput.style.borderColor = 'rgba(0,0,0,0.1)';
    qrInput.style.boxShadow = 'none';
});
</script>
@endsection