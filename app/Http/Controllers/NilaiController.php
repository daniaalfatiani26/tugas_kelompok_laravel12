<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    // 1. Menampilkan Halaman Utama (Tabel Laporan & Form Input)
    public function index()
    {
        $semuaNilai = DB::table('nilais')->get();
        return view('nilai.index', compact('semuaNilai'));
    }

    // 2. Memproses Penyimpanan Data Baru
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

    // 3. Menampilkan Halaman Form Edit
    public function edit($id)
    {
        $nilai = DB::table('nilais')->where('id', $id)->first();
        return view('nilai.edit', compact('nilai'));
    }

    // 4. Memproses Perubahan Data (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required|numeric',
        ]);

        DB::table('nilais')->where('id', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'mata_kuliah' => $request->mata_kuliah,
            'nilai' => $request->nilai,
            'updated_at' => now(),
        ]);

        return redirect()->route('nilai.index')->with('sukses', 'Data nilai berhasil diubah!');
    }

    // 5. Memproses Penghapusan Data
    public function destroy($id)
    {
        DB::table('nilais')->where('id', $id)->delete();
        return redirect()->route('nilai.index')->with('sukses', 'Data nilai berhasil dihapus!');
    }
}