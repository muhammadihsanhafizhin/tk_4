<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        
        $barang = Barang::all();
        return view('barang.index', compact('barang', 'user'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $user = $request->session()->get('user');
        $request->validate([
            'NamaBarang' => 'required',
            'Keterangan' => 'required',
            'Satuan' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['idPengguna'] = $user->IdPengguna;
        Barang::create($requestData);
        return redirect()->route('barang.index')
            ->with('success','Barang created successfully.');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'NamaBarang' => 'required',
            'Keterangan' => 'required',
            'Satuan' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
            ->with('success','Barang updated successfully');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success','Barang deleted successfully');
    }
}
