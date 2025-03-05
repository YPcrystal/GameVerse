<!DOCTYPE html>
<html>
<head>
    <title>Edit Iklan</title>
</head>
<body>
    <h1>Edit Iklan</h1>
    <form action="{{ route('iklans.update', $iklan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="game_id">Game:</label>
        <select name="game_id" id="game_id">
            @foreach ($games as $game)
                <option value="{{ $game->id }}" {{ $iklan->game_id == $game->id ? 'selected' : '' }}>{{ $game->judul }}</option>
            @endforeach
        </select><br><br>
        <label for="durasi">Durasi (hari):</label>
        <input type="number" name="durasi" id="durasi" value="{{ $iklan->durasi }}"><br><br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="{{ $iklan->harga }}"><br><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="aktif" {{ $iklan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ $iklan->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>