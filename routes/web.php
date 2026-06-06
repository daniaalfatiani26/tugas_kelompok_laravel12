<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController; 
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');


Route::get('/halaman1', [MahasiswaController::class, 'index']);


Route::get('/halaman3', [HalamanController::class, 'index']);