/**
 * Scroll-Interactive Floating Shapes
 * Adds parallax effect to floating shapes based on scroll position
 */

class FloatingShapesController {
    constructor() {
        this.shapes = [];
        this.ticking = false;
        this.init();
    }

    init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.setup());
        } else {
            this.setup();
        }
    }

    setup() {
        // Find all shape containers
        const shapeContainers = document.querySelectorAll('.shapes-background');

        if (shapeContainers.length === 0) return;

        // Collect all shapes with their initial positions
        shapeContainers.forEach(container => {
            const shapes = container.querySelectorAll('.floating-shape');
            shapes.forEach(shape => {
                const speed = parseFloat(shape.dataset.speed) || 0.3;
                this.shapes.push({
                    element: shape,
                    speed: speed,
                    initialTop: shape.offsetTop,
                    initialLeft: shape.offsetLeft
                });
            });
        });

        // Add scroll listener
        window.addEventListener('scroll', () => this.onScroll(), { passive: true });

        // Initial update
        this.updateShapes();
    }

    onScroll() {
        if (!this.ticking) {
            window.requestAnimationFrame(() => {
                this.updateShapes();
                this.ticking = false;
            });
            this.ticking = true;
        }
    }

    updateShapes() {
        const scrollY = window.pageYOffset;

        this.shapes.forEach(({ element, speed }) => {
            // Get element's position relative to viewport
            const rect = element.getBoundingClientRect();
            const elementTop = rect.top + scrollY;

            // Calculate parallax offset
            const offset = (scrollY - elementTop) * speed;

            // Apply transform
            element.style.transform = `translateY(${offset}px)`;
        });
    }
}

// Initialize when DOM is ready
if (typeof window !== 'undefined') {
    new FloatingShapesController();
}
