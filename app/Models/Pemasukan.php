<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'incomes';

    // Tentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'sepatu_id',
        'harga',
        'color_id',
        'size_id',
        'jumlah',
        'total',
    ];

    // Relasi dengan model Sepatu
    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class);
    }

    // Relasi dengan model Color (Warna)
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // Relasi dengan model Size (Ukuran)
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
