@extends('layouts.app')

@section('title', 'Alkhidmat Foundation - Service to Humanity with Integrity')

@section('content')
<!-- Advanced Hero Slider -->
<div class="hero-slider-container">
    
    <div class="hero-slider">
        <!-- Slide 1: Welcome / Main -->
        <div class="hero-slide active">
            <div class="slide-background kenburns" style="background-image: url('{{ asset('images/slider-humanitarian.png') }}');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <div class="container">
                    <div class="slide-text">
                        <h1 class="slide-title">Service to Humanity with Integrity</h1>
                        <p class="slide-subtitle">Alkhidmat Foundation Muzaffargarh - Transforming lives since 1990 through compassion, dedication, and humanitarian service across Pakistan.</p>
                        <div class="slide-cta">
                            <a href="#donate" class="btn btn-primary">Donate Now</a>
                            <a href="#programs" class="btn btn-secondary">Explore Programs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide 2: Education -->
        <div class="hero-slide">
            <div class="slide-background kenburns" style="background-image: url('{{ asset('images/slider-education.png') }}');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <div class="container">
                    <div class="slide-text">
                        <h1 class="slide-title">Empowering Through Education</h1>
                        <p class="slide-subtitle">60 schools nationwide • 1,569 scholarships awarded • Bano Qabil IT training transforming futures</p>
                        <div class="slide-cta">
                            <a href="#programs" class="btn btn-primary">Support Education</a>
                            <a href="#" class="btn btn-secondary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide 3: Healthcare -->
        <div class="hero-slide">
            <div class="slide-background kenburns" style="background-image: url('{{ asset('images/slider-medical.png') }}');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <div class="container">
                    <div class="slide-text">
                        <h1 class="slide-title">Healing with Compassion</h1>
                        <p class="slide-subtitle">57 hospitals • 296 ambulances • Free medical care for those who need it most in Muzaffargarh and beyond</p>
                        <div class="slide-cta">
                            <a href="#donate" class="btn btn-primary">Support Healthcare</a>
                            <a href="#" class="btn btn-secondary">Our Clinics</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide 4: Clean Water -->
        <div class="hero-slide">
            <div class="slide-background kenburns" style="background-image: url('{{ asset('images/slider-water.png') }}');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <div class="container">
                    <div class="slide-text">
                        <h1 class="slide-title">Clean Water, Healthy Lives</h1>
                        <p class="slide-subtitle">25,809 water projects completed • Solar-powered wells • Bringing safe drinking water to rural communities</p>
                        <div class="slide-cta">
                            <a href="#donate" class="btn btn-primary">Fund a Well</a>
                            <a href="#" class="btn btn-secondary">WASH Projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Controls -->
        <button class="slider-nav slider-nav-prev" aria-label="Previous slide">‹</button>
        <button class="slider-nav slider-nav-next" aria-label="Next slide">›</button>
        
        <!-- Pagination Dots -->
        <div class="slider-pagination">
            <span class="slider-dot active"></span>
            <span class="slider-dot"></span>
            <span class="slider-dot"></span>
            <span class="slider-dot"></span>
        </div>
        
        <!-- Slide Number -->
        <div class="slide-number">01 / 04</div>
        
        <!-- Play/Pause Control -->
        <button class="slider-control" aria-label="Pause slider">⏸</button>
        
        <!-- Mobile Swipe Indicator -->
        <div class="swipe-indicator">Swipe to explore →</div>
    </div>
    
    <!-- Slant Divider Bottom of Hero -->
    <div class="slant-divider bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <polygon fill="#e8f4ff" points="0,0 1200,120 0,120"></polygon>
        </svg>
    </div>
</div>

<!-- Stats Counter Section -->
<section class="stats stats-enhanced section-with-divider">
    <!-- Floating Particles -->
    <div class="particles-container">
        <div class="particle particle-sm particle-blue"></div>
        <div class="particle particle-md particle-blue"></div>
        <div class="particle particle-sm particle-gold"></div>
        <div class="particle particle-lg particle-blue"></div>
        <div class="particle particle-md particle-white"></div>
        <div class="particle particle-sm particle-blue"></div>
        <div class="particle particle-md particle-gold"></div>
        <div class="particle particle-lg particle-white"></div>
        <div class="particle particle-sm particle-blue"></div>
        <div class="particle particle-md particle-blue"></div>
        <div class="particle particle-sm particle-gold"></div>
        <div class="particle particle-lg particle-blue"></div>
        <div class="particle particle-md particle-white"></div>
        <div class="particle particle-sm particle-blue"></div>
        <div class="particle particle-md particle-gold"></div>
        <div class="particle particle-lg particle-blue"></div>
        <div class="particle particle-sm particle-white"></div>
        <div class="particle particle-md particle-blue"></div>
        <div class="particle particle-sm particle-gold"></div>
        <div class="particle particle-lg particle-blue"></div>
    </div>
    
    <!-- Floating Shapes -->
    <div class="shapes-background">
        <div class="floating-shape shape-circle shape-md theme-blue pos-1" data-speed="0.2"></div>
        <div class="floating-shape shape-blob shape-lg theme-mixed-1 pos-2" data-speed="0.15"></div>
        <div class="floating-shape shape-hexagon shape-sm theme-gold pos-3" data-speed="0.25"></div>
        <div class="floating-shape shape-circle shape-xl theme-blue pos-4" data-speed="0.1"></div>
        <div class="floating-shape shape-square shape-md theme-gold pos-5" data-speed="0.3"></div>
    </div>
    
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card reveal">
                <div class="stat-number" data-target="24640000">0</div>
                <div class="stat-label">Lives Impacted in 2025</div>
            </div>
            
            <div class="stat-card reveal">
                <div class="stat-number" data-target="34113">0</div>
                <div class="stat-label">Orphans Sponsored</div>
            </div>
            
            <div class="stat-card reveal">
                <div class="stat-number" data-target="57">0</div>
                <div class="stat-label">Hospitals</div>
            </div>
            
            <div class="stat-card reveal">
                <div class="stat-number" data-target="25809">0</div>
                <div class="stat-label">Water Projects</div>
            </div>
            
            <div class="stat-card reveal">
                <div class="stat-number" data-target="296">0</div>
                <div class="stat-label">Ambulances</div>
            </div>
            
            <div class="stat-card reveal">
                <div class="stat-number" data-target="80000">0</div>
                <div class="stat-label">Volunteers</div>
            </div>
        </div>
    </div>
    
    <!-- Tilt Divider Bottom -->
    <div class="tilt-divider bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <polygon fill="#ffffff" points="0,0 1200,0 0,120"></polygon>
        </svg>
    </div>
</section>

<!-- Programs Section -->
<section id="programs" class="programs programs-enhanced section-with-divider">
    <!-- Floating Shapes -->
    <div class="shapes-background">
        <div class="floating-shape shape-square shape-lg theme-gray pos-2" data-speed="0.2"></div>
        <div class="floating-shape shape-circle shape-md theme-blue pos-4" data-speed="0.25"></div>
        <div class="floating-shape shape-blob shape-xl theme-mixed-2 pos-6" data-speed="0.15"></div>
        <div class="floating-shape shape-hexagon shape-sm theme-gray pos-8" data-speed="0.3"></div>
        <div class="floating-shape shape-circle shape-lg theme-gold pos-9" data-speed="0.18"></div>
    </div>
    
    <div class="container">
        <h2 class="section-title reveal">Our Programs</h2>
        <p class="section-subtitle reveal">Comprehensive humanitarian services addressing critical needs across Pakistan</p>
        
        <div class="programs-grid">
            <!-- Orphan Care -->
            <div class="program-card reveal">
                <img src="{{ asset('orphan_care_service_1769859431570.png') }}" alt="Orphan Care" class="program-img">
                <div class="program-content">
                    <h3 class="program-title">Orphan Care (Aghosh)</h3>
                    <p class="program-desc">Providing love, shelter, education, and a bright future for orphaned children through our Aghosh Homes program.</p>
                    <a href="#" class="program-link">Learn More →</a>
                </div>
            </div>
            
            <!-- Health Services -->
            <div class="program-card reveal">
                <img src="{{ asset('health_services_1769859459650.png') }}" alt="Health Services" class="program-img">
                <div class="program-content">
                    <h3 class="program-title">Health Services</h3>
                    <p class="program-desc">Hospitals, medical centers, mobile clinics, and free healthcare for those who need it most across Pakistan.</p>
                    <a href="#" class="program-link">Learn More →</a>
                </div>
            </div>
            
            <!-- Education -->
            <div class="program-card reveal">
                <img src="{{ asset('education_program_1769859479050.png') }}" alt="Education" class="program-img">
                <div class="program-content">
                    <h3 class="program-title">Education</h3>
                    <p class="program-desc">Schools, scholarships, vocational training, and the Bano Qabil IT program empowering youth with skills.</p>
                    <a href="#" class="program-link">Learn More →</a>
                </div>
            </div>
            
            <!-- Disaster Relief -->
            <div class="program-card reveal">
                <img src="{{ asset('hero_humanitarian_work_1769859411641.png') }}" alt="Disaster Management" class="program-img">
                <div class="program-content">
                    <h3 class="program-title">Disaster Management</h3>
                    <p class="program-desc">Rapid response to emergencies, providing relief, rescue operations, and rehabilitation for affected communities.</p>
                    <a href="#" class="program-link">Learn More →</a>
                </div>
            </div>
            
            <!-- Clean Water -->
            <div class="program-card reveal">
                <div class="program-img" style="background: linear-gradient(135deg, #0052A5 0%, #003875 100%); display: flex; align-items: center; justify-content: center; font-size: 4rem;">💧</div>
                <div class="program-content">
                    <h3 class="program-title">Clean Water (WASH)</h3>
                    <p class="program-desc">Over 25,000 water projects providing safe drinking water through wells, filtration plants, and solar pumps across Pakistan.</p>
                    <a href="#" class="program-link">Learn More →</a>
                </div>
            </div>
            
            <!-- Microfinance -->
            <div class="program-card reveal">
                <div class="program-img" style="background: linear-gradient(135deg, #d4af37 0%, #b8941f 100%); display: flex; align-items: center; justify-content: center; font-size: 4rem;">💰</div>
                <div class="program-content">
                    <h3 class="program-title">Microfinance (Mawakhat)</h3>
                    <p class="program-desc">Interest-free loans helping families achieve financial sustainability and break the cycle of poverty.</p>
                    <a href="#" class="program-link">Learn More →</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Wave Divider Bottom -->
    <div class="wave-divider bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path fill="#f8f9fa" d="M0,0 Q300,120 600,60 T1200,0 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- Leadership Section -->
<section class="leadership leadership-enhanced section-with-divider">
    <!-- Floating Shapes -->
    <div class="shapes-background">
        <div class="floating-shape shape-blob shape-lg theme-gray pos-1" data-speed="0.2"></div>
        <div class="floating-shape shape-hexagon shape-md theme-blue pos-3" data-speed="0.22"></div>
        <div class="floating-shape shape-circle shape-xl theme-mixed-1 pos-5" data-speed="0.12"></div>
        <div class="floating-shape shape-square shape-sm theme-gray pos-7" data-speed="0.28"></div>
        <div class="floating-shape shape-blob shape-md theme-gold pos-10" data-speed="0.25"></div>
    </div>
    
    <div class="container">
        <h2 class="section-title reveal">Our Leadership</h2>
        <p class="section-subtitle reveal">Guidance and inspiration from the visionaries behind our mission</p>
        
        <div class="leadership-grid">
            <!-- Founder -->
            <div class="leader-card reveal">
                <img src="{{ asset('images/founder-portrait.png') }}" alt="Founder" class="leader-img" loading="lazy" decoding="async">
                <h3 class="leader-name">Abdur Shakoor</h3>
                <p class="leader-title">Founder</p>
                <p class="leader-quote">"Service to humanity is the highest form of worship. We are committed to reaching every soul in need across Pakistan."</p>
            </div>
            
            <!-- Chairman -->
            <div class="leader-card reveal">
                <img src="{{ asset('images/chairman-portrait.png') }}" alt="Chairman" class="leader-img" loading="lazy" decoding="async">
                <h3 class="leader-name">Dr. Hafeez ur Rehman</h3>
                <p class="leader-title">Chairman</p>
                <p class="leader-quote">"Integrity and transparency are the pillars of Alkhidmat. We ensure your trust transforms into real impact on the ground."</p>
            </div>
        </div>
    </div>
    
    <!-- Arrow Divider Bottom -->
    <div class="arrow-divider bottom">
        <svg viewBox="0 0 1200 80" preserveAspectRatio="none">
            <polygon fill="#fffaf0" points="0,0 600,80 1200,0 1200,80 0,80"></polygon>
        </svg>
    </div>
</section>

<!-- Media Gallery -->
<section class="gallery gallery-enhanced section-with-divider">
    <!-- Floating Shapes -->
    <div class="shapes-background">
        <div class="floating-shape shape-circle shape-lg theme-gold pos-2" data-speed="0.18"></div>
        <div class="floating-shape shape-square shape-md theme-gold pos-4" data-speed="0.25"></div>
        <div class="floating-shape shape-blob shape-xl theme-mixed-2 pos-6" data-speed="0.15"></div>
        <div class="floating-shape shape-hexagon shape-sm theme-gold pos-8" data-speed="0.3"></div>
        <div class="floating-shape shape-circle shape-md theme-gold pos-9" data-speed="0.22"></div>
    </div>
    
    <div class="container">
        <h2 class="section-title reveal">Impact in Pictures</h2>
        <p class="section-subtitle reveal">Visualizing our humanitarian footprint in Muzaffargarh and beyond</p>
        
        <div class="gallery-grid">
            <div class="gallery-item reveal">
                <img src="{{ asset('images/gallery-aid-distribution.png') }}" alt="Aid Distribution" loading="lazy" decoding="async">
                <div class="gallery-overlay">Food Package Distribution in Muzaffargarh</div>
            </div>
            <div class="gallery-item reveal">
                <img src="{{ asset('images/gallery-medical-camp.png') }}" alt="Medical Camp" loading="lazy" decoding="async">
                <div class="gallery-overlay">Free Medical Clinic for Rural Communities</div>
            </div>
            <div class="gallery-item reveal">
                <img src="{{ asset('images/slider-education.png') }}" alt="Education Impact" loading="lazy" decoding="async">
                <div class="gallery-overlay">Empowering the Next Generation</div>
            </div>
            <div class="gallery-item reveal">
                <img src="{{ asset('images/slider-water.png') }}" alt="Clean Water Project" loading="lazy" decoding="async">
                <div class="gallery-overlay">Bringing Clean Water to Every Village</div>
            </div>
            <div class="gallery-item reveal">
                <img src="{{ asset('images/gallery-orphan-care.png') }}" alt="Orphan Care" loading="lazy" decoding="async">
                <div class="gallery-overlay">Empowering orphans with education and hope</div>
            </div>
            <div class="gallery-item reveal">
                <img src="{{ asset('images/gallery-disaster-relief.png') }}" alt="Disaster Relief" loading="lazy" decoding="async">
                <div class="gallery-overlay">Emergency aid during floods and disasters</div>
            </div>
        </div>
    </div>
</section>


<!-- Mission Section -->
<section id="about" style="padding: var(--space-3xl) 0; background: white;">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-xl); align-items: center;">
            <div class="reveal">
                <h2 style="font-size: 2.5rem; margin-bottom: var(--space-md); background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Our Mission</h2>
                <p style="color: var(--neutral-gray); line-height: 1.8; margin-bottom: var(--space-md);">
                    Since 1990, Alkhidmat Foundation Muzaffargarh has been the leading nonprofit organization fully dedicated to humanitarian services. We are a network of community leaders - committed volunteers, donors, and partners - working tirelessly to transform lives across Muzaffargarh and Pakistan.
                </p>
                <p style="color: var(--neutral-gray); line-height: 1.8;">
                    We improve the lives of the world's poorest and most vulnerable people, especially orphans and widows, through comprehensive relief, development, and community work guided by our principle: <strong style="color: var(--primary-blue);">Service to Humanity with Integrity</strong>.
                </p>
            </div>
            
            <div class="reveal" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-md);">
                <div style="background: var(--gradient-primary); color: white; padding: var(--space-lg); border-radius: 16px; text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: var(--space-xs);">36+</div>
                    <div style="opacity: 0.9;">Years of Service</div>
                </div>
                <div style="background: var(--gradient-gold); color: white; padding: var(--space-lg); border-radius: 16px; text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: var(--space-xs);">60</div>
                    <div style="opacity: 0.9;">Schools Nationwide</div>
                </div>
                <div style="background: #1E6BBF; color: white; padding: var(--space-lg); border-radius: 16px; text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: var(--space-xs);">24</div>
                    <div style="opacity: 0.9;">Aghosh Homes</div>
                </div>
                <div style="background: #FF6B35; color: white; padding: var(--space-lg); border-radius: 16px; text-align: center;">
                    <div style="font-size: 2.5rem; font-weight: 700; margin-bottom: var(--space-xs);">281K</div>
                    <div style="opacity: 0.9;">Food Packs in 2025</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials" id="testimonials">
    <div class="container">
        <h2 class="section-title reveal">Stories of Impact</h2>
        <p class="section-subtitle reveal">Hear from the lives we've touched across Pakistan</p>
        
        <div class="testimonial-slider">
            <div class="testimonial-track">
                <!-- Testimonial 1 -->
                <div class="testimonial-slide">
                    <div class="testimonial-content">
                        <p class="testimonial-quote">"Alkhidmat Foundation changed my life. After losing my parents, the Aghosh Home became my family. They provided education, love, and hope for a bright future. Today, I am a university graduate thanks to their support."</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">AK</div>
                            <div class="testimonial-info">
                                <h4>Ahmad Khan</h4>
                                <p>Aghosh Home Graduate</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-slide">
                    <div class="testimonial-content">
                        <p class="testimonial-quote">"When floods destroyed our village, Alkhidmat was the first to arrive. They provided food, shelter, and medical care. Their disaster management team rebuilt our homes and helped us restart our lives."</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">FM</div>
                            <div class="testimonial-info">
                                <h4>Fatima Malik</h4>
                                <p>Flood Relief Beneficiary</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-slide">
                    <div class="testimonial-content">
                        <p class="testimonial-quote">"The interest-free loan from Mawakhat helped me start my small business. Now I can support my family with dignity and have even hired two employees. This organization truly empowers people."</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">RH</div>
                            <div class="testimonial-info">
                                <h4>Rashid Hussain</h4>
                                <p>Microfinance Beneficiary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="slider-dots">
                <span class="slider-dot active"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
            </div>
        </div>
    </div>
</section>

<!-- Zakat Calculator Section -->
<section id="zakat" class="zakat-calculator">
    <div class="container">
        <h2 class="reveal" style="text-align: center; margin-bottom: var(--space-md); color: white;">Zakat Calculator</h2>
        <p class="reveal" style="text-align: center; margin-bottom: var(--space-xl); opacity: 0.9;">Fulfill your obligation with ease. Calculate your Zakat based on your current assets.</p>
        
        <div class="calc-container reveal">
            <div class="calc-grid">
                <div class="calc-input-group">
                    <label for="gold">Gold (Current Value)</label>
                    <input type="number" id="gold" class="calc-input" placeholder="0.00" min="0">
                </div>
                <div class="calc-input-group">
                    <label for="silver">Silver (Current Value)</label>
                    <input type="number" id="silver" class="calc-input" placeholder="0.00" min="0">
                </div>
                <div class="calc-input-group">
                    <label for="cash">Cash in Hand / Bank</label>
                    <input type="number" id="cash" class="calc-input" placeholder="0.00" min="0">
                </div>
                <div class="calc-input-group">
                    <label for="property">Property / Shares / Others</label>
                    <input type="number" id="property" class="calc-input" placeholder="0.00" min="0">
                </div>
            </div>
            
            <div class="calc-result">
                <h3>Total Zakat Due</h3>
                <div class="calc-result-value">Rs. <span id="zakat-total">0</span></div>
                <p style="font-size: 0.9rem; opacity: 0.8;">Note: Calculated at 2.5% of total assets exceeding Nisab.</p>
                <div style="margin-top: var(--space-lg);">
                    <a href="#donate" class="btn btn-primary">Pay Zakat Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter">
    <div class="container">
        <h2 style="font-size: 2.5rem; margin-bottom: var(--space-md);">Stay Updated</h2>
        <p style="font-size: 1.2rem; opacity: 0.95;">Subscribe to receive updates about our humanitarian work and impact stories</p>
        
        <form class="newsletter-form">
            <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
            <button type="submit" class="newsletter-button">Subscribe</button>
        </form>
    </div>
</section>

<!-- Call to Action Section -->
<section id="donate" style="padding: var(--space-3xl) 0; background: var(--gradient-primary); color: white; text-align: center;">
    <div class="container">
        <div class="reveal">
            <h2 style="font-size: 3rem; margin-bottom: var(--space-md);">Make a Difference Today</h2>
            <p style="font-size: 1.2rem; margin-bottom: var(--space-xl); max-width: 700px; margin-left: auto; margin-right: auto; opacity: 0.95;">
                Your donation can transform lives. Every contribution helps us provide food, shelter, education, and healthcare to those who need it most.
            </p>
            <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
                <a href="#" class="btn btn-primary">Donate Now</a>
                <a href="#" class="btn btn-secondary">Become a Volunteer</a>
            </div>
        </div>
    </div>
</section>

<!-- Floating Donate Button -->
<a href="#donate" class="floating-donate">
    ❤️ Donate Now
</a>
@endsection
