@extends('layouts.app')

@section('content')

<section id="home">
    @include('home')
</section>

<section id="services">
    @include('services')
</section>

<section id="portfolio">
    @include('portfolio')
</section>

<section id="about">
    @include('about')
</section>

<section id="contact">
    @include('contact')
</section>

@endsection
