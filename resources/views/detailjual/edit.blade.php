@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h2>Edit Data</h2>
    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
    <form action="{{ route('detailjual.update', $detail_penjualan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="penjualan_id" class="form-label">Penjualan</label>
            <select name="penjualan_id" class="form-select" required style="width: 750px; height:50px;">
                <option value="">-- Pilih Penjualan --</option>
                @foreach($penjualan as $p)
                    <option value="{{ $p->id }}" {{ $detail_penjualan->penjualan_id == $p->id ? 'selected' : '' }}>
                        {{ $p->id }} - {{ $p->tanggal_pesan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" class="form-select" required style="width: 750px; height:50px;">
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}" {{ $detail_penjualan->barang_id == $b->id ? 'selected' : '' }}>
                        {{ $b->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $detail_penjualan->jumlah) }}" min="1" required style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" name="total_harga" class="form-control" value="{{ old('total_harga', $detail_penjualan->total_harga) }}" min="0" step="0.01" required style="width: 750px; height:50px;">
        </div>

        <a href="{{ route('detailjual.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</div>
@endsection
