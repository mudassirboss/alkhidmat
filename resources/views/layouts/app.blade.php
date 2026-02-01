<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Alkhidmat Foundation Muzaffargarh - Service to Humanity with Integrity">
    <title>@yield('title', $settings['site_title'] ?? 'Alkhidmat Foundation - Service to Humanity')</title>
    
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
    <link rel="stylesheet" href="{{ asset('css/nav-redesign.css') }}">
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
    

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <a href="mailto:info@alkhidmat.org"><i class="fas fa-envelope"></i> info@alkhidmat.org</a>
                <a href="tel:080044448"><i class="fas fa-phone-alt"></i> 0800 44448</a>
            </div>
            <div class="top-bar-right">
                <div class="top-bar-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
                <a href="{{ route('donate.index') }}" class="btn-give-zakat">Give Zakat</a>
                <a href="#" class="btn-partners">International Partners</a>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <!-- Left: Logo & CTA -->
            <div class="header-left">
                <a href="/" class="logo-groups">
                    <img src="{{ asset('logo.png') }}" alt="Alkhidmat Foundation">
                </a>
                <a href="{{ route('donate.index') }}" class="btn-rebuild-gaza">
                    Rebuild Gaza 🚨
                </a>
                <!-- Mobile Toggle -->
                <button class="mobile-toggle-btn" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Center: Navigation -->
            <nav class="nav-center">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link-custom">Appeals <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu-custom">
                            <a href="{{ route('programs.show', 'disaster-management') }}" class="dropdown-item-custom">Disaster Relief</a>
                            <a href="{{ route('programs.show', 'orphan-care') }}" class="dropdown-item-custom">Orphan Care</a>
                            <a href="{{ route('programs.show', 'healthcare') }}" class="dropdown-item-custom">Health Services</a>
                            <a href="{{ route('programs.show', 'education') }}" class="dropdown-item-custom">Education</a>
                            <a href="#" class="dropdown-item-custom">Clean Water</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link-custom">Islamic Giving <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu-custom">
                            <a href="{{ route('donate.index') }}" class="dropdown-item-custom">Pay Zakat</a>
                            <a href="{{ route('donate.index') }}" class="dropdown-item-custom">Sadaqah</a>
                            <a href="{{ route('donate.index') }}" class="dropdown-item-custom">Fitrana</a>
                            <a href="{{ route('donate.index') }}" class="dropdown-item-custom">Fidyah</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link-custom">Our Work <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu-custom">
                            <a href="#programs" class="dropdown-item-custom">Current Projects</a>
                            <a href="#impact" class="dropdown-item-custom">Impact Stories</a>
                            <a href="{{ route('gallery') }}" class="dropdown-item-custom">Media Gallery</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link-custom">Get Involved <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu-custom">
                            <a href="{{ route('volunteer') }}" class="dropdown-item-custom">Become a Volunteer</a>
                            <a href="#" class="dropdown-item-custom">Partnership</a>
                            <a href="#" class="dropdown-item-custom">Careers</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('team') }}" class="nav-link-custom">Our Team</a>
                    </li>
                </ul>
            </nav>

            <!-- Right: Actions -->
            <div class="header-right">
                <a href="{{ route('donate.index') }}" class="btn-donate-red">
                    Donate Now <i class="fas fa-arrow-right"></i>
                </a>
                <div class="basket-icon">
                    <i class="fas fa-shopping-basket"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <!-- Footer -->
    <footer class="site-footer">
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

        <div class="container footer-content">
            <div class="footer-grid">
                <div>
                    <h3 class="footer-title">{{ $settings['site_title'] ?? 'Alkhidmat Foundation Muzaffargarh' }}</h3>
                    <p class="footer-text">Service to Humanity with Integrity since 1990. Serving the people of Muzaffargarh and beyond with dedication to humanitarian welfare.</p>
                </div>
                
                <div>
                    <h4 class="footer-subtitle">Newsletter</h4>
                    <p class="footer-text small">Subscribe to get the latest updates on our relief work.</p>
                    
                    @if(session('success') && !request()->routeIs('contact.*') && !request()->routeIs('volunteer.*')) 
                    <!-- Simple check to avoid conflict, ideally use named bags -->
                    <div class="success-message">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('subscribe') }}" method="POST" class="footer-form">
                        @csrf
                        <input type="email" name="email" placeholder="Your Email" required class="footer-input">
                        <button type="submit" class="footer-btn">Join</button>
                    </form>
                </div>
                
                <div>
                    <h4 class="footer-subtitle">Contact Info</h4>
                    <p class="footer-text">
                        Email: {{ $settings['contact_email'] ?? 'info@alkhidmatmzg.org' }}<br>
                        Phone: {{ $settings['contact_phone'] ?? '+92 3XX XXXXXXX' }}<br>
                        Address: {{ $settings['contact_address'] ?? 'Muzaffargarh, Punjab, Pakistan' }}
                    </p>
                </div>
                
                <div>
                    <h4 class="footer-subtitle">Follow Us</h4>
                    <div class="footer-social">
                        <li class="footer-link-item"><a href="#impact" class="footer-link">Impact</a></li>
                        <li class="footer-link-item"><a href="{{ route('gallery') }}" class="footer-link">Gallery</a></li>
                        <li class="footer-link-item"><a href="#donate" class="footer-link">Donate</a></li>
                        <a href="{{ $settings['social_instagram'] ?? '#' }}" class="social-icon">📸</a>
                        <a href="{{ $settings['social_youtube'] ?? '#' }}" class="social-icon">▶️</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ $settings['site_title'] ?? 'Alkhidmat Foundation Muzaffargarh' }}. All rights reserved.</p>
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
    @yield('scripts')
<script>
    function toggleMenu() {
        // Toggle desktop/mobile menu visibility
        const navMenu = document.querySelector('.nav-menu');
        navMenu.classList.toggle('active');
    }
    
    // Dropdown toggle for mobile
    document.querySelectorAll('.nav-link-custom').forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 1100 && this.nextElementSibling && this.nextElementSibling.classList.contains('dropdown-menu-custom')) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
            }
        });
    });
</script>
</html>
