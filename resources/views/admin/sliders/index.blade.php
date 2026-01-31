@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Hero Sliders</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px;">
    {{ session('success') }}
</div>
@endif

<!-- Create Slider Form -->
<div class="table-card" style="margin-bottom: 30px;">
    <h3>Add New Slide</h3>
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display:grid; grid-template-columns: 2fr 1fr; gap:20px;">
            <div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Title</label>
                    <input type="text" name="title" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                </div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Subtitle / Hook</label>
                    <input type="text" name="subtitle" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                </div>
                <div style="display:flex; gap:10px; margin-bottom:15px;">
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Main Button Text</label>
                        <input type="text" name="button_text" placeholder="e.g. Donate Now" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Link URL</label>
                        <input type="text" name="button_link" placeholder="#donate" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                </div>
                <div style="display:flex; gap:10px; margin-bottom:15px;">
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Secondary Button Text</label>
                        <input type="text" name="secondary_button_text" placeholder="e.g. Learn More" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                    <div style="flex:1;">
                        <label style="display:block; margin-bottom:5px; font-weight:600;">Link URL</label>
                        <input type="text" name="secondary_button_link" placeholder="#about" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    </div>
                </div>
            </div>
            
            <div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Layout Style</label>
                    <select name="layout" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                        <option value="split-right">Image Right (Split)</option>
                        <option value="split-left">Image Left (Split)</option>
                        <option value="center">Center Overlay (Classic)</option>
                    </select>
                </div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Hero Image (Foreground)</label>
                    <input type="file" name="image" required style="width:100%;; padding:10px; border:1px solid #ddd; border-radius:4px; background:#f9f9f9;">
                    <small style="color:#666;">This is the image shown in the split or center.</small>
                </div>

                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px; font-weight:600;">Background Image (Optional)</label>
                    <input type="file" name="background_image" style="width:100%;; padding:10px; border:1px solid #ddd; border-radius:4px; background:#f9f9f9;">
                    <small style="color:#666;">If uploaded, this will appear behind the split/center content.</small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn-sm" style="background:#004080; border:none; padding:10px 30px; font-size:1rem;">Add Slide</button>
    </form>
</div>

<!-- List Sliders -->
<div class="table-card">
    <h3>Current Slides</h3>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="text-align:left; border-bottom:2px solid #eee;">
                <th style="padding:10px;">Image</th>
                <th style="padding:10px;">Content</th>
                <th style="padding:10px;">Layout</th>
                <th style="padding:10px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:10px;">
                    <img src="{{ asset('images/sliders/' . $slider->image_path) }}" style="width:100px; height:60px; object-fit:cover; border-radius:4px;">
                </td>
                <td style="padding:10px;">
                    <strong style="color:#004080;">{{ $slider->title }}</strong><br>
                    <small>{{ $slider->subtitle }}</small><br>
                    @if($slider->button_text)
                        <span style="background:#eee; padding:2px 6px; font-size:0.7rem; border-radius:3px;">{{ $slider->button_text }}</span>
                    @endif
                </td>
                <td style="padding:10px;">
                    <span class="badge status-pending">{{ $slider->layout }}</span>
                </td>
                <td style="padding:10px;">
                    <div style="display:flex; gap:5px;">
                        <a href="{{ route('admin.sliders.edit', $slider->id) }}" style="background:#ffc107; color:#000; padding:5px 10px; border-radius:4px; text-decoration:none; font-size:0.9rem;">Edit</a>
                        <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Delete this slide?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer; font-size:0.9rem;">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
