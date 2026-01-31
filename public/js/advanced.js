// ============================================
// Advanced Features JavaScript
// ============================================

// Testimonial Slider
class TestimonialSlider {
    constructor() {
        this.currentSlide = 0;
        this.slides = document.querySelectorAll('.testimonial-slide');
        this.dots = document.querySelectorAll('.slider-dot');
        this.track = document.querySelector('.testimonial-track');

        if (this.slides.length > 0) {
            this.init();
        }
    }

    init() {
        // Auto-play
        setInterval(() => this.nextSlide(), 5000);

        // Dot navigation
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
        });
    }

    goToSlide(index) {
        this.currentSlide = index;
        this.track.style.transform = `translateX(-${index * 100}%)`;
        this.updateDots();
    }

    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.goToSlide(this.currentSlide);
    }

    updateDots() {
        this.dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentSlide);
        });
    }
}

// Scroll Progress Bar
function updateScrollProgress() {
    const progressBar = document.querySelector('.scroll-progress');
    if (!progressBar) return;

    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    progressBar.style.width = scrolled + '%';
}

// Newsletter Form Submission
function handleNewsletterSubmit(event) {
    event.preventDefault();
    const email = event.target.querySelector('.newsletter-input').value;

    // Simple validation
    if (email && email.includes('@')) {
        alert(`Thank you for subscribing with: ${email}\nYou'll receive updates about our humanitarian work.`);
        event.target.reset();
    } else {
        alert('Please enter a valid email address');
    }
}

// Floating Donate Button Visibility
function handleFloatingDonate() {
    const floatingBtn = document.querySelector('.floating-donate');
    if (!floatingBtn) return;

    if (window.scrollY > 300) {
        floatingBtn.style.opacity = '1';
        floatingBtn.style.pointerEvents = 'auto';
    } else {
        floatingBtn.style.opacity = '0';
        floatingBtn.style.pointerEvents = 'none';
    }
}

// Page Loader
function hidePageLoader() {
    const loader = document.querySelector('.page-loader');
    if (loader) {
        setTimeout(() => {
            loader.classList.add('loaded');
        }, 500);
    }
}

// Advanced Scroll Animations with Stagger
function staggerReveal() {
    const elements = document.querySelectorAll('.reveal:not(.active)');

    elements.forEach((element, index) => {
        const rect = element.getBoundingClientRect();
        const isVisible = rect.top < window.innerHeight - 100;

        if (isVisible) {
            setTimeout(() => {
                element.classList.add('active');
            }, index * 100); // Stagger delay
        }
    });
}

// Zakat Calculator Logic
function initZakatCalculator() {
    const inputs = document.querySelectorAll('.calc-input');
    const totalDisplay = document.getElementById('zakat-total');

    if (!totalDisplay) return;

    const calculate = () => {
        let totalAssets = 0;
        inputs.forEach(input => {
            totalAssets += parseFloat(input.value) || 0;
        });

        // 2.5% Zakat calculation
        const zakatDue = totalAssets * 0.025;

        // Animated counter for result
        animateValue(totalDisplay, parseFloat(totalDisplay.innerText.replace(/,/g, '')) || 0, zakatDue, 500);
    };

    inputs.forEach(input => {
        input.addEventListener('input', calculate);
    });
}

function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const value = Math.floor(progress * (end - start) + start);
        obj.innerHTML = value.toLocaleString();
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

// Mobile Menu Toggle
function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    const menuToggle = document.querySelector('.menu-toggle');
    if (navLinks) {
        navLinks.classList.toggle('active');
        menuToggle.classList.toggle('active');

        // Prevent scroll when menu is open
        document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : 'auto';
    }
}

// Theme Toggle (Dark Mode)
function toggleTheme() {
    document.body.classList.toggle('dark-theme');
    const isDark = document.body.classList.contains('dark-theme');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    console.log(`🌙 Theme set to: ${isDark ? 'dark' : 'light'}`);
}

// Load saved theme
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    document.body.classList.add('dark-theme');
}

// Initialize Advanced Features
document.addEventListener('DOMContentLoaded', () => {
    // Initialize testimonial slider
    new TestimonialSlider();

    // Initialize Zakat calculator
    initZakatCalculator();

    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', handleNewsletterSubmit);
    }

    // Scroll events
    window.addEventListener('scroll', () => {
        updateScrollProgress();
        handleFloatingDonate();
        staggerReveal();
    });

    // Hide page loader
    hidePageLoader();

    // Initial stagger reveal
    staggerReveal();

    console.log('✨ Advanced features initialized!');
});

// Add smooth page transitions
window.addEventListener('beforeunload', () => {
    document.body.style.opacity = '0';
});
