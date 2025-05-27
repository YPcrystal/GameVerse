<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVerse - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #7000FF;
            --secondary: #FF00E5;
            --accent: #00FF94;
            --dark: #0A041C;
            --light: #F5F3FF;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: var(--dark);
            color: var(--light);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: rgba(10, 4, 28, 0.95);
            padding: 2rem 1.5rem;
            position: fixed;
            height: 100vh;
            border-right: 1px solid rgba(255,255,255,0.1);
            display: flex;
            flex-direction: column;
        }

        .logo-admin {
            font-family: 'Oxanium', sans-serif;
            font-size: 1.8rem;
            color: var(--accent);
            margin-bottom: 3rem;
            text-align: center;
            letter-spacing: 2px;
        }

        .nav-admin {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            flex: 1 1 auto;
        }

        .nav-link {
            color: var(--light);
            text-decoration: none;
            padding: 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(112,0,255,0.2);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(90deg, var(--primary), rgba(112,0,255,0));
            border-left: 4px solid var(--accent);
            color: #fff;
        }

        .nav-link.mt-auto {
            margin-top: auto;
        }

        .main-content {
            margin-left: 280px;
            padding: 2.5rem 2rem 2rem 2rem;
            width: 100%;
            min-height: 100vh;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                height: auto;
                padding: 1rem;
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-admin">GAMEVERSE ADMIN</div>
        <nav class="nav-admin">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                Users
            </a>
            <a href="{{ route('admin.games.index') }}" class="nav-link {{ request()->routeIs('admin.games.*') ? 'active' : '' }}">
                <i class="fas fa-gamepad"></i>
                Games
            </a>
            <a href="{{ route('admin.iklans.index') }}" class="nav-link {{ request()->routeIs('admin.iklans.*') ? 'active' : '' }}">
                <i class="fas fa-ad"></i>
                Advertisements
            </a>
            <a href="{{ route('admin.reviews.index') }}" class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <i class="fas fa-star"></i>
                Reviews
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-chart-bar"></i>
                Analytics
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-cog"></i>
                Settings
            </a>
            <a href="{{ route('logout') }}" class="nav-link mt-auto"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>