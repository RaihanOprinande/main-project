<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sepatui extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar_sepatu',
        'gambar_sepatu_kanan',
        'gambar_sepatu_kiri'
    ];
    public function gambar(){
        return $this->belongsTo(Sepatu_gambar::class);
    }
}
