@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Edit Barang</h3>
    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama) }}" required style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select" required style="width: 750px; height:50px;">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}" required style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}" required style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label><br>
                @if($barang->gambar)
                    <img src="{{ asset('storage/' . $barang->gambar) }}" width="100" class="mb-2"><br>
                @endif
                <input type="file" name="gambar" class="form-control" style="width: 750px;">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
