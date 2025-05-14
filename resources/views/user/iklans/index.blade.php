@extends('layouts.user')

@section('title', 'Kelola Iklan')

@section('content')
<div class="container mt-3">
    <h1 class="mb-4 text-center">Daftar Iklan</h1>

    <!-- Tombol Tambah Iklan -->
    <div class="text-center mb-4">
        <a href="{{ route('user.iklans.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Iklan</a>
    </div>

    <!-- Tabel Iklan -->
    <table class="table table-bordered table-striped table-hover">
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
                    <a href="{{ route('user.iklans.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Iklan</a>
                    <a href="{{ route('user.iklans.show', $iklan->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                    <a href="{{ route('user.iklans.edit', $iklan->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection