@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Supplier</h2>
        <form action="{{ route('supplier.update', $supplier->IdSupplier) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="NamaSupplier">Nama Supplier:</label>
                <input type="text" class="form-control" id="NamaSupplier" name="NamaSupplier" value="{{ $supplier->NamaSupplier }}">
            </div>
            <div class="form-group">
                <label for="NoHP">No HP:</label>
                <input type="number" class="form-control" id="NoHP" name="NoHP" value="{{ $supplier->NoHP }}">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat:</label>
                <input type="text" class="form-control" id="Alamat" name="Alamat" value="{{ $supplier->Alamat }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
