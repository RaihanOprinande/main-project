<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['nama_merek','gambar'];
    public function sepatu(){
        return $this->hasMany(Sepatu::class);
    }
}
