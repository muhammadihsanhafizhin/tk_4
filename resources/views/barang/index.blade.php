<!-- resources/views/barang/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Barang</h2>
        <a class="btn btn-success" href="{{ route('barang.create') }}">Tambah Barang</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th>Harga Satuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->IdBarang }}</td>
                        <td>{{ $item->NamaBarang }}</td>
                        <td>{{ $item->Keterangan }}</td>
                        <td class="harga-satuan">{{ $item->Satuan }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('barang.edit', $item->IdBarang) }}">Edit</a>
                            <form action="{{ route('barang.destroy', $item->IdBarang) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
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
    var hargaBeliElements = document.querySelectorAll('.harga-satuan');

    hargaBeliElements.forEach(function(element) {
        var hargaBeli = parseInt(element.innerText);
        element.innerText = formatRupiah(hargaBeli);
    });
});
</script>
@endsection
