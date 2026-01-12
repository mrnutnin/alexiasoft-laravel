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
            <a href="{{ route('portfolio') }}">Portfolio</a>

            {{-- About page --}}
            <a href="{{ url('/about') }}">About Us</a>

            {{-- Contact section --}}
            <a href="{{ url('/#contact') }}">Contact</a>
        </nav>

        <div class="lang-switch">
            <button class="lang-btn active" data-lang="en">EN</button>
            <button class="lang-btn" data-lang="th">TH</button>
        </div>

    </div>
</header>