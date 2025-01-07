<!-- resources/views/detailpinjam/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Detail Pinjam</h1>

    <form action="{{ route('detailpinjam.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="IDAnggota" class="form-label">Anggota</label>
            <select class="form-select" id="IDAnggota" name="IDAnggota" required>
                <option value="">Pilih Anggota</option>
                @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->IDAnggota }}">{{ $anggota->Nama_Anggota }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="IDBuku" class="form-label">Buku</label>
            <select class="form-select" id="IDBuku" name="IDBuku" required>
                <option value="">Pilih Buku</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->IDBuku }}">{{ $buku->Judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Tgl_Pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="Tgl_Pinjam" name="Tgl_Pinjam" required>
        </div>

        <div class="mb-3">
            <label for="Tgl_Kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="Tgl_Kembali" name="Tgl_Kembali" required>
        </div>

        <div class="mb-3">
            <label for="Denda" class="form-label">Denda</label>
            <input type="number" class="form-control" id="Denda" name="Denda" value="0" min="0">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('detailpinjam.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
