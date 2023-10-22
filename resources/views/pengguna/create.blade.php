@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Pengguna</h2>
        <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Namapengguna">Nama pengguna:</label>
                <input type="text" class="form-control" id="Namapengguna" name="Namapengguna">
            </div>
            <div class="form-group">
                <label for="Alamat">No HP:</label>
                <input type="number" class="form-control" id="NoHP" name="NoHP">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat:</label>
                <input type="text" class="form-control" id="Alamat" name="Alamat">
            </div>
            <label for="IdAkses">Pilih Role:</label>
            <select class="form-control" id="IdAkses" name="IdAkses">
                @foreach($hakAksesList as $Akses)
                    <option value="{{ $Akses->IdAkses }}">{{ $Akses->NamaAkses }}</option>
                @endforeach
            </select><br>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
