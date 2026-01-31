@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1><i class="fas fa-layer-group"></i> Hero Sliders</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:12px; margin-bottom:25px; border:1px solid #c3e6cb;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<!-- Create Slider Form -->
<div class="card-ui" style="margin-bottom: 30px;">
    <h3 style="margin-top:0; margin-bottom:20px; color: var(--primary);"><i class="fas fa-plus-circle"></i> Add New Slide</h3>
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap:30px;">
            <div>
                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px; font-weight:600;">Main Title</label>
                    <input type="text" name="title" required placeholder="Hero headline" style="width:100%; padding:12px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit;">
                </div>
                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px; font-weight:600;">Subtitle / Hook</label>
                    <input type="text" name="subtitle" placeholder="Short description" style="width:100%; padding:12px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit;">
                </div>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px; margin-bottom:20px;">
                    <div>
                        <label style="display:block; margin-bottom:8px; font-weight:600;">Primary Button</label>
                        <input type="text" name="button_text" placeholder="Donate Now" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:8px; font-weight:600;">Primary Link</label>
                        <input type="text" name="button_link" placeholder="#donate" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit;">
                    </div>
                </div>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
                    <div>
                        <label style="display:block; margin-bottom:8px; font-weight:600;">Secondary Button</label>
                        <input type="text" name="secondary_button_text" placeholder="Learn More" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:8px; font-weight:600;">Secondary Link</label>
                        <input type="text" name="secondary_button_link" placeholder="#about" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit;">
                    </div>
                </div>
            </div>
            
            <div>
                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px; font-weight:600;">Layout Selection</label>
                    <select name="layout" style="width:100%; padding:12px; border:1px solid #e2e8f0; border-radius:10px; font-family: inherit; background: white;">
                        <option value="split-right">Image Right (Split)</option>
                        <option value="split-left">Image Left (Split)</option>
                        <option value="center">Center Overlay (Classic)</option>
                    </select>
                </div>
                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px; font-weight:600;">Hero Image (Foreground)</label>
                    <div style="border: 2px dashed #e2e8f0; padding: 20px; border-radius: 12px; text-align: center; background: #f8fafc;">
                        <input type="file" name="image" required style="width:100%; font-family: inherit;">
                        <div style="font-size: 0.8rem; color: #64748b; margin-top: 10px;">Transparency recommended for split layouts.</div>
                    </div>
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px; font-weight:600;">Background Image (Optional)</label>
                    <div style="border: 2px dashed #e2e8f0; padding: 20px; border-radius: 12px; text-align: center; background: #f8fafc;">
                        <input type="file" name="background_image" style="width:100%; font-family: inherit;">
                        <div style="font-size: 0.8rem; color: #64748b; margin-top: 10px;">Full-width background image.</div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top:30px; border-top: 1px solid #eee; padding-top:20px;">
            <button type="submit" class="btn-ui btn-primary-ui" style="padding: 12px 40px; font-size: 1rem;">
                <i class="fas fa-cloud-upload-alt"></i> Create Slide
            </button>
        </div>
    </form>
</div>

<!-- List Sliders -->
<div class="card-ui">
    <h3 style="margin-top:0; margin-bottom:20px; color: var(--primary);"><i class="fas fa-images"></i> Current Slides</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Content Details</th>
                    <th>Layout</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sliders as $slider)
                <tr>
                    <td>
                        <div style="position: relative; width: 120px; height: 70px;">
                            <img src="{{ asset('images/sliders/' . $slider->image_path) }}" style="width:100%; height:100%; object-fit:cover; border-radius:8px; border: 2px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                            @if($slider->background_image)
                                <div style="position: absolute; bottom: -5px; right: -5px; background: var(--accent); color: white; width: 24px; height: 24px; border-radius: 50%; display: flex; items-center; justify-content: center; font-size: 0.7rem; border: 2px solid #fff;" title="Has Background">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="font-weight:700; color: var(--primary);">{{ $slider->title }}</div>
                        <div style="font-size:0.85rem; color: var(--text-muted); margin-top: 4px;">{{ $slider->subtitle }}</div>
                        <div style="margin-top:8px; display:flex; gap:5px;">
                            @if($slider->button_text)
                                <span style="background:#e2e8f0; color:#475569; padding:2px 8px; font-size:0.7rem; border-radius:10px; font-weight:600;">
                                    <i class="fas fa-link"></i> {{ $slider->button_text }}
                                </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <span style="background:#fef3c7; color:#92400e; padding:5px 12px; border-radius:20px; font-size:0.75rem; font-weight:700; text-transform: uppercase;">
                            {{ str_replace('-', ' ', $slider->layout) }}
                        </span>
                    </td>
                    <td>
                        <div style="display:flex; gap:10px;">
                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn-ui" style="background:#f59e0b; color:white; padding: 8px 12px; font-size: 0.85rem;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Delete this slide?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-ui" style="background:#ef4444; color:white; padding: 8px 12px; font-size: 0.85rem; border:none;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
