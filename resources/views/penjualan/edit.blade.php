@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Edit Penjualan</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <form action="{{ route('penjualan.update',$penjualan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="pembeli_id" class="form-label">Pembeli</label>
                <select name="pembeli_id" id="pembeli_id" class="form-select" required style="width: 750px; height:50px;">
                    @foreach($pembeli as $p)
                        <option value="{{ $p->id }}" {{ old('pembeli_id', $penjualan->pembeli_id) == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="kasir_id" class="form-label">Kasir</label>
                <select name="kasir_id" id="kasir_id" class="form-select" required style="width: 750px; height:50px;">
                    @foreach($kasir as $k)
                        <option value="{{ $k->id }}" {{ old('kasir_id', $penjualan->kasir_id) == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
                <input type="date" name="tanggal_pesan" class="form-control" value="{{ old('tanggal_pesan', $penjualan->tanggal_pesan) }}" required style="width: 750px; height:50px;">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
