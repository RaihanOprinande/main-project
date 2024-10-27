<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sepatui extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar_sepatu'
    ];

    public function sepatu(){
        return $this->hasMany(Sepatu::class);
    }
}
