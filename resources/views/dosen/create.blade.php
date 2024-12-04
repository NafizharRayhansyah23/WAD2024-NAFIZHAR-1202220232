@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')
<h1>Tambah Dosen</h1>
<form action="{{ route('dosens.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="kode_dosen" class="form-label">Kode Dosen</label>
        <input type="text" id="kode_dosen" name="kode_dosen" class="form-control" value="{{ old('kode_dosen') }}" maxlength="3" required>
    </div>
    <div class="mb-3">
        <label for="nama_dosen" class="form-label">Nama Dosen</label>
        <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen') }}" required>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" id="nip" name="nip" class="form-control" value="{{ old('nip') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label for="no_telepon" class="form-label">No Telepon</label>
        <input type="text" id="no_telepon" name="no_telepon" class="form-control" value="{{ old('no_telepon') }}">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
