<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Academic - Input Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Sistem Informasi Akademik - Halaman Nilai</h2>

   @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('gagal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('gagal') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="card-title mb-0">Input Nilai Mahasiswa</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('nilai.store') }}" method="POST">
                        @csrf 
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" placeholder="Contoh: 22010101" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" class="form-control" placeholder="Contoh: Arsitektur Komputer" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nilai Angka</label>
                            <input type="number" name="nilai" class="form-control" placeholder="0 - 100" min="0" max="100" required>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning text-dark flex-grow-1">Simpan Data</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="card-title mb-0">Laporan Nilai Mahasiswa</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Mata Kuliah</th>
                                    <th>Nilai</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                        <tbody>
                            @forelse($semuaNilai as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->mata_kuliah }}</td>
                                <td>
                                    <span class="badge {{ $data->nilai >= 75 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $data->nilai }}
                                    </span>
                                </td>
                                <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('nilai.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        
                                        <form action="{{ route('nilai.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    @else
                                        <span class="badge bg-secondary">Read Only</span>
                                    @endif
                                    </div>
                            </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data nilai.</td>
                            </tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <a href="{{ url('/halaman3') }}" class="btn btn-warning w-100 text-dark fw-bold">Berikutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>