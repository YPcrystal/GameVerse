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
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Durasi</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($iklans as $iklan)
                <tr>
                    <td>{{ $iklan->judul }}</td>
                    <td>{{ $iklan->deskripsi }}</td>
                    <td>{{ $iklan->durasi }} hari</td>
                    <td>Rp{{ number_format($iklan->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($iklan->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-warning text-dark">Menunggu Pembayaran</span>
                        @endif
                    </td>
                    <td>
                        @if($iklan->image)
                            <img src="{{ asset('storage/' . $iklan->image) }}" alt="Gambar Iklan" width="80">
                        @endif
                    </td>
                    <td>
                        @if($iklan->status != 'aktif')
                            <a href="{{ route('user.iklans.payment', $iklan->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-credit-card"></i> Bayar
                            </a>
                        @endif
                        <a href="{{ route('user.iklans.show', $iklan->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                        <a href="{{ route('user.iklans.edit', $iklan->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('user.iklans.destroy', $iklan->id) }}" method="POST" class="d-inline">
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