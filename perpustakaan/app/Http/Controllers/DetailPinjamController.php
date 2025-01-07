<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPinjam;
use App\Models\Anggota;
use App\Models\Buku;

class DetailPinjamController extends Controller
{
    // Menampilkan daftar semua transaksi peminjaman
    public function index()
    {
        $detailPinjams = DetailPinjam::with('anggota', 'buku')->get(); // Relasi dengan anggota dan buku
        return view('detail_pinjam.index', compact('detailPinjams'));
    }

    // Menampilkan form untuk menambah transaksi peminjaman baru
    public function create()
    {
        $anggotas = Anggota::all(); // Ambil semua anggota
        $bukus = Buku::all(); // Ambil semua buku
        return view('detail_pinjam.create', compact('anggotas', 'bukus'));
    }

    // Menyimpan transaksi peminjaman baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'IDAnggota' => 'required|exists:anggotas,IDAnggota',
            'IDBuku' => 'required|exists:bukus,IDBuku',
            'Tgl_Pinjam' => 'required|date',
            'Tgl_Kembali' => 'required|date|after_or_equal:Tgl_Pinjam',
            'Denda' => 'nullable|numeric|min:0',
        ]);

        DetailPinjam::create($request->all());
        return redirect()->route('detail_pinjam.index')->with('success', 'Transaksi peminjaman berhasil ditambahkan!');
    }

    // Menampilkan detail transaksi peminjaman
    public function show($id)
    {
        $detailPinjam = DetailPinjam::with('anggota', 'buku')->findOrFail($id);
        return view('detail_pinjam.show', compact('detailPinjam'));
    }

    // Menampilkan form untuk mengedit transaksi peminjaman
    public function edit($id)
    {
        $detailPinjam = DetailPinjam::findOrFail($id);
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('detail_pinjam.edit', compact('detailPinjam', 'anggotas', 'bukus'));
    }

    // Mengupdate transaksi peminjaman di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'IDAnggota' => 'required|exists:anggotas,IDAnggota',
            'IDBuku' => 'required|exists:bukus,IDBuku',
            'Tgl_Pinjam' => 'required|date',
            'Tgl_Kembali' => 'required|date|after_or_equal:Tgl_Pinjam',
            'Denda' => 'nullable|numeric|min:0',
        ]);

        $detailPinjam = DetailPinjam::findOrFail($id);
        $detailPinjam->update($request->all());
        return redirect()->route('detail_pinjam.index')->with('success', 'Transaksi peminjaman berhasil diperbarui!');
    }

    // Menghapus transaksi peminjaman dari database
    public function destroy($id)
    {
        $detailPinjam = DetailPinjam::findOrFail($id);
        $detailPinjam->delete();
        return redirect()->route('detail_pinjam.index')->with('success', 'Transaksi peminjaman berhasil dihapus!');
    }
}
