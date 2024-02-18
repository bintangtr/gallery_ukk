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
                        <h5 class="text-center">Login</h5>
                        <form method="POST" action="/masuk">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                            </div>
                            <br>
                            <div class="mb-2">
                                <label class="form-label">Belum punya akun? Buat lah dulu di <a href="/daftar">register</a> </label>
                            </div>
                            <div class="mt-3 mb-3 text-center">
                                <a href="/" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Login</button>
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
