@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Edit Program: {{ $program->title }}</h1>
    <a href="{{ route('admin.programs.index') }}" class="btn-sm" style="background:#888;">&larr; Back</a>
</div>

<div class="table-card" style="max-width: 800px;">
    <form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Basic Info -->
        <h3 style="border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:20px;">Basic Information</h3>
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Program Title</label>
            <input type="text" name="title" value="{{ $program->title }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Subtitle</label>
            <input type="text" name="subtitle" value="{{ $program->subtitle }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Description</label>
            <textarea name="description" class="rich-editor" rows="5" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px; font-family:inherit;">{{ $program->description }}</textarea>
        </div>

        <!-- Hero Image -->
        <div style="margin-bottom: 30px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Hero Image</label>
            <div style="margin-bottom:10px;">
                <img src="{{ asset('images/' . $program->image_hero) }}" width="150" style="border-radius:4px;">
            </div>
            <input type="file" name="image_hero" style="width:100%;">
        </div>

        <!-- Stats Section -->
        <h3 style="border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:20px;">Key Statistics</h3>
        <p style="color:#666; font-size:0.9rem; margin-bottom:15px;">Enter up to 3 key stats to display on the program page.</p>
        
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:10px;">
            <label style="font-weight:600;">Label (e.g., Patients Treated)</label>
            <label style="font-weight:600;">Value (e.g., 500+)</label>
        </div>

        @for($i = 0; $i < 3; $i++)
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:10px;">
            <input type="text" name="stat_label_{{ $i }}" value="{{ $program->stats[$i]['label'] ?? '' }}" placeholder="Label" style="padding:10px; border:1px solid #ddd; border-radius:4px;">
            <input type="text" name="stat_value_{{ $i }}" value="{{ $program->stats[$i]['value'] ?? '' }}" placeholder="Value" style="padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>
        @endfor

        <!-- Features Section -->
        <h3 style="border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:20px; margin-top:30px;">Program Features</h3>
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Features List (One per line)</label>
            <textarea name="features" rows="6" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px; font-family:inherit;">{{ implode("\n", $program->features ?? []) }}</textarea>
        </div>

        <button type="submit" class="btn-sm" style="background:#27ae60; padding:12px 25px; font-size:1rem; cursor:pointer; border:none;">Update Program</button>
    </form>
</div>
@endsection
