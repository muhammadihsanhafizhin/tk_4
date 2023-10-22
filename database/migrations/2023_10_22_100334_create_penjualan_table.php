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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('IdPenjualan');
            $table->integer('JumlahPenjualan');
            $table->integer('HargaJual');
            $table->unsignedBigInteger('IdBarang');
            $table->unsignedBigInteger('IdPelanggan');
            $table->foreign('IdBarang')->references('IdBarang')->on('barang');
            $table->foreign('IdPelanggan')->references('IdPelanggan')->on('pelanggan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
