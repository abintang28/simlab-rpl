<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController; // Tambahkan ini

// Rute Dashboard
Route::get('/dashboard', [BarangController::class, 'dashboard'])->name('barang.dashboard');

// Rute Resource untuk Barang (Index, Create, Store, Edit, Update, Destroy)
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('/', function () {
    return view('welcome');
});
