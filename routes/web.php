<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DashboardSepatuController;


Route::get('/', function () {
    return view('home');
});

Route::get('/', [SepatuController::class, 'index'])->name('sepatu.home');


Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
// routes/web.php


use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\LoginController;

// Route::get('/card', [CardController::class, 'index']);
Route::get('/aboutus', [SepatuController::class, 'aboutus']);
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('list',[ListController::class,'index'])->name('sepatu.list');
Route::resource('/list',ListController::class);
Route::get('/merek/{id}/sepatu', [ListController::class, 'sepatuByMerek'])->name('sepatu.byMerek');
Route::get('/sepatu/kategori/{kategori}', [SepatuController::class, 'filterByKategori'])->name('sepatu.kategori');

Route::get('list-search',[ListController::class,'search']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/dashboard',[DashboardAdminController::class, 'Dashboard'])->middleware('auth');
Route::resource('/dashboard-sepatu',DashboardSepatuController::class)->middleware(['auth']);
Route::get('dshbrd-spt',[DashboardSepatuController::class,'index'])->middleware(['auth']);
Route::resource('/dashboard-user',DashboardAdminController::class)->middleware(['auth']);
Route::get('dshbrd-usr',[DashboardAdminController::class,'index'])->middleware(['auth']);
