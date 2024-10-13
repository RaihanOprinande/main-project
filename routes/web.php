<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ListController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [SepatuController::class, 'index'])->name('sepatu.home');;


Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
// routes/web.php


use App\Http\Controllers\CardController;

// Route::get('/card', [CardController::class, 'index']);
Route::get('/aboutus', [SepatuController::class, 'aboutus']);

Route::get('list',[ListController::class,'index'])->name('sepatu.list');
Route::resource('/list',ListController::class);

