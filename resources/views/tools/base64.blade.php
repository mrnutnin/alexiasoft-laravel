@extends('layouts.app')
@section('title', 'Base64 Converter | AlexiaSoft')
@section('content')

<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; flex-direction: column; align-items: center;">
    
    <div class="container" style="max-width: 1100px; width: 100%;">

        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;"
                data-en="Base64 Converter" data-th="ตัวแปลงไฟล์ Base64">
                Base64 Converter
            </h1>
            <p style="color: #636e72; font-size: 1rem;" 
                data-en="Encode images to Base64 or decode Base64 to images."
                data-th="แปลงรูปภาพเป็น Base64 หรือแปลงกลับเป็นรูปภาพ">
                Encode images to Base64 or decode Base64 to images.
            </p>
        </div>

        <div class="base64-grid">
            
            {{-- GLASSCARD 1: Image to Base64 (ฝั่งซ้าย) --}}
            <div class="glass-card">
                <div class="card-header">
                    <span class="step-badge">1</span>
                    <h3 data-en="Image to Base64" data-th="แปลงรูปภาพ เป็น Base64">Image to Base64</h3>
                </div>

                {{-- Upload Area (แก้ใหม่: มีส่วนโชว์รูป) --}}
                <label for="fileUpload" class="upload-area" id="uploadAreaLeft">
                    
                    {{-- ส่วนที่จะแสดงตอนยังไม่อัปโหลด --}}
                    <div id="uploadPlaceholder" style="text-align: center;">
                        <i class="fa-regular fa-image" style="font-size: 2.5rem; color: #17eb92; margin-bottom: 15px;"></i>
                        <p style="margin:0; font-weight:600; color:#2d3436;" data-en="Click to Upload Image" data-th="คลิกเพื่อเลือกรูป">Click to Upload Image</p>
                        <small style="color:#b2bec3;">JPG, PNG, GIF</small>
                    </div>

                    {{-- ส่วนที่จะแสดงรูปหลังจากอัปโหลดแล้ว (เพิ่มใหม่) --}}
                    <img id="previewUploaded" src="" style="display:none; max-width: 100%; max-height: 220px; border-radius: 12px; object-fit: contain;">
                    
                    <input type="file" id="fileUpload" accept="image/*" style="display:none;">
                </label>

                {{-- Result Textarea --}}
                <div style="margin-top: 20px;">
                    <label class="input-label" data-en="Result String" data-th="ผลลัพธ์โค้ด">Result String</label>
                    <textarea id="resultBase64" class="custom-input code-box" readonly placeholder="// Base64 result will appear here..."></textarea>
                </div>

                <button type="button" id="btnCopy" class="btn-main" data-en="Copy Base64" data-th="คัดลอกโค้ด">
                    Copy Base64
                </button>
            </div>

            {{-- GLASSCARD 2: Base64 to Image (ฝั่งขวา) --}}
            <div class="glass-card">
                <div class="card-header">
                    <span class="step-badge">2</span>
                    <h3 data-en="Base64 to Image" data-th="แปลง Base64 เป็น รูปภาพ">Base64 to Image</h3>
                </div>

                <div>
                    <label class="input-label" data-en="Paste Base64 String" data-th="วางโค้ด Base64">Paste Base64 String</label>
                    <textarea id="inputBase64" class="custom-input code-box" placeholder="data:image/png;base64,..."></textarea>
                </div>

                <div class="preview-box">
                    <img id="imgPreview" src="" style="display: none;">
                    <div id="noImgText" style="color: #b2bec3;">Preview Image</div>
                </div>

                <button type="button" id="btnDownload" class="btn-main" style="display: none;" data-en="Download Image" data-th="ดาวน์โหลดรูปภาพ">
                    Download Image
                </button>
            </div>

        </div>
    </div>
</section>

<style>
    /* Grid Layout */
    .base64-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        align-items: stretch;
    }

    /* Glass Card */
    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 30px;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding-bottom: 15px;
    }
    .card-header h3 {
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
        color: #2d3436;
    }
    .step-badge {
        background: linear-gradient(135deg, #17eb92, #0984e3);
        color: white;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 0.9rem;
        font-weight: bold;
    }

    /* Inputs */
    .custom-input {
        width: 100%;
        padding: 14px;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 12px;
        font-size: 0.95rem;
        background: rgba(255,255,255,0.8);
        outline: none;
        transition: 0.3s;
        box-sizing: border-box;
    }
    .custom-input:focus {
        border-color: #17eb92;
        box-shadow: 0 0 0 4px rgba(23, 235, 146, 0.1);
    }
    .code-box {
        font-family: monospace;
        min-height: 120px;
        resize: vertical;
        color: #636e72;
    }
    .input-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        color: #636e72;
    }

    /* Upload Area (Updated) */
    .upload-area {
        border: 2px dashed rgba(0,0,0,0.1);
        border-radius: 16px;
        padding: 20px;
        cursor: pointer;
        transition: 0.3s;
        background: rgba(255,255,255,0.5);
        min-height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .upload-area:hover {
        border-color: #17eb92;
        background: rgba(255,255,255,0.8);
        transform: translateY(-2px);
    }

    /* Preview Box (Right Side) */
    .preview-box {
        margin-top: 20px;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 12px;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.5);
        overflow: hidden;
        margin-bottom: 20px;
    }
    .preview-box img {
        max-width: 100%;
        max-height: 250px;
        border-radius: 8px;
    }

    /* Button */
    .btn-main {
        width: 100%;
        cursor: pointer;
        border: none;
        background: linear-gradient(135deg, #17eb92 0%, #0984e3 100%);
        color: white;
        padding: 12px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: transform 0.2s, box-shadow 0.2s;
        margin-top: auto;
    }
    .btn-main:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(23, 235, 146, 0.4);
    }

    @media (max-width: 991px) {
        .base64-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- 1. Image -> Base64 Logic ---
        const fileUpload = document.getElementById('fileUpload');
        const resultBase64 = document.getElementById('resultBase64');
        const btnCopy = document.getElementById('btnCopy');
        
        // Elements สำหรับโชว์รูปฝั่งซ้าย
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const previewUploaded = document.getElementById('previewUploaded');

        if(fileUpload) {
            fileUpload.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if(!file) return;

                const reader = new FileReader();
                resultBase64.value = "Processing...";
                
                reader.onload = function(evt) {
                    // 1. ใส่ Text ลงในช่อง Result
                    resultBase64.value = evt.target.result;

                    // 2. เอารูปมาแสดงแทน Placeholder (ส่วนที่เพิ่มมาใหม่)
                    previewUploaded.src = evt.target.result;
                    previewUploaded.style.display = 'block';
                    uploadPlaceholder.style.display = 'none';
                };
                reader.readAsDataURL(file);
            });
        }

        if(btnCopy) {
            btnCopy.addEventListener('click', function() {
                if(!resultBase64.value || resultBase64.value === "Processing...") return;
                resultBase64.select();
                document.execCommand('copy');
                const originalText = btnCopy.innerText;
                btnCopy.innerText = "Copied! ✓";
                setTimeout(() => { btnCopy.innerText = originalText; }, 2000);
            });
        }

        // --- 2. Base64 -> Image Logic ---
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

        if(btnDownload) {
            btnDownload.addEventListener('click', function() {
                if (!imgPreview.src || imgPreview.style.display === 'none') return;
                try {
                    const link = document.createElement('a');
                    link.href = imgPreview.src;
                    link.download = `image-${new Date().getTime()}.png`;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                } catch (err) { alert("Download Error"); }
            });
        }
    });
</script>
@endsection