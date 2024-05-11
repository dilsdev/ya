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
Route::get('user/keranjang/{id}', [KeranjangController::class, 'keranjang']);
Route::get('user/rekomendasi', [RekomendasiController::class, 'rekomendasi']);

//belum selesai
Route::get('user/keranjang/check/{id}/{$id_user}', [KeranjangController::class, 'check']);
Route::get('user/keranjang/uncheck/{id}/{$id_user}', [KeranjangController::class, 'unchek']);
Route::get('user/keranjang/plusqty/{id}/{$id_user}', [KeranjangController::class, 'tambahkeranjang']);
Route::get('user/keranjang/minqty/{id}/{$id_user}', [KeranjangController::class, 'kurangikeranjang']);
Route::get('user/pesanan/detail/{id}/{$id_user}', [PesananController::class, 'detail']);
Route::get('user/pesanan/pesan', [PesananController::class, 'pesan']);
Route::delete('user/keranjang/{id}/{$id_user}', [KeranjangController::class, 'delete']);

