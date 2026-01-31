@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Edit Story</h1>
    <a href="{{ route('admin.posts.index') }}" class="btn-sm" style="background:#888;">&larr; Back</a>
</div>

<div class="table-card" style="max-width: 800px;">
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Category</label>
            <select name="category" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                <option value="Healthcare" {{ $post->category == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                <option value="Education" {{ $post->category == 'Education' ? 'selected' : '' }}>Education</option>
                <option value="Relief" {{ $post->category == 'Relief' ? 'selected' : '' }}>Relief</option>
                <option value="Water" {{ $post->category == 'Water' ? 'selected' : '' }}>Water</option>
                <option value="Success Story" {{ $post->category == 'Success Story' ? 'selected' : '' }}>Success Story</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Content (Wordpress-style Editor)</label>
            <textarea name="content" class="rich-editor" rows="10" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px; font-family:inherit;">{{ $post->content }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Featured Image</label>
            @if($post->image)
            <div style="margin-bottom:10px;">
                <img src="{{ asset('images/' . $post->image) }}" width="100" style="border-radius:4px;">
                <br><small>Current Image</small>
            </div>
            @endif
            <input type="file" name="image" style="width:100%;">
            <small style="color:#888;">Leave empty to keep current image.</small>
        </div>

        <button type="submit" class="btn-sm" style="background:#3498db; padding:12px 25px; font-size:1rem; cursor:pointer; border:none;">Update Story</button>
    </form>
</div>
@endsection
