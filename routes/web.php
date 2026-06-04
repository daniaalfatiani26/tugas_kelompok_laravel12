<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\MahasiswaController; // Tambahkan ini di paling atas

Route::get('/halaman1', [MahasiswaController::class, 'index']);