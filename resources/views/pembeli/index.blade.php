@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-0">
        <h2 class="ml-1" style="font-weight: 600; color:rgb(34, 34, 34);">Daftar Pembeli</h2>
        <a href="{{ route('pembeli.create') }}" class="btn btn-success m-3 " style="color:">Tambah Data</a>
    </div>
    <form action="{{ route('pembeli.index') }}" method="GET" class="d-flex mb-3" style="max-width: 300px;">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif


    <div class="card">
        <div class="card-header">
            <h5>Data Pembeli</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembeli as $index => $pembeli)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pembeli->nama }}</td>
                            <td>{{ $pembeli->jenis_kelamin }}</td>
                            <td>{{ $pembeli->alamat }}</td>
                            <td>{{ $pembeli->no_hp }}</td>
                            <td>
                                <a href="{{ route('pembeli.show', $pembeli->id) }}" class="btn btn-primary text-white">Detail</a>
                                <a href="{{ route('pembeli.edit', $pembeli->id) }}" class="btn btn-warning " style="color: white;">Edit</a>
                                <form action="{{ route('pembeli.destroy', $pembeli->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
