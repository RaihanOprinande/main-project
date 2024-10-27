<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ListController;
<<<<<<< HEAD
use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\LoginController;
=======
use App\Http\Controllers\DashboardSepatuController;
>>>>>>> 8c9962cc19d8e8c9c334293107eed113c5d3b3fc


Route::get('/', function () {
    return view('home');
});

Route::get('/', [SepatuController::class, 'index'])->name('sepatu.home');


Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
// routes/web.php
// Route::get('/card', [CardController::class, 'index']);

Route::get('/aboutus', [SepatuController::class, 'aboutus']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('list',[ListController::class,'index'])->name('sepatu.list');
Route::get('/merek/{id}/sepatu', [ListController::class, 'sepatuByMerek'])->name('sepatu.byMerek');
Route::get('/sepatu/kategori/{kategori}', [SepatuController::class, 'filterByKategori'])->name('sepatu.kategori');
Route::get('list-search',[ListController::class,'search']);
Route::get('/dashboard',[DashboardAdminController::class,'Dashboard'])->middleware('auth');

Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

<<<<<<< HEAD

Route::resource('/list',ListController::class);
=======
Route::get('/dashboard',[DashboardAdminController::class,'Dashboard'])->middleware('auth');
Route::resource('/dashboard-sepatu',DashboardSepatuController::class)->middleware(['auth']);
Route::get('dshbrd-spt',[DashboardSepatuController::class,'index'])->middleware(['auth']);
Route::resource('/dashboard-user',DashboardAdminController::class)->middleware(['auth']);
Route::get('dshbrd-usr',[DashboardAdminController::class,'index'])->middleware(['auth']);
>>>>>>> 8c9962cc19d8e8c9c334293107eed113c5d3b3fc

