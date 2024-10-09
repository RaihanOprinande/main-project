<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [SepatuController::class, 'index'])->name('sepatu.home');;

Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');

