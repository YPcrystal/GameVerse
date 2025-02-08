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

    <!-- search and filter -->
    <div class="row">
        <form action="{{ route('games.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" placeholder="Search games...">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <form action="/games" method="GET">
        <select name="platform">
            <option value="">Semua Platform</option>
            <option value="PC">PC</option>
            <option value="PS5">PS5</option>
            <option value="Xbox Series X">Xbox Series X</option>
            <option value="Switch">Switch</option>
        </select>

        <select name="genre">
            <option value="">Semua Genre</option>
            <option value="Action">Action</option>
            <option value="RPG">RPG</option>
            <option value="Strategy">Strategy</option>
        </select>

        <button type="submit">Filter</button>
    </form>

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

</body>
</html>