<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }
        .main-content {
            padding: 20px;
            flex-grow: 1;
        }
        .dashboard-header {
            margin-bottom: 20px;
        }
        .dashboard-header h1 {
            font-size: 24px;
            font-weight: bold;
        }
        .stats-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar d-flex flex-column">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
            <a href="{{ route('user.games.index') }}" class="nav-link {{ request()->routeIs('games.index') ? 'active' : '' }}">
                <i class="fas fa-gamepad me-2"></i> Games
            </a>
            <a href="{{ route('user.iklans.index') }}" class="nav-link {{ request()->routeIs('iklans.index') ? 'active' : '' }}">
                <i class="fas fa-ad me-2"></i> Iklan
            </a>
            <a href="{{ route('user.reviews.index') }}" class="nav-link {{ request()->routeIs('reviews.index') ? 'active' : '' }}">
                <i class="fas fa-star me-2"></i> Review
            </a>
            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <i class="fas fa-user-cog me-2"></i> Edit Profil
            </a>
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header class="dashboard-header">
                <h1>@yield('title', 'User Dashboard')</h1>
                <p>Selamat datang, {{ Auth::user()->name }}!</p>
            </header>

            <div class="row g-4">
                <!-- Card Statistik -->
                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-gradient-primary text-white">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">Total Review</h5>
                                <p class="mb-0">{{ $totalReviews ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-gradient-success text-white">
                                <i class="fas fa-ad"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">Total Iklan</h5>
                                <p class="mb-0">{{ $totalAds ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-gradient-warning text-white">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">Total Games</h5>
                                <p class="mb-0">{{ $totalGames ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Area Konten -->
            <div class="mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>
</html>