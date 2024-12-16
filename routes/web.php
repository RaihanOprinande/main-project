<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DashboardSepatuController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardBrandController;
use App\Http\Controllers\DashboardColorsController;
use App\Http\Controllers\DashboardIncomesController;
use App\Http\Controllers\DashboardSizesController;
// use App\Http\Controllers\DashboardIncomesController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardSepatuSizeController;
use App\Http\Controllers\DashboardPengeluaransController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginPelangganController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [SepatuController::class, 'index'])->name('sepatu.home');
Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
Route::get('/aboutus', [SepatuController::class, 'aboutus']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/loginpelanggan', [LoginPelangganController::class, 'loginpelanggan']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('list',[ListController::class,'index'])->name('sepatu.list');
Route::get('/merek/{id}/sepatu', [ListController::class, 'sepatuByMerek']);
Route::get('/sepatu/kategori/{kategori}', [SepatuController::class, 'filterByKategori'])->name('sepatu.kategori');
Route::get('list-search',[ListController::class,'search']);
Route::get('/dashboard',[DashboardAdminController::class, 'Dashboard'])->middleware('auth');
Route::get('dshbrd-spt',[DashboardSepatuController::class,'index'])->middleware(['auth']);
Route::get('dshbrd-usr',[DashboardAdminController::class,'index'])->middleware(['auth']);
Route::get('dshbrd-brd',[DashboardBrandController::class,'index'])->middleware(['auth']);
Route::get('/cart',[cartController::class, 'index']);


Route::post('/cart/{id}',[cartController::class,'store']);


Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::post('/loginpelanggan',[LoginPelangganController::class,'authenticate']);
Route::post('/logoutpelanggan',[LoginPelangganController::class,'logout']);

Route::resource('/list',ListController::class);
Route::resource('/dashboard-sepatu',DashboardSepatuController::class)->middleware(['auth']);
Route::resource('/dashboard-user',DashboardAdminController::class)->middleware(['auth']);
Route::resource('/dashboard-brand',DashboardBrandController::class)->middleware(['auth']);
Route::resource('/dashboard-pengeluarans',DashboardPengeluaransController::class)->middleware(['auth']);
Route::resource('/dashboard-sizes',DashboardSizesController::class)->middleware(['auth']);
Route::resource('/dashboard-color',DashboardColorsController::class)->middleware(['auth']);
Route::resource('/dashboard-order',DashboardOrderController::class)->middleware(['auth']);
Route::resource('/dashboard-stock',DashboardSepatuSizeController::class)->middleware(['auth']);
Route::resource('/cartedit',cartController::class)->middleware(['auth']);
Route::post('/pemesanan', [SepatuController::class, 'pemesanan'])->name('pemesanan');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/proses-bayar', [SepatuController::class, 'prosesBayar'])->name('proses.bayar');
Route::put('/dashboard-order/{id}/confirm', [SepatuController::class, 'confirmOrder'])->name('orders.confirm');
Route::resource('/dashboard-income',DashboardIncomesController::class)->middleware(['auth']);

Route::resource('/cart/update-customer', cartController::class);



// Route::middleware('auth:customers')->group(function () {
//     Route::get('/loginpelanggan', [LoginPelangganController::class, 'loginpelanggan']);
//     Route::get('/cart',[cartController::class, 'index']);
// });

// Route::middleware('auth:web')->group(function () {
//     Route::get('/login', [LoginController::class, 'loginpelanggan']);
// });

// Route untuk cetak PDF
Route::get('/dashboard-income/cetak-pdf', [DashboardIncomesController::class, 'show'])->name('incomes.cetak-pdf');
Route::get('/dashboard-pengeluarans/cetak-pdf', [DashboardPengeluaransController::class, 'show']);



