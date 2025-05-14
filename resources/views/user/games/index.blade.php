@extends('layouts.user')

@section('title', 'Kelola Game')

@section('content')
<div class="container mt-3">
    <h1 class="mb-4 text-center">Kelola Game</h1>

    <!-- Search and Filter Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('games.search') }}" method="GET" class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari game...">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('user.games.index') }}" method="GET" class="row">
                <div class="col">
                    <select name="sort_by" class="form-control">
                        <option value="rating_rata_rata">Rating</option>
                        <option value="tanggal_rilis">Tanggal Rilis</option>
                    </select>
                </div>
                <div class="col">
                    <select name="sort_order" class="form-control">
                        <option value="desc">Menurun</option>
                        <option value="asc">Menaik</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-info"><i class="fas fa-sort"></i> Urutkan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Game Table -->
    <div class="mb-4">
        <a href="{{ route('user.games.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Game Baru</a>
        @if ($games->count() > 0)
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Platform</th>
                        <th>Genre</th>
                        <th>Tanggal Rilis</th>
                        <th>Nilai Rata-Rata</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <td>{{ $game->judul }}</td>
                            <td>{{ $game->platform }}</td>
                            <td>{{ $game->genre }}</td>
                            <td>{{ $game->tanggal_rilis }}</td>
                            <td>{{ number_format($game->rating_rata_rata, 1) }}</td>
                            <td>
                                <a href="{{ route('user.games.show', $game->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('user.games.edit', $game->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit Game"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('user.games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus Game"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-danger">Tidak ada game yang ditemukan.</p>
        @endif
    </div>

    <!-- Statistik Section -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Genre Terpopuler</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($popularGenres as $genre)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $genre->genre }}
                                <span class="badge bg-primary rounded-pill">{{ $genre->total }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Platform Terpopuler</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($popularPlatforms as $platform)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $platform->platform }}
                                <span class="badge bg-success rounded-pill">{{ $platform->total }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection