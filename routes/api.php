<?php

use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Checkout;
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
Route::get('user/pesanan/pending/{token}', [PesananController::class, 'pending']);
Route::get('user/pesanan/proses/{token}', [PesananController::class, 'proses']);
Route::get('user/pesanan/selesai/{token}', [PesananController::class, 'selesai']);
Route::get('user/keranjang/{token}', [KeranjangController::class, 'keranjang']);
Route::get('user/rekomendasi', [RekomendasiController::class, 'rekomendasi']);
Route::get('user/keranjang/check/{id}/{token}', [KeranjangController::class, 'check']);
Route::get('user/keranjang/uncheck/{id}/{token}', [KeranjangController::class, 'uncheck']);
Route::get('user/keranjang/plusqty/{id}/{token}', [KeranjangController::class, 'tambahkeranjang']);
Route::get('user/keranjang/minqty/{id}/{token}', [KeranjangController::class, 'kurangikeranjang']);
Route::get('user/pesanan/detail/{id}/{token}', [PesananController::class, 'detail']);
Route::get('user/keranjang/{id}/{token}', [KeranjangController::class, 'delete']);
Route::get('user/pesanan/pesan/{token}', [PesananController::class, 'pesan']);

Route::post('/register', [Auth::class, 'register']);
Route::post('/login', [Auth::class, 'login']);


Route::post('success', [Checkout::class, 'oke']);