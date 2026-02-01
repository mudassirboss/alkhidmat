/* ============================================
   Team Page Scripts
   ============================================ */

document.addEventListener('DOMContentLoaded', function () {

    // 1. Text Reveal Animation
    const revealElements = document.querySelectorAll('.reveal-text');
    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 1s ease, transform 1s ease';
    });

    setTimeout(() => {
        revealElements.forEach((el, index) => {
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 200);
        });
    }, 300);

    // 2. Initialize Particles (Mockup if library not present, or basic custom)
    // Checking if particlesJS is loaded, if not, create simple CSS particles
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-js', {
            "particles": {
                "number": { "value": 80 },
                "color": { "value": "#ffffff" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.5 },
                "size": { "value": 3, "random": true },
                "move": { "enable": true, "speed": 2 }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": { "onhover": { "enable": true, "mode": "repulse" } }
            }
        });
    } else {
        // Fallback or verify implementation
        console.log('Particles.js not found, skipping specific init');
    }

    // 3. Staggered Card Animation on Scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const cards = document.querySelectorAll('.team-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        // Stagger delay based on index within its level container could be complex to calc dynamically, 
        // relying on observer to trigger as they come into view or simple delay if all in view.
        observer.observe(card);
    });
});
