<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    private $viewData = [
        'isHome' => false,
        'isPortfolio' => false,
        'isAbout' => false,
        'isContact' => false
    ];

    public function index() {
        return redirect('/#services');
    }

    public function show($slug)
    {
        // แปลง slug จาก custom-solution เป็นชื่อฟังก์ชัน customSolution
        $methodName = Str::camel($slug);

        // ตรวจสอบว่ามีฟังก์ชันชื่อนี้อยู่ใน Controller นี้หรือไม่
        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        }

        abort(404);
    }

    // --- ฟังก์ชันแยกแต่ละบริการ ---
    
    public function customSolution() {
        return view('services.custom-solution', $this->viewData);
    }

    public function webApplication() {
        return view('services.web-application', $this->viewData);
    }

    public function mobileApplication() {
        return view('services.mobile-application', $this->viewData);
    }

    public function systemIntegration() {
        return view('services.system-integration', $this->viewData);
    }
}