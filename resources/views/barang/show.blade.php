@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Detail Barang</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" class="form-control" value="{{ $barang->nama }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" class="form-control" value="{{ $barang->kategori->nama }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="text" class="form-control" value="{{ $barang->stok }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="text" class="form-control" value="Rp {{ number_format($barang->harga, 0, ',', '.') }}" readonly style="width: 750px; height:50px;">
        </div>

        @if ($barang->gambar)
        <div class="mb-3">
            <label class="form-label">Gambar</label><br>
            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang" class="img-thumbnail" style="width: 200px; height: auto;">
        </div>
        @endif

        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
