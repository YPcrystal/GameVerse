<!DOCTYPE html>
<html>
<head>
    <title>Daftar Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Game</h1>

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
                            <td>{{ number_format($game->rating_rata_rata, 1) }}</td> {{-- Gunakan $game->rating_rata_rata --}}
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
        @if ($games->isNotEmpty())  {{-- Periksa apakah ada game --}}
            @foreach ($games as $game) {{-- Loop melalui games untuk mengambil rekomendasi --}}
                @if ($game->recommendations->isNotEmpty()) {{-- Periksa apakah ada rekomendasi untuk game ini --}}
                    <h3>Rekomendasi untuk {{ $game->judul }}</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kategori Rekomendasi</th>
                                <th>Alasan Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($game->recommendations as $recommendation)
                                <tr>
                                    <td>{{ $recommendation->category->nama_kategori ?? $recommendation->category }}</td> {{-- Gunakan relasi category dan nama_kategori --}}
                                    <td>{{ $recommendation->reason }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endforeach
        @else
            <p>Tidak ada rekomendasi yang ditemukan.</p>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>