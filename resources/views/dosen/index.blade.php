@extends('layouts.app')

@section('title', 'Daftar Dosen')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Daftar Dosen</h1>
    <a href="{{ route('dosens.create') }}" class="btn btn-primary">Tambah Dosen</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Dosen</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dosens as $index => $dosen)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $dosen->kode_dosen }}</td>
            <td>{{ $dosen->nama_dosen }}</td>
            <td>{{ $dosen->nip }}</td>
            <td>{{ $dosen->email }}</td>
            <td>{{ $dosen->no_telepon }}</td>
            <td>
                <a href="{{ route('dosens.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('dosens.destroy', $dosen->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
