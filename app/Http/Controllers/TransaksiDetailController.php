<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    public function index()
    {
        return TransaksiDetail::with('alat', 'transaksi')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_penggunaan_id' => 'required|exists:transaksi_penggunaan,id',
            'alat_id'                 => 'required|exists:alat,id',
            'jumlah'                  => 'required|integer|min:1',
        ]);

        return TransaksiDetail::create($request->all());
    }

    public function show($id)
    {
        return TransaksiDetail::with('alat', 'transaksi')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $detail = TransaksiDetail::findOrFail($id);
        $detail->update($request->all());
        return $detail;
    }

    public function destroy($id)
    {
        TransaksiDetail::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}

