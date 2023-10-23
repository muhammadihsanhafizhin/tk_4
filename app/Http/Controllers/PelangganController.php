<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelangganList = Pelanggan::all();
    
        return view('pelanggan.index', compact('pelangganList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaPelanggan' => 'required',
            'NoHP' => 'required',
        ]);
    
        Pelanggan::create($request->all());
    
        return redirect()->route('pelanggan.index')
                        ->with('success','Pelanggan created successfully.');
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
    public function edit($IdPelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($IdPelanggan);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'NamaPelanggan' => 'required',
            'NoHP' => 'required',
        ]);
    
        $pelanggan->update($request->all());
    
        return redirect()->route('pelanggan.index')
                        ->with('success','Pelanggan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
    
        return redirect()->route('pelanggan.index')->with('success','Pelanggan deleted successfully');
    }
}
