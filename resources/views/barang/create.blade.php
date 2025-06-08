@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Tambah Barang</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select" required style="width: 750px; height:50px;">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" value="{{ old('stok') }}" required style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" id="harga" value="{{ old('harga') }}" required style="width: 750px; height:50px;">
            </div>

            <div class="mb-10">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" style="width: 750px;">
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
