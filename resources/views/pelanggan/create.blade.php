@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Pelanggan</h2>
        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="NamaPelanggan">Nama Pelanggan:</label>
                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan">
            </div>
            <div class="form-group">
                <label for="NoHP">No HP:</label>
                <input type="number" class="form-control" id="NoHP" name="NoHP">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
