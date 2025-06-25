<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer</title>
</head>
    <h1>Selamat datang di halaman user : {{ Auth::user()->name }}</h1>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout disini</button>
    </form>
</body>
</html>