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

        <a href="/games/create" class="btn btn-primary mb-3">Tambah Game Baru</a>

        @if ($games->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Platform</th>
                        <th>Genre</th>
                        <th>Tanggal Rilis</th>
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
                            <td>
                                <a href="/games/{{ $game->id }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/games/{{ $game->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/games/{{ $game->id }}" method="POST" style="display:inline;">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>