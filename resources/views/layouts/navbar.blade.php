@php
    // ประกาศตัวแปรเพื่อเช็คสถานะหน้าปัจจุบัน
    $isHome = request()->is('/');
    $isPortfolio = request()->is('portfolio*');
    $isAbout = request()->is('about*');
    $isContact = request()->is('contact*');
    
    // ประกาศตัวแปรเจ้าปัญหา: เช็คว่าอยู่ในหน้า Service หรือไม่
    $isServicePage = request()->is('services*') || request()->routeIs('services.show');
@endphp

<header id="main-header">
    <div class="nav-container">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo-alexia.png') }}" alt="AlexiaSoft">
        </a>

        <nav class="nav-menu">
            @if($isHome)
                <a href="#home">Home</a>
                {{-- ใส่ class active ถ้าเป็นหน้า Service --}}
                <div class="dropdown-wrapper {{ $isServicePage ? 'active' : '' }}">
                    <a href="#services" class="dropdown-trigger">
                        Services <i class="fa-solid fa-chevron-down" style="font-size:12px;margin-left:4px;"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('services.show', 'custom-solution') }}">Custom Solution</a>
                        <a href="{{ route('services.show', 'web-application') }}">Web Application</a>
                        <a href="{{ route('services.show', 'mobile-application') }}">Mobile Application</a>
                        <a href="{{ route('services.show', 'system-integration') }}">System Integration</a>
                    </div>
                </div>
                <a href="#portfolio">Portfolio</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            @else
                <a href="{{ url('/') }}">Home</a>
                {{-- สำหรับหน้าอื่นๆ ก็ต้องใส่ class active เช่นกัน --}}
                <div class="dropdown-wrapper {{ $isServicePage ? 'active' : '' }}">
                    <a href="{{ url('/') }}#services" class="dropdown-trigger">
                        Services <i class="fa-solid fa-chevron-down" style="font-size:12px;margin-left:4px;"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('services.show', 'custom-solution') }}">Custom Solution</a>
                        <a href="{{ route('services.show', 'web-application') }}">Web Application</a>
                        <a href="{{ route('services.show', 'mobile-application') }}">Mobile Application</a>
                        <a href="{{ route('services.show', 'system-integration') }}">System Integration</a>
                    </div>
                </div>
                <a href="{{ url('/portfolio') }}" class="{{ $isPortfolio ? 'active' : '' }}">Portfolio</a>
                <a href="{{ url('/about') }}" class="{{ $isAbout ? 'active' : '' }}">About</a>
                <a href="{{ url('/contact') }}" class="{{ $isContact ? 'active' : '' }}">Contact</a>
            @endif
        </nav>

        <div class="lang-switch">
            <button class="lang-btn active" onclick="setLang('en')">EN</button>
            <button class="lang-btn" onclick="setLang('th')">TH</button>
        </div>
    </div>
</header>