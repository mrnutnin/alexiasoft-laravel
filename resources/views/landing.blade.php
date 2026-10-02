@extends('layouts.app')

@section('title', 'AlexiaSoft | Custom Software, MintPOS และ MintERP สำหรับธุรกิจ')
@section('meta_title', 'AlexiaSoft | Custom Software, MintPOS และ MintERP สำหรับธุรกิจ')
@section('meta_description', 'AlexiaSoft พัฒนาซอฟต์แวร์ เว็บแอป Mobile App ระบบ POS และ ERP พร้อมผลิตภัณฑ์ MintPOS และ MintERP สำหรับธุรกิจไทย')
@section('meta_keywords', 'AlexiaSoft, MintPOS, MintERP, POS system Thailand, ERP system Thailand, custom software, web application, mobile application')
@section('og_image', asset('images/products/minterp.png'))

@section('content')

    @include('home-section')
    @include('services-section')
    @include('products-section')
    @include('portfolio-section')
    @include('about-section')
    @include('contact-section')

@endsection

@push('scripts')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "AlexiaSoft",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/logo-alexia.png') }}",
    "sameAs": [
        "https://mintpos.alexiasoft.co",
        "https://minterp.alexiasoft.co/"
    ],
    "makesOffer": [
        { "@type": "Offer", "itemOffered": { "@type": "SoftwareApplication", "name": "MintPOS", "applicationCategory": "BusinessApplication", "url": "https://mintpos.alexiasoft.co" } },
        { "@type": "Offer", "itemOffered": { "@type": "SoftwareApplication", "name": "MintERP", "applicationCategory": "BusinessApplication", "url": "https://minterp.alexiasoft.co/" } }
    ]
}
</script>
@endpush