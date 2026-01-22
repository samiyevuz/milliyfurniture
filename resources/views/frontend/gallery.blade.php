@extends('frontend.layouts.app')

@section('content')
<section class="gallery-page">
    <div class="gallery-container">
        <h1>Gallery</h1>

        <div class="gallery-grid">
            <img src="{{ asset('assets/images/gallery-1.png') }}">
            <img src="{{ asset('assets/images/gallery-2.png') }}">
            <img src="{{ asset('assets/images/gallery-3.png') }}">
            <img src="{{ asset('assets/images/gallery-4.png') }}">
            <img src="{{ asset('assets/imagesgallery-5.png') }}">
            <img src="{{ asset('assets/images/gallery-6.png') }}">
        </div>
    </div>
</section>
@endsection
