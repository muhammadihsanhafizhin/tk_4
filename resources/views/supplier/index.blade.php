@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Supplier</h2>
        <a class="btn btn-success" href="{{ route('supplier.create') }}">Tambah Supplier</a>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->IdSupplier }}</td>
                <td>{{ $supplier->NamaSupplier }}</td>
                <td>{{ $supplier->NoHP }}</td>
                <td>{{ $supplier->Alamat }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('supplier.edit',$supplier->IdSupplier) }}">Edit</a>
                    <form action="{{ route('supplier.destroy', $supplier->IdSupplier) }}" method="POST">
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
