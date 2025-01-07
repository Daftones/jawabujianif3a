<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPinjamsTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel detail pinjam.
     */
    public function up()
    {
        Schema::create('detail_pinjams', function (Blueprint $table) {
            $table->id('NoPinjam'); // Primary key untuk tabel detail pinjam
            $table->unsignedBigInteger('IDAnggota'); // Foreign key merujuk ke tabel anggota
            $table->unsignedBigInteger('IDBuku'); // Foreign key merujuk ke tabel buku
            $table->date('Tgl_Pinjam'); // Tanggal peminjaman
            $table->date('Tgl_Kembali'); // Tanggal pengembalian
            $table->decimal('Denda', 8, 2)->default(0); // Kolom denda dengan default 0
            $table->timestamps(); // Kolom created_at dan updated_at

            // Relasi foreign key
            $table->foreign('IDAnggota')->references('IDAnggota')->on('anggotas')->onDelete('cascade');
            $table->foreign('IDBuku')->references('IDBuku')->on('bukus')->onDelete('cascade');
        });
    }

    /**
     * Balikkan migrasi untuk menghapus tabel detail pinjam.
     */
    public function down()
    {
        Schema::dropIfExists('detail_pinjams');
    }
}
