<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index() {
        $semuaNilai = Nilai::all();
        return view('nilai.index', compact('semuaNilai'));
    }

    public function store(Request $request) {
        if (auth()->user()->role !== 'admin') {
        return redirect()->route('nilai.index')->with('gagal', 'Anda bukan admin, tidak dapat menambahkan data!');
    }
        $request->validate(['nim'=>'required', 'nama'=>'required', 'mata_kuliah'=>'required', 'nilai'=>'required|numeric']);
        Nilai::create($request->all());
        return redirect()->route('nilai.index')->with('sukses', 'Data tersimpan!');
    }

    public function edit($id) {
        
        if (auth()->user()->role !== 'admin') {
        return redirect()->route('nilai.index')->with('gagal', 'Akses ditolak!');
    }

    $nilai = \App\Models\Nilai::findOrFail($id);
    return view('nilai.edit', compact('nilai'));
    }

    public function update(Request $request, $id) {

        if (auth()->user()->role !== 'admin') {
        return redirect()->route('nilai.index')->with('gagal', 'Anda bukan admin, tidak dapat edit data!');
    }
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required|numeric'
        ]);

        $nilai = \App\Models\Nilai::findOrFail($id);
        $nilai->update($request->all());

    return redirect()->route('nilai.index')->with('sukses', 'Data berhasil diupdate!');
}

    public function destroy($id) {

        if (auth()->user()->role !== 'admin') {
        return redirect()->route('nilai.index')->with('gagal', 'Anda bukan admin, tidak dapat hapus data!');
    }

        Nilai::findOrFail($id)->delete();
        return redirect()->route('nilai.index')->with('sukses', 'Data dihapus!');
    }

    public function indexApi() {
        $semuaNilai = Nilai::all();
        return response()->json([
            'status' => 'success',
            'data' => $semuaNilai
        ], 200);
    }

    public function storeApi(Request $request) {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required|numeric'
        ]);

        $nilai = Nilai::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data tersimpan!',
            'data' => $nilai
        ], 201);
    }
}