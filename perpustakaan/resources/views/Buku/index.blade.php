<!-- resources/views/buku/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku Perpustakaan</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Jumlah Buku</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>Jumlah Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
            <tr>
                <td>{{ $buku->IDBuku }}</td>
                <td>{{ $buku->Jumlah_Buku }}</td>
                <td>{{ $buku->Penerbit }}</td>
                <td>{{ $buku->Pengarang }}</td>
                <td>{{ $buku->Jumlah }}</td>
                <td>
                    <a href="{{ route('buku.edit', $buku->IDBuku) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('buku.destroy', $buku->IDBuku) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
