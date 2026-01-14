<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

// หน้าเดียว
Route::get('/', [HomeController::class, 'index'])->name('home');

// route แยก controller ไว้ แต่ redirect กลับหน้าเดียว
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.page');

// กลุ่มของเมนู Tools
Route::prefix('tools')->group(function () {
    // 1. QR Code
    Route::get('/qr-code', function () { 
        return view('tools.qrcode', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.qrcode');

    // 2. Base64
    Route::get('/base64', function () { 
        return view('tools.base64', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.base64');

    // 3. Short Link
    Route::get('/short-link', function () { 
        return view('tools.shortlink', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.shortlink');

    // 4. แปลงนามสกุลไฟล์รูปภาพ (Image Converter)
    Route::get('/image-convert', function () { 
        return view('tools.image-convert', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.image-convert');

    // 5. ลบพื้นหลัง (Remove BG)
    Route::get('/remove-bg', function () { 
        return view('tools.remove-bg', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.remove-bg');

    // 6. JSON Encoder & Decoder
    Route::get('/json-tool', function () { 
        return view('tools.json-tool', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.json-tool');

    // 7. รีไซต์ img (Image Resize)
    Route::get('/image-resize', function () { 
        return view('tools.image-resize', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.image-resize');
});