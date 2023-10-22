@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Penjualan</h2>
        <a class="btn btn-success" href="{{ route('penjualan.create') }}">Buat Penjualan</a>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>ID Penjualan</th>
                <th>Harga Total Jual</th>
                <th>Jumlah Penjualan</th>
                <th>Nama Barang</th>
                <th>Nama Pelanggan</th>
                <th>Aksi</th>
            </tr>
            @foreach ($penjualan as $item)
            <tr>
                <td>{{ $item->IdPenjualan }}</td>
                <td class="harga-beli">{{ $item->HargaJual }}</td>
                <td>{{ $item->JumlahPenjualan }}</td>
                <td>{{ $item->NamaBarang }}</td>
                <td>{{ $item->NamaPelanggan }}</td>
                <td class="display-flex">
                    <a class="btn btn-primary" href="{{ route('penjualan.edit',$item->IdPenjualan) }}">Edit</a>
                    <form action="{{ route('penjualan.destroy', $item->IdPenjualan) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

<script>
function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp. ' + ribuan + ',00';
}

document.addEventListener('DOMContentLoaded', function() {
    var hargaBeliElements = document.querySelectorAll('.harga-beli');

    hargaBeliElements.forEach(function(element) {
        var hargaBeli = parseInt(element.innerText);
        element.innerText = formatRupiah(hargaBeli);
    });
});
</script>

@endsection
