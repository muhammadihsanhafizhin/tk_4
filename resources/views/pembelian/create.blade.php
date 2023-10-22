@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pembelian</h2>
    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="HargaBeliView">Total Harga:</label>
            <input type="text" class="form-control" id="HargaBeliView" name="HargaBeliView" disabled>
        </div>
        <div class="form-group">
            <label for="JumlahPembelian">Jumlah Pembelian:</label>
            <input type="number" class="form-control" id="JumlahPembelian" name="JumlahPembelian">
        </div>
        <input type="hidden" class="form-control" id="HargaBeli" name="HargaBeli">
        <input type="hidden" class="form-control" id="HargaSatuan" name="HargaSatuan">
        <label for="IdSupplier">Nama Barang:</label>
        <select class="form-control" id="IdBarang" name="IdBarang">
            @foreach($barangList as $barang)
                <option value="{{ $barang->IdBarang }}" data-harga-satuan="{{ $barang->Satuan }}">{{ $barang->NamaBarang }}</option>
            @endforeach
        </select>
        <label for="IdSupplier">Nama Supplier:</label>
        <select class="form-control" id="IdSupplier" name="IdSupplier">
            @foreach($supplierList as $supplier)
                <option value="{{ $supplier->IdSupplier }}">{{ $supplier->NamaSupplier }}</option>
            @endforeach
        </select><br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const jumlahPembelianInput = document.getElementById('JumlahPembelian');
    const hargaSatuanInput = document.getElementById('HargaSatuan');
    const hargaBeliInput = document.getElementById('HargaBeli');
    const hargaBeliViewInput = document.getElementById('HargaBeliView');
    const barangSelect = document.getElementById('IdBarang');

    function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp. ' + ribuan + ',00';
    }

    function hitungTotalHarga() {
        const jumlahPembelian = parseInt(jumlahPembelianInput.value);
        const hargaSatuan = parseFloat(barangSelect.options[barangSelect.selectedIndex].dataset.hargaSatuan);
        const totalHarga = jumlahPembelian * hargaSatuan;

        if (isNaN(jumlahPembelian) || isNaN(hargaSatuan)) {
            hargaBeliInput.value = '';
            hargaBeliViewInput.value = 'Tolong Pilih Barang Dahulu atau Masukkan Jumlah Pembelian';
        } else {
            hargaBeliInput.value = totalHarga.toFixed(2);
            hargaBeliViewInput.value = formatRupiah(totalHarga);
        }
    }

    // Event listener untuk input Jumlah Pembelian
    jumlahPembelianInput.addEventListener('input', hitungTotalHarga);

    // Event listener untuk select Barang
    barangSelect.addEventListener('change', function() {
        hargaSatuanInput.value = this.options[this.selectedIndex].dataset.hargaSatuan;
        hitungTotalHarga();
    });
});
</script>

@endsection
