@extends('layouts.app')

@section('content')
<section style="padding: 80px 20px; min-height: 90vh; background: none; display: flex; align-items: center; justify-content: center;">
    <div class="container" style="max-width: 800px; width: 100%;">

        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #2d3436; margin-bottom: 10px;" 
                data-en="Simple Background Remover" data-th="เครื่องมือลบพื้นหลังอย่างง่าย">
                Simple Background Remover
            </h1>
            <p style="color: #636e72; font-size: 1.1rem;" 
               data-en="Click on the color you want to make transparent." 
               data-th="คลิกที่สีที่ต้องการลบเพื่อให้พื้นหลังโปร่งใส">
                Click on the color you want to make transparent.
            </p>
        </div>

        {{-- Interface Card --}}
        <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); padding: 40px; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);">
            
            {{-- Drop Zone (เหมือน Image Converter) --}}
            <div id="drop-zone" style="border: 2px dashed #17eb92; padding: 40px; border-radius: 20px; text-align: center; margin-bottom: 25px; cursor: pointer; transition: 0.3s; position: relative;" 
                 onclick="document.getElementById('image-input').click()">
                
                <div id="upload-placeholder">
                    <i class="fa-regular fa-image" style="font-size: 3rem; color: #17eb92; margin-bottom: 15px;"></i>
                    <p id="file-name" style="color: #666; font-weight: 500;" data-en="Click or Drag & Drop image here" data-th="คลิกหรือลากรูปภาพมาวางที่นี่">
                        Click or Drag & Drop image here
                    </p>
                </div>

                {{-- Canvas Area (แสดงแทน Preview) --}}
                <div id="canvas-container" style="display: none; position: relative; background-image: linear-gradient(45deg, #eee 25%, transparent 25%), linear-gradient(-45deg, #eee 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #eee 75%), linear-gradient(-45deg, transparent 75%, #eee 75%); background-size: 20px 20px; border-radius: 12px; overflow: hidden; border: 1px solid #ddd;">
                    <canvas id="main-canvas" style="cursor: crosshair; max-width: 100%; height: auto; display: block; margin: 0 auto;"></canvas>
                </div>
                
                <input type="file" id="image-input" accept="image/*" style="display: none;" onchange="handleFile(this)">
            </div>

            <div id="editor-controls" style="display: none; text-align: center;">
                <p style="font-size: 0.9rem; color: #e17055; margin-bottom: 15px;" 
                   data-en="Instruction: Click on the image to select the color to remove." 
                   data-th="คำแนะนำ: คลิกที่จุดสีในรูปภาพที่ต้องการให้โปร่งใส">
                    Instruction: Click on the image to select the color to remove.
                </p>

                <div style="display: flex; gap: 10px; justify-content: center;">
                    <button id="download-btn" onclick="downloadImage()" style="cursor: pointer; border: none; background: #17eb92; color: white; padding: 12px 30px; border-radius: 50px; font-weight: 600; flex: 1;"
                            data-en="Download PNG" data-th="ดาวน์โหลด PNG">
                        Download PNG
                    </button>
                    <button onclick="window.location.reload()" style="cursor: pointer; border: 1px solid #ff7675; background: white; color: #ff7675; padding: 12px 30px; border-radius: 50px; flex: 1;"
                            data-en="Reset / New" data-th="เริ่มใหม่">
                        Reset / New
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let canvas = document.getElementById('main-canvas');
    let ctx = canvas.getContext('2d');
    let originalData = null;

    // ฟังก์ชันรับไฟล์เหมือน Image Converter
    function handleFile(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0, 0);
                    originalData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    
                    document.getElementById('upload-placeholder').style.display = 'none';
                    document.getElementById('canvas-container').style.display = 'block';
                    document.getElementById('editor-controls').style.display = 'block';
                    document.getElementById('file-name').innerText = file.name;
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // คลิกเลือกสีเพื่อลบ
    canvas.addEventListener('mousedown', function(e) {
        const rect = canvas.getBoundingClientRect();
        const x = Math.floor((e.clientX - rect.left) * (canvas.width / rect.width));
        const y = Math.floor((e.clientY - rect.top) * (canvas.height / rect.height));
        
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const pixels = imageData.data;
        
        const targetPos = (y * canvas.width + x) * 4;
        const rTarget = pixels[targetPos];
        const gTarget = pixels[targetPos + 1];
        const bTarget = pixels[targetPos + 2];

        const tolerance = 30; 
        for (let i = 0; i < pixels.length; i += 4) {
            if (Math.abs(pixels[i] - rTarget) < tolerance && 
                Math.abs(pixels[i+1] - gTarget) < tolerance && 
                Math.abs(pixels[i+2] - bTarget) < tolerance) {
                pixels[i + 3] = 0; 
            }
        }
        ctx.putImageData(imageData, 0, 0);
    });

    function downloadImage() {
        const btn = document.getElementById('download-btn');
        btn.innerText = "Processing...";
        btn.disabled = true;

        const link = document.createElement('a');
        link.download = 'alexiasoft-no-bg.png';
        link.href = canvas.toDataURL("image/png");
        link.click();

    }

    // Drag & Drop Handling
    const dropZone = document.getElementById('drop-zone');
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.background = 'rgba(23, 235, 146, 0.05)';
    });
    dropZone.addEventListener('dragleave', () => {
        dropZone.style.background = 'transparent';
    });
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.style.background = 'transparent';
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('image-input').files = files;
            handleFile(document.getElementById('image-input'));
        }
    });
</script>
@endsection