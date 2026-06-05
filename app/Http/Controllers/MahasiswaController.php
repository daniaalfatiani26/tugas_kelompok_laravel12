<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            ['nim' => 'F1B250005', 'nama' => 'DANIA ALFATIANI WIRADIREDJA', 'jurusan' => 'Sistem Informasi'],
            ['nim' => 'F1B250024', 'nama' => 'INDIRA FATIMAH AZZAHRA', 'jurusan' => 'Sistem Informasi'],
            ['nim' => 'F1B250021', 'nama' => 'NURUL ASHARI MUROHMAH', 'jurusan' => 'Sistem Informasi']
        ];

        return view('halaman1', compact('mahasiswa'));
    }
}
