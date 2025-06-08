@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-0">
        <h2 class="ml-1 mt-2" style="font-weight: 600; color:rgb(34, 34, 34);">Detail Penjualan</h2>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('detailjual.exportPdf') }}" class="btn btn-info"><i class="fas fa-print"></i> Ekspor PDF</a>
            <a href="{{ route('detailjual.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5>Data</h5>
            <form action="{{ route('detailjual.index') }}" method="GET" class="d-flex mb-3" style="max-width: 300px;">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tanggal Pesan</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($detail_penjualan as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->penjualan->tanggal_pesan }}</td>
                <td>{{ $detail->barang->nama }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>{{($detail->total_harga) }}</td>
                <td>
                    <a href="{{ route('detailjual.show', $detail->id) }}" class="btn btn-primary text-white">Detail</a>
                    <a href="{{ route('detailjual.edit', $detail->id) }}" class="btn btn-warning text-white">Edit</a>
                    <form action="{{ route('detailjual.destroy', $detail->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
@endsection
