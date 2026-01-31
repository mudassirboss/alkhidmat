@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Media Gallery</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px;">
    {{ session('success') }}
</div>
@endif

<!-- Upload Card -->
<div class="table-card" style="margin-bottom: 30px;">
    <h3>Upload New Image</h3>
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" style="display:flex; gap:10px; align-items:flex-end;">
        @csrf
        <div style="flex:1;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Title (Optional)</label>
            <input type="text" name="title" placeholder="Image Title" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
        </div>
        <div style="width:200px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Category</label>
            <select name="category" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                <option value="General">General</option>
                <option value="Medical">Medical Camps</option>
                <option value="Education">Education</option>
                <option value="Relief">Disaster Relief</option>
                <option value="Orphan Care">Orphan Care</option>
            </select>
        </div>
        <div style="flex:1;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Image</label>
            <input type="file" name="image" required style="width:100%;">
        </div>
        <button type="submit" class="btn-sm" style="background:#27ae60; border:none; height:38px;">Upload</button>
    </form>
</div>

<!-- Gallery Grid -->
<div class="table-card">
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap:20px;">
        @foreach($galleries as $image)
        <div style="border:1px solid #eee; border-radius:8px; overflow:hidden; position:relative;">
            <img src="{{ asset('images/gallery/' . $image->image_path) }}" style="width:100%; height:150px; object-fit:cover;">
            <div style="padding:10px;">
                <h5 style="margin:0 0 5px; font-size:0.9rem;">{{ $image->category }}</h5>
                <p style="margin:0; font-size:0.8rem; color:#666;">{{ $image->title ?? 'No Title' }}</p>
                
                <form action="{{ route('admin.galleries.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="position:absolute; top:5px; right:5px; background:red; color:white; border:none; width:24px; height:24px; border-radius:50%; cursor:pointer;">&times;</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div style="margin-top:20px;">
        {{ $galleries->links() }}
    </div>
</div>
@endsection
