<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class HalamanController extends Controller
{
    public function index() 
    {
        // Mengambil semua data dari tabel 'nilais'
        $semuaNilai = DB::table('nilais')->get(); 
        
        // Mengirim data tersebut ke view 'halaman3'
        return view('halaman3', compact('semuaNilai')); 
    }
}