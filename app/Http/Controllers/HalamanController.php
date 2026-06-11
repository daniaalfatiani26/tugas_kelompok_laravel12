<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class HalamanController extends Controller
{
    public function index() 
{
    $semuaNilai = DB::table('nilais')->get(); 
    
    // Logika perhitungan otomatis
    $totalSks = $semuaNilai->count() * 3; // Asumsi 1 matkul = 3 SKS
    $totalNilai = $semuaNilai->sum('nilai');
    $ipk = $semuaNilai->count() > 0 ? number_format($totalNilai / $semuaNilai->count() / 25, 2) : 0;
    
    return view('halaman3', compact('semuaNilai', 'totalSks', 'ipk')); 
}
}