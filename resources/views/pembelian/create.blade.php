@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Tambah Pembelian</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <form action="{{ route('pembelian.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required min="1" style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="barang_id" class="form-label">Nama Barang</label>
                <select name="barang_id" id="barang_id" class="form-select" required style="width: 750px; height:50px;">
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($barang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="supplier_id" class="form-label">Nama Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-select" required style="width: 750px; height:50px;">
                    <option value="">-- Pilih Supplier --</option>
                    @foreach ($supplier as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" id="status" class="form-control" placeholder="Contoh: diterima" required style="width: 750px; height:50px;">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
