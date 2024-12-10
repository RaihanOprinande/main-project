<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan konvensi Laravel
    protected $table = 'pengeluarans';

    // Tentukan kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'kategori_id',
        'uang',
        'keterangan',
        'date',
    ];
    public function kategori(){
        return $this->belongsTo(KategoriPengeluaran::class);
    }

}
