@extends('layouts.app')

@section('title', $program['title'] . ' - Alkhidmat Foundation')

@section('content')
<div style="position: relative; padding: 150px 0 100px; color: white; background: linear-gradient(rgba(0,45,91,0.9), rgba(0,64,128,0.8)), url('{{ asset('images/' . $program['image_hero']) }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container text-center">
        <h1 class="reveal" style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px;">{{ $program['title'] }}</h1>
        <p class="reveal" style="font-size: 1.5rem; opacity: 0.9; max-width: 800px; margin: 0 auto;">{{ $program['subtitle'] }}</p>
    </div>
    
    <!-- Wave Divider -->
    <div class="section-divider-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="wave-white" style="fill:white;"></path>
        </svg>
    </div>
</div>

<div class="container" style="padding: 80px 0;">
    <div class="row align-items-center">
        <div class="col-md-7 reveal">
            <h2 style="color: #004080; margin-bottom: 30px;">About The Program</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #555; margin-bottom: 30px;">
                {!! $program['description'] !!}
            </p>
            
            <h3 style="color: #004080; margin-bottom: 20px;">Key Features</h3>
            <ul style="list-style: none; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                @foreach($program['features'] as $feature)
                <li style="display: flex; align-items: center; font-size: 1.05rem; color: #444;">
                    <span style="color: var(--accent-gold); margin-right: 10px; font-weight: bold;">✓</span> {{ $feature }}
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-5 reveal">
            <div style="background: #f8f9fa; padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid var(--accent-gold);">
                <h3 class="text-center" style="margin-bottom: 30px; color: #004080;">Program Impact</h3>
                
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    @foreach($program['stats'] as $stat)
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <span style="color: #666; font-size: 1.1rem;">{{ $stat['label'] }}</span>
                        <span style="color: #004080; font-weight: 800; font-size: 1.5rem;">{{ $stat['value'] }}</span>
                    </div>
                    @endforeach
                </div>
                
                <div style="margin-top: 40px;">
                    <a href="{{ route('donate.index') }}?purpose={{ $slug }}" class="btn-primary" style="display: block; width: 100%; text-align: center; padding: 15px; background: #004080; color: white; border-radius: 8px; text-decoration: none; font-weight: 700; transition: transform 0.3s;">
                        Donate to this Program
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div style="background: #f0f7ff; padding: 80px 0; text-align: center;">
    <div class="container">
        <h2 style="color: #004080; margin-bottom: 20px;">Help Us Save More Lives</h2>
        <p style="color: #666; max-width: 600px; margin: 0 auto 40px;">Your contribution directly impacts the beneficiaries of this program. Join us in making a difference.</p>
        <div style="display: flex; justify-content: center; gap: 20px;">
            <a href="{{ route('donate.index') }}" class="btn-primary" style="background: var(--accent-gold); color: white; padding: 15px 40px; border-radius: 30px; text-decoration: none; font-weight: 600;">Donate Now</a>
            <a href="{{ route('home') }}#programs" class="btn-outline" style="border: 2px solid #004080; color: #004080; padding: 15px 40px; border-radius: 30px; text-decoration: none; font-weight: 600;">View All Programs</a>
        </div>
    </div>
</div>
@endsection
