{{-- ใช้ Layout หลักของเว็บ (header, footer, css, js) --}}
@extends('layouts.app')

@section('title', 'About Us | AlexiaSoft')

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
    {{-- ================= ABOUT HERO ================= --}}
    <section id="about-hero" class="scroll-reveal about-bg">
        <div>
            <h1 data-en="About Us" data-th="เกี่ยวกับเรา">About Us</h1>

            <p class="about-intro"
                data-en="AlexiaSoft is a professional software development company specializing in modern digital solutions that are reliable, scalable, and built to meet international standards."
                data-th="AlexiaSoft เป็นบริษัทพัฒนาซอฟต์แวร์ระดับมืออาชีพ ที่เชี่ยวชาญด้านโซลูชันดิจิทัลที่ทันสมัย เชื่อถือได้ และรองรับการขยายตัว พร้อมส่งมอบงานตามมาตรฐานสากล">
                AlexiaSoft is a professional software development company specializing in modern digital solutions.
            </p>
        </div>
    </section>
    <section id="about" class="scroll-reveal">
        <div style="text-align: center; max-width: 700px; margin: 0 auto 40px;">
            <h2 data-en="Why AlexiaSoft?" data-th="ทำไมต้อง AlexiaSoft?">Why AlexiaSoft?</h2>
            <p data-en="We build long-term technology partnerships to ensure your business stays ahead."
                data-th="เราสร้างพาร์ทเนอร์ทางเทคโนโลยีระยะยาวเพื่อให้ธุรกิจของคุณล้ำหน้าอยู่เสมอ">
                We build long-term technology partnerships.
            </p>
        </div>

        <div class="glass-card" style="padding: 40px 30px; max-width: 900px; margin: 0 auto;">
            <div class="stat-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
                <div style="text-align: center;">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.8rem;">100%</h3>
                    <p style="margin: 0; font-size: 0.85rem;" data-en="Reliability" data-th="ความน่าเชื่อถือ">
                        Reliability
                    </p>
                </div>
                <div style="text-align: center;">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.8rem;">6+</h3>
                    <p style="margin: 0; font-size: 0.85rem;" data-en="Experience" data-th="ประสบการณ์">Years Experience
                    </p>
                </div>
                <div style="text-align: center;">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.8rem;">20+</h3>
                    <p style="margin: 0; font-size: 0.85rem;" data-en="Succes Project" data-th="Succes Project">Succes
                        Project</p>
                </div>
                <div style="text-align: center;">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.8rem;">24/7</h3>
                    <p style="margin: 0; font-size: 0.85rem;" data-en="Active Support" data-th="ดูแลตลอดเวลา">Active
                        Support
                    </p>
                </div>
            </div>
        </div>
        <div class="project-btn-wrap scroll-reveal">
        </div>
    </section>
    {{-- ================= VISION ================= --}}
    <section class="scroll-reveal about-bg">
        <div class="about-row glass-card">
            <div class="about-icon">💡</div>

            <div>
                <h2 data-en="Vision" data-th="วิสัยทัศน์">
                    Vision
                </h2>

                <p data-en="To be a leading software development company that delivers secure and high-quality digital solutions."
                    data-th="มุ่งสู่การเป็นบริษัทพัฒนาซอฟต์แวร์ชั้นนำ ที่ส่งมอบโซลูชันดิจิทัลที่ปลอดภัยและมีคุณภาพสูง">
                    To be a leading software development company that delivers secure and high-quality digital
                    solutions.
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

    {{-- ================= CORE VALUES ================= --}}
    <section class="scroll-reveal about-bg">
        <div class="about-row glass-card">
            <div class="about-icon">💎</div>

            <div>
                <h2 data-en="Goal " data-th="เป้าหมาย">Goal </h2>

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