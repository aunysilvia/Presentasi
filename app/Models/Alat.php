<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alats';

    protected $fillable = [
        'nama_alat',
        'stok',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriAlat::class, 'kategori_id');
    }

    /**
     * Relasi ke pivot peminjaman_alat
     * untuk melihat detail peminjaman dari alat ini.
     */
    public function items()
    {
        return $this->hasMany(PeminjamanAlat::class, 'alat_id', 'id');
    }

    /**
     * Relasi Many-to-Many ke peminjaman.
     */
    public function peminjaman()
    {
        return $this->belongsToMany(Peminjaman::class, 'peminjaman_alat', 'alat_id', 'peminjaman_id')
            ->withPivot('jumlah')
            ->withTimestamps();
    }
}
