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



{{-- BROWSE THE RANGE --}}
<section class="browse-section">
    <div class="browse-container">

        <div class="browse-header">
            <h2>Browse The Range</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="browse-grid">

            <div class="browse-card">
                <img src="{{ asset('assets/images/browse-dining.png') }}" alt="Dining">
                <h4>Dining</h4>
            </div>

            <div class="browse-card">
                <img src="{{ asset('assets/images/browse-living.png') }}" alt="Living">
                <h4>Living</h4>
            </div>

            <div class="browse-card">
                <img src="{{ asset('assets/images/browse-bedroom.png') }}" alt="Bedroom">
                <h4>Bedroom</h4>
            </div>

        </div>

    </div>
</section>





{{-- HOW IT WORKS --}}
<section class="how-section">
    <div class="how-container">

        <div class="how-header">
            <h2>How It Works</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="how-grid">

            <div class="how-card">
                <div class="how-image">
                    <img src="{{ asset('assets/images/how-1.png') }}" alt="">
                    <span class="how-step">1</span>
                </div>
                <h4>Purchase Securely</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <div class="how-card">
                <div class="how-image">
                    <img src="{{ asset('assets/images/how-2.png') }}" alt="">
                    <span class="how-step">2</span>
                </div>
                <h4>Ships From Warehouse</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <div class="how-card">
                <div class="how-image">
                    <img src="{{ asset('assets/images/how-3.png') }}" alt="">
                    <span class="how-step">3</span>
                </div>
                <h4>Style Your Room</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

        </div>

    </div>
</section>





{{-- JOIN OUR MAILING LIST --}}
<section class="newsletter-section">
    <div class="newsletter-container">

        <h2>Join Our Mailing List</h2>
        <p>
            Sign up to receive inspiration, product updates,<br>
            and special offers from our team.
        </p>

        <form class="newsletter-form">
            <input
                type="email"
                placeholder="example@gmail.com"
                required
            >
            <button type="submit">
                Submit
            </button>
        </form>

    </div>
</section>




{{-- FOOTER --}}
<footer class="site-footer">
    <div class="footer-container">

        {{-- LEFT --}}
        <div class="footer-about">
            <h4>Beauty Care</h4>
            <p>
                Do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
            </p>

            <span class="footer-label">Follow Us</span>
            <div class="footer-socials">
                <a href="#"><img src="{{ asset('assets/images/footer-insta.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/images/footer-tg.svg') }}" alt=""></a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="footer-instagram">
            <h4>Instagram Shop</h4>

            <div class="instagram-grid">
                <img src="{{ asset('assets/images/insta-1.png') }}" alt="">
                <img src="{{ asset('assets/images/insta-2.png') }}" alt="">
                <img src="{{ asset('assets/images/insta-3.png') }}" alt="">
                <img src="{{ asset('assets/images/insta-4.png') }}" alt="">
            </div>
        </div>

    </div>
</footer>






{{-- GALLERY --}}
<section id="gallery" class="gallery-section">
    <div class="gallery-container">

        <div class="gallery-header">
            <h2>Gallery</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

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
