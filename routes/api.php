<?php

use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RekomendasiController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('user/menu', [MenuController::class, 'menu']);
Route::get('user/menu/makanan', [MenuController::class, 'makanan']);
Route::get('user/menu/minuman', [MenuController::class, 'minuman']);
Route::get('user/pesanan/pending/{id}', [PesananController::class, 'pending']);
Route::get('user/pesanan/proses/{id}', [PesananController::class, 'proses']);
Route::get('user/pesanan/selesai/{id}', [PesananController::class, 'selesai']);
Route::get('user/pesanan/detail/{id}', [PesananController::class, 'detail']);
Route::get('user/keranjang/{id}', [KeranjangController::class, 'keranjang']);
Route::get('user/keranjang/plusqty/{id}', [KeranjangController::class, 'tambahkeranjang']);
Route::get('user/keranjang/minqty/{id}', [KeranjangController::class, 'kurangikeranjang']);
Route::delete('user/keranjang/{id}', [KeranjangController::class, 'delete']);
Route::get('user/pesanan/pesan', [PesananController::class, 'pesan']);
Route::get('user/rekomendasi', [RekomendasiController::class, 'rekomendasi']);

