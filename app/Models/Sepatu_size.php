<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu_size extends Model
{
    use HasFactory;

    protected $table = 'sepatu_sizes';
    protected $fillable = ['sepatu_id','size_id','quantity'];

    public function sepatus(){
        return $this->belongsTo(Sepatu::class,'sepatu_id');
    }
    public function sizes(){
        return $this->belongsTo(Size::class,'size_id');
    }
}
