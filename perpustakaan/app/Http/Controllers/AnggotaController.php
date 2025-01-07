<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    // Menampilkan daftar semua anggota
    public function index()
    {
        $anggotas = Anggota::all(); // Ambil semua data anggota
        return view('anggota.index', compact('anggotas')); // Tampilkan ke view
    }

    // Menampilkan form untuk menambah anggota baru
    public function create()
    {
        return view('anggota.create'); // Tampilkan form tambah anggota
    }

    // Menyimpan data anggota baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Anggota' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'Jurusan' => 'required|string|max:255',
            'IDDaftar' => 'required|integer|unique:anggotas,IDDaftar',
        ]);

        Anggota::create($request->all()); // Simpan data
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    // Menampilkan detail anggota tertentu
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.show', compact('anggota')); // Tampilkan detail anggota
    }

    // Menampilkan form untuk mengedit anggota
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    // Mengupdate data anggota di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Anggota' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'Jurusan' => 'required|string|max:255',
            'IDDaftar' => 'required|integer|unique:anggotas,IDDaftar,' . $id,
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all()); // Update data
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    // Menghapus anggota dari database
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}
