<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\HalamanController; 

Route::get('/', function () { return view('welcome'); });

Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Halaman 1
    Route::get('/halaman1', function () {
        $mahasiswa = [
            ['nim' => 'F1B250005', 'nama' => 'DANIA ALFATIANI WIRADIREDJA', 'jurusan' => 'Sistem Informasi'],
            ['nim' => 'F1B250024', 'nama' => 'INDIRA FATIMAH AZZAHRA', 'jurusan' => 'Sistem Informasi'],
            ['nim' => 'F1B250021', 'nama' => 'NURUL ASHARI MUROHMAH', 'jurusan' => 'Sistem Informasi']
        ];
        return view('halaman1', compact('mahasiswa'));
    });

    // Rute Nilai (NilaiController)
    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
    Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
    Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
    Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

    // Halaman 3 (HalamanController)
    Route::get('/halaman3', [HalamanController::class, 'index'])->name('halaman3');
});

require __DIR__.'/auth.php';