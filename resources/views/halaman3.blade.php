<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD Transkrip - Universitas Al-Ghifari</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-header {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 80%;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-header {
            background-color: #ffcc00;
            color: #333;
            padding: 15px 20px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .card-body {
            padding: 20px;
        }

        .profile-info {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 10px;
            align-items: center;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5em;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 0.9em;
        }

        .center {
            text-align: center;
        }

        .label-profile {
            display: inline-block;
            width: 80px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2 class="main-header">Universitas Al-Ghifari - SIAKAD Mahasiswa</h2>

    <div class="card">
        <div class="card-header">👤 Informasi Profil Mahasiswa</div>
        <div class="card-body profile-info">
            <div class="profile-pic">👤</div>
            <div>
                <strong><span class="label-profile">Nama</span> : DANIA ALFATIANI WIRADIREDJA</strong><br>
                <strong><span class="label-profile">NIM</span> : F1B250005</strong><br>
                <strong><span class="label-profile">Jurusan</span> : Sistem Informasi</strong><br>
                <strong><span class="label-profile">IPK</span> : <span style="color: #3174b0;">{{ $ipk }}</span></strong>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Kartu Hasil Studi (KHS) Semester Ganjil</div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th class="center">SKS</th>
                        <th class="center">Nilai Huruf</th>
                        <th class="center">Nilai Angka</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($semuaNilai as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nim }}</td>
                        <td>{{ $data->mata_kuliah }}</td>
                        <td class="center">3</td>
                        <td class="center">{{ $data->nilai >= 85 ? 'A' : 'B' }}</td>
                        <td class="center">{{ $data->nilai }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        &copy; 2026 Universitas Al-Ghifari. Tugas Kelompok 3.
    </div>

</body>
</html>