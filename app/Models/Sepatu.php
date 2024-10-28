<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    protected $table = 'shoes'; // Nama tabel
    protected $fillable = ['nama', 'harga', 'kategori_id' ,'gambar_id','merek_id', 'size_id', 'color_id', 'stock']; // Kolom yang bisa diisi
    use HasFactory;

    public function merek(){
        return $this->belongsTo(Merek::class);
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function gambar(){
        return $this->belongsTo(sepatui::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }

}
