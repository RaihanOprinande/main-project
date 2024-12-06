<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = ['name', 'email','nohp','alamat', 'password'];
    protected $hidden = ['password'];
}

