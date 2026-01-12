<header id="main-header">
    <div class="nav-container">

        {{-- โลโก้ กลับบนสุด --}}
        <a href="#home" class="logo">
            <img src="{{ asset('images/logo-alexia.png') }}" alt="AlexiaSoft">
        </a>

        <nav class="nav-menu">
            <a href="#home">Home</a>

            <div class="dropdown-wrapper">
                <a href="#services" class="dropdown-trigger">
                    Services <i class="fa-solid fa-chevron-down" style="font-size: 12px; margin-left: 4px;"></i>
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
        </nav>
        <div class="lang-switch">
            <button class="lang-btn active" data-lang="en">EN</button>
            <button class="lang-btn" data-lang="th">TH</button>
        </div>
    </div>
</header>