<?php

namespace App\Http\Controllers;

use App\Models\JenisAlat;
use Illuminate\Http\Request;

class JenisAlatController extends Controller
{
    public function index()
    {
        $data = JenisAlat::all();
        return view('jenis_alat.index', compact('data'));
    }

    public function create()
    {
        return view('jenis_alat.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_jenis' => 'required|string|max:255',
    ]);

    JenisAlat::create($validated); // ⬅️ Data disimpan ke tabel 'jenis_alat'
    return redirect()->route('jenis-alat.index');
}


    public function show($id)
    {
        $jenis = JenisAlat::findOrFail($id);
        return view('jenis_alat.show', compact('jenis'));
    }

    public function edit($id)
    {
        $jenis = JenisAlat::findOrFail($id);
        return view('jenis_alat.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $jenis = JenisAlat::findOrFail($id);
        $jenis->update($request->all());
        return redirect()->route('jenis-alat.index')->with('success', 'Jenis alat berhasil diperbarui');
    }

    public function destroy($id)
    {
        JenisAlat::destroy($id);
        return redirect()->route('jenis-alat.index')->with('success', 'Jenis alat berhasil dihapus');
    }
}

