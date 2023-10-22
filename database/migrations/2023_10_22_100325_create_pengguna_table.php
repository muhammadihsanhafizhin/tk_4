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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('IdPengguna');
            $table->string('NamaPengguna')->unique();
            $table->string('Password');
            $table->string('NamaDepan');
            $table->string('NamaBelakang');
            $table->string('NoHP');
            $table->string('Alamat');
            $table->unsignedBigInteger('IdAkses');
            $table->foreign('IdAkses')->references('IdAkses')->on('hak_akses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
