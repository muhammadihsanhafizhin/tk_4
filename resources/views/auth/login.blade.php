<!DOCTYPE html>
<html>
<head>
    <title>Masuk Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Masuk Pengguna</h2>
                </div>
                <div class="card-body">
                    <form action="/proses_login" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="NamaPengguna">Nama Pengguna:</label>
                            <input type="text" class="form-control" id="NamaPengguna" name="NamaPengguna">
                        </div>

                        <div class="form-group">
                            <label for="Password">Password:</label>
                            <input type="password" class="form-control" id="Password" name="Password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="/register">Belum punya akun? Daftar di sini.</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
