<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminTransaksiDetailController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('invoice/print/{id}', [AdminTransaksiController::class,'print_invoice'])->name('print.invoice');
Route::post('generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePdf']);

Route::get('/register', [AdminAuthController::class, 'register'])->name('register');
Route::post('/register-proses', [AdminAuthController::class, 'register_proses'])->name('register-proses');
Route::post('/login', [AdminAuthController::class])->name('login')->middleware('web');

Route::get('/login', [AdminAuthController::class, 'index']);
Route::post('/login/do', [AdminAuthController::class, 'doLogin']);


Route::get('/', function () {
    $data = [
        'content'  => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
});




 
    Route::middleware(['auth', 'userAkses:admin,pengguna'])->prefix('kasir')->group(function () {
    Route::get('/transaksi/detail/selesai/{id}', [AdminTransaksiDetailController::class, 'done']);
    Route::get('/transaksi/detail/delete', [AdminTransaksiDetailController::class, 'delete']);
    Route::post('/transaksi/detail/create', [AdminTransaksiDetailController::class, 'create']);
    Route::resource('/transaksi', AdminTransaksiController::class );
});

Route::middleware(['auth', 'userAkses:admin'])->prefix('admin')->group(function () {
    Route::resource('/produk', AdminProdukController::class );
    Route::resource('/kategori', AdminKategoriController::class );
    Route::resource('/user', AdminUserController::class );
    
});