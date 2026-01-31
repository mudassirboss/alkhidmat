@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>General Settings</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px;">
    {{ session('success') }}
</div>
@endif

<div class="table-card" style="max-width: 800px;">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <h3 style="border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:20px;">Contact Information</h3>
        
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Site Title</label>
            <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Primary Phone</label>
            <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Secondary Phone</label>
            <input type="text" name="contact_phone_2" value="{{ $settings['contact_phone_2'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Email Address</label>
            <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Headoffice Address</label>
            <input type="text" name="contact_address" value="{{ $settings['contact_address'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <h3 style="border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:20px; margin-top:30px;">Social Media Links</h3>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Facebook URL</label>
            <input type="url" name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Twitter (X) URL</label>
            <input type="url" name="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">Instagram URL</label>
            <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:8px; font-weight:600;">YouTube URL</label>
            <input type="url" name="social_youtube" value="{{ $settings['social_youtube'] ?? '' }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
        </div>

        <button type="submit" class="btn-sm" style="background:#27ae60; padding:12px 25px; font-size:1rem; cursor:pointer; border:none;">Save Changes</button>
    </form>
</div>
@endsection
