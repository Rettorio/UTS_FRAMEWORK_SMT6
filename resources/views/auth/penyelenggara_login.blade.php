<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login penyelenggara</title>
</head>
<body>
    <h1>Form login penyelenggara</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <pre>{{ $error }}</pre>
        @endforeach
    @endif
    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="masukan email">
        <input type="password" name="password" placeholder="masukan password">
        <button type="submit">login</button>
    </form>
</body>
</html>