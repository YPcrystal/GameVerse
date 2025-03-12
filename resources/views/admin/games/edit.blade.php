<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Game</h1>

    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="{{ $game->judul }}" required>

        <label for="platform">Platform:</label>
        <input type="text" name="platform" id="platform" value="{{ $game->platform }}" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="{{ $game->genre }}" required>

        <label for="tanggal_rilis">Tanggal Rilis:</label>
        <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ $game->tanggal_rilis }}" required>

        <label for="developer">Developer:</label>
        <input type="text" name="developer" id="developer" value="{{ $game->developer }}" required>

        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" id="publisher" value="{{ $game->publisher }}" required>

        <label for="deskripsi_singkat">Deskripsi Singkat:</label>
        <textarea name="deskripsi_singkat" id="deskripsi_singkat" required>{{ $game->deskripsi_singkat }}</textarea>

        <label for="gambar_cover">Gambar Cover:</label>
        <input type="file" name="gambar_cover" id="gambar_cover">

        <label for="trailer">Trailer (URL YouTube):</label>
        <input type="url" name="trailer" id="trailer" pattern="https://.*" placeholder="https://www.youtube.com/watch?v=example" value="{{ $game->trailer }}" required>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>