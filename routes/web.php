<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::get('admin/menu', App\Livewire\Admin\Menu::class)->name('admin.menu');
    Route::get('admin/pesanan', App\Livewire\Admin\Pesanan::class)->name('admin.pesanan');
    Route::get('admin/pesananditerima', App\Livewire\Admin\PesananDiterima::class)->name('admin.pesananditerima');
    Route::get('admin/menu/edit/{id}', App\Livewire\Admin\MenuEdit::class)->name('admin.menuedit');
});
Route::middleware(['auth', 'user'])->group(function () {
        Route::get('user/index', App\Livewire\User\Index::class)->name('user.index');
        Route::get('user/keranjang', App\Livewire\User\Keranjang::class)->name('user.keranjang');
        Route::get('user/menu', App\Livewire\User\Menu::class)->name('user.menu');
        // Route::get('user/keranjang/add/{id}', [App\Livewire\User\Keranjang::class, 'addkeranjang'])->name('user.addkeranjang');
    });
