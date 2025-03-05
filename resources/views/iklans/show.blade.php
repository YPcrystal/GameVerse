<!DOCTYPE html>
<html>
<head>
    <title>Detail Iklan</title>
</head>
<body>
    <h1>Detail Iklan</h1>
    <p>Game: {{ $iklan->game->judul }}</p>
    <p>Durasi: {{ $iklan->durasi }} hari</p>
    <p>Harga: Rp {{ number_format($iklan->harga, 0, ',', '.') }}</p>
    <p>Status: {{ $iklan->status }}</p>
    <a href="{{ route('iklans.edit', $iklan->id) }}">Edit</a>
    <form action="{{ route('iklans.destroy', $iklan->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
</body>
</html>