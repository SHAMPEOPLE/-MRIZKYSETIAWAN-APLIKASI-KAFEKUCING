<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

// RUTE CRUD HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute CRUD Makanan
Route::resource('makanan', MakananController::class);
Route::get('/makanan/create', [MakananController::class, 'create'])->name('makanan.create');
Route::post('/makanan/store', [MakananController::class, 'store'])->name('makanan.store');

// Rute CRUD Minuman
Route::resource('minuman', MinumanController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});

// Route untuk form tambah item
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');

// Route untuk menyimpan item baru
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');

Route::get('/item', [ItemController::class, 'index'])->name('item.index');
Route::get('/item/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
Route::post('/item/{id}/update', [ItemController::class, 'update'])->name('item.update');
Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
Route::resource('kategori', KategoriController::class);
Route::get('item/{item}/delete', [ItemController::class, 'destroy'])->name('item.delete');
Route::delete('item/{item}', [ItemController::class, 'destroyConfirmed'])->name('item.destroy');

Route::resource('item', ItemController::class);

// Route untuk menampilkan daftar barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

// Route untuk menampilkan form tambah barang
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');

// Route untuk menyimpan barang baru
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

// Route untuk menampilkan detail barang (opsional jika digunakan)
Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');

// Route untuk menampilkan form edit barang
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');

// Route untuk memperbarui barang yang sudah ada
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');

// Route untuk menghapus barang
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');