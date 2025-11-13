<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        return Alat::with('jenis')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'stok'      => 'required|integer',
            'satuan'    => 'required|string',
            'jenis_id'  => 'required|exists:jenis_alat,id',
        ]);

        return Alat::create($request->all());
    }

    public function show($id)
    {
        return Alat::with('jenis')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);
        $alat->update($request->all());
        return $alat;
    }

    public function destroy($id)
    {
        Alat::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
