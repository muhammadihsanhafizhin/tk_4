<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
    
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaSupplier' => 'required',
            'Alamat' => 'required',
            'NoHP' => 'required',
            // tambahkan validasi untuk kolom-kolom lainnya
        ]);
    
        Supplier::create($request->all());
    
        return redirect()->route('supplier.index')
                        ->with('success','Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdSupplier)
    {
        $supplier = Supplier::findOrFail($IdSupplier);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'NamaSupplier' => 'required',
            'Alamat' => 'required',
            // tambahkan validasi untuk kolom-kolom lainnya
        ]);
    
        $supplier->update($request->all());
    
        return redirect()->route('supplier.index')
                        ->with('success','Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
    
        return redirect()->route('supplier.index')
                        ->with('success','Supplier deleted successfully');
    }
}
