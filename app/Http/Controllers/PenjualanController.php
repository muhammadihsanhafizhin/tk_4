<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::join('pelanggan', 'penjualan.IdPelanggan', '=', 'pelanggan.IdPelanggan')
            ->join('barang', 'penjualan.IdBarang', '=', 'barang.IdBarang')
            ->select('penjualan.*', 'pelanggan.NamaPelanggan', 'barang.NamaBarang')
            ->get();
    
        return view('penjualan.index', compact('penjualan'));
    }
    
    public function create()
    {
        $penjualan = Penjualan::all();
        $barangList = Barang::all();
        $pelangganList = Pelanggan::all();
        return view('penjualan.create', compact('barangList', 'penjualan', 'pelangganList'));
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'JumlahPenjualan' => 'required',
            'IdBarang' => 'required',
            'IdPelanggan' => 'required',
            'HargaJual' => 'required',
        ]);
    
        Penjualan::create($request->all());
    
        return redirect()->route('penjualan.index')->with('success','penjualan created successfully.');
    }
    
    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show',compact('penjualan'));
    }
    
    public function edit($IdPenjualan)
    {
        $penjualan = penjualan::findOrFail($IdPenjualan);
        $barangList = Barang::all();
        $pelangganList = pelanggan::all();
        return view('penjualan.edit', compact('barangList', 'penjualan', 'pelangganList'));
    }    
    
    public function update(Request $request, Penjualan $penjualan)
    {
        // dd($request);
        $request->validate([
            'JumlahPenjualan' => 'required',
            'IdBarang' => 'required',
            'IdPelanggan' => 'required',
            // 'HargaJual' => 'required',
        ]);
    
        $penjualan->update($request->all());
    
        return redirect()->route('penjualan.index')->with('success','penjualan updated successfully');
    }
    
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
    
        return redirect()->route('penjualan.index')->with('success','penjualan deleted successfully');
    }
}
