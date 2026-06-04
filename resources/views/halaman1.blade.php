<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h5>Daftar Mahasiswa</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="table-warning">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($mahasiswa as $m)
    <tr>
        <td>{{ $m['nim'] }}</td>
        <td>{{ $m['nama'] }}</td>
        <td>{{ $m['jurusan'] }}</td>
        <td>
            <a href="/nilai?nim={{ $m['nim'] }}" class="btn btn-sm btn-warning">Input Nilai</a>
        </td>
    </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>