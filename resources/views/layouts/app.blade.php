@php
    $user = session('user');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"><h2>Halo <?php echo $user->NamaPengguna?>!</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">Laporan Laba Rugi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('barang.index') }}">Daftar Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pembelian.index') }}">Daftar Pembelian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penjualan.index') }}">Daftar Penjualan</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supplier.index') }}">Daftar Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelanggan.index') }}">Daftar Pelanggan</a>
                </li>
                @if($user->IdAkses === 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengguna.index') }}">Daftar Pengguna</a>
                </li>
                @endif
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="nav-link" style ="border:1px solid transparent;"type="submit">Logout</button>
                </form>
            </ul>
            <ul>
            
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
