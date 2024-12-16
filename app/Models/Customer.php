<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = ['name', 'email','nohp','alamat', 'password'];
    protected $hidden = ['password'];

    public function carts(){
        return $this->belongsToMany(Cart::class,'carts','customer_id','customer_id');
    }
}

