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
        let currentIndex = 0;
        let autoSlideInterval;

        // Function to show specific slide
        function showSlide(index) {
            if (items.length === 0) return;
            
            currentIndex = index;
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            
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

        // Auto-slide every 2 seconds
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 2000);
        }

        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
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
        carousel.addEventListener('mouseenter', stopAutoSlide);
        carousel.addEventListener('mouseleave', startAutoSlide);

        // Start auto-slide
        if (items.length > 1) {
            startAutoSlide();
        }
    }
});
