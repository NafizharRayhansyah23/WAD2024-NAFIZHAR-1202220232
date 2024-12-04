<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\dosen;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    
    public function index()
    {
        $mahasiswas = mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas')); 
    }

    
    public function show($id)
    {
        $mahasiswa = mahasiswa::with('dosen')->findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa')); 
    }

   
    public function getCreateForm()
    {
        $dosens = dosen::all(); 
        return view('mahasiswa.create', compact('dosens')); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim',
            'nama_mahasiswa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email',
            'jurusan' => 'required|string',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        mahasiswa::create($request->all());
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    
    public function getEditForm($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $dosens = dosen::all(); 
        return view('mahasiswa.edit', compact('mahasiswa', 'dosens')); 
    }

    
    public function update(Request $request, $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim,' . $id,
            'nama_mahasiswa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'jurusan' => 'required|string',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil diupdate!');
    }

    
    public function destroy($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
