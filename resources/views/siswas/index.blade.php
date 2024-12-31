<!DOCTYPE html>
<html>
<head>
    <title>Siswa List</title>
</head>
<body>
    <h1>Siswa List</h1>
    <a href="{{ route('siswas.create') }}">Create New Siswa</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Post Date</th>
                <th>Title</th>
                <th>Source</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->id }}</td>
                    <td>{{ $siswa->post_date }}</td>
                    <td>{{ $siswa->title }}</td>
                    <td>{{ $siswa->source }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>