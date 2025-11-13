<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenggunaan extends Model
{
    protected $table    = 'transaksi_penggunaan';
    protected $fillable = ['kode_transaksi', 'tanggal', 'user_id', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_penggunaan_id');
    }
}
