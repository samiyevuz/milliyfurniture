@extends('frontend.layouts.app')

@section('content')

{{-- PAGE HEADER --}}
<section class="gallery-hero">
    <div class="gallery-hero-container">
        <h1>{{ $category->name }}</h1>
        <p>
            {{ $category->name }} kolleksiyamizni ko'rib chiqing,
            ular yashash joyingizni yanada qulay va zamonaviy qiladi.
        </p>
    </div>
</section>

{{-- PRODUCTS GRID --}}
<section class="gallery-page">
    <div class="gallery-container">
        @if($products->count() > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy">
                        @else
                            <img src="{{ asset('assets/images/gallery-1.png') }}" alt="{{ $product->name }}" loading="lazy">
                        @endif
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price">{{ number_format($product->price, 0, '.', ' ') }} UZS</p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($products->hasPages())
                <div class="pagination-wrapper mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        @else
            <div class="empty-state text-center py-12">
                <p class="text-gray-500">Bu kategoriyada mahsulot topilmadi.</p>
            </div>
        @endif
    </div>
</section>

@endsection
