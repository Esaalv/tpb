<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('unit_kerja');
            $table->string('nama_kegiatan');
            $table->dateTime('hari_atau_tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('phone');
            // $table->unsignedBigInteger('keranjang_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah');
            $table->enum('status', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('ormawas');
            // $table->foreign('keranjang_id')->references('id')->on('keranjangs');
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
