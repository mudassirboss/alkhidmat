<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Alkhidmat Foundation Muzaffargarh - Service to Humanity with Integrity">
    <title>@yield('title', 'Alkhidmat Foundation - Service to Humanity')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/advanced.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hero-slider.css') }}">
    
    @yield('styles')
</head>
<body>
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
                    <li class="nav-extra">
                        <select class="lang-selector" onchange="window.location.hash = this.value">
                            <option value="en">English</option>
                            <option value="ur">اردو</option>
                        </select>
                        <button class="theme-toggle" onclick="toggleTheme()" aria-label="Toggle Dark Mode">🌓</button>
                    </li>
                    <li><a href="#donate" class="btn-donate-nav">Donate Now</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer style="background: var(--neutral-dark); color: white; padding: var(--space-3xl) 0 var(--space-lg);">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-xl); margin-bottom: var(--space-xl);">
                <div>
                    <h3 style="color: var(--accent-gold); margin-bottom: var(--space-md);">Alkhidmat Foundation Muzaffargarh</h3>
                    <p style="color: #ccc; line-height: 1.8;">Service to Humanity with Integrity since 1990. Serving the people of Muzaffargarh and beyond with dedication to humanitarian welfare.</p>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: var(--space-md);">Quick Links</h4>
                    <ul style="list-style: none;">
                        <li style="margin-bottom: var(--space-xs);"><a href="#programs" style="color: #ccc; text-decoration: none;">Programs</a></li>
                        <li style="margin-bottom: var(--space-xs);"><a href="#about" style="color: #ccc; text-decoration: none;">About Us</a></li>
                        <li style="margin-bottom: var(--space-xs);"><a href="#impact" style="color: #ccc; text-decoration: none;">Impact</a></li>
                        <li style="margin-bottom: var(--space-xs);"><a href="#donate" style="color: #ccc; text-decoration: none;">Donate</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: var(--space-md);">Contact Info</h4>
                    <p style="color: #ccc; line-height: 1.8;">
                        Email: muzaffargarh@alkhidmat.org<br>
                        Phone: +92-XXX-XXXXXXX<br>
                        Address: Muzaffargarh, Punjab, Pakistan
                    </p>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: var(--space-md);">Follow Us</h4>
                    <div style="display: flex; gap: var(--space-md);">
                        <a href="#" style="color: white; font-size: 1.5rem;">📘</a>
                        <a href="#" style="color: white; font-size: 1.5rem;">🐦</a>
                        <a href="#" style="color: white; font-size: 1.5rem;">📸</a>
                        <a href="#" style="color: white; font-size: 1.5rem;">▶️</a>
                    </div>
                </div>
            </div>
            
            <div style="border-top: 1px solid #444; padding-top: var(--space-md); text-align: center; color: #888;">
                <p>&copy; 2026 Alkhidmat Foundation Muzaffargarh. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/advanced.js') }}"></script>
    <script src="{{ asset('js/hero-slider.js') }}"></script>
    @yield('scripts')
</body>
</html>
