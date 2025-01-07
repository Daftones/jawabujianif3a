<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel buku.
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('IDBuku'); // Primary key untuk tabel buku
            $table->integer('Jumlah_Buku'); // Jumlah buku yang tersedia
            $table->string('Penerbit'); // Nama penerbit buku
            $table->string('Pengarang'); // Nama pengarang buku
            $table->integer('Jumlah'); // Jumlah total buku di perpustakaan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Balikkan migrasi untuk menghapus tabel buku.
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
