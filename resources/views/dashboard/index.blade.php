@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard Laporan Laba Rugi</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Total Penjualan</th>
                    <th>Total Pembelian</th>
                    <th>Laba Rugi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr>
                        <td>{{ $barang->NamaBarang }}</td>
                        <td>{{ $barang->total_penjualan }}</td>
                        <td>{{ $barang->total_pembelian }}</td>
                        <td>{{ $barang->rugi_laba }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
