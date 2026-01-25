import './bootstrap';


document.addEventListener('DOMContentLoaded', () => {
    // Time input formatting
    document.querySelectorAll('.time-input').forEach(input => {

        input.addEventListener('input', e => {
            let v = e.target.value.replace(/\D/g, '');

            if (v.length >= 3) {
                v = v.slice(0, 2) + ':' + v.slice(2, 4);
            }

            e.target.value = v.slice(0, 5);
        });

        input.addEventListener('blur', e => {
            const val = e.target.value;

            // faqat 00:00 – 23:59
            if (val !== '' && !/^([01]\d|2[0-3]):([0-5]\d)$/.test(val)) {
                e.target.value = '';
            }
        });

    });

    // Testimonials Carousel
    const carousel = document.getElementById('testimonialsCarousel');
    if (carousel) {
        const items = carousel.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('.carousel-dot');
        const prevBtn = document.getElementById('carouselPrev');
        const nextBtn = document.getElementById('carouselNext');
        let currentIndex = 0;
        let autoSlideInterval;

        // Calculate item width (including gap)
        function getItemWidth() {
            if (items.length === 0) return 0;
            const item = items[0];
            const itemWidth = item.offsetWidth;
            const gap = 24; // gap between items
            return itemWidth + gap;
        }

        // Function to show specific slide
        function showSlide(index) {
            if (items.length === 0) return;
            
            // Clamp index to valid range
            currentIndex = Math.max(0, Math.min(index, items.length - 1));
            
            // Calculate transform
            const itemWidth = getItemWidth();
            const offset = currentIndex * itemWidth;
            
            // Center the active item
            const containerWidth = carousel.parentElement.offsetWidth;
            const centerOffset = (containerWidth / 2) - (itemWidth / 2);
            
            carousel.style.transform = `translateX(calc(-${offset}px + ${centerOffset}px))`;
            
            // Update active class on items
            items.forEach((item, i) => {
                if (i === currentIndex) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
            
            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });
        }

        // Function to go to next slide
        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            showSlide(currentIndex);
        }

        // Function to go to previous slide
        function prevSlide() {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showSlide(currentIndex);
        }

        // Auto-slide every 2 seconds
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 2000);
        }

        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
        }

        // Navigation button handlers
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                stopAutoSlide();
                nextSlide();
                startAutoSlide();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                stopAutoSlide();
                prevSlide();
                startAutoSlide();
            });
        }

        // Dot click handlers
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopAutoSlide();
                showSlide(index);
                startAutoSlide();
            });
        });

        // Pause on hover
        const carouselWrapper = carousel.closest('.how-carousel-wrapper');
        if (carouselWrapper) {
            carouselWrapper.addEventListener('mouseenter', stopAutoSlide);
            carouselWrapper.addEventListener('mouseleave', startAutoSlide);
        }

        // Initialize
        showSlide(0);

        // Start auto-slide
        if (items.length > 1) {
            startAutoSlide();
        }

        // Recalculate on window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                showSlide(currentIndex);
            }, 250);
        });
    }
});
