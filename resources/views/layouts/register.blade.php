<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login | GoodPhotos</title>
</head>

<link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card shadow-lg rounded">
                    <div class="card-header">
                        <h4 class="text-center">GoodPhotos</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center">Register</h5>
                        <form method="POST" action="/daftar">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Username" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                            </div>
                            <br>
                            <div class="mb-2">
                                <label class="form-label">Merasa sudah punya akun? Masuk lah ke <a href="/masuk">Login</a> </label>
                            </div>
                            <div class="mb-3 mt-3 text-center">
                                <a href="/" class="btn btn-secondary">Kembali</a>
                                <button class="btn btn-primary" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</html>
