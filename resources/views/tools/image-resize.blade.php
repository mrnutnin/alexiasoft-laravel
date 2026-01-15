@extends('layouts.app')

@section('content')
<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; align-items: center; justify-content: center;">
    <div class="container" style="max-width: 700px; width: 100%;">

        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;" 
                data-en="Image Resizer" data-th="ปรับขนาดรูปภาพ">
                Image Resizer
            </h1>
            <p style="color: #636e72; font-size: 1.1rem;" 
               data-en="Resize your images to custom dimensions easily." 
               data-th="ปรับขนาดความกว้างและความสูงของรูปภาพได้ตามต้องการ">
                Resize your images to custom dimensions easily.
            </p>
        </div>

        {{-- Interface Card --}}
        <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); padding: 40px; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);">
            
            {{-- Upload Area (ใช้ไอคอนรูปภาพและสีเขียวเหมือน Image Converter) --}}
            <div id="drop-zone" style="border: 2px dashed #17eb92; padding: 40px; border-radius: 20px; text-align: center; margin-bottom: 25px; cursor: pointer; transition: 0.3s;" 
                 onclick="document.getElementById('image-input').click()">
                
                <div id="upload-placeholder">
                    {{-- เปลี่ยนไอคอนเป็นรูปภาพที่นี่ --}}
                    <i class="fa-regular fa-image" style="font-size: 3.5rem; color: #17eb92; margin-bottom: 15px;"></i>
                    <p id="file-display-name" style="color: #666; font-weight: 500;" data-en="Click or Drag & Drop image here" data-th="คลิกหรือลากรูปภาพมาวางที่นี่">
                        Click or Drag & Drop image here
                    </p>
                </div>

                <img id="image-preview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 300px; border-radius: 12px; margin: 0 auto; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                
                <input type="file" id="image-input" accept="image/*" style="display: none;" onchange="handleFile(this)">
            </div>

            <div id="resize-controls" style="display: none;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #2d3436;" data-en="Width (px)" data-th="ความกว้าง (px)">Width (px)</label>
                        <input type="number" id="resize-width" style="width: 100%; padding: 12px; border-radius: 12px; border: 1px solid #e0e0e0; outline: none; transition: 0.3s;" oninput="maintainRatio('width')">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #2d3436;" data-en="Height (px)" data-th="ความสูง (px)">Height (px)</label>
                        <input type="number" id="resize-height" style="width: 100%; padding: 12px; border-radius: 12px; border: 1px solid #e0e0e0; outline: none; transition: 0.3s;" oninput="maintainRatio('height')">
                    </div>
                </div>

                <div style="margin-bottom: 25px; display: flex; align-items: center; gap: 10px; justify-content: center;">
                    <input type="checkbox" id="lock-ratio" checked style="width: 18px; height: 18px; cursor: pointer; accent-color: #17eb92;">
                    <label for="lock-ratio" style="font-size: 0.95rem; cursor: pointer; color: #444;" data-en="Maintain Aspect Ratio" data-th="คงอัตราส่วนของภาพไว้">
                        Maintain Aspect Ratio
                    </label>
                </div>

                <button id="submit-btn" onclick="resizeAndDownload()" class="btn-consult" 
                        style="width: 100%; cursor: pointer; border: none; padding: 16px; border-radius: 50px; font-weight: 600; font-size: 1.1rem; background: linear-gradient(135deg, #17eb92 0%, #00d2ff 100%); color: white; box-shadow: 0 4px 15px rgba(23, 235, 146, 0.3);"
                        data-en="Resize & Download" data-th="ปรับขนาดและดาวน์โหลด">
                    Resize & Download
                </button>
            </div>

            <canvas id="process-canvas" style="display: none;"></canvas>
        </div>
    </div>
</section>

<script>
    let originalImg = null;
    let aspectRatio = 1;

    // ระบบ Drag and Drop
    const dropZone = document.getElementById('drop-zone');
    dropZone.addEventListener('dragover', (e) => { 
        e.preventDefault(); 
        dropZone.style.borderColor = '#00d2ff'; 
        dropZone.style.background = 'rgba(23, 235, 146, 0.05)';
    });
    dropZone.addEventListener('dragleave', () => { 
        dropZone.style.borderColor = '#17eb92'; 
        dropZone.style.background = 'none';
    });
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = '#17eb92';
        dropZone.style.background = 'none';
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('image-input').files = files;
            handleFile(document.getElementById('image-input'));
        }
    });

    function handleFile(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    originalImg = img;
                    aspectRatio = img.width / img.height;
                    
                    document.getElementById('resize-width').value = img.width;
                    document.getElementById('resize-height').value = img.height;
                    
                    document.getElementById('file-display-name').innerText = file.name;
                    const preview = document.getElementById('image-preview');
                    const placeholder = document.getElementById('upload-placeholder');
                    
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                    
                    document.getElementById('resize-controls').style.display = 'block';
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function maintainRatio(type) {
        const lock = document.getElementById('lock-ratio').checked;
        if (!lock || !originalImg) return;

        const widthInput = document.getElementById('resize-width');
        const heightInput = document.getElementById('resize-height');

        if (type === 'width') {
            heightInput.value = Math.round(widthInput.value / aspectRatio);
        } else {
            widthInput.value = Math.round(heightInput.value * aspectRatio);
        }
    }

    function resizeAndDownload() {
        if (!originalImg) return;

        const btn = document.getElementById('submit-btn');
        const originalText = btn.innerText;
        btn.innerText = "Processing...";
        btn.disabled = true;
        btn.style.opacity = "0.7";

        const canvas = document.getElementById('process-canvas');
        const ctx = canvas.getContext('2d');
        const targetWidth = parseInt(document.getElementById('resize-width').value);
        const targetHeight = parseInt(document.getElementById('resize-height').value);

        canvas.width = targetWidth;
        canvas.height = targetHeight;
        ctx.drawImage(originalImg, 0, 0, targetWidth, targetHeight);

        const link = document.createElement('a');
        link.download = `alexiasoft-resized-${targetWidth}x${targetHeight}.png`;
        link.href = canvas.toDataURL('image/png');
        link.click();

        // หน่วงเวลาแล้วรีเฟรชเหมือนหน้าอื่นๆ
        setTimeout(() => {
            window.location.reload();
        }, 1500);
    }
</script>
@endsection