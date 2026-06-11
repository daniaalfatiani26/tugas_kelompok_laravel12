<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HalamanController;

Route::get('/', function () { return view('welcome'); });

// Mahasiswa
Route::get('/halaman1', [MahasiswaController::class, 'index']);

// Nilai (Penting: Semua route untuk CRUD harus ada)
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

// Halaman 3
Route::get('/halaman3', [HalamanController::class, 'index']);