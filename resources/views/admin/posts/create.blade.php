@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="header-bar mb-4 d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Outfit', sans-serif; font-weight: 700;">Create New Story</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn-ui btn-primary-ui" style="background: #6c757d; border: none;">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <!-- Left Column: Main Content -->
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4 border-0" style="border-radius: 12px;">
                    <div class="card-header bg-white py-3" style="border-bottom: 1px solid #f0f0f0; border-radius: 12px 12px 0 0;">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-newspaper mr-2"></i>Story Content
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold text-muted small text-uppercase">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter story title..." required style="height: 45px; font-weight: 500;">
                        </div>

                        <div class="form-group mb-0">
                            <label class="form-label font-weight-bold text-muted small text-uppercase">Content</label>
                            <textarea name="content" class="rich-editor" rows="10" placeholder="Write your story here...">{{ old('content') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Settings & Image -->
            <div class="col-lg-4">
                <!-- Featured Image Card -->
                <div class="card shadow-sm mb-4 border-0" style="border-radius: 12px;">
                    <div class="card-header bg-white py-3" style="border-bottom: 1px solid #f0f0f0; border-radius: 12px 12px 0 0;">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-image mr-2"></i>Featured Image
                        </h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-3 position-relative d-inline-block w-100">
                            <div class="bg-light rounded mx-auto d-flex align-items-center justify-content-center mb-3 text-muted profile-preview" style="width: 100%; height: 200px; border: 2px dashed #dee2e6; background-size: cover; background-position: center;">
                                <i class="fas fa-image fa-3x"></i>
                            </div>
                        </div>

                        <div class="custom-file text-left mt-3">
                            <label for="imageUpload" class="btn btn-outline-primary btn-block" style="cursor: pointer; border-radius: 8px;">
                                <i class="fas fa-camera mr-2"></i> Select Image
                            </label>
                            <input type="file" id="imageUpload" name="image" class="d-none" accept="image/*">
                        </div>
                        <small class="text-muted d-block mt-2">Required Ratio: 16:9 (Landscape)</small>
                    </div>
                </div>

                <!-- Settings Card -->
                <div class="card shadow-sm mb-4 border-0" style="border-radius: 12px;">
                    <div class="card-header bg-white py-3" style="border-bottom: 1px solid #f0f0f0; border-radius: 12px 12px 0 0;">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-sliders-h mr-2"></i>Publishing Settings
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold text-muted small text-uppercase">Category</label>
                            <select name="category" class="form-control custom-select" style="height: 45px; border-radius: 8px;" required>
                                <option value="Healthcare" {{ old('category') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                <option value="Education" {{ old('category') == 'Education' ? 'selected' : '' }}>Education</option>
                                <option value="Relief" {{ old('category') == 'Relief' ? 'selected' : '' }}>Relief</option>
                                <option value="Water" {{ old('category') == 'Water' ? 'selected' : '' }}>Water</option>
                                <option value="Success Story" {{ old('category') == 'Success Story' ? 'selected' : '' }}>Success Story</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block py-3 font-weight-bold shadow-sm" style="border-radius: 8px; font-size: 1.1rem; background: linear-gradient(135deg, #0056b3 0%, #004080 100%); border: none;">
                    <i class="fas fa-paper-plane mr-2"></i> Publish Story
                </button>
            </div>
        </div>
        <input type="hidden" name="cropped_image" id="cropped_image">
    </form>

    <!-- Custom Advanced Crop Overlay -->
    <div id="crop-overlay" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0, 13, 33, 0.95); backdrop-filter: blur(5px); justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s ease;">
        <div class="crop-container" style="background: white; padding: 20px; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); width: 90%; max-width: 800px; transform: scale(0.9); transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <h3 style="margin: 0; font-family: 'Outfit', sans-serif; font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-crop-alt" style="color: #0056b3;"></i> Adjust Photo
                </h3>
                <button type="button" class="close-crop" style="background: none; border: none; font-size: 1.5rem; color: #64748b; cursor: pointer; transition: color 0.2s;">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Canvas Area -->
            <div style="height: 500px; background: #f1f5f9; border-radius: 12px; overflow: hidden; position: relative;">
                <img id="image-to-crop" src="" style="display: block; max-width: 100%;">
            </div>

            <!-- Toolbar -->
            <div style="display: flex; gap: 10px; justify-content: center; margin-top: 20px; flex-wrap: wrap;">
                <button type="button" class="btn-tool" data-method="zoom" data-option="0.1" title="Zoom In">
                    <i class="fas fa-search-plus"></i>
                </button>
                <button type="button" class="btn-tool" data-method="zoom" data-option="-0.1" title="Zoom Out">
                    <i class="fas fa-search-minus"></i>
                </button>
                <div style="width: 1px; background: #cbd5e1; margin: 0 5px;"></div>
                <button type="button" class="btn-tool" data-method="rotate" data-option="-45" title="Rotate Left">
                    <i class="fas fa-undo"></i>
                </button>
                <button type="button" class="btn-tool" data-method="rotate" data-option="45" title="Rotate Right">
                    <i class="fas fa-redo"></i>
                </button>
                <div style="width: 1px; background: #cbd5e1; margin: 0 5px;"></div>
                <button type="button" class="btn-tool" data-method="reset" title="Reset">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>

            <!-- Actions -->
            <div style="margin-top: 25px; display: flex; gap: 15px;">
                <button type="button" class="close-crop" style="flex: 1; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1; background: white; color: #64748b; font-weight: 600; cursor: pointer;">
                    Cancel
                </button>
                <button type="button" id="crop-and-save" style="flex: 2; padding: 12px; border-radius: 10px; border: none; background: linear-gradient(135deg, #0056b3 0%, #004080 100%); color: white; font-weight: 600; cursor: pointer; box-shadow: 0 4px 12px rgba(0, 86, 179, 0.3);">
                    <i class="fas fa-check-circle"></i> Save Crop
                </button>
            </div>
        </div>
    </div>

    <!-- Tooltip & Override Styling -->
    <style>
        .btn-tool {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #e2e8f0;
            background: white;
            color: #475569;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-tool:hover {
            background: #f8fafc;
            color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var image = document.getElementById('image-to-crop');
            var overlay = document.getElementById('crop-overlay');
            var cropContainer = overlay.querySelector('.crop-container');
            var cropper;
            var fileInput = document.getElementById('imageUpload');
            var croppedInput = document.getElementById('cropped_image');
            
            // Show Overlay
            function showOverlay() {
                overlay.style.display = 'flex';
                overlay.offsetHeight; 
                overlay.style.opacity = '1';
                cropContainer.style.transform = 'scale(1)';
            }

            // Hide Overlay
            function hideOverlay(keepFile = false) {
                overlay.style.opacity = '0';
                cropContainer.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    overlay.style.display = 'none';
                    if (cropper) {
                        cropper.destroy();
                        cropper = null;
                        image.src = '';
                    }
                    if (!keepFile) {
                        fileInput.value = ''; 
                    }
                }, 300);
            }

            document.querySelectorAll('.close-crop').forEach(btn => {
                btn.addEventListener('click', function() { showOverlay(false); hideOverlay(false); });
            });

            fileInput.addEventListener('change', function (e) {
                var files = e.target.files;
                if (files && files.length > 0) {
                    var file = files[0];
                    var url = URL.createObjectURL(file);
                    
                    image.src = url;
                    showOverlay();

                    image.onload = function() {
                        if(cropper) cropper.destroy();
                        cropper = new Cropper(image, {
                            aspectRatio: 16 / 9, // LOCKED 16:9 RATIO FOR POSTS
                            viewMode: 1,
                            dragMode: 'move',
                            autoCropArea: 0.8,
                            restore: false,
                            guides: true,
                            center: true,
                            highlight: false,
                            cropBoxMovable: true,
                            cropBoxResizable: true,
                            toggleDragModeOnDblclick: false,
                        });
                    };
                }
            });

            document.querySelectorAll('.btn-tool').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (!cropper) return;
                    var method = this.getAttribute('data-method');
                    var option = this.getAttribute('data-option');
                    
                    if (method === 'zoom') cropper.zoom(Number(option));
                    if (method === 'rotate') cropper.rotate(Number(option));
                    if (method === 'reset') cropper.reset();
                });
            });

            document.getElementById('crop-and-save').addEventListener('click', function () {
                if (cropper) {
                    var canvas = cropper.getCroppedCanvas({
                        width: 1280, // High Res for Posts
                        height: 720,
                        fillColor: '#fff',
                        imageSmoothingEnabled: true,
                        imageSmoothingQuality: 'high',
                    });

                    var base64data = canvas.toDataURL('image/png');
                    croppedInput.value = base64data;
                    
                    this.innerHTML = '<i class="fas fa-check"></i> Saved!';
                    this.style.background = '#10b981'; 
                    
                    // Update Preview
                    var previewContainer = document.querySelector('.profile-preview');
                    // Remove icon
                    previewContainer.innerHTML = '';
                    previewContainer.style.backgroundImage = 'url(' + base64data + ')';
                    previewContainer.style.border = '2px solid #10b981';

                    setTimeout(() => {
                        hideOverlay(true); 
                        this.innerHTML = '<i class="fas fa-check-circle"></i> Save Crop';
                        this.style.background = 'linear-gradient(135deg, #0056b3 0%, #004080 100%)'; 
                    }, 500);
                }
            });
        });
    </script>
</div>
@endsection
