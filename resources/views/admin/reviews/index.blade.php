@extends('layouts.admin')

@section('title', 'Dashboard Reviews')

@section('content')
<div class="container mt-5">
    <h1>Dashboard Reviews</h1>

    @if ($reviews->isEmpty())
        <p>Tidak ada review yang tersedia.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Game</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $review->game->judul }}</td>
                        <td>
                            <div class="star-rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $review->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="fas fa-star text-secondary"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td>{{ $review->comment }}</td>
                        <td>
                            <a href="{{ route('games.show', $review->game->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('user.reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('user.reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus review ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection