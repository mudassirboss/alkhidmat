@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Edit Slide</h1>
    <a href="{{ route('admin.sliders.index') }}" class="btn-sm" style="background:#666; color:white; text-decoration:none; padding:8px 15px; border-radius:4px;">&larr; Back to Sliders</a>
</div>

<div class="table-card">
    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display:grid; grid-template-columns: 2fr 1fr; gap:20px;">
            <div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Title</label>
                    <input type="text" name="title" value="{{ $slider->title }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                </div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Subtitle / Hook</label>
                    <input type="text" name="subtitle" value="{{ $slider->subtitle }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                </div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Description (Optional)</label>
                    <textarea name="description" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">{{ $slider->description }}</textarea>
                </div>

                <div style="display:flex; gap:10px; margin-bottom:15px;">
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Main Button Text</label>
                        <input type="text" name="button_text" value="{{ $slider->button_text }}" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Link URL</label>
                        <input type="text" name="button_link" value="{{ $slider->button_link }}" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                </div>
                <div style="display:flex; gap:10px; margin-bottom:15px;">
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Secondary Button Text</label>
                        <input type="text" name="secondary_button_text" value="{{ $slider->secondary_button_text }}" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Link URL</label>
                        <input type="text" name="secondary_button_link" value="{{ $slider->secondary_button_link }}" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                </div>
            </div>
            
            <div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Status</label>
                    <label style="display:flex; align-items:center; gap:10px;">
                        <input type="checkbox" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}> Active
                    </label>
                </div>

                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Layout Style</label>
                    <select name="layout" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                        <option value="split-right" {{ $slider->layout == 'split-right' ? 'selected' : '' }}>Image Right (Split)</option>
                        <option value="split-left" {{ $slider->layout == 'split-left' ? 'selected' : '' }}>Image Left (Split)</option>
                        <option value="center" {{ $slider->layout == 'center' ? 'selected' : '' }}>Center Overlay (Classic)</option>
                    </select>
                </div>
                
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Hero Image (Foreground)</label>
                    @if($slider->image_path)
                        <img src="{{ asset('images/sliders/' . $slider->image_path) }}" style="width:100%; height:80px; object-fit:cover; border-radius:4px; margin-bottom:5px;">
                    @endif
                    <input type="file" name="image" style="width:100%;; padding:10px; border:1px solid #ddd; border-radius:4px; background:#f9f9f9;">
                    <small style="color:#666;">Leave empty to keep current image.</small>
                </div>

                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Background Image (Optional)</label>
                    @if($slider->background_image_path)
                        <img src="{{ asset('images/sliders/' . $slider->background_image_path) }}" style="width:100%; height:80px; object-fit:cover; border-radius:4px; margin-bottom:5px;">
                    @endif
                    <input type="file" name="background_image" style="width:100%;; padding:10px; border:1px solid #ddd; border-radius:4px; background:#f9f9f9;">
                    <small style="color:#666;">Leave empty to keep current background.</small>
                </div>
            </div>
        </div>
        
        <div style="margin-top:20px; text-align:right;">
            <button type="submit" class="btn-sm" style="background:#004080; border:none; padding:12px 40px; font-size:1rem; cursor:pointer;">Update Slide</button>
        </div>
    </form>
</div>
@endsection
