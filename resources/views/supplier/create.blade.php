@extends('layouts.app')

@section('content')
<br>
<div class="container m-3">
    <h3>Tambah Supplier</h3>

    <div class="card p-4 shadow-sm" style="width: 800px;">
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Supplier</label>
                <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}" style="width: 750px; height:50px;">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required style="width: 750px;">{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="kode_pos" class="form-label">Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control" required value="{{ old('kode_pos') }}" style="width: 750px; height:50px;">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
