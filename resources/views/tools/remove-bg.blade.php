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
        <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); padding: 30px; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);">
            
            {{-- Upload --}}
            <div id="upload-section" style="text-align: center; margin-bottom: 20px;">
                <input type="file" id="image-input" accept="image/*" style="display: none;" onchange="loadImage(this)">
                <button onclick="document.getElementById('image-input').click()" class="btn-consult" 
                        style="cursor: pointer; border: none; padding: 10px 25px; border-radius: 50px;"
                        data-en="Upload Image" data-th="อัปโหลดรูปภาพ">
                    Upload Image
                </button>
            </div>

            <div id="editor-container" style="display: none; text-align: center;">
                <p style="font-size: 0.9rem; color: #e17055; margin-bottom: 15px;" 
                   data-en="Instruction: Click on the image to select the background color." 
                   data-th="คำแนะนำ: คลิกที่รูปภาพเพื่อเลือกสีพื้นหลังที่ต้องการลบ">
                    Instruction: Click on the image to select the background color.
                </p>

                <div style="position: relative; display: inline-block; background-image: linear-gradient(45deg, #ccc 25%, transparent 25%), linear-gradient(-45deg, #ccc 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #ccc 75%), linear-gradient(-45deg, transparent 75%, #ccc 75%); background-size: 20px 20px; background-position: 0 0, 0 10px, 10px -10px, -10px 0px; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;">
                    <canvas id="main-canvas" style="cursor: crosshair; max-width: 100%; height: auto;"></canvas>
                </div>

                <div style="margin-top: 20px; display: flex; gap: 10px; justify-content: center;">
                    <button onclick="downloadImage()" style="cursor: pointer; border: none; background: #17eb92; color: white; padding: 12px 30px; border-radius: 50px; font-weight: 600;"
                            data-en="Download PNG" data-th="ดาวน์โหลดรูปโปร่งใส">
                        Download PNG
                    </button>
                    <button onclick="resetImage()" style="cursor: pointer; border: 1px solid #ff7675; background: white; color: #ff7675; padding: 12px 30px; border-radius: 50px;"
                            data-en="Reset" data-th="เริ่มใหม่">
                        Reset
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

    function loadImage(input) {
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
                    document.getElementById('editor-container').style.display = 'block';
                    document.getElementById('upload-section').style.display = 'none';
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    canvas.addEventListener('mousedown', function(e) {
        const rect = canvas.getBoundingClientRect();
        const x = Math.floor((e.clientX - rect.left) * (canvas.width / rect.width));
        const y = Math.floor((e.clientY - rect.top) * (canvas.height / rect.height));
        
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const pixels = imageData.data;
        
        // หาค่าสีที่คลิก (RGB)
        const targetPos = (y * canvas.width + x) * 4;
        const rTarget = pixels[targetPos];
        const gTarget = pixels[targetPos + 1];
        const bTarget = pixels[targetPos + 2];

        // วนลูปเช็คพิกเซลที่มีสีใกล้เคียงและทำให้โปร่งใส
        for (let i = 0; i < pixels.length; i += 4) {
            const r = pixels[i];
            const g = pixels[i + 1];
            const b = pixels[i + 2];

            // กำหนดค่าความคลาดเคลื่อน (Tolerance)
            const tolerance = 30; 
            if (Math.abs(r - rTarget) < tolerance && 
                Math.abs(g - gTarget) < tolerance && 
                Math.abs(b - bTarget) < tolerance) {
                pixels[i + 3] = 0; // เปลี่ยน Alpha เป็น 0 (โปร่งใส)
            }
        }
        ctx.putImageData(imageData, 0, 0);
    });

    function downloadImage() {
        const link = document.createElement('a');
        link.download = 'alexiasoft-no-bg.png';
        link.href = canvas.toDataURL("image/png");
        link.click();
    }

    function resetImage() {
        if (originalData) {
            ctx.putImageData(originalData, 0, 0);
        }
    }
</script>
@endsection