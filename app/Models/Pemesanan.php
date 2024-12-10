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
        'status'
    ];

    public function getStatusTextAttribute()
    {
        return $this->status === 'pending' ? 'Pesanan Sedang Dibuat' : 'Pesanan Sukses';
    }

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
