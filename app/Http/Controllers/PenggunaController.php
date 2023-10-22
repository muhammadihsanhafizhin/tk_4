<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\HakAkses;
use Illuminate\Support\Facades\Hash;


class PenggunaController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'NamaPengguna' => 'required|unique:pengguna',
            'Password' => 'required|min:6',
            'NamaDepan' => 'required',
            'NamaBelakang' => 'required',
            'noHP' => 'required',
            'Alamat' => 'required',
            'idAkses' => 'required|exists:hak_akses,idAkses',
        ]);

        // Buat pengguna baru
        $pengguna = Pengguna::create([
            'NamaPengguna' => $request->NamaPengguna,
            'Password' => Hash::make($request->Password),
            'NamaDepan' => $request->NamaDepan,
            'NamaBelakang' => $request->NamaBelakang,
            'noHP' => $request->noHP,
            'Alamat' => $request->Alamat,
            'idAkses' => $request->idAkses,
        ]);

        // return response()->json(['message' => 'Pengguna berhasil terdaftar'], 201);
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'NamaPengguna' => 'required',
            'Password' => 'required',
        ]);

        // Cari pengguna berdasarkan NamaPengguna
        $pengguna = Pengguna::where('NamaPengguna', $request->NamaPengguna)->first();

        // var_dump($pengguna->Password, $request->Password);
        // Jika pengguna tidak ditemukan atau password salah
        if (!$pengguna || !Hash::check($request->Password, $pengguna->Password)) {
            return response()->json(['message' => 'NamaPengguna atau Password salah'], 401);
        }

        // Generate token untuk pengguna
        $token = $pengguna->createToken('authToken')->accessToken;
        // dd($token);
        session()->put('user', $pengguna);

        // dd(session('user'));
        // return response()->json(['token' => $token], 200);
        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        // Hapus user dari session
        // session()->forget('user');

        // Redirect ke halaman login atau halaman lain jika Anda mau
        return redirect()->route('login');
    }

    public function index()
    {
        $pengguna = Pengguna::join('hak_akses', 'pengguna.IdAkses', '=', 'hak_akses.IdAkses')
        ->select('pengguna.*', 'hak_akses.NamaAkses')
        ->get();
        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaPengguna' => 'required',
            'Password' => 'required',
            // ...Tambahkan validasi untuk kolom lainnya di sini...
        ]);

        Pengguna::create($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna created successfully.');
    }

    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pengguna.show', compact('pengguna'));
    }

    public function edit($IdPengguna)
    {
        $pengguna = Pengguna::findOrFail($IdPengguna);
        $hakAksesList = HakAkses::all();
        return view('pengguna.edit', compact('pengguna', 'hakAksesList'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'NamaPengguna' => 'required',
            'NamaDepan' => 'required',
            'NamaBelakang' => 'required',
            'NoHP' => 'required',
            'Alamat' => 'required',
            'IdAkses' => 'required',
            // ...Tambahkan validasi untuk kolom lainnya di sini...
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna updated successfully.');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna deleted successfully.');
    }
}
