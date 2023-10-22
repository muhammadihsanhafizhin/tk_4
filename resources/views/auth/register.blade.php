<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-5">Registrasi Pengguna</h2>

    <form action="/proses_register" method="post">
        @csrf

        <div class="form-group">
            <label for="NamaPengguna">Nama Pengguna:</label>
            <input type="text" class="form-control" id="NamaPengguna" name="NamaPengguna">
        </div>

        <div class="form-group">
            <label for="Password">Password:</label>
            <input type="password" class="form-control" id="Password" name="Password">
        </div>

        <div class="form-group">
            <label for="NamaDepan">Nama Depan:</label>
            <input type="text" class="form-control" id="NamaDepan" name="NamaDepan">
        </div>

        <div class="form-group">
            <label for="NamaBelakang">Nama Belakang:</label>
            <input type="text" class="form-control" id="NamaBelakang" name="NamaBelakang">
        </div>

        <div class="form-group">
            <label for="noHP">Nomor HP:</label>
            <input type="text" class="form-control" id="noHP" name="noHP">
        </div>

        <div class="form-group">
            <label for="Alamat">Alamat:</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat">
        </div>

        <input type="hidden" id="IdAkses" name="IdAkses" value="2">

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
