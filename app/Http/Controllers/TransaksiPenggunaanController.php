<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenggunaan;
use Illuminate\Http\Request;

class TransaksiPenggunaanController extends Controller
{
    public function index()
    {
        return TransaksiPenggunaan::with('user', 'details.alat')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksi_penggunaan',
            'tanggal'        => 'required|date',
            'user_id'        => 'required|exists:users,id',
            'keterangan'     => 'nullable|string',
        ]);

        return TransaksiPenggunaan::create($request->all());
    }

    public function show($id)
    {
        return TransaksiPenggunaan::with('user', 'details.alat')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $transaksi = TransaksiPenggunaan::findOrFail($id);
        $transaksi->update($request->all());
        return $transaksi;
    }

    public function destroy($id)
    {
        TransaksiPenggunaan::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
