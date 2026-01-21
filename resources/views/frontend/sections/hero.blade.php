<section
    class="relative min-h-[80vh] flex items-center"
    style="background-image: url('{{ asset('assets/images/hero-bg.png') }}'); background-size: cover; background-position: center;"
>
    {{-- Overlay --}}
    <div class="absolute inset-0 bg-white/60"></div>

    <div class="relative container mx-auto px-4 flex justify-end">
        {{-- Content Card --}}
        <div class="bg-[#E9F1F8] rounded-2xl p-10 max-w-xl w-full shadow-sm">

            <span class="text-xs uppercase tracking-widest text-gray-500">
                New Arrival
            </span>

            <h1 class="mt-4 text-4xl lg:text-5xl font-bold text-[#0A2540] leading-tight">
                Discover Our <br>
                New Collection
            </h1>

            <p class="mt-6 text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut elit tellus, luctus nec ullamcorper mattis.
            </p>

            <a href="#"
               class="inline-block mt-8 px-10 py-3 rounded-full bg-[#0A4C8A] text-white font-medium hover:bg-[#083b6b] transition">
                Buy Now
            </a>

        </div>
    </div>
</section>
