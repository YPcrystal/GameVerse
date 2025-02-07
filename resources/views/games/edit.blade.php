<!DOCTYPE html>
<html>
<head>
    <title>Edit Game</title>
</head>
<body>
    <h1>Edit Game</h1>

    <form action="/games/{{ $game->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="{{ $game->judul }}" required><br><br>

        <label for="platform">Platform:</label>
        <input type="text" name="platform" id="platform" value="{{ $game->platform }}" required><br><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="{{ $game->genre }}" required><br><br>

        <label for="tanggal_rilis">Tanggal Rilis:</label>
        <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ $game->tanggal_rilis }}" required><br><br>

        <label for="developer">Developer:</label>
        <input type="text" name="developer" id="developer" value="{{ $game->developer }}" required><br><br>

        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" id="publisher" value="{{ $game->publisher }}" required><br><br>

        <label for="deskripsi_singkat">Deskripsi Singkat:</label><br>
        <textarea name="deskripsi_singkat" id="deskripsi_singkat" required>{{ $game->deskripsi_singkat }}</textarea><br><br>

        <!-- cover -->
        <label for="gambar_cover">Gambar Cover:</label>
        <input type="file" name="gambar_cover" id="gambar_cover"><br><br>
        <input type="hidden" name="folder" value="image/documents">

        <!-- link-->
        <label for="trailer">Trailer (URL YouTube):</label>
        <input type="url" name="trailer" id="trailer" pattern="https://.*" placeholder="https://www.youtube.com/watch?v=example" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>