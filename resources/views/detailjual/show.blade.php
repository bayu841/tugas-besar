@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Detail Barang</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="text" class="form-control" value="{{ $detail_penjualan->penjualan->tanggal_pesan }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Barang</label>
            <input type="text" class="form-control" value="{{ $detail_penjualan->barang->nama }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="text" class="form-control" value="{{ $detail_penjualan->jumlah }}" readonly style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Total Harga</label>
            <input type="text" class="form-control" value="{{($detail_penjualan->total_harga) }}" readonly style="width: 750px; height:50px;">
        </div>
        <a href="{{ route('detailjual.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
