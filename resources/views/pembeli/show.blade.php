@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Detail Pembeli</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <div class="mb-3">
            <label class="form-label">Nama Pembeli</label>
            <input type="text" class="form-control" value="{{ $pembeli->nama }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" value="{{ $pembeli->jenis_kelamin }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" value="{{ $pembeli->alamat }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" class="form-control" value="{{ $pembeli->no_hp }}" readonly style="width: 750px; height:50px;">
        </div>

        <a href="{{ route('pembeli.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
