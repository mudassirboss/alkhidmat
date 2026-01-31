@extends('layouts.app')

@section('title', 'Contact Us - Alkhidmat Foundation Muzaffargarh')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<div class="contact-hero">
    <div class="container text-center">
        <h1 class="reveal" style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px;">Get in Touch</h1>
        <p class="reveal" style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">We'd love to hear from you. Whether you have a question about our programs, want to volunteer, or just want to say hello.</p>
    </div>
    
    <!-- Wave Divider -->
    <div class="section-divider-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="wave-white" style="fill:white;"></path>
        </svg>
    </div>
</div>

<div class="container" style="padding: 60px 0 100px;">
    @if(session('success'))
    <div class="alert-success reveal">
        {{ session('success') }}
    </div>
    @endif

    <div class="contact-grid">
        <!-- Info Column -->
        <div class="contact-info reveal">
            <h2 style="color: #004080; margin-bottom: 30px;">Contact Information</h2>
            
            <div class="info-item">
                <div class="icon-box">📍</div>
                <div>
                    <h4>Address</h4>
                    <p>Alkhidmat Complex, Multan Road, Muzaffargarh, Punjab, Pakistan</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="icon-box">📞</div>
                <div>
                    <h4>Phone</h4>
                    <p>+92 3XX XXXXXXX</p>
                    <p>+92 66 XXXXXXX</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="icon-box">✉️</div>
                <div>
                    <h4>Email</h4>
                    <p>muzaffargarh@alkhidmat.org</p>
                    <p>info@alkhidmatmzg.org</p>
                </div>
            </div>

            <!-- Google Map -->
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.60333276633!2d71.0772097783203!3d30.070100000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b33d077ce75e7%3A0x6a1252cb7235069!2sMuzaffargarh%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1706725000000!5m2!1sen!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Form Column -->
        <div class="contact-form-wrapper reveal" style="transition-delay: 0.2s;">
            <h2 style="color: #004080; margin-bottom: 30px;">Send Us a Message</h2>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number (Optional)</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required>
                    @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                    @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
