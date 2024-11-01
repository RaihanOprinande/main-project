<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu_gambar extends Model
{
    use HasFactory;
    protected $table = 'sepatu_gambars';
    protected $fillable = ['sepatu_id,sepatui_id'];

    public function sepatu_gambar(){
        return $this->belongsToMany(Sepatu::class);
    }


}
