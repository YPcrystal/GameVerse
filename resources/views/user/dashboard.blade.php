@extends('layouts.admin')

@section('title', 'Dashboard Pengguna')

@section('content')
<div class="container mt-3">
    <h1 class="mb-4 text-center">Dashboard Pengguna</h1>

    <!-- Informasi Profil -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Informasi Profil</h5>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Tanggal Bergabung:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <!-- Navigasi Cepat -->
    <div class="row mb-4">
        <div class="col-md-4">
            <a href="{{ route('games.index') }}" class="btn btn-primary w-100"><i class="fas fa-gamepad"></i> Lihat Game</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('iklans.index') }}" class="btn btn-success w-100"><i class="fas fa-ad"></i> Kelola Iklan</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('reviews.index') }}" class="btn btn-info w-100"><i class="fas fa-star"></i> Lihat Review</a>
        </div>
    </div>

    <!-- Statistik Pengguna -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Statistik</h5>
                </div>
                <div class="card-body">
                    <p><strong>Total Review:</strong> {{ $totalReviews }}</p>
                    <p><strong>Total Iklan:</strong> {{ $totalAds }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title">Aktivitas Terbaru</h5>
                </div>
                <div class="card-body">
                    @if ($recentActivities->count() > 0)
                        <ul class="list-group">
                            @foreach ($recentActivities as $activity)
                                <li class="list-group-item">
                                    {{ $activity->description }} - <small>{{ $activity->created_at->diffForHumans() }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Belum ada aktivitas terbaru.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection