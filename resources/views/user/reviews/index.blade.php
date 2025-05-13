@extends('layouts.user')

@section('title', 'Detail Game')

@section('content')
<div class="container mt-5">
    <h1>Detail Game</h1>

    @foreach ($games as $game)
        <h2>{{ $game->judul }}</h2>
        <p>Platform: {{ $game->platform }}</p>
        <p>Genre: {{ $game->genre }}</p>
        <p>Tanggal Rilis: {{ $game->tanggal_rilis }}</p>
        <p>Developer: {{ $game->developer }}</p>
        <p>Publisher: {{ $game->publisher }}</p>
        <p>Deskripsi Singkat: {{ $game->deskripsi_singkat }}</p>
        <img src="{{ asset($game->gambar_cover) }}" alt="Gambar Cover" class="img-fluid mb-3">

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
            <p>Trailer tidak tersedia.</p>
        @endif

        <h3>Reviews</h3>
        <ul>
            @foreach ($game->reviews as $review)
                <li>
                    <p>Rating:
                        <div class="star-rating">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $review->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="fas fa-star empty"></i>
                                @endif
                            @endfor
                        </div>
                    </p>
                    <p>Review: {{ $review->review }}</p>
                    @if ($review->user)
                        <p>User: {{ $review->user->name }}</p>
                    @else
                        <p>User: Tidak diketahui</p>
                    @endif
                </li>
            @endforeach
        </ul>

        <a href="{{ route('reviews.create', $game->id) }}" class="btn btn-primary">Tambah Review</a>
    @endforeach

    <a href="{{ route('games.index') }}" class="btn btn-secondary">Kembali ke Daftar Game</a>
</div>
@endsection