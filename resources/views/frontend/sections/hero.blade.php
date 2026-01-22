<section
    class="hero-section"
    style="background-image: url('{{ asset('assets/images/hero-bg.png') }}');"
>
    <div class="hero-overlay"></div>

    <div class="hero-card">
        <span class="text-xs uppercase tracking-[0.3em] text-gray-500">
            New Arrival
        </span>

        <h1 class="mt-5 text-[44px] font-bold text-[#0A2540] leading-tight">
            Discover Our <br>
            New Collection
        </h1>

        <p class="mt-6 text-gray-600 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Ut elit tellus, luctus nec ullamcorper mattis.
        </p>

        <a href="#"
           class="inline-flex items-center justify-center mt-10 px-12 py-4
                  rounded-full bg-[#0A4C8A] text-white font-semibold
                  hover:bg-[#083b6b] transition">
            Buy Now
        </a>
    </div>
</section>




<section class="features-section">
    <div class="features-container">

        <div class="feature-item">
            <div class="feature-icon">
                <img src="{{ asset('assets/icons/delivery.svg') }}" alt="">
            </div>
            <div class="feature-text">
                <h4>Free Delivery</h4>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <img src="{{ asset('assets/icons/support.svg') }}" alt="">
            </div>
            <div class="feature-text">
                <h4>Support 24/7</h4>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <img src="{{ asset('assets/icons/shield.svg') }}" alt="">
            </div>
            <div class="feature-text">
                <h4>100% Authentic</h4>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

    </div>
</section>




{{-- INSPIRATION COLLECTION --}}
<section class="inspiration-section">
    <div class="inspiration-container">

        <div class="inspiration-header">
            <h2>Inspiration Collection</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="inspiration-grid">
            <div class="inspiration-card">
                <img src="{{ asset('assets/images/inspire-1.png') }}">
            </div>

            <div class="inspiration-card">
                <img src="{{ asset('assets/images/inspire-2.png') }}">
            </div>

            <div class="inspiration-card">
                <img src="{{ asset('assets/images/inspire-3.png') }}">
            </div>
        </div>

    </div>
</section>



{{-- BEAUTIFY YOUR SPACE --}}
<section class="beautify-section">
    <div class="beautify-container">

        <div class="beautify-content">
            <h2>Beautify Your Space</h2>

            <p>
                Do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
            </p>

            <a href="#" class="beautify-btn">Learn More</a>
        </div>

        <div class="beautify-image">
            <img src="{{ asset('assets/images/beautify.png') }}" alt="Beautify">
        </div>

    </div>
</section>
