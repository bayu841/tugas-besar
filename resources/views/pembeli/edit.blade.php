@extends('layouts.app')

@section('content')
<br>
<div class="container ml-5">
    <h3>Edit Pembeli</h3>

    <div class="form-wrapper p-4 border rounded shadow-sm" style="width: 800px;">
        <form action="{{ route('pembeli.update', $pembeli->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pembeli</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $pembeli->nama) }}" required style="width: 750px; height:50px;">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="laki_laki" {{ old('jenis_kelamin', $pembeli->jenis_kelamin) == 'laki_laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin', $pembeli->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" required style="width: 750px;">{{ old('alamat', $pembeli->alamat) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ old('no_hp', $pembeli->no_hp) }}" required style="width: 750px; height:50px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pembeli.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
