<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;

// Route API
Route::get('/nilai', [NilaiController::class, 'indexApi']);
Route::post('/nilai', [NilaiController::class, 'storeApi']);