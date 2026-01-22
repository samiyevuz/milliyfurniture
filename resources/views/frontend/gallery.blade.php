@extends('frontend.layouts.app')

@section('content')

{{-- PAGE HEADER --}}
<section class="gallery-hero">
    <div class="gallery-hero-container">
        <h1>Gallery</h1>
        <p>
            Explore our handcrafted furniture collections
            designed to elevate your living space.
        </p>
    </div>
</section>

{{-- GALLERY GRID --}}
<section class="gallery-page">
    <div class="gallery-container">

        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="{{ asset('assets/images/gallery-1.png') }}" alt="">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/images/gallery-2.png') }}" alt="">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/images/gallery-3.png') }}" alt="">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/images/gallery-4.png') }}" alt="">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/images/gallery-5.png') }}" alt="">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/images/gallery-6.png') }}" alt="">
            </div>
        </div>

    </div>
</section>

@endsection
