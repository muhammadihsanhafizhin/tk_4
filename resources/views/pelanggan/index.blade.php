@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pelanggan</h2>
        <a class="btn btn-success" href="{{ route('pelanggan.create') }}">Tambah Pelanggan</a>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>ID pelanggan</th>
                <th>Nama pelanggan</th>
                <th>No HP</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
            @foreach ($pelangganList as $pelanggan)
            <tr>
                <td>{{ $pelanggan->IdPelanggan }}</td>
                <td>{{ $pelanggan->NamaPelanggan }}</td>
                <td>{{ $pelanggan->NoHP }}</td>
                <td>{{ $pelanggan->TanggalDaftar }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('pelanggan.edit',$pelanggan->IdPelanggan) }}">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $pelanggan->IdPelanggan) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
