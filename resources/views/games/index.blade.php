@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
    @foreach($games as $game)
        <div class="bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition duration-300 border border-gray-200">
            <img src="{{ asset($game->image) }}" alt="{{ $game->title }}" class="w-full h-60 object-cover">
            <div class="p-3">
                <h2 class="text-lg font-bold text-gray-800">{{ $game->title }}</h2>
                <p class="text-xs text-gray-600 mt-1 leading-tight">{{ Str::limit($game->description, 80) }}</p>
                <div class="flex items-center justify-between mt-2 text-sm font-semibold">
                    <span class="text-yellow-500 flex items-center">⭐ {{ $game->rating }}</span>
                    <a href="{{ route('games.show', $game) }}" class="text-blue-500">Read more</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
