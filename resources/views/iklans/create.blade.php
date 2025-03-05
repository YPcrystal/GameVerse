<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Iklan Baru</title>
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

        input, select {
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
    <h1>Tambah Iklan Baru</h1>
    <form action="{{ route('iklans.store') }}" method="POST">
        @csrf
        <label for="game_id">Game:</label>
        <select name="game_id" id="game_id">
            @foreach ($games as $game)
                <option value="{{ $game->id }}">{{ $game->judul }}</option>
            @endforeach
        </select>
        
        <label for="durasi">Durasi (hari):</label>
        <input type="number" name="durasi" id="durasi">
        
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga">
        
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>