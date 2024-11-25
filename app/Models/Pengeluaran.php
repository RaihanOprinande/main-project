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
        'sepatu',
        'size_id',
        'brand_id',
        'kategori_id',
        'harga',
        'quantity',
        'date',
    ];
    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function brand(){
        return $this->belongsTo(Brands::class);
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
