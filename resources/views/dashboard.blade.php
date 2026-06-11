<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard App</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card p-4">
            <h3>Selamat Datang!</h3>
            <p>Anda sudah berhasil login ke sistem.</p>
            <hr>
            <a href="{{ url('/halaman1') }}" class="btn btn-warning btn-lg">
                Klik di sini untuk buka Halaman Data Mahasiswa
            </a>
        </div>
    </div>

</body>
</html>