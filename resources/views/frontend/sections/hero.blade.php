<section class="bg-[#F5F7FB]">
    <div class="container mx-auto px-4 py-20 grid lg:grid-cols-2 gap-12 items-center">

        {{-- Text --}}
        <div>
            <span class="text-sm uppercase tracking-widest text-gray-500">
                New Arrival
            </span>

            <h1 class="mt-4 text-4xl lg:text-5xl font-bold text-[#0A2540] leading-tight">
                Discover Our <br>
                New Collection
            </h1>

            <p class="mt-6 text-gray-600 max-w-md">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut elit tellus, luctus nec ullamcorper mattis.
            </p>

            <a href="#"
               class="inline-block mt-8 px-10 py-3 rounded-full bg-[#0A4C8A] text-white font-medium hover:bg-[#083b6b] transition">
                Buy Now
            </a>
        </div>

        {{-- Image --}}
        <div>
            <img
                src="{{ asset('assets/images/hero-chair.png') }}"
                alt="Furniture"
                class="w-full max-w-xl mx-auto"
            >
        </div>

    </div>
</section>
