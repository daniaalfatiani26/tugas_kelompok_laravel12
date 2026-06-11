<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    // Ini biar Laravel tau dia harus ngambil data dari tabel 'nilais'
    protected $table = 'nilais'; 

    // Ini biar Laravel boleh masukin data ke kolom-kolom ini
    protected $fillable = ['nim', 'nama', 'mata_kuliah', 'nilai'];
}