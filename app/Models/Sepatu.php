<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    use HasFactory;
    protected $table = 'shoes';
    protected $fillable = ['kode_sepatu','nama', 'harga', 'kategori_id' ,'brands_id', 'stock'];

    public function sepatu_size(){
        return $this->belongsToMany(Sepatu_size::class);
    }
    public function sepatu_gambar(){
        return $this->hasMany(Sepatu_gambar::class);
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function brands(){
        return $this->belongsTo(Brands::class);
    }

}
