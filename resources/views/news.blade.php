@extends('layouts.app')

@section('title', 'News & Success Stories - Alkhidmat Foundation Muzaffargarh')

@section('content')
<!-- Hero Section -->
<section class="news-hero">
    <div class="container">
        <h1 class="hero-title">News & Success Stories</h1>
        <p class="hero-subtitle">Witness the impact of your compassion and generosity</p>
    </div>
</section>

<!-- News Section -->
<section class="news-section">
    <div class="container">
        <!-- Category Filter -->
        <div class="category-filter">
            <button class="filter-btn active" data-category="all">All Stories</button>
            <button class="filter-btn" data-category="Healthcare">Healthcare</button>
            <button class="filter-btn" data-category="Education">Education</button>
            <button class="filter-btn" data-category="Relief">Relief</button>
            <button class="filter-btn" data-category="Water">Water</button>
            <button class="filter-btn" data-category="Success Story">Success Stories</button>
        </div>

        <!-- News Grid -->
        <div class="news-grid">
            @foreach($stories as $story)
            <article class="news-card" data-category="{{ $story['category'] }}">
                <div class="news-image">
                    <img src="{{ asset('images/' . $story['image']) }}" alt="{{ $story['title'] }}" loading="lazy">
                    <span class="category-badge">{{ $story['category'] }}</span>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-date">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            {{ date('M d, Y', strtotime($story['date'])) }}
                        </span>
                        <span class="read-time">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            {{ $story['read_time'] }}
                        </span>
                    </div>
                    <h3 class="news-title">
                        <a href="{{ route('news.detail', $story['slug']) }}">{{ $story['title'] }}</a>
                    </h3>
                    <p class="news-excerpt">{{ $story['excerpt'] }}</p>
                    <a href="{{ route('news.detail', $story['slug']) }}" class="read-more">
                        Read Full Story
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Empty State (shown when filter has no results) -->
        <div class="empty-state" style="display: none;">
            <svg width="64" height="64" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <h3>No stories found</h3>
            <p>Try selecting a different category</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="news-cta">
    <div class="container">
        <h2>Be Part of These Success Stories</h2>
        <p>Your donations make these transformations possible</p>
        <div class="cta-buttons">
            <a href="#donate" class="btn-primary">Donate Now</a>
            <a href="{{ route('volunteer') }}" class="btn-secondary">Join as Volunteer</a>
        </div>
    </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/news.js') }}"></script>
@endsection
