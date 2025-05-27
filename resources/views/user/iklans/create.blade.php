<!-- resources/views/user/iklans/create.blade.php -->
@extends('layouts.user')
@section('title', 'Tambah Iklan')
@section('content')
<div class="container mt-3">
    <h1>Tambah Iklan</h1>
    <form action="{{ route('user.iklans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Iklan</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi (hari)</label>
            <input type="number" name="durasi" id="durasi" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Iklan</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Lanjut ke Pembayaran</button>
    </form>
</div>
@endsection