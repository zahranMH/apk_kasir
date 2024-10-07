<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LupaPassword;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PetugasProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/reset', function() {
    return view('lupaPassword.resetPassword');
});

// route login dan logout
Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->middleware('guest');
Route::get('/checkEmail', [LupaPassword::class, 'showCheck'])->middleware('guest');
Route::post('/checkEmail', [LupaPassword::class, 'checkEmail'])->middleware('guest');
Route::get('/resetPassword', [LupaPassword::class, 'showReset'])->middleware('guest');
Route::post('/resetPassword', [LupaPassword::class, 'resetPw'])->middleware('guest');

// yang bisa diakses oleh admin
Route::middleware('admin')->group(function() {

    Route::resource('/user', UserController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/pelanggan', PelangganController::class);

});

Route::middleware('auth')->group(function() {

    Route::resource('/PetugasProduk', PetugasProdukController::class);

    Route::resource('/dashboard', DashboardController::class);

    Route::resource('/penjualan', PenjualanController::class);

    Route::resource('/profile', ProfileController::class);
    Route::put('/profile/editPF/{id}', [ProfileController::class, 'updatePF']);

    Route::get('/detail/{id}', [ProdukController::class, 'showPetugas']);

    // detail transaksi routes
    Route::get('/DetailTransaksi/create/{id}/{id_penjualan}', [DetailTransaksiController::class, 'create']);
    Route::post('/DetailTransaksi', [DetailTransaksiController::class, 'store']);
    Route::delete('/DetailTransaksi', [DetailTransaksiController::class, 'destroy']);
    Route::get('/DetailTransaksi/{id}', [DetailTransaksiController::class, 'index']);
    Route::get('/DetailTransaksi/cetakStruk/{id}', [DetailTransaksiController::class, 'cetakStruk']);

    Route::post('/logout', [LoginController::class, 'actionLogout']);
});


