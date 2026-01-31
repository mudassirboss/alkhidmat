// ============================================
// Advanced Hero Slider - 2026 Edition
// ============================================

class HeroSlider {
    constructor(container) {
        this.container = container;
        this.slides = container.querySelectorAll('.hero-slide');
        this.currentSlide = 0;
        this.isPlaying = true;
        this.autoplayInterval = null;
        this.touchStartX = 0;
        this.touchEndX = 0;

        if (this.slides.length > 0) {
            this.init();
        }
    }

    init() {
        this.createControls();
        this.attachEventListeners();
        this.startAutoplay();
        this.updateSlideNumber();

        // Show first slide
        this.slides[0].classList.add('active');
    }

    createControls() {
        // Navigation arrows
        const prevBtn = this.container.querySelector('.slider-nav-prev');
        const nextBtn = this.container.querySelector('.slider-nav-next');

        if (prevBtn) prevBtn.addEventListener('click', () => this.prevSlide());
        if (nextBtn) nextBtn.addEventListener('click', () => this.nextSlide());

        // Pagination dots
        const dots = this.container.querySelectorAll('.slider-dot');
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
        });

        // Play/Pause button
        const controlBtn = this.container.querySelector('.slider-control');
        if (controlBtn) {
            controlBtn.addEventListener('click', () => this.toggleAutoplay());
        }
    }

    attachEventListeners() {
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prevSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
            if (e.key === ' ') {
                e.preventDefault();
                this.toggleAutoplay();
            }
        });

        // Touch/Swipe support
        this.container.addEventListener('touchstart', (e) => {
            this.touchStartX = e.changedTouches[0].screenX;
        });

        this.container.addEventListener('touchend', (e) => {
            this.touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
        });

        // Pause on hover
        this.container.addEventListener('mouseenter', () => {
            if (this.isPlaying) {
                this.pauseAutoplay();
            }
        });

        this.container.addEventListener('mouseleave', () => {
            if (this.isPlaying) {
                this.startAutoplay();
            }
        });

        // Visibility API - Pause when tab is hidden
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.pauseAutoplay();
            } else if (this.isPlaying) {
                this.startAutoplay();
            }
        });
    }

    handleSwipe() {
        const swipeThreshold = 50;
        const diff = this.touchStartX - this.touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                this.nextSlide();
            } else {
                this.prevSlide();
            }
        }
    }

    goToSlide(index) {
        // Remove active from all
        this.slides.forEach(slide => {
            slide.classList.remove('active', 'prev');
        });

        // Add prev to current
        this.slides[this.currentSlide].classList.add('prev');

        // Update current
        this.currentSlide = index;

        // Add active to new
        this.slides[this.currentSlide].classList.add('active');

        this.updatePagination();
        this.updateSlideNumber();
        this.restartAutoplay();
    }

    nextSlide() {
        const nextIndex = (this.currentSlide + 1) % this.slides.length;
        this.goToSlide(nextIndex);
    }

    prevSlide() {
        const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.goToSlide(prevIndex);
    }

    updatePagination() {
        const dots = this.container.querySelectorAll('.slider-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentSlide);
        });
    }

    updateSlideNumber() {
        const slideNumber = this.container.querySelector('.slide-number');
        if (slideNumber) {
            slideNumber.textContent = `${String(this.currentSlide + 1).padStart(2, '0')} / ${String(this.slides.length).padStart(2, '0')}`;
        }
    }

    startAutoplay() {
        if (this.autoplayInterval) return;

        this.autoplayInterval = setInterval(() => {
            this.nextSlide();
        }, 7000); // 7 seconds per slide

        this.updateControlButton();
    }

    pauseAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
    }

    restartAutoplay() {
        if (this.isPlaying) {
            this.pauseAutoplay();
            this.startAutoplay();
        }
    }

    toggleAutoplay() {
        this.isPlaying = !this.isPlaying;

        if (this.isPlaying) {
            this.startAutoplay();
        } else {
            this.pauseAutoplay();
        }

        this.updateControlButton();
    }

    updateControlButton() {
        const controlBtn = this.container.querySelector('.slider-control');
        if (controlBtn) {
            controlBtn.innerHTML = this.isPlaying ? '⏸' : '▶';
            controlBtn.setAttribute('aria-label', this.isPlaying ? 'Pause slider' : 'Play slider');
        }
    }
}

// Initialize slider when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    const heroSliderContainer = document.querySelector('.hero-slider-container');

    if (heroSliderContainer) {
        new HeroSlider(heroSliderContainer);
        console.log('✨ Advanced Hero Slider initialized!');
    }
});

// Parallax effect on mouse move
document.addEventListener('mousemove', (e) => {
    const activeSlide = document.querySelector('.hero-slide.active');
    if (!activeSlide) return;

    const background = activeSlide.querySelector('.slide-background');
    if (!background) return;

    const moveX = (e.clientX / window.innerWidth - 0.5) * 20;
    const moveY = (e.clientY / window.innerHeight - 0.5) * 20;

    background.style.transform = `scale(1.1) translate(${moveX}px, ${moveY}px)`;
});
