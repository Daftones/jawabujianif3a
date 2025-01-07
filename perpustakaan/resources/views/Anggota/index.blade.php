<!-- resources/views/anggota/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Anggota</h1>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>ID Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggotas as $anggota)
            <tr>
                <td>{{ $anggota->IDAnggota }}</td>
                <td>{{ $anggota->Nama_Anggota }}</td>
                <td>{{ $anggota->Alamat }}</td>
                <td>{{ $anggota->Jurusan }}</td>
                <td>{{ $anggota->IDDaftar }}</td>
                <td>
                    <a href="{{ route('anggota.show', $anggota->IDAnggota) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('anggota.edit', $anggota->IDAnggota) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('anggota.destroy', $anggota->IDAnggota) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
