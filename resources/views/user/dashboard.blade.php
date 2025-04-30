@extends('layouts.user')

@section('title', 'Dashboard Pengguna')

@section('content')
<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text mb-0">Dashboard Pengguna</h1>
        <div class="badge bg-dark text-wrap">
            <i class="fas fa-calendar-alt me-2"></i>{{ now()->format('d M Y') }}
        </div>
    </div>

    <!-- Grid Konten -->
    <div class="row g-4">
        <!-- Kolom Profil -->
        <div class="col-xl-4">
            <!-- Card Profil -->
            <div class="card border-0 shadow-lg game-card">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar bg-primary text-white rounded-circle me-3">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                        </div>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-transparent d-flex justify-content-between">
                            <span><i class="fas fa-calendar-plus me-2"></i>Bergabung</span>
                            <span>{{ Auth::user()->created_at->format('d M Y') }}</span>
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
                    <a href="{{ route('games.index') }}" class="card action-card hover-effect">
                        <div class="card-body text-center">
                            <div class="icon-wrapper bg-primary">
                                <i class="fas fa-gamepad fa-2x"></i>
                            </div>
                            <h6 class="mt-3 mb-0">Lihat Game</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('iklans.index') }}" class="card action-card hover-effect">
                        <div class="card-body text-center">
                            <div class="icon-wrapper bg-success">
                                <i class="fas fa-ad fa-2x"></i>
                            </div>
                            <h6 class="mt-3 mb-0">Kelola Iklan</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('reviews.index') }}" class="card action-card hover-effect">
                        <div class="card-body text-center">
                            <div class="icon-wrapper bg-info">
                                <i class="fas fa-star fa-2x"></i>
                            </div>
                            <h6 class="mt-3 mb-0">Lihat Review</h6>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Statistik -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg game-card">
                        <div class="card-header bg-gradient-success text-white py-3">
                            <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Statistik Aktivitas</h5>
                        </div>
                        <div class="card-body">
                            <div class="stat-item d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <i class="fas fa-comment-alt me-2"></i>
                                    <span>Total Review</span>
                                </div>
                                <span class="badge bg-dark">{{ $totalReviews }}</span>
                            </div>
                            <div class="stat-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-ad me-2"></i>
                                    <span>Total Iklan</span>
                                </div>
                                <span class="badge bg-dark">{{ $totalAds }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-lg game-card">
                        <div class="card-header bg-gradient-warning text-white py-3">
                            <h5 class="mb-0"><i class="fas fa-gamepad me-2"></i>Statistik Game</h5>
                        </div>
                        <div class="card-body">
                            <div class="stat-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-gamepad me-2"></i>
                                    <span>Total Game</span>
                                </div>
                                <span class="badge bg-dark">{{ $totalGames ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection