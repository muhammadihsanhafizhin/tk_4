@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pengguna</h2>
        <!-- <a class="btn btn-success" href="{{ route('pengguna.create') }}">Tambah Pengguna</a> -->
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>ID Pengguna</th>
                <th>Username Pengguna</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            @foreach ($pengguna as $pengguna)
            <tr>
                <td>{{ $pengguna->IdPengguna }}</td>
                <td>{{ $pengguna->NamaPengguna }}</td>
                <td>{{ $pengguna->NamaDepan }}</td>
                <td>{{ $pengguna->NamaBelakang }}</td>
                <td>{{ $pengguna->NoHP }}</td>
                <td>{{ $pengguna->Alamat }}</td>
                <td>{{ $pengguna->NamaAkses }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('pengguna.edit',$pengguna->IdPengguna) }}">Edit</a>
                    <form action="{{ route('pengguna.destroy', $pengguna->IdPengguna) }}" method="POST">
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
