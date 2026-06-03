<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {
        $semuaNilai = DB::table('nilais')->get();
        return view('nilai.index', compact('semuaNilai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required|numeric',
        ]);

        DB::table('nilais')->insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'mata_kuliah' => $request->mata_kuliah,
            'nilai' => $request->nilai,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('nilai.index')->with('sukses', 'Data nilai berhasil ditambahkan!');
    }

    // FUNGSI BARU: Untuk menghapus data
    public function destroy($id)
    {
        // Mencari data berdasarkan ID di database lalu menghapusnya
        DB::table('nilais')->where('id', $id)->delete();

        // Lempar kembali ke halaman utama dengan pesan sukses
        return redirect()->route('nilai.index')->with('sukses', 'Data nilai berhasil dihapus!');
    }
}