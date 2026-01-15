@php
// ประกาศตัวแปรเพื่อเช็คสถานะหน้าปัจจุบัน
$isHome = request()->is('/');
$isPortfolio = request()->is('portfolio*');
$isAbout = request()->is('about*');
$isContact = request()->is('contact*');

// เช็คว่าอยู่ในหน้า Service หรือไม่
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

            {{-- Services Dropdown --}}
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

            {{-- Tools Dropdown (Home Page) --}}
            <div class="dropdown-wrapper {{ request()->is('tools*') ? 'active' : '' }}">
                <a href="#" class="dropdown-trigger">
                    Tools <i class="fa-solid fa-chevron-down" style="font-size:12px;margin-left:4px;"></i>
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('tools.qrcode') }}">QR Code</a>
                    <a href="{{ route('tools.base64') }}">Base64</a>
                    <a href="{{ route('tools.shortlink') }}">Short link</a>
                    {{-- เพิ่มใหม่ 4 รายการ --}}
                    <a href="{{ route('tools.image-convert') }}">Image Converter </a>
                    <a href="{{ route('tools.remove-bg') }}">Background Remover</a>
                    <a href="{{ route('tools.json-tool') }}">Beautify JSON</a>
                    <a href="{{ route('tools.json-encode-decode') }}">JSON Encoder & Decoder php</a>
                    <a href="{{ route('tools.image-resize') }}">Image Resizer </a>
                </div>
            </div>

            @else
            <a href="{{ url('/') }}">Home</a>

            {{-- Services Dropdown --}}
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

            {{-- Tools Dropdown (Other Pages) --}}
            <div class="dropdown-wrapper {{ request()->is('tools*') ? 'active' : '' }}">
                <a href="#" class="dropdown-trigger">
                    Tools <i class="fa-solid fa-chevron-down" style="font-size:12px;margin-left:4px;"></i>
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('tools.qrcode') }}">QR Code</a>
                    <a href="{{ route('tools.base64') }}">Base64</a>
                    <a href="{{ route('tools.shortlink') }}">Short link</a>
                    {{-- เพิ่มใหม่ 4 รายการ --}}
                    <a href="{{ route('tools.image-convert') }}">Image Converter </a>
                    <a href="{{ route('tools.remove-bg') }}">Background Remover</a>
                    <a href="{{ route('tools.json-tool') }}">Beautify JSON </a>
                    <a href="{{ route('tools.json-encode-decode') }}">JSON Encoder & Decoder php</a>
                    <a href="{{ route('tools.image-resize') }}">Image Resizer </a>
                </div>
            </div>
            @endif
        </nav>

        <div class="lang-switch">
            <button class="lang-btn active" onclick="setLang('en')">EN</button>
            <button class="lang-btn" onclick="setLang('th')">TH</button>
        </div>
    </div>
</header>