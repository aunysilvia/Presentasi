<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table    = 'alat';
    protected $fillable = ['nama_alat', 'stok', 'satuan', 'jenis_id'];

    public function jenis()
    {
        return $this->belongsTo(JenisAlat::class, 'jenis_id');
    }

    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
