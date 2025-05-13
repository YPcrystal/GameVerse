@extends('layouts.user')

@section('title', 'Detail Game')

@section('content')
<div class="container mt-5">
    <h1>Detail Game</h1>

    <h2>{{ $game->judul }}</h2>
    <p><strong>Platform:</strong> {{ $game->platform }}</p>
    <p><strong>Genre:</strong> {{ $game->genre }}</p>
    <p><strong>Tanggal Rilis:</strong> {{ $game->tanggal_rilis }}</p>
    <p><strong>Deskripsi:</strong> {{ $game->deskripsi_singkat }}</p>

    @if ($game->gambar_cover)
        <img src="{{ asset($game->gambar_cover) }}" alt="Gambar Cover" class="img-fluid mb-3">
    @else
        <p><em>Gambar tidak tersedia.</em></p>
    @endif

    @if (strpos($game->trailer, 'youtube.com') !== false || strpos($game->trailer, 'youtu.be') !== false)
        @php
            if (strpos($game->trailer, 'watch?v=') !== false) {
                $trailerUrl = str_replace('watch?v=', 'embed/', $game->trailer);
            } elseif (strpos($game->trailer, 'youtu.be') !== false) {
                $trailerUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $game->trailer);
            }
            $trailerUrl = strtok($trailerUrl, '&');
        @endphp
        <iframe width="560" height="315" src="{{ $trailerUrl }}" frameborder="0" allowfullscreen></iframe>
    @else
        <p><em>Trailer tidak tersedia.</em></p>
    @endif

    <h3>Review Anda</h3>
    @if ($userReview)
        <p><strong>Rating:</strong></p>
        <div class="star-rating">
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $userReview->rating)
                    <i class="fas fa-star text-warning"></i>
                @else
                    <i class="fas fa-star text-secondary"></i>
                @endif
            @endfor
        </div>
        <p><strong>Komentar:</strong> {{ $userReview->comment }}</p>
        <a href="{{ route('reviews.edit', $userReview->id) }}" class="btn btn-warning btn-sm">Edit Review</a>
        <form action="{{ route('reviews.destroy', $userReview->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus review ini?')">Hapus Review</button>
        </form>
    @else
        <p>Anda belum memberikan review untuk game ini.</p>
        <a href="{{ route('reviews.create', ['game' => $game->id]) }}" class="btn btn-primary">Tambah Review</a>
    @endif

    <a href="{{ route('games.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Game</a>
</div>
@endsection