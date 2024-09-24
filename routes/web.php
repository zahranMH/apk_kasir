<?php

use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::resource('/user', UserController::class);
Route::resource('/pelanggan', PelangganController::class);
Route::resource('/produk', ProdukController::class);
Route::resource('/penjualan', PenjualanController::class);

Route::get('/detail/{id}', [ProdukController::class, 'showPetugas']);
Route::get('/ProdukAdmin', [ProdukController::class, 'tableAdmin']);

// detail transaksi routes
Route::get('/DetailTransaksi/create/{id}/{id_penjualan}', [DetailTransaksiController::class, 'create']);
Route::post('/DetailTransaksi', [DetailTransaksiController::class, 'store']);
Route::delete('/DetailTransaksi', [DetailTransaksiController::class, 'destroy']);
Route::get('/DetailTransaksi/{id}', [DetailTransaksiController::class, 'index']);

