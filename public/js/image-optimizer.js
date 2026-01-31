// ============================================
// Image Lazy Loading & Optimization
// ============================================

document.addEventListener('DOMContentLoaded', () => {
    // Native lazy loading fallback for older browsers
    if ('loading' in HTMLImageElement.prototype) {
        console.log('✅ Native lazy loading supported');
    } else {
        // Fallback for browsers that don't support loading="lazy"
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');

        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                        }
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => imageObserver.observe(img));
        }
    }

    // Preload critical images (hero slider)
    const criticalImages = document.querySelectorAll('.hero-slide img');
    criticalImages.forEach((img, index) => {
        if (index === 0) {
            // First image loads immediately
            img.setAttribute('loading', 'eager');
            img.setAttribute('fetchpriority', 'high');
        }
    });

    // Add fade-in effect when images load
    const allImages = document.querySelectorAll('img[loading="lazy"]');
    allImages.forEach(img => {
        if (img.complete) {
            img.classList.add('loaded');
        } else {
            img.addEventListener('load', function () {
                this.classList.add('loaded');
            });
        }
    });
});

// Optimize image quality based on connection speed
if ('connection' in navigator) {
    const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
    if (connection) {
        const effectiveType = connection.effectiveType;
        console.log(`📶 Connection speed: ${effectiveType}`);

        // On slow connections, you could load lower quality images
        if (effectiveType === 'slow-2g' || effectiveType === '2g') {
            document.documentElement.classList.add('slow-connection');
            console.log('⚠️ Slow connection detected - optimizing image loading');
        }
    }
}

console.log('🖼️ Image optimization loaded');
