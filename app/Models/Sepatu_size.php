<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu_size extends Model
{
    use HasFactory;

    protected $table = 'sepatu_sizes';
    protected $fillable = ['sepatu_id,size_id','quaintity'];

    public function sepatu_size(){
        return $this->hasMany(Sepatu::class);
    }
}
