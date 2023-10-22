<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasApiTokens, Notifiable;
    protected $table = 'pengguna';
    protected $primaryKey = 'IdPengguna';

    protected $fillable = [
        'NamaPengguna',
        'Password',
        'NamaDepan',
        'NamaBelakang',
        'noHP',
        'Alamat',
        'IdAkses',
    ];

    public function hakAkses()
    {
        return $this->belongsTo(HakAkses::class, 'idAkses');
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'idPengguna');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'idPengguna');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'idPengguna');
    }
}
