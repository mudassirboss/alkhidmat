@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Create New Story</h1>
    <a href="{{ route('admin.posts.index') }}" class="btn-sm" style="background:#888;">&larr; Back</a>
</div>

<div class="table-card" style="max-width: 800px;">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Title</label>
            <input type="text" name="title" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Category</label>
            <select name="category" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                <option value="Healthcare">Healthcare</option>
                <option value="Education">Education</option>
                <option value="Relief">Relief</option>
                <option value="Water">Water</option>
                <option value="Success Story">Success Story</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Content (Wordpress-style Editor)</label>
            <textarea name="content" class="rich-editor" rows="10" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px; font-family:inherit;"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Featured Image</label>
            <input type="file" name="image" required style="width:100%;">
        </div>

        <button type="submit" class="btn-sm" style="background:#27ae60; padding:12px 25px; font-size:1rem; cursor:pointer; border:none;">Publish Story</button>
    </form>
</div>
@endsection
