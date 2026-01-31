@extends('layouts.app')

@section('title', 'Thank You - Alkhidmat Foundation')

@section('content')
<div class="container" style="padding: 150px 0 100px; text-align: center;">
    <div style="font-size: 5rem; margin-bottom: 20px;">🎉</div>
    <h1 style="color: #004080; margin-bottom: 20px;">Thank You for Your Donation!</h1>
    <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto 30px;">
        Your generous contribution has been received. You are helping us make a real difference in the lives of those who need it most. May Allah reward you abundantly.
    </p>
    
    <div style="display: flex; justify-content: center; gap: 20px;">
        <a href="{{ route('home') }}" class="btn btn-primary" style="background: #004080; color: white; padding: 12px 30px; border-radius: 30px; text-decoration: none;">Return Home</a>
        <a href="{{ route('donate.index') }}" class="btn btn-outline" style="border: 2px solid #004080; color: #004080; padding: 12px 30px; border-radius: 30px; text-decoration: none;">Donate Again</a>
    </div>
</div>
@endsection
