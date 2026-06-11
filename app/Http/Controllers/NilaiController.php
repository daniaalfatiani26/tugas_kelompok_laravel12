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
        $request->validate(['nim'=>'required', 'nama'=>'required', 'mata_kuliah'=>'required', 'nilai'=>'required|numeric']);
        Nilai::create($request->all());
        return redirect()->route('nilai.index')->with('sukses', 'Data tersimpan!');
    }

    public function edit($id) {
    $nilai = \App\Models\Nilai::findOrFail($id);
    return view('nilai.edit', compact('nilai'));
    }

    public function update(Request $request, $id) {
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
        Nilai::findOrFail($id)->delete();
        return redirect()->route('nilai.index');
    }
}