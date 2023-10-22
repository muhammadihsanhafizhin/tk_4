<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'IdPembelian';

    protected $fillable = [
        'JumlahPembelian',
        'HargaBeli',
        'IdBarang',
        'IdSupplier'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'IdSupplier');
    }
}
