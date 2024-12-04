@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<h1>Tambah Mahasiswa</h1>
<form action="{{ route('mahasiswas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" id="nim" name="nim" class="form-control" value="{{ old('nim') }}" required>
    </div>
    <div class="mb-3">
        <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" class="form-control" value="{{ old('jurusan') }}" required>
    </div>
    <div class="mb-3">
        <label for="dosen_id" class="form-label">Dosen Wali</label>
        <select id="dosen_id" name="dosen_id" class="form-select" required>
            <option value="">Pilih Dosen Wali</option>
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->id }}" {{ old('dosen_id') == $dosen->id ? 'selected' : '' }}>
                    {{ $dosen->nama_dosen }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
