@extends('layouts.app')

@section('title', 'Photo Gallery - Alkhidmat Foundation')

@section('content')
<div class="gallery-hero">
    <div class="container text-center">
        <h1 class="reveal">Our Work in Pictures</h1>
        <p class="reveal">Visual stories of hope, resilience, and service.</p>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <!-- Filter Buttons -->
    <div class="gallery-filters reveal">
        <button class="filter-btn active" onclick="filterGallery('all')">All</button>
        <button class="filter-btn" onclick="filterGallery('Medical')">Medical Camps</button>
        <button class="filter-btn" onclick="filterGallery('Education')">Education</button>
        <button class="filter-btn" onclick="filterGallery('Relief')">Disaster Relief</button>
        <button class="filter-btn" onclick="filterGallery('Orphan Care')">Orphan Care</button>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-grid reveal">
        @foreach($galleries as $image)
        <div class="gallery-item" data-category="{{ $image->category }}">
            <img src="{{ asset('images/gallery/' . $image->image_path) }}" alt="{{ $image->title }}" loading="lazy">
            <div class="gallery-overlay">
                <span class="gallery-cat">{{ $image->category }}</span>
                <h3 class="gallery-title">{{ $image->title }}</h3>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('styles')
<style>
    .gallery-hero {
        background: linear-gradient(rgba(0,45,91,0.9), rgba(0,64,128,0.8));
        color: white;
        padding: 120px 0 80px;
    }
    .gallery-filters {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }
    .filter-btn {
        background: white;
        border: 1px solid #ddd;
        padding: 10px 20px;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s;
        font-weight: 500;
        color: #555;
    }
    .filter-btn.active, .filter-btn:hover {
        background: #004080;
        color: white;
        border-color: #004080;
    }
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    .gallery-item {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        height: 250px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        cursor: pointer;
        transition: transform 0.3s;
    }
    .gallery-item:hover {
        transform: translateY(-5px);
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.3s;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-cat {
        text-transform: uppercase;
        font-size: 0.75rem;
        color: #d4af37;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .gallery-title {
        color: white;
        font-size: 1.1rem;
        margin: 5px 0 0;
    }
</style>
@endsection

@section('scripts')
<script>
    function filterGallery(category) {
        // Update buttons
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
            if (btn.innerText.includes(category) || (category === 'all' && btn.innerText === 'All')) {
                btn.classList.add('active');
            }
        });

        // Filter items
        const items = document.querySelectorAll('.gallery-item');
        items.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
                setTimeout(() => item.style.opacity = '1', 50);
            } else {
                item.style.opacity = '0';
                setTimeout(() => item.style.display = 'none', 300);
            }
        });
    }
</script>
@endsection
