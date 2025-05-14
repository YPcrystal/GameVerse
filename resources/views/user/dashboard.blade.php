@extends('layouts.user')

@section('title', 'Dashboard Pengguna')

@section('content')
<div class="container-fluid px-4 px-lg-5">
    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
        <div class="mb-3 mb-md-0">
            <h1 class="gradient-text-primary mb-1">Dashboard Pengguna</h1>
            <p class="lead text-muted mb-0">Selamat datang kembali, {{ Auth::user()->name }}!</p>
        </div>
        <div class="badge bg-dark text-wrap p-3">
            <i class="fas fa-calendar-alt me-2"></i>{{ now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <!-- Grid Konten -->
    <div class="row g-4">
        <!-- Kolom Profil -->
        <div class="col-xl-4">
            <!-- Card Profil -->
            <div class="card border-0 shadow-lg overflow-hidden game-card">
                <div class="card-header bg-gradient-primary text-white p-4">
                    <h5 class="mb-0 d-flex align-items-center">
                        <i class="fas fa-user-circle me-3 fs-4"></i>Informasi Profil
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-4" 
                             style="width: 80px; height: 80px; font-size: 2rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="h5 mb-1">{{ Auth::user()->name }}</h3>
                            <small class="text-muted d-block">{{ Auth::user()->email }}</small>
                            <span class="badge bg-success mt-2">Pengguna Aktif</span>
                        </div>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-0 py-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-plus text-primary me-2"></i>
                                <span>Tanggal Bergabung</span>
                            </div>
                            <span class="badge bg-dark">{{ Auth::user()->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Utama -->
        <div class="col-xl-8">
            <!-- Quick Actions -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <a href="{{ route('games.index') }}" class="card h-100 action-card hover-effect transform-on-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper bg-primary-gradient rounded-circle mx-auto mb-3">
                                <i class="fas fa-gamepad fa-2x text-white"></i>
                            </div>
                            <h6 class="mb-0 fw-bold">Lihat Game</h6>
                            <p class="text-muted small mb-0">Kelola koleksi game Anda</p>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4">
                    <a href="{{ route('iklans.index') }}" class="card h-100 action-card hover-effect transform-on-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper bg-success-gradient rounded-circle mx-auto mb-3">
                                <i class="fas fa-ad fa-2x text-white"></i>
                            </div>
                            <h6 class="mb-0 fw-bold">Kelola Iklan</h6>
                            <p class="text-muted small mb-0">Atur promosi Anda</p>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4">
                    <a href="{{ route('reviews.index') }}" class="card h-100 action-card hover-effect transform-on-hover">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper bg-info-gradient rounded-circle mx-auto mb-3">
                                <i class="fas fa-star fa-2x text-white"></i>
                            </div>
                            <h6 class="mb-0 fw-bold">Ulasan Saya</h6>
                            <p class="text-muted small mb-0">Lihat semua ulasan</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Statistik -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg h-100 game-card">
                        <div class="card-header bg-gradient-success text-white p-3">
                            <h5 class="mb-0 d-flex align-items-center">
                                <i class="fas fa-chart-line me-3"></i>Aktivitas Terkini
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="stat-item d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-comment-alt text-success me-3"></i>
                                    <div>
                                        <span class="d-block">Total Review</span>
                                        <small class="text-muted">30 hari terakhir</small>
                                    </div>
                                </div>
                                <span class="badge bg-success rounded-pill fs-6">{{ $totalReviews }}</span>
                            </div>
                            <div class="stat-item d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-ad text-success me-3"></i>
                                    <div>
                                        <span class="d-block">Total Iklan</span>
                                        <small class="text-muted">Aktif sekarang</small>
                                    </div>
                                </div>
                                <span class="badge bg-success rounded-pill fs-6">{{ $totalAds }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-lg h-100 game-card">
                        <div class="card-header bg-gradient-warning text-white p-3">
                            <h5 class="mb-0 d-flex align-items-center">
                                <i class="fas fa-trophy me-3"></i>Statistik Game
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="stat-item d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-gamepad text-warning me-3"></i>
                                    <div>
                                        <span class="d-block">Total Game</span>
                                        <small class="text-muted">Dalam sistem</small>
                                    </div>
                                </div>
                                <span class="badge bg-warning rounded-pill fs-6">{{ $totalGames ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .gradient-text-primary {
        background: linear-gradient(45deg, #4e54c8, #8f94fb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .icon-wrapper {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }
    
    .hover-effect:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
    
    .bg-gradient-primary { background: linear-gradient(45deg, #4e54c8, #8f94fb); }
    .bg-gradient-success { background: linear-gradient(45deg, #00b09b, #96c93d); }
    .bg-gradient-warning { background: linear-gradient(45deg, #ff6b6b, #ff9f43); }
    
    .bg-primary-gradient { background: linear-gradient(45deg, #4e54c8, #8f94fb); }
    .bg-success-gradient { background: linear-gradient(45deg, #00b09b, #96c93d); }
    .bg-info-gradient { background: linear-gradient(45deg, #4b6cb7, #182848); }
</style>
@endsection