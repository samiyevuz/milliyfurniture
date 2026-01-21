<section
    class="relative w-full overflow-hidden pt-24"
    style="
        height: 80vh;
        background-image: url('{{ asset('assets/images/hero-bg.png') }}');
        background-size: cover;
        background-position: center 82%;
        background-repeat: no-repeat;
    "
>
    {{-- Very soft overlay --}}
    <div class="absolute inset-0 bg-white/20"></div>

    {{-- Content --}}
    <div class="relative h-full container mx-auto px-4 flex items-center justify-end">

        <div class="bg-[#E9F1F8] rounded-5xl p-14 max-w-xl w-full shadow-lg">

            <span class="text-xs uppercase tracking-[0.3em] text-gray-500">
                New Arrival
            </span>

            <h1 class="mt-5 text-4xl lg:text-[44px] font-bold text-[#0A2540] leading-tight">
                Discover Our <br>
                New Collection
            </h1>

            <p class="mt-6 text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut elit tellus, luctus nec ullamcorper mattis.
            </p>

            <a href="#"
               class="inline-flex items-center justify-center mt-10 px-12 py-4 rounded-full bg-[#0A4C8A] text-white font-semibold hover:bg-[#083b6b] transition">
                Buy Now
            </a>

        </div>

    </div>
</section>
