<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data mahasiswa
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'npm' => 'required|unique:mahasiswas|max:15',
            'nama' => 'required|max:100',
            'prodi' => 'required|max:50',
        ]);

        // Simpan data ke database
        Mahasiswa::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
        ]);

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan!');
    }
}
