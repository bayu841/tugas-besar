@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Detail Pembelian</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" class="form-control" value="{{ $pembelian->barang->nama }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Supplier</label>
            <input type="text" class="form-control" value="{{ $pembelian->supplier->nama }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Pembelian</label>
            <input type="text" class="form-control" value="{{ $pembelian->jumlah }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pembelian</label>
            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($pembelian->tanggal)->translatedFormat('d F Y') }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value="{{ ucfirst($pembelian->status) }}" readonly style="width: 750px; height:50px;">
        </div>

        <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
