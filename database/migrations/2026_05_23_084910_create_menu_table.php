<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id(); // ID Menu otomatis (Primary Key)
            $table->string('nama_menu', 255);
            $table->unsignedBigInteger('kategori'); // Tempat menampung ID Angka dari tabel kategori
            $table->integer('harga');
            $table->string('gambar', 255);

            // Kode relasi Foreign Key resmi sesuai perintah dosen
            $table->foreign('kategori')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};