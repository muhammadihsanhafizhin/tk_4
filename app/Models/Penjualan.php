<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'IdPenjualan';

    protected $fillable = [
        'IdPelanggan',
        'JumlahPenjualan',
        'HargaJual',
        'IdBarang',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'IdPelanggan');
    }
}
