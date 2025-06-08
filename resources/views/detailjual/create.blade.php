@extends('layouts.app')

@section('content')
<div class="container ml-5">
    <br>
    <h2>Tambah Detail Penjualan</h2>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
    <form action="{{ route('detailjual.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="penjualan_id" class="form-label">Tanggal</label>
            <select name="penjualan_id" id="penjualan_id" class="form-select" required style="width: 750px; height:50px;">
                <option value="">-- Pilih Penjualan --</option>
                @foreach($penjualan as $p)
                    <option value="{{ $p->id }}" {{ old('penjualan_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->tanggal_pesan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-select" required style="width: 750px; height:50px;">
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}" {{ old('barang_id') == $b->id ? 'selected' : '' }}>
                        {{ $b->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required min="1" max="{{ $barang->first()->stok ?? 9999 }}"style="width: 750px; height:50px;">
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga" class="form-control" value="{{ old('total_harga') }}" required min="0" step="0.01" style="width: 750px; height:50px;">
        </div>

        <a href="{{ route('detailjual.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
     </div>
</div>
@endsection
