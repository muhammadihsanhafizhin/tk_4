<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan'; // Nama tabel di basis data

    protected $primaryKey = 'IdPelanggan'; // Nama kolom primary key

    protected $fillable = [
        'NamaPelanggan',
        'NoHP',
        'TanggalDaftar',
    ];

    // Relasi dengan tabel penjualan (jika diperlukan)
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'IdPelanggan');
    }
}
