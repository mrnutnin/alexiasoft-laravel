<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // อันเดิม: ถ้าเข้า /services เฉยๆ ให้เด้งกลับไปหน้า Home ตรงส่วน #services
    public function index()
    {
        return redirect('/#services');
    }

    // อันใหม่: รับค่า Slug เพื่อเปิดหน้าบริการย่อย
    public function show($slug)
    {
        // เช็คว่ามีไฟล์ View ชื่อนั้นไหม (เช่น resources/views/services/crm-solutions.blade.php)
        if (view()->exists("services.$slug")) {
            return view("services.$slug");
        }

        // ถ้าไม่มีไฟล์ ให้เด้งกลับหน้าแรก หรือแสดง 404
        abort(404);
    }
}