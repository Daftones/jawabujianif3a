<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id('IDAnggota'); // Kolom ID primary key otomatis bertipe bigint unsigned
            $table->string('Nama_Anggota'); // Kolom string untuk nama anggota
            $table->text('Alamat'); // Kolom text untuk alamat
            $table->string('Jurusan'); // Kolom string untuk jurusan
            $table->integer('IDDaftar')->nullable(); // Kolom integer yang boleh null
            $table->timestamps(); // Kolom otomatis created_at dan updated_at
        });
    }

    /**
     * Balikkan migrasi untuk menghapus tabel.
     */
    public function down()
    {
        Schema::dropIfExists('anggotas'); // Menghapus tabel
    }
}
