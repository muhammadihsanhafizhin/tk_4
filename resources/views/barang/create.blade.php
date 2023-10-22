<!-- resources/views/barang/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Barang</h2>

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="NamaBarang">Nama Barang</label>
                <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" required>
            </div>

            <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <textarea class="form-control" id="Keterangan" name="Keterangan" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="Satuan">Harga Satuan</label>
                <input type="text" class="form-control" id="Satuan" name="Satuan" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
