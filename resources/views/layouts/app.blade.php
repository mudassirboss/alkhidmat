<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Alkhidmat Foundation Muzaffargarh - Service to Humanity with Integrity">
    <title>@yield('title', 'Alkhidmat Foundation - Service to Humanity')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Preload critical images for faster LCP -->
    <link rel="preload" as="image" href="{{ asset('images/slider-education.png') }}" fetchpriority="high">
    
    <!-- Custom CSS (with preload for performance) -->
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <link rel="preload" href="{{ asset('css/phase2-styles.css') }}" as="style">
    <link rel="preload" href="{{ asset('css/animated-backgrounds.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/phase2-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated-backgrounds.css') }}">
    <link rel="stylesheet" href="{{ asset('css/section-dividers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/particles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/floating-shapes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/advanced.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/hero-slider.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/button-fix.css') }}">
    
    @yield('styles')
</head>
<body>
    <!-- Premium Page Loader -->
    <div id="page-loader" style="position: fixed; inset: 0; background: linear-gradient(135deg, #0a1628 0%, #1a2942 100%); z-index: 9999; display: flex; flex-direction: column; align-items: center; justify-content: center; transition: opacity 0.5s ease, visibility 0.5s ease;">
        <!-- Loader Content -->
        <div style="text-align: center;">
            <!-- Animated Logo/Icon -->
            <div style="width: 80px; height: 80px; margin: 0 auto 2rem; position: relative;">
                <div style="position: absolute; inset: 0; border: 4px solid rgba(0, 170, 255, 0.1); border-radius: 50%;"></div>
                <div style="position: absolute; inset: 0; border: 4px solid transparent; border-top-color: #00aaff; border-right-color: #0052A5; border-radius: 50%; animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;"></div>
                <div style="position: absolute; inset: 8px; border: 3px solid transparent; border-top-color: #d4af37; border-radius: 50%; animation: spin 1.8s cubic-bezier(0.5, 0, 0.5, 1) infinite reverse;"></div>
            </div>
            
            <!-- Brand Text -->
            <h2 style="color: #00aaff; font-family: 'Poppins', sans-serif; font-size: clamp(1.25rem, 3.5vw, 1.75rem); font-weight: 700; margin: 0 0 0.5rem 0; letter-spacing: 0.5px;">Alkhidmat Foundation Muzaffargarh</h2>
            <p style="color: rgba(255, 255, 255, 0.7); font-family: 'Inter', sans-serif; font-size: clamp(0.875rem, 2vw, 1rem); margin: 0; letter-spacing: 2px; text-transform: uppercase;">Loading...</p>
            
            <!-- Progress Bar -->
            <div style="width: 200px; height: 3px; background: rgba(255, 255, 255, 0.1); border-radius: 10px; margin: 2rem auto 0; overflow: hidden;">
                <div style="height: 100%; background: linear-gradient(90deg, #00aaff, #0052A5, #d4af37); border-radius: 10px; animation: progress 2s ease-in-out infinite;"></div>
            </div>
        </div>
    </div>

    <!-- Inline Loader Animations -->
    <style>
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes progress {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        #page-loader.loaded {
            opacity: 0;
            visibility: hidden;
        }
    </style>

    <script>
        // Hide loader when page is fully loaded
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('page-loader').classList.add('loaded');
                // Remove from DOM after fade out
                setTimeout(function() {
                    var loader = document.getElementById('page-loader');
                    if (loader) loader.remove();
                }, 500);
            }, 300); // Small delay for smooth experience
        });
        
        // Fallback: hide after 5 seconds even if page hasn't fully loaded
        setTimeout(function() {
            var loader = document.getElementById('page-loader');
            if (loader && !loader.classList.contains('loaded')) {
                loader.classList.add('loaded');
            }
        }, 5000);
    </script>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress"></div>
    
    <!-- Page Loader -->
    <div class="page-loader">
        <img src="{{ asset('logo.png') }}" alt="Loading" class="loader-logo">
    </div>
    <!-- Header/Navigation -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="/" class="logo">
                    <img src="{{ asset('logo.png') }}" alt="Alkhidmat Foundation Muzaffargarh" class="logo-img">
                </a>
                
                <button class="menu-toggle" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <ul class="nav-links">
                    <li><a href="/" class="nav-link">Home</a></li>
                    <li><a href="#programs" class="nav-link">Programs</a></li>
                    <li><a href="#about" class="nav-link">About Us</a></li>
                    <li><a href="#zakat" class="nav-link">Zakat</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                    <li><a href="{{ route('volunteer') }}" class="nav-link">Volunteer</a></li>
                    <li><a href="{{ route('news') }}" class="nav-link">News</a></li>
                    <li>
                        <a href="{{ route('donate.index') }}" class="btn-donate">Donate Now</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <!-- Footer -->
    <footer class="site-footer" style="background: linear-gradient(135deg, #002d5b 0%, #004080 100%); color: white; padding: 80px 0 40px; position: relative; overflow: hidden;">
        <!-- Floating Particles -->
        <div class="particles-container">
            <div class="particle particle-sm particle-white" style="opacity: 0.6;"></div>
            <div class="particle particle-md particle-gold" style="opacity: 0.5;"></div>
            <div class="particle particle-sm particle-white" style="opacity: 0.6;"></div>
            <div class="particle particle-lg particle-gold" style="opacity: 0.5;"></div>
            <div class="particle particle-md particle-white" style="opacity: 0.6;"></div>
            <div class="particle particle-sm particle-gold" style="opacity: 0.5;"></div>
            <div class="particle particle-md particle-white" style="opacity: 0.6;"></div>
            <div class="particle particle-lg particle-gold" style="opacity: 0.5;"></div>
            <div class="particle particle-sm particle-white" style="opacity: 0.6;"></div>
            <div class="particle particle-md particle-gold" style="opacity: 0.5;"></div>
            <div class="particle particle-lg particle-white" style="opacity: 0.6;"></div>
            <div class="particle particle-sm particle-gold" style="opacity: 0.5;"></div>
        </div>

        <!-- Background Shapes -->
        <div class="shapes-background">
            <div class="floating-shape shape-circle shape-lg theme-blue pos-1" data-speed="0.1" style="opacity: 0.15; background: rgba(255,255,255,0.05);"></div>
            <div class="floating-shape shape-hexagon shape-xl theme-gold pos-2" data-speed="0.15" style="opacity: 0.12; background: rgba(212, 175, 55, 0.1);"></div>
            <div class="floating-shape shape-blob shape-md theme-blue pos-8" data-speed="0.2" style="opacity: 0.15; background: rgba(255,255,255,0.05);"></div>
        </div>

        <div class="container" style="position: relative; z-index: 2;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-xl); margin-bottom: var(--space-xl);">
                <div>
                    <h3 style="color: var(--accent-gold); margin-bottom: var(--space-md);">Alkhidmat Foundation Muzaffargarh</h3>
                    <p style="color: #e0e0e0; line-height: 1.8;">Service to Humanity with Integrity since 1990. Serving the people of Muzaffargarh and beyond with dedication to humanitarian welfare.</p>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: var(--space-md);">Quick Links</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: var(--space-xs);"><a href="#programs" style="color: #e0e0e0; text-decoration: none; transition: color 0.3s;">Programs</a></li>
                        <li style="margin-bottom: var(--space-xs);"><a href="#about" style="color: #e0e0e0; text-decoration: none; transition: color 0.3s;">About Us</a></li>
                        <li style="margin-bottom: var(--space-xs);"><a href="#impact" style="color: #e0e0e0; text-decoration: none; transition: color 0.3s;">Impact</a></li>
                        <li style="margin-bottom: var(--space-xs);"><a href="#donate" style="color: #e0e0e0; text-decoration: none; transition: color 0.3s;">Donate</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: var(--space-md);">Contact Info</h4>
                    <p style="color: #e0e0e0; line-height: 1.8;">
                        Email: muzaffargarh@alkhidmat.org<br>
                        Phone: +92-XXX-XXXXXXX<br>
                        Address: Muzaffargarh, Punjab, Pakistan
                    </p>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: var(--space-md);">Follow Us</h4>
                    <div style="display: flex; gap: var(--space-md);">
                        <a href="#" style="color: white; font-size: 1.5rem; transition: transform 0.3s;">📘</a>
                        <a href="#" style="color: white; font-size: 1.5rem; transition: transform 0.3s;">🐦</a>
                        <a href="#" style="color: white; font-size: 1.5rem; transition: transform 0.3s;">📸</a>
                        <a href="#" style="color: white; font-size: 1.5rem; transition: transform 0.3s;">▶️</a>
                    </div>
                </div>
            </div>
            
            <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: var(--space-md); text-align: center; color: #a0a0a0;">
                <p>&copy; 2026 Alkhidmat Foundation Muzaffargarh. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript (with defer for performance) -->
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/stats-counter.js') }}"></script>
    <script defer src="{{ asset('js/advanced.js') }}"></script>
    <script defer src="{{ asset('js/hero-slider.js') }}"></script>
    <script defer src="{{ asset('js/image-optimizer.js') }}"></script>
    <script defer src="{{ asset('js/floating-shapes.js') }}"></script>
    <script defer src="{{ asset('js/parallax.js') }}"></script>
    @yield('scripts')
</body>
</html>
