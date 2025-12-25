<header id="main-header">
    <div class="nav-container">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo-alexia.png') }}" alt="AlexiaSoft">
        </a>

        <nav class="nav-menu">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('services') }}">Our Services</a>
            <a href="{{ route('portfolio') }}">Portfolio</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('contact') }}">Contact</a>
        </nav>

        <div class="lang-switch">
            <button class="lang-btn active">EN</button>
            <button class="lang-btn">TH</button>
        </div>

    </div>
</header>
