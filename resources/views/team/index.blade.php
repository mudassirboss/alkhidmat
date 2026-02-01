@extends('layouts.app')

@section('title', 'Our Leadership - Alkhidmat Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/team.css') }}">
@endsection

@section('content')

<!-- Hero Section -->
<section class="team-hero">
    <div class="background-particles" id="particles-js"></div>
    <div class="container">
        <h1 class="reveal-text">Our Leadership</h1>
        <p class="reveal-text delay-200">The visionaries guiding our mission to serve humanity with integrity.</p>
    </div>
</section>

<!-- Organizational Hierarchy -->
<section class="team-hierarchy">
    <div class="container">
        
        <!-- Level 1: President -->
        @if($team['president'])
        <div class="hierarchy-level level-1">
            <div class="team-card president-card tilt-effect" data-tilt>
                <div class="card-inner">
                    <div class="card-front">
                        <div class="member-img-wrapper">
                            @if($team['president']->image_path)
                                <img src="{{ asset('images/team/' . $team['president']->image_path) }}" alt="{{ $team['president']->name }}" class="member-img">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $team['president']->name }}" class="member-img">
                            @endif
                        </div>
                        <div class="member-info">
                            <span class="member-role">{{ $team['president']->role }}</span>
                            <h2 class="member-name">{{ $team['president']->name }}</h2>
                            <div class="role-badge">Leadership</div>
                        </div>
                    </div>
                </div>
                <div class="card-glow"></div>
            </div>
        </div>
        
        <!-- Connector Line -->
        <div class="connector-vertical"></div>
        @endif

        <!-- Level 2: Vice Presidents -->
        @if($team['vice_presidents']->count() > 0)
        <div class="hierarchy-level level-2">
            @foreach($team['vice_presidents'] as $vp)
                <div class="team-card vp-card tilt-effect" data-tilt>
                     <div class="card-inner">
                        <div class="member-img-wrapper">
                            @if($vp->image_path)
                                <img src="{{ asset('images/team/' . $vp->image_path) }}" alt="{{ $vp->name }}" class="member-img">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $vp->name }}" class="member-img">
                            @endif
                        </div>
                        <div class="member-info">
                             <span class="member-role">{{ $vp->role }}</span>
                            <h3 class="member-name">{{ $vp->name }}</h3>
                        </div>
                     </div>
                </div>
            @endforeach
        </div>

        <!-- Connector Line -->
        <div class="connector-vertical"></div>
        @endif

        <!-- Level 3: Directors -->
        @if($team['directors']->count() > 0)
        <div class="hierarchy-level level-3">
             @foreach($team['directors'] as $director)
                <div class="team-card director-card tilt-effect" data-tilt>
                     <div class="card-inner">
                        <div class="member-img-wrapper small">
                            @if($director->image_path)
                                <img src="{{ asset('images/team/' . $director->image_path) }}" alt="{{ $director->name }}" class="member-img">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $director->name }}" class="member-img">
                            @endif
                        </div>
                        <div class="member-info">
                             <span class="member-role">{{ $director->role }}</span>
                            <h4 class="member-name">{{ $director->name }}</h4>
                        </div>
                     </div>
                </div>
            @endforeach
        </div>

         <!-- Connector Line -->
        <div class="connector-vertical"></div>
        @endif

         <!-- Level 4: Team Leads -->
        @if($team['leads']->count() > 0)
        <div class="hierarchy-level level-4">
             @foreach($team['leads'] as $lead)
                <div class="team-card lead-card tilt-effect" data-tilt>
                     <div class="card-inner">
                        <div class="member-img-wrapper xs">
                            @if($lead->image_path)
                                <img src="{{ asset('images/team/' . $lead->image_path) }}" alt="{{ $lead->name }}" class="member-img">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $lead->name }}" class="member-img">
                            @endif
                        </div>
                        <div class="member-info">
                             <span class="member-role">{{ $lead->role }}</span>
                            <h5 class="member-name">{{ $lead->name }}</h5>
                        </div>
                     </div>
                </div>
            @endforeach
        </div>
        @endif

    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('js/vanilla-tilt.min.js') }}"></script>
    <script src="{{ asset('js/team.js') }}"></script>
@endsection
