// Parallax Scrolling Effect for Background Elements
document.addEventListener('DOMContentLoaded', function () {
    // Get all parallax elements
    const parallaxElements = document.querySelectorAll('.parallax-bg, .floating-shapes, .gradient-orb');

    // Throttle function for better performance
    function throttle(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Handle scroll for parallax effect
    function handleParallaxScroll() {
        const scrolled = window.pageYOffset;

        parallaxElements.forEach((element, index) => {
            // Different speeds for different elements
            const speed = 0.3 + (index * 0.1);
            const yPos = -(scrolled * speed);

            // Apply transform
            element.style.transform = `translate3d(0, ${yPos}px, 0)`;
        });
    }

    // Optimized scroll handler
    const throttledScroll = throttle(handleParallaxScroll, 10);

    // Only add scroll listener if user hasn't requested reduced motion
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        window.addEventListener('scroll', throttledScroll, { passive: true });
    }

    // Intersection Observer for performance
    // Only animate elements when they're visible
    const observerOptions = {
        root: null,
        rootMargin: '50px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe all animated background sections
    document.querySelectorAll('.hero-bg-animated, .programs-bg-animated, .stats-bg-animated').forEach(section => {
        observer.observe(section);
    });
});

// Add floating particles dynamically
function addFloatingParticles(container, count = 10) {
    const particlesContainer = document.createElement('div');
    particlesContainer.className = 'particles';

    for (let i = 0; i < count; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particlesContainer.appendChild(particle);
    }

    container.appendChild(particlesContainer);
}

// Initialize particles on page load
document.addEventListener('DOMContentLoaded', function () {
    const heroSection = document.querySelector('.hero');
    const statsSection = document.querySelector('.stats');

    if (heroSection && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        addFloatingParticles(heroSection, 10);
    }

    if (statsSection && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        addFloatingParticles(statsSection, 8);
    }
});
