<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [SepatuController::class, 'index'])->name('sepatu.home');;

Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
// routes/web.php


use App\Http\Controllers\CardController;

// Route::get('/card', [CardController::class, 'index']);
Route::get('/aboutus', [SepatuController::class, 'aboutus']);

