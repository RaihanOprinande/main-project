<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'sepatu_id',
        'harga',

        'color_id',
        'size_id',
        'jumlah',
        'total',
        'status',
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
    public function order(){
        return $this->belongsTo(Pemesanan::class);
    }

}
