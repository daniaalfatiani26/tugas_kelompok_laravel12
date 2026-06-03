<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\NilaiController;

// Route untuk menampilkan halaman (Form & Tabel)
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');

// Route untuk memproses simpan data dari Form ke Database
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
// Route untuk menghapus data berdasarkan ID
Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');