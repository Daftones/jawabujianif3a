<!-- resources/views/anggota/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Anggota Perpustakaan</h1>

    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nama_Anggota" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="Nama_Anggota" name="Nama_Anggota" required>
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="Alamat" name="Alamat" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="Jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="Jurusan" name="Jurusan" required>
        </div>

        <div class="mb-3">
            <label for="IDDaftar" class="form-label">ID Daftar</label>
            <input type="text" class="form-control" id="IDDaftar" name="IDDaftar" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
