<!DOCTYPE html>
<html>
<head>
    <title>Tambah Game Baru</title>
</head>
<body>
    <h1>Tambah Game Baru</h1>

    <form action="/games" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" required><br><br>

        <label for="platform">Platform:</label>
        <input type="text" name="platform" id="platform" required><br><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" required><br><br>

        <label for="tanggal_rilis">Tanggal Rilis:</label>
        <input type="date" name="tanggal_rilis" id="tanggal_rilis" required><br><br>

        <label for="developer">Developer:</label>
        <input type="text" name="developer" id="developer" required><br><br>

        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" id="publisher" required><br><br>

        <label for="deskripsi_singkat">Deskripsi Singkat:</label><br>
        <textarea name="deskripsi_singkat" id="deskripsi_singkat" required></textarea><br><br>

        <!-- didapatkan dari file sendiri -->
        <label for="gambar_cover">Gambar Cover:</label>
        <input type="file" name="gambar_cover" id="gambar_cover"><br><br>
        <input type="hidden" name="folder" value="image/documents">

        <!-- didapatkan dari link youtube -->
        <label for="trailer">Trailer (URL YouTube):</label>
        <input type="url" name="trailer" id="trailer" pattern="https://.*" placeholder="https://www.youtube.com/watch?v=example" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>