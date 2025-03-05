<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Iklan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Iklan</h1>
        <form action="{{ route('iklans.update', $iklan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="game_id" class="form-label">Game:</label>
                <select name="game_id" id="game_id" class="form-select">
                    @foreach ($games as $game)
                        <option value="{{ $game->id }}" {{ $iklan->game_id == $game->id ? 'selected' : '' }}>{{ $game->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi (hari):</label>
                <input type="number" name="durasi" id="durasi" class="form-control" value="{{ $iklan->durasi }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ $iklan->harga }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-select">
                    <option value="aktif" {{ $iklan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $iklan->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>