<!DOCTYPE html>
<html>
<head>
    <title>Detail Game</title>
</head>
<body>
    <h1>Detail Game</h1>

    <h2>{{ $game->judul }}</h2>
    <p>Platform: {{ $game->platform }}</p>
    <p>Genre: {{ $game->genre }}</p>
    <p>Tanggal Rilis: {{ $game->tanggal_rilis }}</p>
    <p>Developer: {{ $game->developer }}</p>
    <p>Publisher: {{ $game->publisher }}</p>
    <p>Deskripsi Singkat: {{ $game->deskripsi_singkat }}</p>
    <img src="{{ $game->gambar_cover }}" alt="Gambar Cover">
    <iframe width="560" height="315" 
        src="https://www.youtube.com/embed/QzOUTLOjWYo" 
        frameborder="0" 
        allowfullscreen>
</iframe>


    <a href="/games">Kembali ke Daftar Game</a>
</body>
</html>