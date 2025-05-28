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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('permohonans_id');
            $table->string('bukti_foto');
            $table->enum('status_pengembalian', ['Diterima', 'Ditolak', 'Menunggu'])->default('Menunggu');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('ormawas');
            $table->foreign('permohonans_id')->references('id')->on('permohonans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
