<section
    class="relative min-h-[85vh] flex items-center"
    style="background-image: url('{{ asset('assets/images/hero-bg.png') }}'); background-size: cover; background-position: center;"
>
    {{-- Soft overlay --}}
    <div class="absolute inset-0 bg-white/40"></div>

    <div class="relative container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center">

            {{-- Left empty space (image side) --}}
            <div></div>

            {{-- Right content --}}
            <div class="flex justify-center lg:justify-end">
                <div class="bg-[#E9F1F8] rounded-2xl p-12 max-w-xl w-full shadow-md border-radius-2xl background-color: #E9F1F8;">

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
                       class="inline-flex items-center justify-center mt-8 px-10 py-3 rounded-full bg-[#0A4C8A] text-white font-medium hover:bg-[#083b6b] transition">
                        Buy Now
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>
