<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Review - GameReviews.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1>Add a Review for {{ $game->title }}</h1>

                        <form action="{{ route('reviews.store', $game->id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold" for="rating">Rating (1-5):</label>
                                <input type="number" name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror" min="1" max="5" required>
                                @error('rating')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold" for="comment">Your Comment:</label>
                                <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" rows="3" required></textarea>
                                @error('comment')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>