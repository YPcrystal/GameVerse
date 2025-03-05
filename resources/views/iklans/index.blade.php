<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Iklan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <h1>Daftar Iklan</h1>
        <div class="text-center mb-4">
            <a href="{{ route('iklans.create') }}" class="btn btn-primary">Tambah Iklan</a>
        </div>
        <table class="table table-bordered">
            <thead class="table-light">
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
                            <a href="{{ route('iklans.show', $iklan->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('iklans.edit', $iklan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('iklans.destroy', $iklan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>