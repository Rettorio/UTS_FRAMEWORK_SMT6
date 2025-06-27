<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Penyelenggara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @auth
        <nav class="navbar navbar-dark bg-dark mb-4 p-3">
            <div class="container-fluid">
                <span class="navbar-brand">Halo, {{ Auth::user()->name }}</span>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </nav>
    @endauth

    <main>
        @yield('content')
    </main>
</body>
</html>
