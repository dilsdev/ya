<?php

use App\Http\Controllers\Checkout;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return redirect('user/index');
});

Route::get('/dashboard', function () {
    return redirect('user/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('admin/index', App\Livewire\Admin\Index::class)->name('admin.index');
    Route::get('admin/index', App\Livewire\Admin\Menu::class)->name('admin.index');
    Route::get('admin/menu', App\Livewire\Admin\Menu::class)->name('admin.menu');
    Route::get('admin/tambahmenu', App\Livewire\Admin\Tambahmenu::class)->name('admin.tambahmenu');
    Route::get('admin/menu/edit/{id}', App\Livewire\Admin\MenuEdit::class)->name('admin.menuedit');
    Route::get('admin/rekomendasi', App\Livewire\Admin\Rekomendasi::class)->name('admin.rekomendasi');
    Route::get('admin/pesanan', App\Livewire\Admin\Pesanan::class)->name('admin.pesanan');
    Route::get('admin/pesananditerima', App\Livewire\Admin\PesananDiterima::class)->name('admin.pesananditerima');
    Route::get('admin/pesananselesai', App\Livewire\Admin\PesananSelesai::class)->name('admin.pesananselesai');
    Route::post('admin/pembayaran', App\Livewire\Admin\Pembayaran::class)->name('admin.pembayaran');
    Route::get('admin/siswa', App\Livewire\Admin\Siswas::class)->name('admin.siswa');
    Route::get('admin/detail/{id}/{url}', App\Livewire\Admin\Detail::class)->name('admin.detail');
    Route::get('admin/pengiriman', App\Livewire\Admin\Pengiriman::class)->name('admin.pengiriman');
});
Route::middleware(['auth', 'user', 'mobile'])->group(function () {
    Route::get('user/index', App\Livewire\User\Index::class)->name('user.index');
    Route::get('user/keranjang', App\Livewire\User\Keranjang::class)->name('user.keranjang');
    Route::get('user/menuall', App\Livewire\User\Menuall::class)->name('user.menuall');
    Route::get('user/menu/{type}', App\Livewire\User\Menu::class)->name('user.menu');
    Route::get('user/myorder', App\Livewire\User\Myorder::class)->name('user.myorder');
    Route::get('user/detail/{id}', App\Livewire\User\Detail::class)->name('user.detail');
    Route::get('user/profile', App\Livewire\User\Profile::class)->name('user.profile');
    Route::get('user/siswa', App\Livewire\User\Siswas::class)->name('user.siswa');
    Route::get('user/unpaid', App\Livewire\User\Unpaid::class)->name('user.unpaid');
});
Route::get('checkout/{id}/{token}', [Checkout::class, 'index'])->name('checkout');
Route::get('detailpelanggan', [Checkout::class, 'detailpelanggan'])->name('detailpelanggan');
Route::post('checkoutpelanggan', [Checkout::class, 'checkoutpelanggan'])->name('checkoutpelanggan');
Route::post('pesanmitrans', [Checkout::class, 'pesanmitrans'])->name('pesanmitrans');
Route::post('pesan', [Checkout::class, 'pesan'])->name('pesan');
Route::get('success', function () {
    return view('user.success');
});
Route::get('gagal', function () {
    return view('user.gagal');
});
Route::get('expired', function () {
    return view('user.expired');
});
Route::get('/payment-status', [PaymentController::class, 'handlePaymentStatus']);

Route::middleware(['auth', 'user', 'web'])->group(function () {
    Route::get('web/index', App\Livewire\Web\Index::class)->name('web.index');
    Route::get('web/keranjang', App\Livewire\Web\Keranjang::class)->name('web.keranjang');
    Route::get('web/menuall', App\Livewire\Web\Menuall::class)->name('web.menuall');
    Route::get('web/menu/{type}', App\Livewire\Web\Menu::class)->name('web.menu');
    Route::get('web/myorder', App\Livewire\Web\Myorder::class)->name('web.myorder');
    Route::get('web/detail/{id}', App\Livewire\Web\Detail::class)->name('web.detail');
    Route::get('web/profile', App\Livewire\Web\Profile::class)->name('web.profile');
    Route::get('web/siswa', App\Livewire\Web\Siswas::class)->name('web.siswa');
    Route::get('web/unpaid', App\Livewire\Web\Unpaid::class)->name('web.unpaid');
    Route::get('user/keranjang/add/{id}', [App\Livewire\User\Keranjang::class, 'addkeranjang'])->name('user.addkeranjang');
});
