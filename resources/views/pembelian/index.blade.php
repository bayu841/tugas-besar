@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-0">
        <h2 class="ml-1" style="font-weight: 600; color:rgb(34, 34, 34);">Daftar Pembelian</h2>
        <a href="{{ route('pembelian.create') }}" class="btn btn-success m-3">Tambah Data</a>
    </div>
    <form action="{{ route('pembelian.index') }}" method="GET" class="d-flex mb-3" style="max-width: 300px;">
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
            <h5>Data Pembelian</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelian as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->barang->nama ?? '-' }}</td>
                            <td>{{ $item->supplier->nama ?? '-' }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ ucfirst($item->status) }}</td>
                            <td>
                                <a href="{{ route('pembelian.show', $item->id) }}" class="btn btn-primary text-white">Detail</a>
                                <a href="{{ route('pembelian.edit', $item->id) }}" class="btn btn-warning text-white">Edit</a>
                                <form action="{{ route('pembelian.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
