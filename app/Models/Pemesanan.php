<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'harga',
        'merek_id',
        'kategori_id',
        'size_id',
        'jumlah',
        'total',
        'bukti',
    ];

    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
