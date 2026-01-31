@extends('layouts.app')

@section('title', 'Alkhidmat Foundation - Service to Humanity with Integrity')

@section('content')
<!-- Advanced Hero Slider -->
<div class="hero-slider-container">
    <div class="hero-slider">
        <!-- Slides remain the same -->
        @include('partials.hero-slides')
    </div>
    
    <!-- Slant Divider at Bottom of Hero -->
    <div class="slant-divider bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <polygon fill="#e8f4ff" points="0,0 1200,120 0,120"></polygon>
        </svg>
    </div>
</div>

<!-- Stats Counter Section -->
<section class="stats stats-enhanced section-with-divider">
    <!-- Slant Top from Hero -->
    <div class="slant-divider top">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <polygon fill="#e8f4ff" points="0,0 1200,120 0,120"></polygon>
        </svg>
    </div>
    
    <div class="container">
        <!-- Stats Grid Content -->
        @include('partials.stats-grid')
    </div>
    
    <!-- Tilt Divider at Bottom -->
    <div class="tilt-divider bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <polygon fill="#ffffff" points="0,0 1200,0 0,120"></polygon>
        </svg>
    </div>
</section>

<!-- Programs Section -->
<section id="programs" class="programs programs-enhanced section-with-divider">
    <!-- Tilt Top from Stats -->
    <div class="tilt-divider top">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <polygon fill="#ffffff" points="0,0 1200,0 0,120"></polygon>
        </svg>
    </div>
    
    <div class="container">
        <!-- Programs Content -->
        @include('partials.programs-grid')
    </div>
    
    <!-- Curved Wave at Bottom -->
    <div class="wave-divider bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path fill="#f8f9fa" d="M0,0 Q300,120 600,60 T1200,0 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- Leadership Section -->
<section class="leadership leadership-enhanced section-with-divider">
    <!-- Curved Wave Top from Programs -->
    <div class="wave-divider top">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path fill="#f8f9fa" d="M0,0 Q300,120 600,60 T1200,0 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
    
    <div class="container">
        <!-- Leadership Content -->
        @include('partials.leadership-grid')
    </div>
    
    <!-- Arrow Point at Bottom -->
    <div class="arrow-divider bottom">
        <svg viewBox="0 0 1200 80" preserveAspectRatio="none">
            <polygon fill="#fffaf0" points="0,0 600,80 1200,0 1200,80 0,80"></polygon>
        </svg>
    </div>
</section>

<!-- Media Gallery -->
<section class="gallery gallery-enhanced section-with-divider">
    <!-- Arrow Point Top from Leadership -->
    <div class="arrow-divider top">
        <svg viewBox="0 0 1200 80" preserveAspectRatio="none">
            <polygon fill="#fffaf0" points="0,0 600,80 1200,0 1200,80 0,80"></polygon>
        </svg>
    </div>
    
    <div class="container">
        <!-- Gallery Content -->
        @include('partials.gallery-grid')
    </div>
    
    <!-- Book Curve at Bottom -->
    <div class="book-divider bottom">
        <svg viewBox="0 0 1200 90" preserveAspectRatio="none">
            <path fill="#ffffff" d="M0,0 C200,90 400,90 600,45 C800,0 1000,0 1200,45 L1200,90 L0,90 Z"></path>
        </svg>
    </div>
</section>

<!-- Remaining sections follow same pattern -->
@include('partials.remaining-sections')

@endsection
