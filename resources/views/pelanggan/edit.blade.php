@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Pelanggan</h2>
        <form action="{{ route('pelanggan.update', $pelanggan->IdPelanggan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="NamaPelanggan">Nama Pelanggan:</label>
                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" value="{{ $pelanggan->NamaPelanggan }}">
            </div>
            <div class="form-group">
                <label for="NoHP">No HP:</label>
                <input type="number" class="form-control" id="NoHP" name="NoHP" value="{{ $pelanggan->NoHP }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
