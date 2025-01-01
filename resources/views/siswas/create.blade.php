<!DOCTYPE html>
<html>
<head>
    <title>Create Siswa</title>
</head>
<body>
    <h1>Create Siswa</h1>
    <form action="{{ route('siswas.store') }}" method="POST">
        @csrf
        <div>
            <label for="post_date">Post Date:</label>
            <input type="date" id="post_date" name="post_date" required>
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="source">Source:</label>
            <input type="text" id="source" name="source" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>