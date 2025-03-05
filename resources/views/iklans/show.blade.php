<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Iklan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detail Iklan</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Game: {{ $iklan->game->judul }}</h5>
                <p class="card-text">Durasi: {{ $iklan->durasi }} hari</p>
                <p class="card-text">Harga: Rp {{ number_format($iklan->harga, 0, ',', '.') }}</p>
                <p class="card-text">Status: {{ $iklan->status }}</p>
                <a href="{{ route('iklans.edit', $iklan->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('iklans.destroy', $iklan->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
        <a href="{{ route('iklans.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Iklan</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>