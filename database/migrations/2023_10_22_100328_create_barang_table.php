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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('IdBarang');
            $table->string('NamaBarang');
            $table->string('Keterangan')->nullable();
            $table->string('Satuan');
            $table->unsignedBigInteger('IdPengguna');
            $table->foreign('IdPengguna')->references('IdPengguna')->on('pengguna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
