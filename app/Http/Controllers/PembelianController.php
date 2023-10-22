<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Supplier;
use App\Models\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::join('supplier', 'pembelian.IdSupplier', '=', 'supplier.IdSupplier')
            ->join('barang', 'pembelian.IdBarang', '=', 'barang.IdBarang')
            ->select('pembelian.*', 'supplier.NamaSupplier', 'barang.NamaBarang')
            ->get();
    
        return view('pembelian.index', compact('pembelian'));
    }
    
    public function create()
    {
        $pembelian = Pembelian::all();
        $barangList = Barang::all();
        $supplierList = Supplier::all();
        return view('pembelian.create', compact('barangList', 'pembelian', 'supplierList'));
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'JumlahPembelian' => 'required',
            'IdBarang' => 'required',
            'IdSupplier' => 'required',
            'HargaBeli' => 'required',
        ]);
    
        Pembelian::create($request->all());
    
        return redirect()->route('pembelian.index')->with('success','Pembelian created successfully.');
    }
    
    public function show(Pembelian $pembelian)
    {
        return view('pembelian.show',compact('pembelian'));
    }
    
    public function edit($IdPembelian)
    {
        $pembelian = Pembelian::findOrFail($IdPembelian);
        $barangList = Barang::all();
        $supplierList = Supplier::all();
        return view('pembelian.edit', compact('barangList', 'pembelian', 'supplierList'));
    }    
    
    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'JumlahPembelian' => 'required',
            'IdBarang' => 'required',
            'IdSupplier' => 'required',
        ]);
    
        $pembelian->update($request->all());
    
        return redirect()->route('pembelian.index')->with('success','Pembelian updated successfully');
    }
    
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
    
        return redirect()->route('pembelian.index')->with('success','Pembelian deleted successfully');
    }
}
