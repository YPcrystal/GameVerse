<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Game - YPcrystal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <h1 class="h3">Detail Game - YPcrystal</h1>
            <nav>
                <a href="/" class="text-white">Home</a>
                <a href="/games" class="text-white ms-3">Daftar Game</a>
            </nav>
        </div>
    </header>
    <main class="container py-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>{{ $game->title }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Genre:</strong> {{ $game->genre }}</p>
                <p><strong>Platform:</strong> {{ $game->platform }}</p>
                <p><strong>Deskripsi:</strong></p>
                <p>{{ $game->description }}</p>
                <h3>Reviews</h3>
                <ul>
                    @foreach ($game->reviews as $review)
                        <li>{{ $review->content }} - Rating: {{ $review->rating }}</li>
                    @endforeach
                </ul>
                <h3>Submit a Review</h3>
                <form action="{{ route('reviews.store', $game->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (1-5):</label>
                        <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Your Comment:</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
            <div class="card-footer text-end">
                <a href="/games" class="btn btn-secondary">Kembali ke Daftar Game</a>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        <p>© 2025 YPcrystal. All Rights Reserved.</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
