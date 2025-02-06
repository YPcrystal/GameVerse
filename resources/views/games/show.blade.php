<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Game - YPcrystal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <h2>{{ $game->title }}</h2>
                            <p><strong>Genre:</strong> {{ $game->genre }}</p>
                            <p><strong>Platform:</strong> {{ $game->platform }}</p>
                            <p><strong>Deskripsi:</strong></p>
                            <p>{{ $game->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
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
                </div>
            </div>
        </main>
        <footer class="bg-dark text-white text-center py-3">
            <p>© 2025 YPcrystal. All Rights Reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>
