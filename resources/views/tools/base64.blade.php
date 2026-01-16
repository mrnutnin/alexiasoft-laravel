@extends('layouts.app')
@section('title', 'Base64 | AlexiaSoft')
@section('content')
<style>
    /* --- CSS หลัก --- */
    .tool-wrapper {
        padding: 100px 0px 100px;
        width: 100%;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        background: radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 50%); 
    }

    .tool-container {
        width: 100%;
        max-width: 1200px !important; /* ขยายกว้างขึ้นเพื่อให้วางซ้ายขวาได้ */
        margin: 0 auto !important;   
    }

    .tool-header {
        text-align: center !important;
        margin-bottom: 50px;
        width: 100%;
    }

    /* --- Grid Layout สำหรับแบ่งซ้ายขวา --- */
    .split-layout {
        display: grid;
        grid-template-columns: 1fr 1fr; /* แบ่งครึ่ง 50% 50% */
        gap: 30px; /* ระยะห่างระหว่างกล่อง */
        align-items: start; /* ให้กล่องเริ่มที่ด้านบนเสมอ */
    }

    /* ถ้าจอเล็กกว่า 992px (Tablet/Mobile) ให้กลับมาเรียงแนวตั้ง */
    @media (max-width: 992px) {
        .split-layout {
            grid-template-columns: 1fr;
        }
    }

    /* --- การ์ดแก้ว (Glassmorphism) --- */
    .tool-card-split {
        background: rgba(255, 255, 255, 0.75); 
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 24px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.6);
        padding: 30px; /* ลด padding นิดหน่อยให้ดูพอดี */
        width: 100%;
        display: block;
        position: relative;
        z-index: 10;
        height: 100%; /* ให้ความสูงเท่ากันถ้าเนื้อหาพอๆ กัน */
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Upload Area */
    .upload-label-wrapper {
        display: block;
        width: 100%;
        margin-bottom: 20px;
        cursor: pointer;
        position: relative;
        z-index: 20;
    }

    .upload-box {
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        padding: 30px 20px;
        text-align: center;
        background: rgba(248, 250, 252, 0.6);
        transition: all 0.3s ease;
    }
    
    .upload-label-wrapper:hover .upload-box {
        border-color: #3b82f6;
        background: rgba(239, 246, 255, 0.8);
        transform: translateY(-4px);
    }

    /* Inputs */
    .force-block {
        display: block !important;
        width: 100% !important;
        margin-bottom: 20px !important;
        position: relative;
        z-index: 20;
    }

    .custom-label {
        display: block !important;
        font-weight: 700;
        color: #64748b;
        margin-bottom: 10px;
        font-size: 0.9rem;
    }

    .code-editor {
        display: block !important;
        width: 100% !important;
        background: #1e293b;
        color: #a5b4fc;
        font-family: monospace;
        padding: 15px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.1);
        min-height: 150px; /* เพิ่มความสูงขั้นต่ำ */
        resize: vertical;
        box-sizing: border-box;
    }

    /* --- ปุ่ม Gradient --- */
    .btn-gradient {
        display: block !important;
        width: 100%;
        border: none;
        padding: 14px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 16px;
        color: white;
        cursor: pointer;
        background: linear-gradient(90deg, #10b981 0%, #3b82f6 100%);
        background-size: 200% auto;
        box-shadow: 0 10px 20px -10px rgba(59, 130, 246, 0.5);
        transition: all 0.4s ease;
        text-align: center;
        position: relative;
        z-index: 30;
    }

    .btn-gradient:hover {
        background-position: right center; 
        transform: translateY(-2px);
        box-shadow: 0 15px 30px -10px rgba(16, 185, 129, 0.6);
    }

    /* ปุ่ม Download */
    .btn-download {
        margin-top: 20px;
        display: none; 
    }

    /* Preview */
    .preview-container {
        border: 1px solid rgba(226, 232, 240, 0.8);
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        background: rgba(255, 255, 255, 0.5);
        min-height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(4px);
    }
</style>

<div class="tool-wrapper">
    <div class="tool-container">
        
        <div class="tool-header">
            <h1 class="fw-bold mb-2 lang-text" data-en="Base64 Converter" data-th="แปลงไฟล์ Base64">Base64 Converter</h1>
            <p class="text-muted lang-text" data-en="Separate tools for Encoding and Decoding" data-th="เครื่องมือแยกส่วนสำหรับแปลงและถอดรหัส">Separate tools for Encoding and Decoding</p>
        </div>

        <div class="split-layout">
            
            <div class="tool-card-split">
                <div class="card-title">
                    <span style="background: linear-gradient(135deg, #10b981, #3b82f6); color:white; padding:5px 14px; border-radius:12px; font-size:0.9rem;">1</span>
                    <span class="lang-text" data-en="Image to Base64" data-th="แปลงรูปภาพ เป็น Base64">Image to Base64</span>
                </div>

                <label for="fileUpload" class="upload-label-wrapper">
                    <div class="upload-box">
                         <i class="fa-regular fa-image" style="font-size: 3rem; color: #17eb92; margin-bottom: 15px;"></i>
                        <h5 class="fw-bold text-dark lang-text" data-en="Click to Upload" data-th="คลิกเพื่อเลือกรูป">Click to Upload</h5>
                        <small class="text-muted">JPG, PNG, GIF</small>
                    </div>
                    <input type="file" id="fileUpload" accept="image/*" style="display:none;">
                </label>

                <div class="force-block">
                    <label class="custom-label lang-text" data-en="Result Code" data-th="ผลลัพธ์โค้ด">Result Code</label>
                    <textarea class="code-editor" id="resultBase64" readonly placeholder="// Base64 result will appear here..."></textarea>
                </div>

                <button type="button" id="btnCopy" class="btn-gradient lang-text" data-en="Copy Base64" data-th="คัดลอกโค้ด">Copy Base64 </button>
            </div>


            <div class="tool-card-split">
                <div class="card-title">
                    <span style="background: linear-gradient(135deg, #10b981, #3b82f6); color:white; padding:5px 14px; border-radius:12px; font-size:0.9rem;">2</span>
                    <span class="lang-text" data-en="Base64 to Image" data-th="แปลง Base64 เป็น รูปภาพ">Base64 to Image</span>
                </div>

                <div class="force-block">
                    <label class="custom-label lang-text" data-en="Paste Base64 String" data-th="วางโค้ด Base64 ที่นี่">Paste Base64 String</label>
                    <textarea class="code-editor" id="inputBase64" placeholder="data:image/png;base64,..."></textarea>
                </div>

                <div class="force-block">
                    <label class="custom-label lang-text" data-en="Image Preview" data-th="ตัวอย่างรูปภาพ">Image Preview</label>
                    <div class="preview-container">
                        <img id="imgPreview" src="" style="max-width: 100%; max-height: 300px; display: none; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                        <div id="noImgText" class="text-muted opacity-75">No Image</div>
                    </div>
                    
                    <button type="button" id="btnDownload" class="btn-gradient btn-download">
                        <span class="lang-text" data-en="Download Image" data-th="ดาวน์โหลดรูปภาพ">Download Image</span> 
                    </button>
                </div>
            </div>

        </div> </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- 1. Image -> Base64 Logic ---
        const fileUpload = document.getElementById('fileUpload');
        const resultBase64 = document.getElementById('resultBase64');
        const btnCopy = document.getElementById('btnCopy');

        if(fileUpload) {
            fileUpload.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if(!file) return;

                const reader = new FileReader();
                resultBase64.value = "Processing...";
                reader.onload = function(evt) {
                    resultBase64.value = evt.target.result;
                };
                reader.readAsDataURL(file);
            });
        }

        if(btnCopy) {
            btnCopy.addEventListener('click', function() {
                if(!resultBase64.value || resultBase64.value === "Processing...") return;
                
                resultBase64.select();
                document.execCommand('copy');
                
                const originalText = btnCopy.innerHTML;
                btnCopy.innerHTML = "Copied! ✓";
                btnCopy.style.background = "#10b981";
                
                setTimeout(() => {
                    btnCopy.innerHTML = originalText;
                    btnCopy.style.background = ""; 
                }, 2000);
            });
        }

        // --- 2. Base64 -> Image & Download Logic ---
        const inputBase64 = document.getElementById('inputBase64');
        const imgPreview = document.getElementById('imgPreview');
        const noImgText = document.getElementById('noImgText');
        const btnDownload = document.getElementById('btnDownload');

        if(inputBase64) {
            inputBase64.addEventListener('input', function(e) {
                const val = e.target.value.trim();

                if(val.length > 20) {
                    imgPreview.src = val;
                    imgPreview.style.display = 'block';
                    noImgText.style.display = 'none';
                    btnDownload.style.display = 'block';
                } else {
                    imgPreview.style.display = 'none';
                    imgPreview.src = '';
                    noImgText.style.display = 'block';
                    btnDownload.style.display = 'none';
                }
            });
        }

        // Fix: Download Button Event Listener
        if(btnDownload) {
            btnDownload.addEventListener('click', function() {
                if (!imgPreview.src || imgPreview.style.display === 'none') {
                    alert('No image to download');
                    return;
                }

                try {
                    const link = document.createElement('a');
                    link.href = imgPreview.src;
                    const timestamp = new Date().getTime();
                    link.download = `image-${timestamp}.png`;
                    
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    
                } catch (err) {
                    console.error("Download failed:", err);
                    alert("Download Error. Please try Right Click > Save Image As");
                }
            });
        }

        // --- Language Logic ---
        window.setLanguage = function(lang) {
            document.querySelectorAll('.lang-text').forEach(el => {
                if (el.dataset[lang]) {
                    if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                        el.placeholder = el.dataset[lang];
                    } else {
                        const icon = el.innerText.match(/[^\x00-\x7F]+/g); 
                        el.innerText = el.dataset[lang] + (icon ? ' ' + icon : '');
                    }
                }
            });
        }
    });
</script>
@endsection
