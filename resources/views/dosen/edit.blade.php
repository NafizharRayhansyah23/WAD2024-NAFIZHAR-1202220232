@extends('layouts.app')

@section('title', $dosen->id ? 'Edit Dosen' : 'Tambah Dosen')

@section('content')
<h1>{{ $dosen->id ? 'Edit Dosen' : 'Tambah Dosen' }}</h1>
<form action="{{ $dosen->id ? route('dosens.update', $dosen->id) : route('dosens.store') }}" method="POST">
    @csrf
    @if ($dosen->id)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="kode_dosen" class="form-label">Kode Dosen</label>
        <input type="text" id="kode_dosen" name="kode_dosen" class="form-control" value="{{ old('kode_dosen', $dosen->kode_dosen) }}">
    </div>
    <div class="mb-3">
        <label for="nama_dosen" class="form-label">Nama Dosen</label>
        <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $dosen->nama_dosen) }}">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
