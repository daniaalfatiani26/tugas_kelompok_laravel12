<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\MahasiswaController; // Tambahkan ini di paling atas

Route::get('/halaman1', [MahasiswaController::class, 'index']);
use App\Http\Controllers\NilaiController;

// Jalur untuk halaman utama nilai (Tampilkan & Simpan Data)
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');

// Jalur untuk hapus data
Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

// Jalur untuk edit dan update data
Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');