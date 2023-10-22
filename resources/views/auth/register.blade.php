<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Pengguna</title>
</head>
<body>

<h2>Registrasi Pengguna</h2>

<form action="/proses_register" method="post">
    @csrf
    <label for="NamaPengguna">Nama Pengguna:</label><br>
    <input type="text" id="NamaPengguna" name="NamaPengguna"><br>

    <label for="Password">Password:</label><br>
    <input type="password" id="Password" name="Password"><br>

    <label for="NamaDepan">Nama Depan:</label><br>
    <input type="text" id="NamaDepan" name="NamaDepan"><br>

    <label for="NamaBelakang">Nama Belakang:</label><br>
    <input type="text" id="NamaBelakang" name="NamaBelakang"><br>

    <label for="noHP">Nomor HP:</label><br>
    <input type="text" id="noHP" name="noHP"><br>

    <label for="Alamat">Alamat:</label><br>
    <input type="text" id="Alamat" name="Alamat"><br>

    <label for="idAkses" hidden>Role:</label><br>
    <select id="idAkses" name="idAkses" hidden>
        <option value="1">Admin</option>
        <option value="2" selected>User</option>
    </select><br>

    <input type="submit" value="Register">
</form>

</body>
</html>
