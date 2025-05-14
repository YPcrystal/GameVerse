<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif; /* Menggunakan font dari contoh admin dashboard */
        }
        .sidebar {
            width: 250px; /* Lebar sidebar disesuaikan dari user dashboard */
            background-color: #343a40; /* Warna latar sidebar dari user dashboard */
            color: #fff; /* Warna teks sidebar dari user dashboard */
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: #adb5bd; /* Warna link dari user dashboard */
            padding: 10px 20px; /* Padding disesuaikan dari admin dashboard example */
            display: block;
            text-decoration: none;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #495057; /* Warna link aktif/hover dari user dashboard */
            color: #fff; /* Warna teks link aktif/hover dari user dashboard */
        }
        .main-content {
            padding: 20px;
            flex-grow: 1;
        }
        .dashboard-header {
            margin-bottom: 20px;
            padding-bottom: 0.5rem; /* Disesuaikan dari admin dashboard example (pb-2) */
            border-bottom: 1px solid #dee2e6; /* Disesuaikan dari admin dashboard example */
        }
        .dashboard-header h1 {
            font-size: 1.5rem; /* Ukuran font h2 dari admin dashboard example */
            font-weight: bold; /* Font weight dari user dashboard */
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
        <nav class="sidebar d-flex flex-column">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('games.index') }}" class="nav-link {{ request()->routeIs('games.index') ? 'active' : '' }}">
                <i class="fas fa-gamepad me-2"></i> Kelola Game
            </a>
            <a href="{{ route('iklans.index') }}" class="nav-link {{ request()->routeIs('iklans.index') ? 'active' : '' }}">
                <i class="fas fa-ad me-2"></i> Kelola Iklan
            </a>
            <a href="{{ route('reviews.index') }}" class="nav-link {{ request()->routeIs('reviews.index') ? 'active' : '' }}">
                <i class="fas fa-star me-2"></i> Kelola Review
            </a>
            <a href="{{ route('logout') }}" class="nav-link mt-auto" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>

        <div class="main-content">
            <header class="dashboard-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center"> <h1 class="h2">@yield('title', 'Dashboard')</h1> </header>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-gradient-primary text-white"> <i class="fas fa-gamepad"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">Total Games</h5>
                                <p class="mb-0">{{ $totalGames ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-gradient-success text-white"> <i class="fas fa-ad"></i>
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
                            <div class="stats-icon bg-gradient-warning text-white"> <i class="fas fa-star"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0">Total Review</h5>
                                <p class="mb-0">{{ $totalReviews ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>
</html>