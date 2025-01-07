<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // Menampilkan daftar semua buku
    public function index()
    {
        $bukus = Buku::all(); // Ambil semua data buku
        return view('buku.index', compact('bukus')); // Tampilkan ke view
    }

    // Menampilkan form untuk menambah buku baru
    public function create()
    {
        return view('buku.create'); // Tampilkan form tambah buku
    }

    // Menyimpan data buku baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'Jumlah_Buku' => 'required|integer',
            'Penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer',
        ]);

        Buku::create($request->all()); // Simpan data
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan detail buku tertentu
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku')); // Tampilkan detail buku
    }

    // Menampilkan form untuk mengedit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Mengupdate data buku di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'Jumlah_Buku' => 'required|integer',
            'Penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all()); // Update data
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Menghapus buku dari database
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
