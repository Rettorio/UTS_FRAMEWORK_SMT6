<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="mb-4">Selamat Datang di Aplikasi Tiket!</h1>

        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="{{ route('login') }}" class="btn btn-primary">Login Pengguna</a>
            <a href="{{ route('admin.login') }}" class="btn btn-warning">Login Admin</a>
            <a href="{{ route('penyelenggara.login') }}" class="btn btn-success">Login Penyelenggara</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
