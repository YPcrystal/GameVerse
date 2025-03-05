<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Iklan</title>
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

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        button:hover {
            background-color: #ff1a1a;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Daftar Iklan</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('iklans.create') }}">Tambah Iklan</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Game</th>
                <th>Durasi</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($iklans as $iklan)
                <tr>
                    <td>{{ $iklan->game->judul }}</td>
                    <td>{{ $iklan->durasi }}</td>
                    <td>{{ $iklan->harga }}</td>
                    <td>{{ $iklan->status }}</td>
                    <td class="actions">
                        <a href="{{ route('iklans.show', $iklan->id) }}">Detail</a>
                        <a href="{{ route('iklans.edit', $iklan->id) }}">Edit</a>
                        <form action="{{ route('iklans.destroy', $iklan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>