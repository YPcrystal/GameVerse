<!DOCTYPE html>
<html>
<head>
    <title>Daftar Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Game</h1>

        <div class="row mb-3">
            <form action="{{ route('games.search') }}" method="GET" class="col-md-6">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search games...">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <div class="col-md-6">
                <form action="{{ route('games.index') }}" method="GET">
                    <div class="form-row">
                        <div class="col">
                            <select name="platform" class="form-control">
                                <option value="">All Platforms</option>
                                <option value="Android">Android</option>
                                <option value="iOS">iOS</option>
                                <option value="PC">PC</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="genre" class="form-control">
                                <option value="">All Genres</option>
                                <option value="Action">Action</option>
                                <option value="Strategy">Strategy</option>
                                <option value="RPG">RPG</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-secondary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('games.index') }}" method="GET">
                    <div class="form-row">
                        <div class="col">
                            <select name="sort_by" class="form-control">
                                <option value="rating_rata_rata">Rating</option>
                                <option value="tanggal_rilis">Release Date</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="sort_order" class="form-control">
                                <option value="desc">Descending</option>
                                <option value="asc">Ascending</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-info">Sort</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Tambah Game Baru</a>

        @if ($games->count() > 0)
            <table class="table table-bordered">
                <thead>
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
                                <a href="{{ route('games.show', $game->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada game yang ditemukan.</p>
        @endif

        <h2>Rekomendasi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Nama Game</th>
                    <th>Alasan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Game dengan rating tertinggi</td>
                    <td>{{ $recommendations['highestRatedGame']->judul ?? '-' }}</td>
                    <td>Game dengan rating rata-rata tertinggi.</td>
                </tr>
                <tr>
                    <td>Game terbaik</td>
                    <td>{{ $recommendations['bestGame']->judul ?? '-' }}</td>
                    <td>Game dengan kombinasi rating dan jumlah review terbaik.</td>
                </tr>
            </tbody>
        </table>

        <h2>Statistik</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Genre Terpopuler</h3>
                <ul>
                    @foreach ($popularGenres as $genre)
                        <li>{{ $genre->genre }} ({{ $genre->total }})</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Platform Terpopuler</h3>
                <ul>
                    @foreach ($popularPlatforms as $platform)
                        <li>{{ $platform->platform }} ({{ $platform->total }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>