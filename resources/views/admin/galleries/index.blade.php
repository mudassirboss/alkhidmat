@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1><i class="fas fa-images"></i> Media Gallery</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:12px; margin-bottom:25px; border:1px solid #c3e6cb;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<!-- Upload Card -->
<div class="card-ui" style="margin-bottom: 30px;">
    <h3 style="margin-top:0; margin-bottom:20px; color: var(--primary);"><i class="fas fa-cloud-upload-alt"></i> Upload New Media</h3>
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:20px; align-items:flex-end;">
            <div style="flex:1;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Image Title</label>
                <input type="text" name="title" placeholder="Descriptive title" style="width:100%; padding:12px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit;">
            </div>
            <div style="width:200px;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Category</label>
                <select name="category" style="width:100%; padding:12px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit; background: white;">
                    <option value="General">General</option>
                    <option value="Medical">Medical Camps</option>
                    <option value="Education">Education</option>
                    <option value="Relief">Disaster Relief</option>
                    <option value="Orphan Care">Orphan Care</option>
                </select>
            </div>
            <div style="flex:1;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Choose File</label>
                <input type="file" name="image" required style="width:100%; font-family: inherit;">
            </div>
            <button type="submit" class="btn-ui btn-primary-ui" style="height:48px; min-width: 140px; justify-content: center;">
                <i class="fas fa-upload"></i> Upload
            </button>
        </div>
    </form>
</div>

<!-- Gallery Grid -->
<div class="card-ui">
    <h3 style="margin-top:0; margin-bottom:25px; color: var(--primary);"><i class="fas fa-th-large"></i> Collection</h3>
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap:25px;">
        @foreach($galleries as $image)
        <div style="background: white; border-radius:15px; overflow:hidden; position:relative; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f1f5f9; transition: transform 0.3s ease;">
            <img src="{{ asset('images/gallery/' . $image->image_path) }}" style="width:100%; height:180px; object-fit:cover;">
            
            <form action="{{ route('admin.galleries.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Delete this image?')" style="position: absolute; top: 10px; right: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background:rgba(239, 68, 68, 0.9); color:white; border:none; width:30px; height:30px; border-radius:50%; cursor:pointer; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px);">
                    <i class="fas fa-trash" style="font-size: 0.8rem;"></i>
                </button>
            </form>

            <div style="padding:15px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 5px;">
                    <span style="background:#e0f2fe; color:#0369a1; padding:2px 8px; border-radius:10px; font-size:0.7rem; font-weight:700; text-transform: uppercase;">
                        {{ $image->category }}
                    </span>
                </div>
                <p style="margin:0; font-size:0.9rem; font-weight: 500; color: var(--text-main); height: 1.2em; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $image->title ?? 'Untitled Image' }}
                </p>
                <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 8px;">
                    <i class="far fa-clock"></i> {{ $image->created_at->format('M d, Y') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    @if($galleries->hasPages())
    <div style="margin-top:30px; padding-top: 20px; border-top: 1px solid #edf2f7;">
        {{ $galleries->links() }}
    </div>
    @endif
</div>
@endsection
