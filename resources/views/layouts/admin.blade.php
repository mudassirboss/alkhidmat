<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Alkhidmat</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #004080;
            --accent: #d4af37;
            --bg: #f4f6f9;
            --sidebar-width: 260px;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: #002d5b;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            overflow-y: auto;
        }
        .sidebar-header {
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
            text-align: center;
        }
        .admin-logo {
            width: 60px;
            margin-bottom: 10px;
        }
        .nav-item {
            display: block;
            padding: 12px 15px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: 0.3s;
            font-weight: 500;
        }
        .nav-item:hover, .nav-item.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .nav-item.logout {
            color: #ff6b6b;
            margin-top: 50px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 30px;
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        h1 { margin: 0; font-size: 1.8rem; color: #333; }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }
        .stat-label { color: #666; font-size: 0.9rem; font-weight: 500; }
        .stat-value { font-size: 2.2rem; font-weight: 700; color: var(--primary); margin: 10px 0; }
        
        /* Table Styles */
        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 25px;
        }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { text-align: left; padding: 15px; border-bottom: 1px solid #eee; }
        th { color: #666; font-weight: 600; font-size: 0.9rem; }
        .btn-sm {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.85rem;
            color: white;
            background: var(--primary);
        }
        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-verified { background: #d4edda; color: #155724; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="admin-logo">
            <h3 style="margin:0; font-size: 1.2rem;">Admin Panel</h3>
        </div>
        
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">📊 Dashboard</a>
            <a href="{{ route('admin.donations.index') }}" class="nav-item {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}">💰 Donations</a>
            <a href="{{ route('admin.volunteers.index') }}" class="nav-item {{ request()->routeIs('admin.volunteers.*') ? 'active' : '' }}">👥 Volunteers</a>
            <a href="{{ route('admin.posts.index') }}" class="nav-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">📰 News & Stories</a>
            <a href="{{ route('admin.programs.index') }}" class="nav-item {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">🎗️ Programs</a>
            <a href="{{ route('admin.settings.index') }}" class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">⚙️ General Settings</a>
            <a href="{{ route('admin.subscribers.index') }}" class="nav-item {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">📧 Subscribers</a>
            <a href="{{ route('admin.galleries.index') }}" class="nav-item {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">📷 Gallery</a>
            <a href="{{ route('admin.sliders.index') }}" class="nav-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">🖼️ Hero Sliders</a>
            
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-item logout" style="background:none; border:none; width:100%; text-align:left; cursor:pointer;">🚪 Logout</button>
            </form>
        </nav>
    </div>
    
    <div class="main-content">
        @yield('content')
    </div>

    <!-- TinyMCE (WordPress-like Editor) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.rich-editor',
            height: 400,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: 'body { font-family:Inter,Helvetica,Arial,sans-serif; font-size:16px }',
            branding: false,
            promotion: false
        });
    </script>
</body>
</html>
