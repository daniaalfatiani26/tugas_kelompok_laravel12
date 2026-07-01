<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;

Route::get('/nilais', [NilaiController::class, 'indexApi']);
Route::post('/nilais', [NilaiController::class, 'storeApi']);

Route::get('/nilais/{id}', [NilaiController::class, 'showApi']); 

Route::put('/nilais/{id}', [NilaiController::class, 'updateApi']); 
Route::delete('/nilais/{id}', [NilaiController::class, 'destroyApi']);