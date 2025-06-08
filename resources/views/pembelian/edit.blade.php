@extends('layouts.app')

@section('content')
<br>
<div class="container m-4">
    <h3>Edit Pembelian</h3>

    <div class="card p-4 shadow-sm" style="width: 800px;">
        <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Pembelian</label>
                <input type="number" name="jumlah" class="form-control" required value="{{ old('jumlah', $pembelian->jumlah) }}" style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pembelian</label>
                <input type="date" name="tanggal" class="form-control" required value="{{ old('tanggal', $pembelian->tanggal) }}" style="width: 750px; height:50px;">
            </div>

            <div class="mb-3">
                <label for="barang_id" class="form-label">Nama Barang</label>
                <select name="barang_id" class="form-control" required style="width: 750px; height:50px;">
                    @foreach($barang as $b)
                        <option value="{{ $b->id }}" {{ $pembelian->barang_id == $b->id ? 'selected' : '' }}>
                            {{ $b->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="supplier_id" class="form-label">Nama Supplier</label>
                <select name="supplier_id" class="form-control" required style="width: 750px; height:50px;">
                    @foreach($supplier as $s)
                        <option value="{{ $s->id }}" {{ $pembelian->supplier_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control" required value="{{ old('status', $pembelian->status) }}" style="width: 750px; height:50px;">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
