<!-- resources/views/detailpinjam/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Detail Peminjaman</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('detailpinjam.create') }}" class="btn btn-primary mb-3">Tambah Detail Pinjam</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No Pinjam</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detailPinjams as $detail)
            <tr>
                <td>{{ $detail->NoPinjam }}</td>
                <td>{{ $detail->anggota->Nama_Anggota }}</td>
                <td>{{ $detail->buku->Judul }}</td>
                <td>{{ $detail->Tgl_Pinjam }}</td>
                <td>{{ $detail->Tgl_Kembali }}</td>
                <td>{{ number_format($detail->Denda, 2) }}</td>
                <td>
                    <a href="{{ route('detailpinjam.edit', $detail->NoPinjam) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('detailpinjam.destroy', $detail->NoPinjam) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus detail pinjam ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
