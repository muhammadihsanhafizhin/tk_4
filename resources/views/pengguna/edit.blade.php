@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Pengguna</h2>
        <form action="{{ route('pengguna.update', $pengguna->IdPengguna) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="NamaPengguna">Nama Pengguna:</label>
                <input type="text" class="form-control" id="NamaPengguna" name="NamaPengguna" value="{{ $pengguna->NamaPengguna }}">
            </div>
            <div class="form-group">
                <label for="NamaDepan">Nama Depan:</label>
                <input type="text" class="form-control" id="NamaDepan" name="NamaDepan" value="{{ $pengguna->NamaDepan }}">
            </div>
            <div class="form-group">
                <label for="NamaBelakang">Nama Belakang:</label>
                <input type="text" class="form-control" id="NamaBelakang" name="NamaBelakang" value="{{ $pengguna->NamaBelakang }}">
            </div>
            <div class="form-group">
                <label for="NoHP">No HP:</label>
                <input type="number" class="form-control" id="NoHP" name="NoHP" value="{{ $pengguna->NoHP }}">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat:</label>
                <input type="text" class="form-control" id="Alamat" name="Alamat" value="{{ $pengguna->Alamat }}">
            </div>
            <label for="IdAkses">Pilih Role:</label>
            <select class="form-control" id="IdAkses" name="IdAkses">
                @foreach($hakAksesList as $Akses)
                    <option value="{{ $Akses->IdAkses }}"{{ $Akses->IdAkses == $pengguna->IdAkses ? 'selected' : '' }}>{{ $Akses->NamaAkses }}</option>
                @endforeach
            </select><br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
