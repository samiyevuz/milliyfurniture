@extends('frontend.layouts.app')

@section('content')

{{-- PAGE HEADER --}}
<section class="gallery-hero">
    <div class="gallery-hero-container">
        <h1>Category</h1>
        <p>
            Explore our handcrafted furniture collections
            designed to elevate your living space.
        </p>
    </div>
</section>

{{-- CATEGORIES GRID --}}
<section class="gallery-page">
    <div class="gallery-container">

        <div class="gallery-grid">
            @forelse($categories as $category)
                <div class="gallery-item">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" loading="lazy">
                    @else
                        <img src="{{ asset('assets/images/gallery-1.png') }}" alt="{{ $category->name }}" loading="lazy">
                    @endif
                    <div class="gallery-item-overlay">
                        <h3>{{ $category->name }}</h3>
                        <p>{{ $category->products_count ?? 0 }} products</p>
                    </div>
                </div>
            @empty
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/gallery-1.png') }}" alt="Category" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/gallery-2.png') }}" alt="Category" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/gallery-3.png') }}" alt="Category" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/gallery-4.png') }}" alt="Category" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/gallery-5.png') }}" alt="Category" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/gallery-6.png') }}" alt="Category" loading="lazy">
                </div>
            @endforelse
        </div>

    </div>
</section>

@endsection
