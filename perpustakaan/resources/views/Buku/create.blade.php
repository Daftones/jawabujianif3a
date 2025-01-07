<!-- resources/views/buku/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Buku Perpustakaan</h1>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Jumlah_Buku" class="form-label">Jumlah Buku</label>
            <input type="number" class="form-control" id="Jumlah_Buku" name="Jumlah_Buku" required min="0">
        </div>

        <div class="mb-3">
            <label for="Penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="Penerbit" name="Penerbit" required>
        </div>

        <div class="mb-3">
            <label for="Pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="Pengarang" name="Pengarang" required>
        </div>

        <div class="mb-3">
            <label for="Jumlah" class="form-label">Jumlah Buku di Perpustakaan</label>
            <input type="number" class="form-control" id="Jumlah" name="Jumlah" required min="0">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
