<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table    = 'transaksi_detail';
    protected $fillable = ['transaksi_penggunaan_id', 'alat_id', 'jumlah'];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiPenggunaan::class, 'transaksi_penggunaan_id');
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }
}
