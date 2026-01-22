{{-- ใช้ Layout หลัก --}}
@extends('layouts.app')

@section('title', 'Our Portfolio | AlexiaSoft')

@section('content')
<section id="portfolio" class="portfolio-hero-section">
    <div class="container">
        <h1 class="portfolio-title" 
            data-en="Our Portfolio" 
            data-th="ผลงานของเรา" 
            style="text-align: center;">
            Our Portfolio
        </h1>

        <p data-en="We are proud to work with leading organizations across various industries."
            data-th="เรามีความภาคภูมิใจที่ได้ทำงานร่วมกับองค์กรชั้นนำในหลากหลายอุตสาหกรรม"
            style="text-align: center; color: var(--text-muted); max-width: 700px; margin: 0 auto 20px; font-size: 0.95rem;">
            We are proud to work with leading organizations across various industries.
        </p>
    </div>
</section>
<div class="container scroll-reveal">
    <div class="projects-wrapper lang-en">
        <div class="project-item">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="ERP System" data-th="ระบบ อีอาร์พี">ERP System</h3>
                    <p data-en="Online store for construction materials, supporting mobile orders and stock management."
                        data-th="ร้านค้าออนไลน์สำหรับวัสดุก่อสร้าง รองรับการสั่งซื้อผ่านมือถือและบริหารสต็อก">
                        Online store for construction materials, supporting mobile orders and stock management.
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>
                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-1-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-1-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="e-Commerce" data-th="อีคอมเมิร์ซ">e-Commerce</h3>
                    <p data-en="Online store for construction materials, supporting mobile orders and stock management."
                        data-th="ร้านค้าออนไลน์สำหรับวัสดุก่อสร้าง รองรับการสั่งซื้อผ่านมือถือและบริหารสต็อก">
                        Online store for construction materials, supporting mobile orders and stock
                        management.
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>
                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-2-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-2-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="Market Place" data-th="ตลาดออนไลน์">Market Place</h3>
                    <p data-en="Comprehensive IT solutions and system integration for modern businesses."
                        data-th="โซลูชันไอทีครบวงจรและการวางระบบเครือข่ายสำหรับธุรกิจสมัยใหม่">
                        Comprehensive IT solutions and system integration for modern businesses.
                    </p>
                    <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                        Us</a>

                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-3-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-3-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>

        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="Market Place" data-th="ตลาดออนไลน์">Market Place</h3>
                    <p data-en="Smart ERP system for efficient resource planning and business management."
                        data-th="ระบบ ERP อัจฉริยะเพื่อการวางแผนทรัพยากรและการบริหารธุรกิจอย่างมีประสิทธิภาพ">
                        Smart ERP system for efficient resource planning and business management.
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>
                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-4-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-4-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>

        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="Market Place" data-th="ตลาดออนไลน์">Market Place</h3>
                    <p data-en="Currency exchange management system with real-time rate updates."
                        data-th="ระบบบริหารจัดการแลกเปลี่ยนเงินตราต่างประเทศ พร้อมการอัปเดตอัตราแลกเปลี่ยนแบบเรียลไทม์">
                        Currency exchange management system with real-time rate updates.
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>
                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-5-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-5-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>

        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="Market Place" data-th="ตลาดออนไลน์">Market Place</h3>
                    <p data-en="Centralized e-Commerce platform connecting local vendors with customers."
                        data-th="แพลตฟอร์มอีคอมเมิร์ซศูนย์รวมร้านค้าท้องถิ่นเพื่อการเชื่อมต่อลูกค้าอย่างมีประสิทธิภาพ">
                        Centralized e-Commerce platform connecting local vendors with customers.
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>

                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-6-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-6-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="e-Commerce" data-th="อีคอมเมิร์ซ">e-Commerce</h3>
                    <p data-en="A centralized e-Commerce platform designed to empower local vendors 
                        by connecting them with a broader customer base through streamlined digital solutions."
                        data-th="แพลตฟอร์มอีคอมเมิร์ซศูนย์รวมร้านค้าและผู้ประกอบการท้องถิ่น 
                            ช่วยขยายฐานลูกค้าและเพิ่มโอกาสทางการค้าด้วยระบบจัดการที่เป็นมืออาชีพ">
                        A centralized e-Commerce platform designed to empower local vendors
                        by connecting them with a broader customer base through streamlined digital
                        solutions.
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>

                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-7-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-7-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="e-Commerce" data-th="อีคอมเมิร์ซ">e-Commerce</h3>
                    <p data-en="A comprehensive mobile service and retail hub offering expert repairs and accessories, 
                        featuring online booking and real-time service tracking for customer convenience." data-th="ศูนย์บริการซ่อมและจัดจำหน่ายอุปกรณ์มือถือครบวงจร 
                            พร้อมระบบจองคิวออนไลน์และติดตามสถานะการซ่อมที่สะดวกรวดเร็ว">
                        A comprehensive mobile service and retail hub offering expert repairs and
                        accessories,
                        featuring online booking and real-time service tracking for customer convenience.
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>

                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-8-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-8-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item scroll-reveal">
            <div class="project-content">
                <div class="project-text-box">
                    <h3 data-en="e-Commerce" data-th="อีคอมเมิร์ซ">e-Commerce</h3>
                    <p data-en="An all-in-one management system for repair shops, providing essential tools for invoicing, 
                        inventory tracking, and customer relationship management (CRM)." data-th="ระบบบริหารจัดการร้านซ่อมยุคใหม่ ครอบคลุมการออกบิล คุมสต็อกอะไหล่ และบันทึกประวัติลูกค้า 
                            ช่วยให้การรันธุรกิจเป็นเรื่องง่ายและตรวจสอบได้">
                        An all-in-one management system for repair shops, providing essential tools for
                        invoicing,
                        inventory tracking, and customer relationship management (CRM).
                    </p>
                    <a href="{{ route('contact.page') }}" class="btn-consult" data-en="Consult Us"
                        data-th="ปรึกษาเราตอนนี้">
                        Consult Us
                    </a>
                </div>
                <div class="project-visual">
                    <div class="image-stack">
                        <img src="images/client-9-main.png" alt="Main UI" class="img-main">
                        <img src="images/client-9-sub.png" alt="Sub UI" class="img-sub">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- เพิ่มโค้ดการขยายภาพเต็ม -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-lightbox">&times;</span>
    <img class="lightbox-content" id="lightbox-img" src="">
</div>
<section style="padding: 80px 24px;" class="scroll-reveal">
    <h2 data-en="Trusted By" data-th="ลูกค้าที่ไว้วางใจเรา">Trusted By </h2>

    <p data-en="We are proud to work with leading organizations across various industries."
        data-th="เรามีความภาคภูมิใจที่ได้ทำงานร่วมกับองค์กรชั้นนำในหลากหลายอุตสาหกรรม"
        style="text-align: center; color: var(--text-muted); max-width: 700px; margin: 0 auto 20px; font-size: 0.95rem;">

        We are proud to work with leading organizations across various industries.

    </p>

    <div class="clients-grid">

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <!-- <i class="fa-solid fa-building"></i> -->
                <img src="images/clients/client-1.png" alt="Client 1">
            </div>
            <!-- Replace with: <img src="images/clients/client-1.png" alt="Client 1"> -->
        </div>

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-2.png" alt="Client 2">
            </div>
            <!-- Replace with: <img src="images/clients/client-2.png" alt="Client 2"> -->
        </div>

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-3.png" alt="Client 3">
            </div>
            <!-- Replace with: <img src="images/clients/client-3.png" alt="Client 3"> -->
        </div>

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-4.png" alt="Client 4">
            </div>
            <!-- Replace with: <img src="images/clients/client-4.png" alt="Client 4"> -->
        </div>

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-5.png" alt="Client 5">
            </div>
            <!-- Replace with: <img src="images/clients/client-5.png" alt="Client 5"> -->
        </div>

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-6.png" alt="Client 6">
            </div>
            <!-- Replace with: <img src="images/clients/client-6.png" alt="Client 6"> -->
        </div>

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-7.png" alt="Client 7">
            </div>
            <!-- Replace with: <img src="images/clients/client-7.png" alt="Client 7"> -->
        </div>

        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-8.png" alt="Client 8">
            </div>
            <!-- Replace with: <img src="images/clients/client-8.png" alt="Client 8"> -->
        </div>
        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-9.png" alt="Client 9">
            </div>
            <!-- Replace with: <img src="images/clients/client-8.png" alt="Client 8"> -->
        </div>
        <div class="glass-card client-logo-card">
            <div class="client-logo-placeholder">
                <img src="images/clients/client-10.png" alt="Client 10">
            </div>
            <!-- Replace with: <img src="images/clients/client-8.png" alt="Client 8"> -->
        </div>
    </div>

</section>
@endsection