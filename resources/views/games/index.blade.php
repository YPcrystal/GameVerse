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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>