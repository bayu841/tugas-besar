@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-0">
        <h2 class="ml-2" style="font-weight: 600; color:rgb(34, 34, 34);">Data Penjualan</h2>
        <a href="{{ route('penjualan.create') }}" class="btn btn-success m-3">Tambah Data</a>
    </div>
    <form action="{{ route('penjualan.index') }}" method="GET" class="d-flex mb-3" style="max-width: 300px;">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>Daftar Penjualan</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>Kasir</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penjualan as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->pembeli->nama }}</td>
                            <td>{{ $data->kasir->nama }}</td>
                            <td>{{ $data->tanggal_pesan }}</td>
                            <td>
                                <a href="{{ route('penjualan.show', $data->id) }}" class="btn btn-primary text-white">Detail</a>
                                <a href="{{ route('penjualan.edit', $data->id) }}" class="btn btn-warning text-white">Edit</a>
                                <form action="{{ route('penjualan.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data penjualan tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
