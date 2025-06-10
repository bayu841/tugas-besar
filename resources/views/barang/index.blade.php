@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-0">
        <h2 class="ml-1" style="font-weight: 600; color:rgb(34, 34, 34);">Daftar Barang</h2>
        <a href="{{ route('barang.create') }}" class="btn btn-success m-3">Tambah Data</a>
    </div>
    <form action="{{ route('barang.index') }}" method="GET" class="d-flex mb-3" style="max-width: 300px;">
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
            <h5>Data Barang</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori->nama ?? '-' }}</td>
                            <td>
                                @if($item->stok == 0)
                                    <span class="badge bg-danger">Stok Habis</span>
                                @else
                                    {{ $item->stok }}
                                @endif
                            </td>

                            <td>Rp{{($item->harga)}}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" style="width: 100px;" alt="Gambar">
                                @else
                                    Tidak ada
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('barang.show', $item->id) }}" class="btn btn-primary text-white" >Detail</a>
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning text-white" >Edit</a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
