<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoeImages extends Model
{
    use HasFactory;

    protected $fillable = ['gambar'];

    public function Sepatu(){
        return $this->hasMany(Sepatu::class);
    }
}
