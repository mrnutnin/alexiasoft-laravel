<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'AlexiaSoft – Crafted Software Solutions | Custom Development')</title>
    <meta name="title" content="AlexiaSoft – Crafted Software Solutions | Custom Development" />
    <meta name="description" content="Crafted software solutions for modern businesses. We build ERP, POS, e-Commerce, and custom applications with cutting-edge technologies." />
    <meta name="keywords" content="software development, custom software, ERP system, POS system, e-commerce, Laravel, React, Vue.js, AlexiaSoft" />
    <meta name="author" content="AlexiaSoft Co., Ltd." />
    <meta name="robots" content="index, follow" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="AlexiaSoft – Crafted Software Solutions" />
    <meta property="og:description" content="Crafted software solutions for modern businesses. We build technology that drives success." />
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}" />

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles') {{-- สำหรับใส่ CSS เฉพาะหน้าเพิ่มเติม --}}
</head>

<body>
    {{-- Ambient Decoration Background --}}
    <div class="ambient-blob blob-1"></div>
    <div class="ambient-blob blob-2"></div>

    {{-- Header Section --}}
    @include('layouts.navbar')

    {{-- Main Content Section --}}
    <main id="main-content" class="content-transition">
        @yield('content')
    </main>

    {{-- Footer Section --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts') {{-- สำหรับใส่ JS เฉพาะหน้าเพิ่มเติม --}}
</body>
</html>