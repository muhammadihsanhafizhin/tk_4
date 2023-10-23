<!-- resources/views/barang/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Barang</h2>

        <form action="{{ route('barang.update', $barang->IdBarang) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="NamaBarang">Nama Barang</label>
                <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" value="{{ $barang->NamaBarang }}" required>
            </div>

            <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <textarea class="form-control" id="Keterangan" name="Keterangan" rows="3" required>{{ $barang->Keterangan }}</textarea>
            </div>

            <div class="form-group">
                <label for="Satuan">Satuan</label>
                <input type="text" class="form-control" id="Satuan" name="Satuan" value="{{ $barang->Satuan }}" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
