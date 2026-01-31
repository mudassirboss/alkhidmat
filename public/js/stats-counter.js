// ============================================
// Advanced Stats Counter with Particle Effects
// ============================================

class AdvancedStatsCounter {
    constructor() {
        this.counters = document.querySelectorAll('.stat-number');
        this.hasAnimated = new Set();
        this.init();
    }

    init() {
        // Add particle containers
        this.addParticleContainers();

        // Setup intersection observer
        const options = {
            threshold: 0.3,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !this.hasAnimated.has(entry.target)) {
                    this.animateCounter(entry.target);
                    this.createParticles(entry.target.closest('.stat-card'));
                    this.hasAnimated.add(entry.target);
                }
            });
        }, options);

        this.counters.forEach(counter => observer.observe(counter));
    }

    addParticleContainers() {
        document.querySelectorAll('.stat-card').forEach(card => {
            if (!card.querySelector('.stat-particles')) {
                const particleContainer = document.createElement('div');
                particleContainer.className = 'stat-particles';
                card.appendChild(particleContainer);
            }
        });
    }

    animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2500; // 2.5 seconds
        const startTime = performance.now();

        // Easing function (easeOutExpo)
        const easeOutExpo = (t) => t === 1 ? 1 : 1 - Math.pow(2, -10 * t);

        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeOutExpo(progress);
            const currentValue = Math.floor(easedProgress * target);

            element.textContent = currentValue.toLocaleString();

            // Add pulsing effect during animation
            const scale = 1 + (Math.sin(progress * Math.PI * 4) * 0.05);
            element.style.transform = `scale(${scale})`;

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString();
                element.style.transform = 'scale(1)';
            }
        };

        requestAnimationFrame(updateCounter);
    }

    createParticles(card) {
        const particleContainer = card.querySelector('.stat-particles');
        if (!particleContainer) return;

        const particleCount = 30;

        for (let i = 0; i < particleCount; i++) {
            setTimeout(() => {
                this.createSingleParticle(particleContainer);
            }, i * 50);
        }
    }

    createSingleParticle(container) {
        const particle = document.createElement('div');
        const size = Math.random() * 4 + 2;
        const startX = Math.random() * 100;
        const endX = startX + (Math.random() - 0.5) * 50;
        const duration = Math.random() * 2 + 1;

        particle.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            background: radial-gradient(circle, rgba(0, 170, 255, 0.8) 0%, rgba(0, 82, 165, 0.4) 100%);
            border-radius: 50%;
            left: ${startX}%;
            bottom: 0;
            pointer-events: none;
            box-shadow: 0 0 10px rgba(0, 170, 255, 0.6);
            animation: particleFloat ${duration}s ease-out forwards;
        `;

        const keyframes = `
            @keyframes particleFloat {
                0% {
                    transform: translateY(0) translateX(0) scale(1);
                    opacity: 1;
                }
                100% {
                    transform: translateY(-200px) translateX(${endX - startX}%) scale(0);
                    opacity: 0;
                }
            }
        `;

        // Inject keyframes
        if (!document.getElementById('particleFloatStyle')) {
            const style = document.createElement('style');
            style.id = 'particleFloatStyle';
            style.textContent = keyframes;
            document.head.appendChild(style);
        }

        container.appendChild(particle);

        // Remove particle after animation
        setTimeout(() => {
            particle.remove();
        }, duration * 1000);
    }
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        new AdvancedStatsCounter();
    });
} else {
    new AdvancedStatsCounter();
}
