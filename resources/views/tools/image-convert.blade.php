@extends('layouts.app')

@section('content')
<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; align-items: center; justify-content: center;">
    <div class="container" style="max-width: 700px; width: 100%;">

        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;" 
                data-en="Image Converter" data-th="แปลงนามสกุลรูปภาพ">
                Image Converter
            </h1>
            <p style="color: #636e72; font-size: 1.1rem;" 
               data-en="Convert your images to various formats easily." 
               data-th="แปลงไฟล์รูปภาพเป็นนามสกุลต่างๆ ได้ง่ายๆ">
                Convert your images to various formats easily.
            </p>
        </div>

        {{-- Interface Card --}}
        <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); padding: 40px; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);">
            
            {{-- Upload Area (With Image Preview) --}}
            <div id="drop-zone" style="border: 2px dashed #17eb92; padding: 40px; border-radius: 20px; text-align: center; margin-bottom: 25px; cursor: pointer; transition: 0.3s; position: relative; overflow: hidden;" 
                 onclick="document.getElementById('image-input').click()">
                
                <div id="upload-placeholder">
                    <i class="fa-regular fa-image" style="font-size: 3rem; color: #17eb92; margin-bottom: 15px;"></i>
                    <p id="file-name" style="color: #666; font-weight: 500;" data-en="Click or Drag & Drop image here" data-th="คลิกหรือลากรูปภาพมาวางที่นี่">
                        Click or Drag & Drop image here
                    </p>
                </div>

                {{-- Image Preview --}}
                <img id="image-preview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 300px; border-radius: 12px; margin: 0 auto;">
                
                <input type="file" id="image-input" accept="image/*" style="display: none;" onchange="handleFile(this)">
            </div>

            <div id="convert-options" style="display: none;">
                <label style="display: block; margin-bottom: 10px; font-weight: 600;" data-en="Select Target Format:" data-th="เลือกนามสกุลที่ต้องการ:">
                    Select Target Format:
                </label>
                <div style="display: flex; gap: 10px; margin-bottom: 25px;">
                    <select id="target-format" style="flex: 1; padding: 12px; border-radius: 10px; border: 1px solid #ddd; outline: none; background: #fff; cursor: pointer;">
                        <option value="image/jpeg">JPG / JPEG</option>
                        <option value="image/png">PNG</option>
                        <option value="image/webp">WEBP</option>
                        <option value="image/bmp">BMP</option>
                        <option value="image/gif">GIF (Static)</option>
                    </select>
                </div>

                <button onclick="convertImage()" class="btn-consult" style="width: 100%; cursor: pointer; border: none; padding: 15px; border-radius: 50px; font-weight: 600; font-size: 1rem;"
                        data-en="Convert & Download" data-th="แปลงไฟล์และดาวน์โหลด">
                    Convert & Download
                </button>
            </div>

            {{-- Hidden Canvas for Processing --}}
            <canvas id="process-canvas" style="display: none;"></canvas>
        </div>
    </div>
</section>

<script>
    let selectedImage = null;

    function handleFile(input) {
        const file = input.files[0];
        if (file) {
            selectedImage = file;
            
            // แสดงชื่อไฟล์
            const fileNameDisplay = document.getElementById('file-name');
            fileNameDisplay.innerText = file.name;
            fileNameDisplay.style.color = "#17eb92";

            // แสดงรูปภาพตัวอย่าง (Preview)
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('image-preview');
                const placeholder = document.getElementById('upload-placeholder');
                
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none'; // ซ่อนไอคอนกับข้อความเดิม
            }
            reader.readAsDataURL(file);

            document.getElementById('convert-options').style.display = 'block';
        }
    }

    function convertImage() {
        if (!selectedImage) return;

        const targetFormat = document.getElementById('target-format').value;
        const reader = new FileReader();

        reader.onload = function(event) {
            const img = new Image();
            img.onload = function() {
                const canvas = document.getElementById('process-canvas');
                const ctx = canvas.getContext('2d');

                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);

                const extension = targetFormat.split('/')[1];
                const dataUrl = canvas.toDataURL(targetFormat, 0.9);

                const link = document.createElement('a');
                link.download = `alexiasoft-converted.${extension}`;
                link.href = dataUrl;
                link.click();
            };
            img.src = event.target.result;
        };
        reader.readAsDataURL(selectedImage);
    }

    // Drag & Drop Handling
    const dropZone = document.getElementById('drop-zone');
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.background = 'rgba(23, 235, 146, 0.05)';
        dropZone.style.borderColor = '#17eb92';
    });
    dropZone.addEventListener('dragleave', () => {
        dropZone.style.background = 'transparent';
    });
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.style.background = 'transparent';
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const input = document.getElementById('image-input');
            input.files = files;
            handleFile(input);
        }
    });
</script>
@endsection