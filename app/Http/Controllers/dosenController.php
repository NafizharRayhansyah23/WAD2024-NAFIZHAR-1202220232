<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;

class dosenController extends Controller
{
    public function index()
    {
        $dosens = dosen::all();
        return view('dosen.index', compact('dosens')); 
    }


    public function show($id)
    {
        $dosen = dosen::findOrFail($id);
        return view('dosen.show', compact('dosen')); 
    }

    
    public function getCreateForm()
    {
        return view('dosen.create'); 
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'kode_dosen' => 'required|string|max:3|unique:dosens,kode_dosen',
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens,nip',
            'email' => 'required|email|unique:dosens,email',
            'no_telepon' => 'nullable|string',
        ]);

        dosen::create($request->all());
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan!');
    }


    public function getEditForm($id)
    {
        $dosen = dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen')); 
    }

 
    public function update(Request $request, dosen $dosen)
{
    $request->validate([
        'kode_dosen' => 'required|unique:dosens,kode_dosen,' . $dosen->id,
        'nama_dosen' => 'required',
    ]);

    $dosen->update($request->all());

    return redirect()->route('dosens.index')->with('success', 'dosen berhasil diperbarui.');
}

    
    public function destroy($id)
    {
        $dosen = dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil dihapus!');
    }
}
