@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Penjualan</h2>
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="HargaJualView">Total Harga:</label>
            <input type="text" class="form-control" id="HargaJualView" name="HargaJualView" disabled>
        </div>
        <div class="form-group">
            <label for="JumlahPenjualan">Jumlah Penjualan:</label>
            <input type="number" class="form-control" id="JumlahPenjualan" name="JumlahPenjualan">
        </div>
        <input type="hidden" class="form-control" id="HargaJual" name="HargaJual">
        <input type="hidden" class="form-control" id="HargaSatuan" name="HargaSatuan">
        <label for="IdBarang">Nama Barang:</label>
        <select class="form-control" id="IdBarang" name="IdBarang">
            @foreach($barangList as $barang)
                <option value="{{ $barang->IdBarang }}" data-harga-satuan="{{ $barang->Satuan }}">{{ $barang->NamaBarang }}</option>
            @endforeach
        </select>
        <label for="IdPelanggan">Nama Pelanggan:</label>
        <select class="form-control" id="IdPelanggan" name="IdPelanggan">
            @foreach($pelangganList as $pelanggan)
                <option value="{{ $pelanggan->IdPelanggan }}">{{ $pelanggan->NamaPelanggan }}</option>
            @endforeach
        </select><br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const JumlahPenjualanInput = document.getElementById('JumlahPenjualan');
    const hargaSatuanInput = document.getElementById('HargaSatuan');
    const HargaJualInput = document.getElementById('HargaJual');
    const HargaJualViewInput = document.getElementById('HargaJualView');
    const barangSelect = document.getElementById('IdBarang');

    function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp. ' + ribuan + ',00';
    }

    function hitungTotalHarga() {
        const JumlahPenjualan = parseInt(JumlahPenjualanInput.value);
        const hargaSatuan = parseFloat(barangSelect.options[barangSelect.selectedIndex].dataset.hargaSatuan);
        const totalHarga = JumlahPenjualan * hargaSatuan;

        if (isNaN(JumlahPenjualan) || isNaN(hargaSatuan)) {
            HargaJualInput.value = '';
            HargaJualViewInput.value = 'Tolong Pilih Barang Dahulu atau Masukkan Jumlah Pembelian';
        } else {
            HargaJualInput.value = totalHarga.toFixed(2);
            HargaJualViewInput.value = formatRupiah(totalHarga);
        }
    }

    // Event listener untuk input Jumlah Pembelian
    JumlahPenjualanInput.addEventListener('input', hitungTotalHarga);

    // Event listener untuk select Barang
    barangSelect.addEventListener('change', function() {
        hargaSatuanInput.value = this.options[this.selectedIndex].dataset.hargaSatuan;
        hitungTotalHarga();
    });
});
</script>

@endsection
