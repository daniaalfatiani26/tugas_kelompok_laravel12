<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;

// Route API
Route::get('/nilais', [NilaiController::class, 'indexApi']);
Route::post('/nilais', [NilaiController::class, 'storeApi']);