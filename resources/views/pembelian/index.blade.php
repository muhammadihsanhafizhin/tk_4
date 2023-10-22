@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pembelian</h2>
        <a class="btn btn-success" href="{{ route('pembelian.create') }}">Buat Pembelian</a>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>ID Pembelian</th>
                <th>Harga Total Beli</th>
                <th>Jumlah Pembelian</th>
                <th>Nama Barang</th>
                <th>Nama Supplier</th>
                <th>Aksi</th>
            </tr>
            @foreach ($pembelian as $item)
            <tr>
                <td>{{ $item->IdPembelian }}</td>
                <td class="harga-beli">{{ $item->HargaBeli }}</td>
                <td>{{ $item->JumlahPembelian }}</td>
                <td>{{ $item->NamaBarang }}</td>
                <td>{{ $item->NamaSupplier }}</td>
                <td class="display-flex">
                    <a class="btn btn-primary" href="{{ route('pembelian.edit',$item->IdPembelian) }}">Edit</a>
                    <form action="{{ route('pembelian.destroy', $item->IdPembelian) }}" method="POST">
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
