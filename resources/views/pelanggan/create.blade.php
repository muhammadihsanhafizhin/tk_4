@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Supplier</h2>
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="NamaSupplier">Nama Supplier:</label>
                <input type="text" class="form-control" id="NamaSupplier" name="NamaSupplier">
            </div>
            <div class="form-group">
                <label for="Alamat">No HP:</label>
                <input type="number" class="form-control" id="NoHP" name="NoHP">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat:</label>
                <input type="text" class="form-control" id="Alamat" name="Alamat">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
