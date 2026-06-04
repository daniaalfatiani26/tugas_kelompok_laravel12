<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            ['nim' => '122334', 'nama' => 'Ilham', 'jurusan' => 'Sistem Informasi'],
            ['nim' => '233445', 'nama' => 'Alifa', 'jurusan' => 'Sistem Informasi'],
            ['nim' => '344556', 'nama' => 'Farel', 'jurusan' => 'Sistem Informasi'],
            ['nim' => '677889', 'nama' => 'Nana', 'jurusan' => 'Sistem Informasi'],
        ];

        return view('halaman1', compact('mahasiswa'));
    }
}
