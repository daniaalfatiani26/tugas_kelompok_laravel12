<?php

namespace App\Http\Controllers;

use App\Models\Nilai;

class HalamanController extends Controller
{
        public function index() 
    {
        $semuaNilai = \App\Models\Nilai::all();
        $ipk = $semuaNilai->count() > 0 ? number_format($semuaNilai->avg('nilai') / 25, 2) : 0;
        
        return view('halaman3', compact('semuaNilai', 'ipk')); 
    }
}