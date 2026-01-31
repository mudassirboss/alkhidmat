// ============================================
// Main Application Entry Point
// Consolidated for Vite bundling
// ============================================

// Import all CSS
import '../css/app.css';
import '../css/phase2-styles.css';
import '../css/advanced.css';
import '../css/hero-slider.css';

// Import all JavaScript modules
import './app-core.js';
import './stats-counter.js';
import './advanced.js';
import './hero-slider.js';

// Service Worker Registration for PWA capabilities
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').then(
            (registration) => {
                console.log('✅ ServiceWorker registered:', registration.scope);
            },
            (error) => {
                console.log('❌ ServiceWorker registration failed:', error);
            }
        );
    });
}

// Performance optimization: Lazy load images
document.addEventListener('DOMContentLoaded', () => {
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');

    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    }
});

console.log('🚀 Alkhidmat Foundation - Optimized Build');
