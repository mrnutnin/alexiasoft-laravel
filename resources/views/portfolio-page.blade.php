{{-- ใช้ Layout หลัก --}}
@extends('layouts.app')

@section('title', 'Our Portfolio | AlexiaSoft')

@section('content')
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta Tags -->
    <title>AlexiaSoft – Crafted Software Solutions | Custom Development</title>
    <meta name="title" content="AlexiaSoft – Crafted Software Solutions | Custom Development" />
    <meta name="description"
        content="Crafted software solutions for modern businesses. We build ERP, POS, e-Commerce, and custom applications with cutting-edge technologies like Laravel, React, Vue.js, and Node.js." />
    <meta name="keywords"
        content="software development, custom software, ERP system, POS system, e-commerce, web application, mobile app, system integration, Laravel, React, Vue.js, AlexiaSoft" />
    <meta name="author" content="AlexiaSoft Co., Ltd." />
    <meta name="robots" content="index, follow" />
    <meta name="language" content="English, Thai" />

    <!-- Canonical URL -->
    <link rel="canonical" href="https://www.alexiasoft.co" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

    <!-- Theme Color -->
    <meta name="theme-color" content="#22c55e" />
    <meta name="msapplication-TileColor" content="#22c55e" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.alexiasoft.co" />
    <meta property="og:title" content="AlexiaSoft – Crafted Software Solutions" />
    <meta property="og:description"
        content="Crafted software solutions for modern businesses. We build technology that drives success." />
    <meta property="og:image" content="https://www.alexiasoft.co/images/og-image.jpg" />
    <meta property="og:site_name" content="AlexiaSoft" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:locale:alternate" content="th_TH" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://www.alexiasoft.co" />
    <meta property="twitter:title" content="AlexiaSoft – Crafted Software Solutions" />
    <meta property="twitter:description"
        content="Crafted software solutions for modern businesses. We build technology that drives success." />
    <meta property="twitter:image" content="https://www.alexiasoft.co/images/twitter-image.jpg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@500;700;800&display=swap"
        rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>



    <div class="ambient-blob blob-1"></div>

    <div class="ambient-blob blob-2"></div>


    <header id="main-header">
        <div class="nav-container">

            {{-- Logo → กลับหน้า Home --}}
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/logo-alexia.png') }}" alt="AlexiaSoft">
            </a>

            <nav class="nav-menu">
                {{-- Home page --}}
                <a href="{{ url('/') }}">Home</a>

                {{-- Sections on Home --}}
                <a href="{{ url('/#services') }}">Services</a>
                <a href="{{ url('/#portfolio') }}">Portfolio</a>

                {{-- About page --}}
                <a href="{{ url('/about') }}">About Us</a>

                {{-- Contact section --}}
                <a href="{{ url('/#contact') }}">Contact</a>
            </nav>

            <div class="lang-switch">

                <button class="lang-btn active" onclick="setLang('en')">EN</button>

                <button class="lang-btn" onclick="setLang('th')">TH</button>

            </div>

        </div>
    </header>

    <section class="portfolio-hero-section">
        <div class="container">
            <h1 class="portfolio-title" data-en="Our Portfolio" data-th="ผลงานของเรา">Our Portfolio</h1>
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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult Us</a>
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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                            Us</a>
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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                            Us</a>
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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                            Us</a>

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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                            Us</a>

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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                            Us</a>

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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                            Us</a>

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
                        <a href="#" class="btn-consult" data-en="Consult Us" data-th="ปรึกษาเราตอนนี้">Consult
                            Us</a>
                    </div>
                    <div class="project-visual">
                        <div class="image-stack">
                            <img src="images/client-9-main.png" alt="Main UI" class="img-main">
                            <img src="images/client-9-sub.png" alt="Sub UI" class="img-sub">
                        </div>
                    </div>
                    <!-- เพิ่มโค้ดการขยายภาพเต็ม -->
                    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
                        <span class="close-lightbox">&times;</span>
                        <img class="lightbox-content" id="lightbox-img">
                    </div>
                </div>
            </div>
        </div>
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