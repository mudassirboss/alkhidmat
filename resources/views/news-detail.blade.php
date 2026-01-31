@extends('layouts.app')

@section('title', $story['title'] . ' - Alkhidmat Foundation Muzaffargarh')

@section('content')
<!-- Story Hero -->
<section class="story-hero">
    <div class="container">
        <div class="breadcrumb">
            <a href="/">Home</a>
            <span>/</span>
            <a href="{{ route('news') }}">News</a>
            <span>/</span>
            <span>{{ $story['category'] }}</span>
        </div>
        <div class="story-header">
            <span class="category-badge">{{ $story['category'] }}</span>
            <h1 class="story-title">{{ $story['title'] }}</h1>
            <div class="story-meta">
                <span class="author">By {{ $story['author'] }}</span>
                <span class="divider">•</span>
                <span class="date">{{ date('F d, Y', strtotime($story['date'])) }}</span>
                <span class="divider">•</span>
                <span class="read-time">{{ $story['read_time'] }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Story Content -->
<section class="story-content-section">
    <div class="container">
        <div class="story-layout">
            <!-- Main Content -->
            <article class="story-main">
                <div class="featured-image">
                    <img src="{{ asset('images/' . $story['image']) }}" alt="{{ $story['title'] }}">
                </div>

                <div class="story-body">
                    {!! $story['content'] !!}
                </div>

                <!-- Share Buttons -->
                <div class="share-section">
                    <h4>Share This Story</h4>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-btn facebook">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($story['title']) }}" target="_blank" class="share-btn twitter">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($story['title'] . ' - ' . url()->current()) }}" target="_blank" class="share-btn whatsapp">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.304-1.654a11.882 11.882 0 005.713 1.456h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="story-sidebar">
                <div class="sidebar-widget cta-widget">
                    <h3>Make an Impact</h3>
                    <p>Your donation can create more success stories like this one.</p>
                    <a href="#donate" class="btn-donate">Donate Now</a>
                </div>

                <div class="sidebar-widget">
                    <h3>Related Stories</h3>
                    <a href="{{ route('news') }}" class="view-all-link">View All Stories →</a>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Back to News -->
<section class="back-section">
    <div class="container">
        <a href="{{ route('news') }}" class="back-link">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
            </svg>
            Back to All Stories
        </a>
    </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
<style>
    /* Story Detail Specific Styles */
    .story-hero {
        background: linear-gradient(180deg, #f8f9fa 0%, white 100%);
        padding: var(--space-2xl) 0 var(--space-xl);
    }

    .breadcrumb {
        display: flex;
        gap: var(--space-xs);
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: var(--space-lg);
    }

    .breadcrumb a {
        color: var(--primary-blue);
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .story-header {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .story-title {
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-weight: 800;
        line-height: 1.2;
        color: #111827;
        margin: var(--space-md) 0;
    }

    .story-meta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: var(--space-sm);
        font-size: 0.9375rem;
        color: #6b7280;
        flex-wrap: wrap;
    }

    .divider {
        opacity: 0.5;
    }

    .story-content-section {
        padding: var(--space-3xl) 0;
    }

    .story-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: var(--space-2xl);
    }

    .featured-image {
        border-radius: var(--space-md);
        overflow: hidden;
        margin-bottom: var(--space-2xl);
    }

    .featured-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .story-body {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #374151;
    }

    .story-body h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: var(--space-xl) 0 var(--space-md);
        color: #111827;
    }

    .story-body p {
        margin-bottom: var(--space-lg);
    }

    .story-body ul {
        margin: var(--space-lg) 0;
        padding-left: var(--space-xl);
    }

    .story-body li {
        margin-bottom: var(--space-sm);
    }

    .share-section {
        margin-top: var(--space-3xl);
        padding-top: var(--space-xl);
        border-top: 2px solid #e5e7eb;
    }

    .share-section h4 {
        font-size: 1.25rem;
        margin: 0 0 var(--space-md);
    }

    .share-buttons {
        display: flex;
        gap: var(--space-sm);
        flex-wrap: wrap;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        gap: var(--space-xs);
        padding: var(--space-sm) var(--space-lg);
        border-radius: var(--space-sm);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .share-btn.facebook {
        background: #1877f2;
        color: white;
    }

    .share-btn.twitter {
        background: #1da1f2;
        color: white;
    }

    .share-btn.whatsapp {
        background: #25d366;
        color: white;
    }

    .share-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .story-sidebar {
        position: sticky;
        top: var(--space-xl);
        height: fit-content;
    }

    .sidebar-widget {
        background: white;
        padding: var(--space-xl);
        border-radius: var(--space-md);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: var(--space-lg);
    }

    .sidebar-widget h3 {
        font-size: 1.25rem;
        margin: 0 0 var(--space-md);
    }

    .cta-widget {
        background: linear-gradient(135deg, var(--primary-blue), #004494);
        color: white;
    }

    .btn-donate {
        display: block;
        text-align: center;
        padding: var(--space-md);
        background: var(--accent-gold);
        color: white;
        border-radius: var(--space-sm);
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-donate:hover {
        background: #c4941f;
        transform: translateY(-2px);
    }

    .view-all-link {
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 600;
    }

    .view-all-link:hover {
        text-decoration: underline;
    }

    .back-section {
        padding: var(--space-2xl) 0;
        border-top: 1px solid #e5e7eb;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: var(--space-xs);
        color: var(--primary-blue);
        font-weight: 600;
        text-decoration: none;
        transition: gap 0.3s ease;
    }

    .back-link:hover {
        gap: var(--space-sm);
    }

    @media (max-width: 1024px) {
        .story-layout {
            grid-template-columns: 1fr;
        }

        .story-sidebar {
            position: static;
        }
    }
</style>
@endsection
