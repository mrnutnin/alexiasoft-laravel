<header id="main-header">
    <div class="nav-container">

        {{-- Logo → กลับหน้า Home --}}
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo-alexia.png') }}" alt="AlexiaSoft">
        </a>

        @php
            $isHome = request()->is('/');
            $isPortfolio = request()->is('portfolio');
            $isAbout = request()->is('about');
            $isContact = request()->is('contact');
        @endphp

        <nav class="nav-menu">
            @if($isHome)
                {{-- หน้าเดียวแบบเลื่อน --}}
                <a href="#home">Home</a>

                <div class="dropdown-wrapper">
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
                {{-- หน้าแยก --}}
                <a href="{{ url('/') }}">Home</a>

                <div class="dropdown-wrapper">
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
