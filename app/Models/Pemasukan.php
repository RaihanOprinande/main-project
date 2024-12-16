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
        'nama',
        'harga',
        'kategori_id',
        'bukti',
        'merek_id',
        'size_id',
        'jumlah',
        'total',
        'tanggal'
    ];
    protected $casts = [
        'tanggal' => 'datetime',  // pastikan kolom tanggal diperlakukan sebagai Carbon instance
    ];

    // Relasi dengan model Sepatu
    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function merek(){
        return $this->belongsTo(Brands::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
