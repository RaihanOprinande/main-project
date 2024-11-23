<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $fillable = ['size'];

    public function sepatu(){
        return $this->belongsToMany(Sepatu::class,'sepatu_sizes', 'size_id','sepatu_id')->withPivot('quantity');
    }
}
