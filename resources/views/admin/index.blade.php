<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Selamat datang di halaman admin : {{ Auth::user()->name }}</h1>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout disini</button>
    </form>
</body>
</html>