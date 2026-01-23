<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ToolController;

// หน้าเดียว
Route::get('/', [HomeController::class, 'index'])->name('home');

// route แยก controller ไว้ แต่ redirect กลับหน้าเดียว
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.page');

// กลุ่มของเมนู Tools (ฉบับ Controller)
Route::prefix('tools')->name('tools.')->group(function () {
    Route::get('/qr-code', [ToolController::class, 'qrCode'])->name('qrcode');
    Route::get('/base64', [ToolController::class, 'base64'])->name('base64');
    Route::get('/short-link', [ToolController::class, 'shortLink'])->name('shortlink');
    Route::get('/image-convert', [ToolController::class, 'imageConvert'])->name('image-convert');
    Route::get('/remove-bg', [ToolController::class, 'removeBg'])->name('remove-bg');
    Route::get('/beautify-json', [ToolController::class, 'beautifyJson'])->name('json-tool');
    Route::get('/json-encode-decode', [ToolController::class, 'jsonEncodeDecode'])->name('json-encode-decode');
    Route::get('/image-resize', [ToolController::class, 'imageResize'])->name('image-resize');
});
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/custom-solution', [ServiceController::class, 'customSolution'])->name('custom');
    Route::get('/web-application', [ServiceController::class, 'webApplication'])->name('web');
    Route::get('/mobile-application', [ServiceController::class, 'mobileApplication'])->name('mobile');
    Route::get('/system-integration', [ServiceController::class, 'systemIntegration'])->name('system');
});