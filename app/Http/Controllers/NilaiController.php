<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    // --- WEB CONTROLLERS ---
    public function index() {
        $semuaNilai = Nilai::all();
        return view('nilai.index', compact('semuaNilai'));
    }

    public function store(Request $request) {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('nilai.index')->with('gagal', 'Anda bukan admin!');
        }
        $request->validate(['nim'=>'required', 'nama'=>'required', 'mata_kuliah'=>'required', 'nilai'=>'required|numeric']);
        Nilai::create($request->all());
        return redirect()->route('nilai.index')->with('sukses', 'Data tersimpan!');
    }

    public function edit($id) {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('nilai.index')->with('gagal', 'Akses ditolak!');
        }
        $nilai = Nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
    }

    public function update(Request $request, $id) {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('nilai.index')->with('gagal', 'Anda bukan admin!');
        }
        $request->validate(['nim' => 'required', 'nama' => 'required', 'mata_kuliah' => 'required', 'nilai' => 'required|numeric']);
        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());
        return redirect()->route('nilai.index')->with('sukses', 'Data berhasil diupdate!');
    }

    public function destroy($id) {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('nilai.index')->with('gagal', 'Anda bukan admin!');
        }
        Nilai::findOrFail($id)->delete();
        return redirect()->route('nilai.index')->with('sukses', 'Data dihapus!');
    }

    // --- API CONTROLLERS ---
    
    public function indexApi() {
        $semuaNilai = Nilai::paginate(10); 
        return response()->json([
            'status' => 'success',
            'data' => $semuaNilai
        ], 200);
    }

    public function showApi($id) {
        $nilai = Nilai::find($id);
        if (!$nilai) {
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $nilai], 200);
    }

    public function storeApi(Request $request) {
        $request->validate(['nim' => 'required', 'nama' => 'required', 'mata_kuliah' => 'required', 'nilai' => 'required|numeric']);
        $nilai = Nilai::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data tersimpan!', 'data' => $nilai], 201);
    }

    public function updateApi(Request $request, $id) {
        $request->validate(['nim' => 'required', 'nama' => 'required', 'mata_kuliah' => 'required', 'nilai' => 'required|numeric']);
        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diupdate!', 'data' => $nilai], 200);
    }

    public function destroyApi($id) {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!'], 200);
    }
}