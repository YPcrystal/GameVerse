<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVerse - Your Universe of Games</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #7000FF;
            --secondary: #FF00E5;
            --accent: #00FF94;
            --dark: #0A041C;
            --light: #F5F3FF;
            --light-alpha: rgba(245, 243, 255, 0.75);
            --dark-alpha: rgba(10, 4, 28, 0.85);
            --secondary-alpha: rgba(255, 0, 229, 0.2); 
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--dark);
            background-image: radial-gradient(circle at 50% 50%, rgba(112, 0, 255, 0.15), var(--dark) 40%);
            color: var(--light);
            display: flex;
            min-height: 100vh;
        }

        /* --- Sidebar --- */
        .sidebar {
            width: 280px;
            background: var(--dark-alpha);
            backdrop-filter: blur(10px);
            padding: 2rem 1.5rem;
            position: fixed;
            height: 100vh;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease-in-out;
        }

        .logo-user {
            font-family: 'Oxanium', sans-serif;
            font-size: 1.8rem;
            color: var(--accent);
            margin-bottom: 3rem;
            text-align: center;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 255, 148, 0.5);
        }

        .nav-user {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            flex: 1 1 auto;
        }

        .nav-link {
            color: var(--light-alpha);
            text-decoration: none;
            padding: 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.2s ease;
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .nav-link:hover {
            /* Enhanced hover effect to be more similar to active, but with secondary color */
            background: rgba(255, 0, 229, 0.15); /* Using secondary color with alpha for hover background */
            transform: translateX(5px);
            color: #fff;
            border-left: 4px solid var(--secondary); /* Border color for hover */
            box-shadow: 0 0 10px rgba(255, 0, 229, 0.3); /* Shadow for hover */
        }

        .nav-link.active {
            background: linear-gradient(90deg, var(--primary), rgba(112, 0, 255, 0));
            border-left: 4px solid var(--accent);
            color: #fff;
            font-weight: 700;
            box-shadow: 0 0 15px rgba(112, 0, 255, 0.4);
        }

        /* --- Main Content --- */
        .main-content {
            margin-left: 280px;
            padding: 2.5rem;
            width: calc(100% - 280px);
            min-height: 100vh;
        }
        
        /* Reusable Content Styles */
        .page-header {
            font-family: 'Oxanium', sans-serif;
            font-size: 2.5rem;
            color: var(--light);
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--primary);
            padding-bottom: 0.5rem;
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .content-card {
            background: rgba(25, 15, 50, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 0 20px var(--secondary-alpha);
            border-color: var(--accent);
        }

        /* --- Responsive --- */
        @media (max-width: 991.98px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                height: auto;
                padding: 1rem;
                z-index: 1000;
            }
            .main-content {
                margin-left: 0;
                padding: 1.5rem;
                width: 100%;
            }
            .page-header {
                font-size: 2rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="sidebar">
        <div class="logo-user">GAMEVERSE</div>
        <nav class="nav-user">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('user.games.index') }}" class="nav-link {{ request()->routeIs('games.index') ? 'active' : '' }}">
                <i class="fas fa-gamepad"></i> Games
            </a>
            <a href="{{ route('user.iklans.index') }}" class="nav-link {{ request()->routeIs('iklans.index') ? 'active' : '' }}">
                <i class="fas fa-ad"></i> Iklan
            </a>
            <a href="{{ route('user.reviews.index') }}" class="nav-link {{ request()->routeIs('reviews.index') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Review
            </a>
            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <i class="fas fa-user-cog"></i> Edit Profil
            </a>
            <a href="{{ route('logout') }}" class="nav-link" style="margin-top: auto;"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </div>

    <main class="main-content">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>