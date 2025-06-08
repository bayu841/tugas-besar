@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Detail Supplier</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ $supplier->nama }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" value="{{ $supplier->alamat }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Kode Pos</label>
            <input type="text" class="form-control" value="{{ $supplier->kode_pos }}" readonly style="width: 750px; height:50px;">
        </div>

        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
