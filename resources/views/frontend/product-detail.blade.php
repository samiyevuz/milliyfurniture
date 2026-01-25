@extends('frontend.layouts.app')

@section('content')

{{-- PRODUCT HERO --}}
<section class="product-detail-hero">
    <div class="product-detail-hero-container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="breadcrumb-link">Bosh sahifa</a>
            <span class="breadcrumb-separator">/</span>
            <a href="{{ route('gallery') }}" class="breadcrumb-link">Kategoriyalar</a>
            <span class="breadcrumb-separator">/</span>
            <a href="{{ route('category.products', $product->category) }}" class="breadcrumb-link">{{ $product->category->name ?? 'Kategoriya' }}</a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current">{{ $product->name }}</span>
        </nav>
    </div>
</section>

{{-- PRODUCT DETAIL SECTION --}}
<section class="product-detail-section">
    <div class="product-detail-container">
        <div class="product-detail-grid">
            {{-- LEFT: IMAGES --}}
            <div class="product-images-section">
                @if($product->image || ($product->images && count($product->images) > 0))
                    <div class="product-main-image">
                        <img id="mainProductImage" 
                             src="{{ asset('storage/' . ($product->image ?? ($product->images[0] ?? ''))) }}" 
                             alt="{{ $product->name }}"
                             class="product-main-img">
                    </div>
                    
                    @if($product->images && count($product->images) > 0)
                        <div class="product-thumbnails">
                            @if($product->image)
                                <div class="thumbnail-item active" onclick="changeMainImage('{{ asset('storage/' . $product->image) }}', this)">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                </div>
                            @endif
                            @foreach($product->images as $img)
                                <div class="thumbnail-item" onclick="changeMainImage('{{ asset('storage/' . $img) }}', this)">
                                    <img src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="product-main-image">
                        <img src="{{ asset('assets/images/gallery-1.png') }}" alt="{{ $product->name }}" class="product-main-img">
                    </div>
                @endif
            </div>

            {{-- RIGHT: PRODUCT INFO --}}
            <div class="product-info-section">
                <h1 class="product-title">{{ $product->name }}</h1>
                
                @if($product->category)
                    <div class="product-category">
                        <span class="category-badge">{{ $product->category->name }}</span>
                    </div>
                @endif

                <div class="product-price-section">
                    <span class="product-price">{{ number_format($product->price, 0, '.', ' ') }} UZS</span>
                </div>

                @if($product->description)
                    <div class="product-description">
                        <h3 class="description-title">Tavsif</h3>
                        <p class="description-text">{{ $product->description }}</p>
                    </div>
                @endif

                <div class="product-actions">
                    <a href="{{ route('contact') }}" class="btn-primary">
                        Aloqa qilish
                    </a>
                    <a href="{{ route('category.products', $product->category) }}" class="btn-secondary">
                        Kategoriyaga qaytish
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- RELATED PRODUCTS --}}
@if($relatedProducts->count() > 0)
<section class="related-products-section">
    <div class="related-products-container">
        <h2 class="related-products-title">O'xshash mahsulotlar</h2>
        <div class="related-products-grid">
            @foreach($relatedProducts as $relatedProduct)
                <a href="{{ route('product.show', $relatedProduct) }}" class="related-product-card">
                    @if($relatedProduct->image)
                        <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" loading="lazy">
                    @else
                        <img src="{{ asset('assets/images/gallery-1.png') }}" alt="{{ $relatedProduct->name }}" loading="lazy">
                    @endif
                    <div class="related-product-info">
                        <h3>{{ $relatedProduct->name }}</h3>
                        <p class="related-product-price">{{ number_format($relatedProduct->price, 0, '.', ' ') }} UZS</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<script>
function changeMainImage(imageSrc, element) {
    document.getElementById('mainProductImage').src = imageSrc;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-item').forEach(item => {
        item.classList.remove('active');
    });
    element.classList.add('active');
}
</script>

@endsection
