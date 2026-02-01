@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="header-bar">
        <h1 class="h3 mb-0 text-gray-800">Add Team Member</h1>
        <a href="{{ route('admin.team-members.index') }}" class="btn-ui btn-primary-ui" style="background: #6c757d;">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card-ui">
        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <h5 style="color: var(--primary); margin-bottom: 25px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                <i class="fas fa-user-circle mr-2"></i>Basic Information
            </h5>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label style="font-weight: 600; color: var(--text-muted); margin-bottom: 8px;">
                            <i class="fas fa-signature mr-1" style="color: var(--accent);"></i> Full Name
                        </label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Dr. Muhammad Amjad" style="padding: 12px; border-radius: 8px;" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label style="font-weight: 600; color: var(--text-muted); margin-bottom: 8px;">
                            <i class="fas fa-briefcase mr-1" style="color: var(--accent);"></i> Role / Job Title
                        </label>
                        <input type="text" name="role" class="form-control" placeholder="e.g. President" style="padding: 12px; border-radius: 8px;" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label style="font-weight: 600; color: var(--text-muted); margin-bottom: 8px;">
                            <i class="fas fa-layer-group mr-1" style="color: var(--accent);"></i> Hierarchy Level
                        </label>
                        <select name="hierarchy_level" class="form-control" style="padding: 12px; height: auto; border-radius: 8px;" required>
                            <option value="" disabled selected>Select Position Level</option>
                            <option value="1">Level 1 - President (Top Leadership)</option>
                            <option value="2">Level 2 - Vice President</option>
                            <option value="3">Level 3 - Director</option>
                            <option value="4">Level 4 - Team Lead / Manager</option>
                        </select>
                        <small class="text-muted d-block mt-2">Determines where the member appears in the organizational tree.</small>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label style="font-weight: 600; color: var(--text-muted); margin-bottom: 8px;">
                            <i class="fas fa-sort-numeric-down mr-1" style="color: var(--accent);"></i> Display Order
                        </label>
                        <input type="number" name="order_index" class="form-control" value="0" style="padding: 12px; border-radius: 8px;">
                        <small class="text-muted d-block mt-2">Lower numbers appear first within the same level.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                     <div class="form-group mb-4">
                        <label style="font-weight: 600; color: var(--text-muted); margin-bottom: 8px;">
                            <i class="fas fa-image mr-1" style="color: var(--accent);"></i> Profile Image
                        </label>
                        
                        <div style="display: flex; align-items: center; gap: 20px;">
                            <!-- Preview Box -->
                            <div id="image-preview-container" style="width: 100px; height: 100px; background: #f8fafc; border: 2px dashed #cbd5e1; border-radius: 12px; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative;">
                                <i class="fas fa-image" style="font-size: 2rem; color: #cbd5e1;" id="placeholder-icon"></i>
                                <img id="image-preview" src="" style="width: 100%; height: 100%; object-fit: cover; display: none;">
                            </div>
                            
                            <div style="flex: 1;">
                                <div class="custom-file" style="position: relative; display: block; width: 100%; margin-bottom: 5px;">
                                     <input type="file" name="image" class="form-control" style="padding: 10px; height: auto; border: 1px solid #e2e8f0;" accept="image/*">
                                </div>
                                <small class="text-muted d-block">Recommended size: 500x500px (Square)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-4">
                        <label style="font-weight: 600; color: var(--text-muted); margin-bottom: 8px;">
                            <i class="fas fa-quote-left mr-1" style="color: var(--accent);"></i> Leadership Quote
                        </label>
                        <textarea name="leadership_quote" class="form-control" rows="3" placeholder="Enter a quote if this member is in the leadership team..." style="padding: 12px; border-radius: 8px;"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group mb-4 d-flex align-items-center gap-4 flex-wrap">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1" checked>
                    <label class="custom-control-label" for="isActive" style="font-weight: 600; cursor: pointer;">Active Status</label>
                </div>
                <!-- Show on Team Page Toggle -->
                <div class="custom-control custom-switch ml-4">
                    <input type="checkbox" class="custom-control-input" id="showOnTeamPage" name="show_on_team_page" value="1" checked>
                    <label class="custom-control-label" for="showOnTeamPage" style="font-weight: 600; cursor: pointer;">Show on Team Page</label>
                </div>
                <div class="custom-control custom-switch ml-4">
                    <input type="checkbox" class="custom-control-input" id="isLeadership" name="is_in_leadership" value="1">
                    <label class="custom-control-label" for="isLeadership" style="font-weight: 600; cursor: pointer;">Show in Homepage Leadership</label>
                </div>
            </div>

            <div style="border-top: 1px solid #eee; padding-top: 20px; text-align: right;">
                <button type="submit" class="btn-ui btn-primary-ui">
                    <i class="fas fa-save"></i> Save Member
                </button>
            </div>
            <input type="hidden" name="cropped_image" id="cropped_image">
        </form>
    </div>
    
    <!-- Custom Advanced Crop Overlay -->
    <div id="crop-overlay" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0, 13, 33, 0.95); backdrop-filter: blur(5px); justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s ease;">
        <div class="crop-container" style="background: white; padding: 20px; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); width: 90%; max-width: 600px; transform: scale(0.9); transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <h3 style="margin: 0; font-family: 'Outfit', sans-serif; font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-crop-alt" style="color: #0056b3;"></i> Adjust Photo
                </h3>
                <button type="button" class="close-crop" style="background: none; border: none; font-size: 1.5rem; color: #64748b; cursor: pointer; transition: color 0.2s;">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Canvas Area -->
            <div style="height: 400px; background: #f1f5f9; border-radius: 12px; overflow: hidden; position: relative;">
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

    <!-- Tooltip Styling -->
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

    <!-- Hidden Input Previously Here -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var image = document.getElementById('image-to-crop');
            var overlay = document.getElementById('crop-overlay');
            var cropContainer = overlay.querySelector('.crop-container');
            var cropper;
            var fileInput = document.querySelector('input[name="image"]');
            var croppedInput = document.getElementById('cropped_image');
            
            // Show Overlay
            function showOverlay() {
                overlay.style.display = 'flex';
                // Trigger reflow
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
                        fileInput.value = ''; // Only clear if not keeping (i.e., Cancelled)
                    }
                }, 300);
            }

            // Close buttons (Cancel)
            document.querySelectorAll('.close-crop').forEach(btn => {
                btn.addEventListener('click', function() {
                    hideOverlay(false); // Clear input on cancel
                });
            });

            // File Selection
            fileInput.addEventListener('change', function (e) {
                var files = e.target.files;
                if (files && files.length > 0) {
                    var file = files[0];
                    var url = URL.createObjectURL(file);
                    
                    image.src = url;
                    showOverlay();

                    // Wait for image to load before initializing cropper
                    image.onload = function() {
                        if(cropper) cropper.destroy();
                        cropper = new Cropper(image, {
                            aspectRatio: 1,
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

            // Toolbar Actions
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

            // Save Crop
            document.getElementById('crop-and-save').addEventListener('click', function () {
                if (cropper) {
                    var canvas = cropper.getCroppedCanvas({
                        width: 600,
                        height: 600,
                        fillColor: '#fff',
                        imageSmoothingEnabled: true,
                        imageSmoothingQuality: 'high',
                    });

                    var base64data = canvas.toDataURL('image/png');
                    croppedInput.value = base64data;
                    
                    // Show success feedback in button
                    this.innerHTML = '<i class="fas fa-check"></i> Saved!';
                    this.style.background = '#10b981'; // Green
                    
                    // Update Preview in Form
                    var previewImg = document.getElementById('image-preview');
                    var placeholderIcon = document.getElementById('placeholder-icon');
                    var previewContainer = document.getElementById('image-preview-container');
                    
                    if(previewImg) {
                        previewImg.src = base64data;
                        previewImg.style.display = 'block';
                        if(placeholderIcon) placeholderIcon.style.display = 'none';
                        previewContainer.style.border = '2px solid #10b981'; // Green border to indicate success
                    }

                    setTimeout(() => {
                        hideOverlay(true); // Keep file input populated
                        this.innerHTML = '<i class="fas fa-check-circle"></i> Save Crop';
                        this.style.background = 'linear-gradient(135deg, #0056b3 0%, #004080 100%)'; // Reset color
                    }, 500);
                }
            });
        });
    </script>
</div>
@endsection
