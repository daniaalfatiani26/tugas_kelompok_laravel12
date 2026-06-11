<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD Transkrip - Universitas Teknologi Nusantara</title>
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
            background-color: #ffcc00; /* Warna kuning selaras temanmu */
            color: #333;
            padding: 15px 20px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .card-body {
            padding: 20px;
        }

        /* Styling Profil */
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

        /* Styling Tabel */
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
            background-color: #f8f9fa; /* Abu-abu terang */
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        .details-btn {
            background-color: #3174b0;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9em;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <h2 class="main-header">Universitas Al-Ghifari - SIAKAD Mahasiswa</h2>

    <!-- Card 1: Profil Mahasiswa -->
    <div class="card">
        <div class="card-header">
            👤 Informasi Profil Mahasiswa
        </div>
        <div class="card-body profile-info">
            <div class="profile-pic">👤</div>
            <div>
                <strong>Nama:</strong> DANIA ALFATIANI WIRADIREDJA<br>
                <strong>NIM:</strong> F1B250005<br>
                <strong>Jurusan:</strong> Sistem Informasi<br>
                <strong>IPK Kumulatif: <span style="color: #3174b0; font-size: 1.1em;">3.75</span></strong>
            </div>
        </div>
    </div>

    <!-- Card 3: Kartu Hasil Studi (KHS) -->
    <div class="card">
        <div class="card-header">
            Kartu Hasil Studi (KHS) Semester Ganjil
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai Huruf</th>
                        <th>Nilai Angka</th>
                        <th>IPS</th>
                        <th>IPK Kumulatif</th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <tr>
                        <td>1</td>
                        <td>S1244108</td>
                        <td>Bahasa Indonesia</td>
                        <td>2</td>
                        <td>A</td>
                        <td>4.00</td>
                        <td rowspan="3" style="vertical-align: middle; text-align: center; font-weight: bold; font-size: 1.2em; color: #3174b0;">3.80</td>
                        <td rowspan="3" style="vertical-align: middle; text-align: center; font-weight: bold; font-size: 1.2em;">3.75</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>S1244106</td>
                        <td>Algroritma $ Struktur Data</td>
                        <td>4</td>
                        <td>A</td>
                        <td>4.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>S1244105</td>
                        <td>Manajement Bisnis</td>
                        <td>3</td>
                        <td>A</td>
                        <td>3.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>S1244103</td>
                        <td>Matematika Diskrit</td>
                        <td>3</td>
                        <td>A</td>
                        <td>3.00</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>S1244101</td>
                        <td>Wawasan Teknologi Informasi</td>
                        <td>2</td>
                        <td>B</td>
                        <td>3.00</td>
                    </tr>
                </tbody> -->
                <tbody>
                    @foreach($semuaNilai as $data)
                        <tr>
                            <td>{{ $data->nim }}</td>
                            <td>{{ $data->mata_kuliah }}</td>
                            <td>{{ $data->nilai }}</td>
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