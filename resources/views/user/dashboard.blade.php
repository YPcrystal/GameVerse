@extends('layouts.user')

@section('title', 'Dashboard Pengguna')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 class="page-header" style="margin-bottom: 0.5rem; border: none; padding-bottom: 0;">Dashboard</h1>
        <p style="color: var(--light-alpha); margin-top: -0.5rem;">Selamat datang kembali, {{ Auth::user()->name }}!</p>
    </div>
    <div style="background: rgba(25, 15, 50, 0.5); border: 1px solid rgba(255, 255, 255, 0.1); padding: 0.75rem 1rem; border-radius: 8px; font-family: 'Oxanium', sans-serif;">
        <i class="fas fa-calendar-alt" style="color: var(--accent);"></i>
        <span style="margin-left: 0.5rem;">{{ now()->translatedFormat('l, d F Y') }}</span>
    </div>
</div>


<div class="content-grid" style="margin-top: 2rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">

    <a href="#" class="content-card" style="text-decoration: none; color: var(--light);">
        <div style="text-align: center;">
            <div style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--primary); border-radius: 50%; margin: 0 auto 1rem auto; box-shadow: 0 0 20px rgba(112, 0, 255, 0.6);">
                <i class="fas fa-gamepad fa-2x"></i>
            </div>
            <h4 style="font-family: 'Oxanium'; margin-bottom: 0.25rem;">Lihat Game</h4>
            <p style="color: var(--light-alpha); font-size: 0.9rem;">Jelajahi semua koleksi game.</p>
        </div>
    </a>

    <a href="#" class="content-card" style="text-decoration: none; color: var(--light);">
        <div style="text-align: center;">
             <div style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--accent); border-radius: 50%; margin: 0 auto 1rem auto; box-shadow: 0 0 20px rgba(0, 255, 148, 0.5);">
                <i class="fas fa-ad fa-2x" style="color: var(--dark);"></i>
            </div>
            <h4 style="font-family: 'Oxanium'; margin-bottom: 0.25rem;">Kelola Iklan</h4>
            <p style="color: var(--light-alpha); font-size: 0.9rem;">Atur promosi dan iklan Anda.</p>
        </div>
    </a>

    <a href="#" class="content-card" style="text-decoration: none; color: var(--light);">
        <div style="text-align: center;">
             <div style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background-color: var(--secondary); border-radius: 50%; margin: 0 auto 1rem auto; box-shadow: 0 0 20px rgba(255, 0, 229, 0.6);">
                <i class="fas fa-star fa-2x"></i>
            </div>
            <h4 style="font-family: 'Oxanium'; margin-bottom: 0.25rem;">Ulasan Saya</h4>
            <p style="color: var(--light-alpha); font-size: 0.9rem;">Lihat semua ulasan yang Anda buat.</p>
        </div>
    </a>
</div>


<div class="content-grid" style="margin-top: 1.5rem; grid-template-columns: 1fr 2fr; gap: 1.5rem;">
    
    <div class="content-card" style="grid-column: 1 / -1; @media(min-width: 992px) { grid-column: 1 / 2; }">
        <h3 style="font-family: 'Oxanium'; color: var(--accent);"><i class="fas fa-user-circle me-3"></i> Profil Saya</h3>
        <hr style="border-color: rgba(255,255,255,0.1); margin: 1rem 0;">
        
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
            <div style="width: 60px; height: 60px; font-size: 1.8rem; flex-shrink: 0; background-color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: 'Oxanium';">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <h4 style="margin: 0; font-size: 1.1rem;">{{ Auth::user()->name }}</h4>
                <p style="margin: 0; font-size: 0.9rem; color: var(--light-alpha);">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div style="font-size: 0.9rem; display: flex; flex-direction: column; gap: 0.75rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; background: rgba(0,0,0,0.2); padding: 0.5rem 0.75rem; border-radius: 6px;">
                <span style="color: var(--light-alpha);"><i class="fas fa-calendar-plus fa-fw" style="color: var(--accent); margin-right: 0.5rem;"></i>Tanggal Bergabung</span>
                <span style="font-weight: 600;">{{ Auth::user()->created_at->translatedFormat('d M Y') }}</span>
            </div>
             <div style="display: flex; justify-content: space-between; align-items: center; background: rgba(0,0,0,0.2); padding: 0.5rem 0.75rem; border-radius: 6px;">
                <span style="color: var(--light-alpha);"><i class="fas fa-signal fa-fw" style="color: var(--accent); margin-right: 0.5rem;"></i>Status</span>
                <span style="font-weight: 600;">Pengguna Aktif</span>
            </div>
        </div>
    </div>

    <div class="content-card" style="grid-column: 1 / -1; @media(min-width: 992px) { grid-column: 2 / 3; }">
        <h3 style="font-family: 'Oxanium'; color: var(--accent);"><i class="fas fa-chart-line me-3"></i>Statistik & Aktivitas</h3>
        <hr style="border-color: rgba(255,255,255,0.1); margin: 1rem 0;">

        <div class="content-grid" style="grid-template-columns: 1fr 1fr;">
             <div style="background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 6px;">
                <p style="color: var(--light-alpha); margin-bottom: 0.5rem; font-size: 0.9rem;">Total Review</p>
                <p style="font-family: 'Oxanium'; font-size: 2rem; color: var(--secondary); margin: 0;">{{ $totalReviews ?? 0 }}</p>
            </div>
             <div style="background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 6px;">
                <p style="color: var(--light-alpha); margin-bottom: 0.5rem; font-size: 0.9rem;">Total Iklan Aktif</p>
                <p style="font-family: 'Oxanium'; font-size: 2rem; color: var(--secondary); margin: 0;">{{ $totalAds ?? 0 }}</p>
            </div>
             <div style="background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 6px;">
                <p style="color: var(--light-alpha); margin-bottom: 0.5rem; font-size: 0.9rem;">Total Game</p>
                <p style="font-family: 'Oxanium'; font-size: 2rem; color: var(--secondary); margin: 0;">{{ $totalGames ?? 0 }}</p>
            </div>
        </div>
    </div>

</div>

@endsection