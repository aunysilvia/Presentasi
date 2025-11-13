<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisAlat extends Model
{
    protected $table = 'jenis_alat';
    protected $fillable = ['nama_jenis'];

    public function alat()
    {
        return $this->hasMany(Alat::class, 'jenis_id');
    }
}
