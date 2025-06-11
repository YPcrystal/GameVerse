@extends('layouts.user')

@section('title', 'Kelola Iklan')

@section('content')
<style>
    .ads-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }
    .ads-card {
        background: rgba(25, 15, 50, 0.5);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        padding: 1.5rem 1.2rem 1.2rem 1.2rem;
        color: var(--light);
        box-shadow: 0 4px 24px 0 rgba(112,0,255,0.07);
        transition: box-shadow 0.2s, border 0.2s, transform 0.2s;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .ads-card:hover {
        border-color: var(--accent);
        box-shadow: 0 8px 32px 0 var(--secondary-alpha);
        transform: translateY(-4px) scale(1.01);
    }
    .ads-image {
        width: 100%;
        max-width: 220px;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1rem;
        background: #222;
        align-self: center;
    }
    .ads-title {
        font-family: 'Oxanium', sans-serif;
        font-size: 1.3rem;
        color: var(--accent);
        margin-bottom: 0.3rem;
        font-weight: 700;
    }
    .ads-desc {
        color: var(--light-alpha);
        font-size: 1rem;
        margin-bottom: 0.7rem;
        min-height: 48px;
    }
    .ads-info {
        display: flex;
        flex-wrap: wrap;
        gap: 1.2rem;
        margin-bottom: 0.7rem;
        font-size: 0.98rem;
    }
    .ads-badge {
        display: inline-block;
        padding: 0.3em 0.9em;
        border-radius: 6px;
        font-size: 0.95em;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .ads-badge.aktif {
        background: var(--accent);
        color: var(--dark);
    }
    .ads-badge.pending {
        background: var(--secondary);
        color: #fff;
    }
    .ads-badge.other {
        background: #ffb300;
        color: #222;
    }
    .ads-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: auto;
        flex-wrap: wrap;
    }
    .ads-btn {
        border: none;
        outline: none;
        padding: 0.5em 1.1em;
        border-radius: 6px;
        font-size: 0.98em;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.18s, color 0.18s;
        display: flex;
        align-items: center;
        gap: 0.5em;
        text-decoration: none;
    }
    .ads-btn.pay {
        background: var(--primary);
        color: #fff;
    }
    .ads-btn.pay:hover {
        background: var(--secondary);
        color: #fff;
    }
    .ads-btn.detail {
        background: var(--accent);
        color: var(--dark);
    }
    .ads-btn.detail:hover {
        background: var(--primary);
        color: #fff;
    }
    .ads-btn.edit {
        background: var(--secondary);
        color: #fff;
    }
    .ads-btn.edit:hover {
        background: var(--primary);
        color: #fff;
    }
    .ads-btn.delete {
        background: #ff3b3b;
        color: #fff;
    }
    .ads-btn.delete:hover {
        background: #b30000;
        color: #fff;
    }
    .ads-label {
        font-size: 0.95em;
        color: var(--light-alpha);
        margin-right: 0.5em;
    }
    @media (max-width: 600px) {
        .ads-grid { grid-template-columns: 1fr; }
    }
</style>

<h1 class="page-header" style="text-align:center;">Daftar Iklan</h1>

<div class="text-center mb-4">
    <a href="{{ route('user.iklans.create') }}" class="ads-btn pay" style="font-size:1.05em;"><i class="fas fa-plus"></i> Tambah Iklan</a>
</div>

<div class="ads-grid">
    @forelse ($iklans as $iklan)
        <div class="ads-card">
            <img src="{{ $iklan->image ? asset('storage/' . $iklan->image) : 'https://via.placeholder.com/220x120?text=No+Image' }}" alt="Gambar Iklan" class="ads-image">
            <div class="ads-title">{{ $iklan->judul }}</div>
            <div class="ads-desc">{{ $iklan->deskripsi }}</div>
            <div class="ads-info">
                <span class="ads-label"><i class="fas fa-clock"></i> {{ $iklan->durasi }} hari</span>
                <span class="ads-label"><i class="fas fa-money-bill-wave"></i> Rp{{ number_format($iklan->harga, 0, ',', '.') }}</span>
                @php
                    $statusClass = $iklan->status === 'aktif' ? 'aktif' : ($iklan->status === 'pending' ? 'pending' : 'other');
                    $statusText = $iklan->status === 'aktif' ? 'Aktif' : ($iklan->status === 'pending' ? 'Menunggu Pembayaran' : ucfirst($iklan->status));
                @endphp
                <span class="ads-badge {{ $statusClass }}">{{ $statusText }}</span>
            </div>
            <div class="ads-actions">
                @if($iklan->status != 'aktif')
                    <a href="{{ route('user.iklans.payment', $iklan->id) }}" class="ads-btn pay"><i class="fas fa-credit-card"></i> Bayar</a>
                @endif
                <a href="{{ route('user.iklans.show', $iklan->id) }}" class="ads-btn detail"><i class="fas fa-eye"></i> Detail</a>
                <a href="{{ route('user.iklans.edit', $iklan->id) }}" class="ads-btn edit"><i class="fas fa-edit"></i> Edit</a>
                <form action="{{ route('user.iklans.destroy', $iklan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ads-btn delete" onclick="return confirm('Yakin ingin menghapus iklan ini?')"><i class="fas fa-trash"></i> Hapus</button>
                </form>
            </div>
        </div>
    @empty
        <div style="grid-column: 1/-1; text-align:center; color:var(--light-alpha); font-size:1.1em;">Belum ada iklan.</div>
    @endforelse
</div>
@endsection