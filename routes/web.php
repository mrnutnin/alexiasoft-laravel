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
    Route::get('/qr-code', function () { 
        return view('tools.qrcode', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.qrcode');

    Route::get('/base64', function () { 
        return view('tools.base64', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.base64');

    Route::get('/short-link', function () { 
        return view('tools.shortlink', ['isHome' => false, 'isServicePage' => false, 'isPortfolio' => false, 'isAbout' => false, 'isContact' => false]); 
    })->name('tools.shortlink');
});