<!DOCTYPE html>
<html>
<head>
    <title>Daftar Game</title>
</head>
<body>
    <h1>Daftar Game</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="/games/create">Tambah Game Baru</a>

    @if ($games->count() > 0)
        <table>
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
                            <a href="/games/{{ $game->id }}">Detail</a>
                            <a href="/games/{{ $game->id }}/edit">Edit</a>
                            <form action="/games/{{ $game->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada game yang ditemukan.</p>
    @endif

    <form action="/games/search" method="GET">
        <input type="text" name="keyword" placeholder="Cari game...">
        <button type="submit">Cari</button>
    </form>
</body>
</html>