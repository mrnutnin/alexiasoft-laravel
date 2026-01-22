<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    // กำหนดค่าตัวแปรสถานะหน้าเริ่มต้น (เพื่อลดการเขียนซ้ำ)
    private $viewData = [
        'isHome' => false,
        'isServicePage' => false,
        'isPortfolio' => false,
        'isAbout' => false,
        'isContact' => false
    ];

    public function qrCode() {
        return view('tools.qrcode', $this->viewData);
    }

    public function base64() {
        return view('tools.base64', $this->viewData);
    }

    public function shortLink() {
        return view('tools.shortlink', $this->viewData);
    }

    public function imageConvert() {
        return view('tools.image-convert', $this->viewData);
    }

    public function removeBg() {
        return view('tools.remove-bg', $this->viewData);
    }

    public function beautifyJson() {
        return view('tools.json-tool', $this->viewData);
    }

    public function jsonEncodeDecode() {
        return view('tools.json-encode-decode', $this->viewData);
    }

    public function imageResize() {
        return view('tools.image-resize', $this->viewData);
    }
}