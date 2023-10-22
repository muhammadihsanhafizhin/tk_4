<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk registrasi
Route::post('/proses_register', [PenggunaController::class, 'register'])->name('proses_register');
Route::get('/register', [PenggunaController::class, 'registerIndex'])->name('register');

// Rute untuk masuk (login)
Route::post('/proses_login', [PenggunaController::class, 'login'])->name('proses_login');
Route::get('/login', [PenggunaController::class, 'loginIndex'])->name('login');

Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('barang', BarangController::class)->names([
    'index' => 'barang.index',
    'create' => 'barang.create',
    'store' => 'barang.store',
    'show' => 'barang.show',
    'edit' => 'barang.edit',
    'update' => 'barang.update',
    'destroy' => 'barang.destroy',
]);

Route::resource('pembelian', PembelianController::class)->names([
    'index' => 'pembelian.index',
    'create' => 'pembelian.create',
    'store' => 'pembelian.store',
    'show' => 'pembelian.show',
    'edit' => 'pembelian.edit',
    'update' => 'pembelian.update',
    'destroy' => 'pembelian.destroy',
]);

Route::resource('penjualan', PenjualanController::class)->names([
    'index' => 'penjualan.index',
    'create' => 'penjualan.create',
    'store' => 'penjualan.store',
    'show' => 'penjualan.show',
    'edit' => 'penjualan.edit',
    'update' => 'penjualan.update',
    'destroy' => 'penjualan.destroy',
]);

Route::resource('supplier', SupplierController::class)->names([
    'index' => 'supplier.index',
    'create' => 'supplier.create',
    'store' => 'supplier.store',
    'show' => 'supplier.show',
    'edit' => 'supplier.edit',
    'update' => 'supplier.update',
    'destroy' => 'supplier.destroy',
]);

Route::resource('pelanggan', PelangganController::class)->names([
    'index' => 'pelanggan.index',
    'create' => 'pelanggan.create',
    'store' => 'pelanggan.store',
    'show' => 'pelanggan.show',
    'edit' => 'pelanggan.edit',
    'update' => 'pelanggan.update',
    'destroy' => 'pelanggan.destroy',
]);

Route::resource('pengguna', PenggunaController::class)->names([
    'index' => 'pengguna.index',
    'create' => 'pengguna.create',
    'store' => 'pengguna.store',
    'show' => 'pengguna.show',
    'edit' => 'pengguna.edit',
    'update' => 'pengguna.update',
    'destroy' => 'pengguna.destroy',
]);





