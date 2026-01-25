<section
    class="hero-section"
    style="background-image: url('{{ asset('assets/images/hero-bg.png') }}');"
>
    <div class="hero-overlay"></div>

    <div class="hero-card">
        <span class="text-xs uppercase tracking-[0.3em] text-gray-500">
            Yangi Mahsulotlar
        </span>

        <h1 class="mt-5 text-[44px] font-bold text-[#0A2540] leading-tight">
            Yangi Kolleksiyamizni <br>
            Kashing
        </h1>

        <p class="mt-6 text-gray-600 leading-relaxed">
            Bizning qo'lda yasalgan mebel kolleksiyamizni kashing.
            Ular yashash joyingizni yanada qulay va zamonaviy qiladi.
        </p>

        <a href="#"
           class="inline-flex items-center justify-center mt-10 px-12 py-4
                  rounded-full bg-[#0A4C8A] text-white font-semibold
                  hover:bg-[#083b6b] transition">
            Hozir Sotib Oling
        </a>
    </div>
</section>




<section class="features-section">
    <div class="features-container">

        <div class="feature-item">
            <div class="feature-icon">
                <img src="{{ asset('assets/icons/delivery.svg') }}" alt="Free Delivery" loading="lazy">
            </div>
            <div class="feature-text">
                <h4>Bepul Yetkazib Berish</h4>
                <p>Barcha buyurtmalar bepul yetkazib beriladi.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <img src="{{ asset('assets/icons/support.svg') }}" alt="24/7 Qo'llab-quvvatlash" loading="lazy">
            </div>
            <div class="feature-text">
                <h4>24/7 Qo'llab-quvvatlash</h4>
                <p>Kun bo'yi qo'llab-quvvatlash xizmati.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <img src="{{ asset('assets/icons/shield.svg') }}" alt="100% Haqiqiy" loading="lazy">
            </div>
            <div class="feature-text">
                <h4>100% Haqiqiy</h4>
                <p>Barcha mahsulotlarimiz haqiqiy va sifatli.</p>
            </div>
        </div>

    </div>
</section>




{{-- INSPIRATION COLLECTION --}}
<section class="inspiration-section">
    <div class="inspiration-container">

        <div class="inspiration-header">
            <h2>Ilhom Kolleksiyasi</h2>
            <p>Bizning mebel kolleksiyamizdan ilhomlaning va xonangizni go'zallashtiring.</p>
        </div>

        <div class="inspiration-grid">
            <div class="inspiration-card">
                <img src="{{ asset('assets/images/inspire-1.png') }}" alt="Inspiration Collection 1" loading="lazy">
            </div>

            <div class="inspiration-card">
                <img src="{{ asset('assets/images/inspire-2.png') }}" alt="Inspiration Collection 2" loading="lazy">
            </div>

            <div class="inspiration-card">
                <img src="{{ asset('assets/images/inspire-3.png') }}" alt="Inspiration Collection 3" loading="lazy">
            </div>
        </div>

    </div>
</section>



{{-- BEAUTIFY YOUR SPACE --}}
<section class="beautify-section">
    <div class="beautify-container">

        <div class="beautify-content">
            <h2>Xonangizni Go'zallashtiring</h2>

            <p>
                Bizning mebellarimiz bilan xonangizni zamonaviy va qulay qiling.
                Har bir mahsulotimiz sizning yashash joyingizni yanada go'zal qiladi.
            </p>

            <a href="#" class="beautify-btn">Ko'proq Biling</a>
        </div>

        <div class="beautify-image">
            <img src="{{ asset('assets/images/beautify.png') }}" alt="Beautify Your Space" loading="lazy">
        </div>

    </div>
</section>



{{-- BROWSE THE RANGE (CATEGORIES) --}}
<section class="browse-section">
    <div class="browse-container">

        <div class="browse-header">
            <h2>Kategoriyalarni Ko'rib Chiqing</h2>
            <p>Qo'lda yasalgan mebel kolleksiyalarimizni ko'rib chiqing, ular yashash joyingizni yanada qulay va zamonaviy qiladi.</p>
        </div>

        <div class="browse-grid">
            @forelse($categories as $category)
                <div class="browse-card">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" loading="lazy">
                    @else
                        <img src="{{ asset('assets/images/browse-dining.png') }}" alt="{{ $category->name }}" loading="lazy">
                    @endif
                    <h4>{{ $category->name }}</h4>
                </div>
            @empty
                <div class="browse-card">
                    <img src="{{ asset('assets/images/browse-dining.png') }}" alt="Ovqatlanish" loading="lazy">
                    <h4>Ovqatlanish</h4>
                </div>
                <div class="browse-card">
                    <img src="{{ asset('assets/images/browse-living.png') }}" alt="Yashash xonasi" loading="lazy">
                    <h4>Yashash xonasi</h4>
                </div>
                <div class="browse-card">
                    <img src="{{ asset('assets/images/browse-bedroom.png') }}" alt="Yotoq xonasi" loading="lazy">
                    <h4>Yotoq xonasi</h4>
                </div>
            @endforelse
        </div>

    </div>
</section>





{{-- HOW IT WORKS (TESTIMONIALS CAROUSEL) --}}
<section class="how-section">
    <div class="how-container">

        <div class="how-header">
            <h2>Qanday Ishlaydi</h2>
            <p>Bizning jarayonimizni o'rganing va sifatli mebellarni uyingizga qanday yetkazib berayotganimizni ko'ring.</p>
        </div>

        @if($testimonials->count() > 0)
            <div class="how-carousel-wrapper">
                {{-- Navigation Arrows --}}
                @if($testimonials->count() > 1)
                    <button class="carousel-nav carousel-prev" id="carouselPrev" aria-label="Oldingi slayd">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 18l-6-6 6-6"/>
                        </svg>
                    </button>
                    <button class="carousel-nav carousel-next" id="carouselNext" aria-label="Keyingi slayd">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                    </button>
                @endif

                <div class="how-carousel-container">
                    <div class="how-carousel" id="testimonialsCarousel">
                        @foreach($testimonials as $testimonial)
                            <div class="how-card carousel-item">
                                <div class="how-image">
                                    @if($testimonial->image ?? null)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->title ?? 'Testimonial' }}" loading="lazy">
                                    @else
                                        <img src="{{ asset('assets/images/how-1.png') }}" alt="{{ $testimonial->title ?? 'Testimonial' }}" loading="lazy">
                                    @endif
                                </div>
                                <h4>{{ $testimonial->title ?? 'Untitled' }}</h4>
                                <p>{{ $testimonial->description ?? '' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Carousel Navigation Dots --}}
                @if($testimonials->count() > 1)
                    <div class="how-carousel-dots">
                        @foreach($testimonials as $index => $testimonial)
                            <button class="carousel-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}" aria-label="{{ $index + 1 }}-slaydga o'tish"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            {{-- Default content if no testimonials --}}
            <div class="how-grid">
                <div class="how-card">
                    <div class="how-image">
                        <img src="{{ asset('assets/images/how-1.png') }}" alt="Purchase Securely" loading="lazy">
                    </div>
                    <h4>Xavfsiz Xarid</h4>
                    <p>Bizning mebellarimiz yuqori sifatli materiallardan tayyorlanadi.</p>
                </div>

                <div class="how-card">
                    <div class="how-image">
                        <img src="{{ asset('assets/images/how-2.png') }}" alt="Omborxona" loading="lazy">
                    </div>
                    <h4>Omborxonadan Yetkazib Berish</h4>
                    <p>Barcha mebellarimiz omborxonamizdan tezkor yetkazib beriladi.</p>
                </div>

                <div class="how-card">
                    <div class="how-image">
                        <img src="{{ asset('assets/images/how-3.png') }}" alt="Xonani Bezash" loading="lazy">
                    </div>
                    <h4>Xonangizni Bezang</h4>
                    <p>Bizning mebellarimiz bilan xonangizni zamonaviy va qulay qiling.</p>
                </div>
            </div>
        @endif

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
                Yuborish
            </button>
        </form>

    </div>
</section>




{{-- FOOTER --}}
<footer class="site-footer">
    <div class="footer-container">

        {{-- LEFT --}}
        <div class="footer-about">
            <h4>Milliy Mebel</h4>
            <p>
                Bizning mebellarimiz yuqori sifatli materiallardan tayyorlanadi.
                Har bir mahsulotimiz sizning yashash joyingizni yanada qulay va zamonaviy qiladi.
            </p>

            <span class="footer-label">Bizni Kuzatib Boring</span>
            <div class="footer-socials">
                <a href="#" aria-label="Instagram"><img src="{{ asset('assets/images/footer-insta.svg') }}" alt="Instagram" loading="lazy"></a>
                <a href="#" aria-label="Telegram"><img src="{{ asset('assets/images/footer-tg.svg') }}" alt="Telegram" loading="lazy"></a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="footer-instagram">
            <h4>Instagram Do'koni</h4>

            <div class="instagram-grid">
                <img src="{{ asset('assets/images/insta-1.png') }}" alt="Instagram Gallery 1" loading="lazy">
                <img src="{{ asset('assets/images/insta-2.png') }}" alt="Instagram Gallery 2" loading="lazy">
                <img src="{{ asset('assets/images/insta-3.png') }}" alt="Instagram Gallery 3" loading="lazy">
                <img src="{{ asset('assets/images/insta-4.png') }}" alt="Instagram Gallery 4" loading="lazy">
            </div>
        </div>

    </div>
</footer>

