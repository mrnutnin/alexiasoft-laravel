{{-- ใช้ Layout หลักของเว็บ (header, footer, css, js) --}}
@extends('layouts.app')

@section('title', 'About Us | AlexiaSoft')

@section('content')

{{-- ================= ABOUT HERO ================= --}}
<section id="about-hero" class="scroll-reveal about-bg">
    <div>
        <h1 class="portfolio-main-title" style="text-align: center;">
            {{-- คำแรกสีปกติ --}}
            <span data-en="About" data-th="เกี่ยวกับ">About</span>
            {{-- คำหลังสีไล่เฉด --}}
            <span class="text-gradient" data-en="Us" data-th="เรา">Us</span>
        </h1>

        <p class="about-intro"
            data-en="AlexiaSoft is a professional software development company specializing in modern digital solutions that are reliable, scalable, and built to meet international standards."
            data-th="AlexiaSoft เป็นบริษัทพัฒนาซอฟต์แวร์ระดับมืออาชีพ ที่เชี่ยวชาญด้านโซลูชันดิจิทัลที่ทันสมัย เชื่อถือได้ และรองรับการขยายตัว พร้อมส่งมอบงานตามมาตรฐานสากล">
            AlexiaSoft is a professional software development company specializing in modern digital solutions.
        </p>
    </div>
</section>

{{-- ================= WHY ALEXIASOFT & STATS ================= --}}
{{-- เพิ่ม class "about-bg" เพื่อให้ CSS จัดการหัวข้อให้อัตโนมัติ --}}
<section id="about" class="scroll-reveal about-bg">

    {{-- ลบ div ครอบออก เพื่อให้ h2 และ p ได้รับ style จาก .about-bg โดยตรง --}}
    <h2 data-en="Why AlexiaSoft?" data-th="ทำไมต้อง AlexiaSoft?">Why AlexiaSoft?</h2>

    <p data-en="We build long-term technology partnerships to ensure your business stays ahead."
        data-th="เราสร้างพาร์ทเนอร์ทางเทคโนโลยีระยะยาวเพื่อให้ธุรกิจของคุณล้ำหน้าอยู่เสมอ">
        We build long-term technology partnerships.
    </p>

    {{-- Stat Grid --}}
    <div class="glass-card" style="padding: 40px 30px; max-width: 900px; width: 90%; margin: 0 auto;">
        <div class="stat-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
            <div style="text-align: center;">
                <h3 style="margin: 0 0 8px 0; font-size: 1.8rem; color: #333;">100%</h3>
                <p style="margin: 0; font-size: 0.85rem; color: #666;" data-en="Reliability" data-th="ความน่าเชื่อถือ">
                    Reliability
                </p>
            </div>
            <div style="text-align: center;">
                <h3 style="margin: 0 0 8px 0; font-size: 1.8rem; color: #333;">6+</h3>
                <p style="margin: 0; font-size: 0.85rem; color: #666;" data-en="Experience" data-th="ประสบการณ์">
                    Years Experience
                </p>
            </div>
            <div style="text-align: center;">
                <h3 style="margin: 0 0 8px 0; font-size: 1.8rem; color: #333;">20+</h3>
                <p style="margin: 0; font-size: 0.85rem; color: #666;" data-en="Success Project"
                    data-th="โครงการที่สำเร็จ">
                    Success Projects
                </p>
            </div>
            <div style="text-align: center;">
                <h3 style="margin: 0 0 8px 0; font-size: 1.8rem; color: #333;">24/7</h3>
                <p style="margin: 0; font-size: 0.85rem; color: #666;" data-en="Active Support" data-th="ดูแลตลอดเวลา">
                    Active Support
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ================= VISION ================= --}}
<section class="scroll-reveal about-bg">
    <div class="about-row glass-card">
        <div class="about-icon">💡</div>

        <div>
            <h2 data-en="Vision" data-th="วิสัยทัศน์">Vision</h2>
            <p data-en="To be a leading software development company that delivers secure and high-quality digital solutions."
                data-th="มุ่งสู่การเป็นบริษัทพัฒนาซอฟต์แวร์ชั้นนำ ที่ส่งมอบโซลูชันดิจิทัลที่ปลอดภัยและมีคุณภาพสูง">
                To be a leading software development company that delivers secure and high-quality digital solutions.
            </p>
        </div>
    </div>
</section>

{{-- ================= MISSION ================= --}}
<section class="scroll-reveal about-bg">
    <div class="about-row glass-card">
        <div class="about-icon">🎯</div>

        <div>
            <h2 data-en="Mission" data-th="พันธกิจ">Mission</h2>
            <ul class="about-list">
                <li data-en="Develop reliable and tailored software solutions that meet real business needs"
                    data-th="พัฒนาซอฟต์แวร์ที่เชื่อถือได้และตอบโจทย์ความต้องการทางธุรกิจจริง">
                    Develop reliable and tailored software solutions
                </li>
                <li data-en="Deliver professional services with transparency and long-term partnership mindset"
                    data-th="ให้บริการอย่างมืออาชีพ โปร่งใส และมุ่งสร้างความร่วมมือระยะยาว">
                    Deliver professional services with transparency
                </li>
                <li data-en="Help organizations enhance efficiency and competitiveness through technology"
                    data-th="ช่วยองค์กรเพิ่มประสิทธิภาพและความสามารถในการแข่งขันด้วยเทคโนโลยี">
                    Enhance business efficiency through technology
                </li>
            </ul>
        </div>
    </div>
</section>

{{-- ================= CORE VALUES (GOAL) ================= --}}
<section class="scroll-reveal about-bg">
    <div class="about-row glass-card">
        <div class="about-icon">💎</div>

        <div>
            <h2 data-en="Goal" data-th="เป้าหมาย">Goal</h2>
            <ul class="about-list">
                <li data-en="Transparency and honesty in every process"
                    data-th="ความโปร่งใสและความซื่อสัตย์ในทุกกระบวนการ">
                    Transparency and honesty
                </li>
                <li data-en="Commitment to quality and meaningful results"
                    data-th="มุ่งมั่นในคุณภาพและผลลัพธ์ที่มีคุณค่า">
                    Commitment to quality
                </li>
                <li data-en="Customer-focused mindset" data-th="ให้ความสำคัญกับลูกค้าเป็นศูนย์กลาง">
                    Customer-focused mindset
                </li>
            </ul>
        </div>
    </div>
</section>

@endsection