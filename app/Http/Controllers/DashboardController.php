<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data barang
        $barangs = Barang::all();

        // Menghitung total penjualan dan pembelian untuk setiap barang
        foreach ($barangs as $barang) {
            $barang->total_penjualan = Penjualan::where('IdBarang', $barang->IdBarang)->sum('JumlahPenjualan');
            $barang->total_pembelian = Pembelian::where('IdBarang', $barang->IdBarang)->sum('JumlahPembelian');
            $barang->rugi_laba = $barang->total_penjualan - $barang->total_pembelian;
        }

        return view('dashboard.index', compact('barangs'));
    }
}
