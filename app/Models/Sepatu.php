<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    protected $table = 'shoes'; // Nama tabel
    protected $fillable = ['nama', 'harga', 'kategori' ,'gambar','id_merek']; // Kolom yang bisa diisi
    use HasFactory;

    public function merek(){
        return $this->belongsTo(Merek::class);
    }
}
