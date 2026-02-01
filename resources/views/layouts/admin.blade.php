<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Alkhidmat</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Cropper.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <style>
        :root {
            --primary: #004080;
            --primary-light: #0056b3;
            --accent: #d4af37;
            --bg: #f8fafc;
            --sidebar-bg: #002d5b;
            --sidebar-width: 280px;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --glass: rgba(255, 255, 255, 0.95);
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            margin: 0;
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* Sidebar Wrapper */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: white;
            padding: 30px 20px;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-header {
            text-align: center;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 30px;
        }

        .admin-logo {
            width: 70px;
            margin-bottom: 15px;
            filter: drop-shadow(0 0 10px rgba(0,0,0,0.2));
        }

        /* Navigation */
        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
        }

        .nav-item i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: var(--primary-light);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .nav-item.logout {
            color: #ffa5a5;
            margin-top: 40px;
            border: 1px solid rgba(255,165,165,0.2);
        }

        .nav-item.logout:hover {
            background: #ff5252;
            border-color: #ff5252;
        }

        /* Main Content Area */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 40px;
            width: 100%;
            transition: 0.3s ease;
        }

        /* Mobile Header */
        .mobile-top-bar {
            display: none;
            background: white;
            padding: 15px 25px;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .menu-toggle {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
        }

        /* Glass Cards */
        .card-ui {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(0,0,0,0.03);
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        h1 { margin: 0; font-size: 1.8rem; font-weight: 700; color: var(--primary); }

        /* Tables */
        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 15px 20px;
            text-align: left;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            font-weight: 600;
            border-bottom: 2px solid #edf2f7;
        }

        td {
            padding: 18px 20px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
            font-size: 0.95rem;
        }

        tr:hover td { background: #fdfdfd; }

        /* Buttons */
        .btn-ui {
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            cursor: pointer;
            border: none;
        }

        .btn-primary-ui { background: var(--primary); color: white; }
        .btn-primary-ui:hover { background: var(--primary-light); transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,64,128,0.2); }

        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 25px;
            }
            .mobile-top-bar {
                display: flex;
            }
            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.5);
                z-index: 950;
                backdrop-filter: blur(2px);
            }
            .sidebar-overlay.show {
                display: block;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        /* Bootstrap Overrides & Fixes */
        a { text-decoration: none; }
        
        .nav-item {
            text-decoration: none !important; /* Force remove underline from sidebar links */
        }
        
        /* Ensure sidebar stays above Bootstrap container */
        .sidebar { z-index: 1050; }
        
        /* Fix overlapping with bootstrap container */
        .container-fluid { padding: 0; }
        
        /* Fix Input Focus Ring Color */
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(0, 86, 179, 0.25);
        }
        
        /* Restore custom card style if needed, though Bootstrap cards are used now */
        .card-ui { border: none; }
    </style>
</head>
<body>

    <div class="mobile-top-bar">
        <div style="font-weight: 700; color: var(--primary);">ALKHIDMAT ADMIN</div>
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="admin-wrapper">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="admin-logo">
                <h3 style="margin:0; font-size: 1.25rem;">Admin Center</h3>
            </div>
            
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="{{ route('admin.donations.index') }}" class="nav-item {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}">
                    <i class="fas fa-hand-holding-heart"></i> Donations
                </a>
                <a href="{{ route('admin.volunteers.index') }}" class="nav-item {{ request()->routeIs('admin.volunteers.*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i> Volunteers
                </a>
                <a href="{{ route('admin.team-members.index') }}" class="nav-item {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i> Our Team
                </a>
                <a href="{{ route('admin.posts.index') }}" class="nav-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i> News & Stories
                </a>
                <a href="{{ route('admin.programs.index') }}" class="nav-item {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                    <i class="fas fa-ribbon"></i> Programs
                </a>
                <a href="{{ route('admin.settings.index') }}" class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i> General Settings
                </a>
                <a href="{{ route('admin.subscribers.index') }}" class="nav-item {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope-open-text"></i> Subscribers
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="nav-item {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i> Photo Gallery
                </a>
                <a href="{{ route('admin.sliders.index') }}" class="nav-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i> Hero Sliders
                </a>
                
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-item logout" style="background:none; border:none; width:100%; text-align:left; cursor:pointer;">
                        <i class="fas fa-sign-out-alt"></i> Sign Out
                    </button>
                </form>
            </nav>
        </div>
        
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Mobile Navigation Logic -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if(menuToggle) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });
        }

        if(overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        }
    </script>

    <!-- TinyMCE (WordPress-like Editor) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.rich-editor',
            height: 450,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
            'bold italic underline | forecolor alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | image media link | help',
            content_style: 'body { font-family:Outfit,Helvetica,Arial,sans-serif; font-size:16px }',
            branding: false,
            promotion: false,
            skin: 'oxide',
            content_css: 'default'
        });
    </script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
