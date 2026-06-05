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

    public function destroy($id)
    {
        DB::table('nilais')->where('id', $id)->delete();
        return redirect()->route('nilai.index')->with('sukses', 'Data nilai berhasil dihapus!');
    }

    // FUNGSI BARU 1: Menampilkan halaman edit & mengambil data spesifik
    public function edit($id)
    {
        // Mengambil satu data yang mau diedit berdasarkan ID-nya
        $nilai = DB::table('nilais')->where('id', $id)->first();
        
        // Mengarahkan ke file edit.blade.php sambil membawa data lama tersebut
        return view('nilai.edit', compact('nilai'));
    }

    // FUNGSI BARU 2: Menyimpan hasil editan ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required|numeric',
        ]);

        // Mengupdate data di database sesuai ID-nya
        DB::table('nilais')->where('id', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'mata_kuliah' => $request->mata_kuliah,
            'nilai' => $request->nilai,
            'updated_at' => now(),
        ]);

        return redirect()->route('nilai.index')->with('sukses', 'Data nilai berhasil diubah!');
    }
}