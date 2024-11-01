<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DashboardSepatuController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardBrandController;
use App\Http\Controllers\DashboardColorsController;
use App\Http\Controllers\DashboardSizesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('home');
});

Route::get('/', [SepatuController::class, 'index'])->name('sepatu.home');
Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
Route::get('/aboutus', [SepatuController::class, 'aboutus']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('list',[ListController::class,'index'])->name('sepatu.list');
Route::get('/merek/{id}/sepatu', [ListController::class, 'sepatuByMerek'])->name('sepatu.byMerek');
Route::get('/sepatu/kategori/{kategori}', [SepatuController::class, 'filterByKategori'])->name('sepatu.kategori');
Route::get('list-search',[ListController::class,'search']);
Route::get('/dashboard',[DashboardAdminController::class, 'Dashboard'])->middleware('auth');
Route::get('dshbrd-spt',[DashboardSepatuController::class,'index'])->middleware(['auth']);
Route::get('dshbrd-usr',[DashboardAdminController::class,'index'])->middleware(['auth']);
Route::get('dshbrd-brd',[DashboardBrandController::class,'index'])->middleware(['auth']);


Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::resource('/list',ListController::class);
Route::resource('/dashboard-sepatu',DashboardSepatuController::class)->middleware(['auth']);
Route::resource('/dashboard-user',DashboardAdminController::class)->middleware(['auth']);
Route::resource('/dashboard-brand',DashboardBrandController::class)->middleware(['auth']);
Route::resource('/dashboard-sizes',DashboardSizesController::class)->middleware(['auth']);
Route::resource('/dashboard-color',DashboardColorsController::class)->middleware(['auth']);
Route::post('/pemesanan', [SepatuController::class, 'pemesanan'])->name('pemesanan');
Route::post('/upload-bukti', [SepatuController::class, 'uploadBukti'])->name('upload.bukti');
Route::get('/bayar', [PaymentController::class, 'show'])->name('bayar');
Route::post('/proses-bayar', [PaymentController::class, 'prosesBayar'])->name('proses.bayar');

