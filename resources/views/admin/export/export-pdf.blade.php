<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pendaftar</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10px;
            /* Ukuran font lebih kecil untuk mode landscape */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .header h3 {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .table-container {
            width: 100%;
            margin: 0 auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: right;
            font-size: 10px;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Laporan Hasil Pendaftar</h1>
        <h3>Tahun Pelajaran 2024/2025</h3>
        <hr>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>No. Pendaftaran</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Hasil Seleksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilSeleksi as $pendaftar)
                    <tr>
                        <td>{{ $pendaftar->noreg_ppdb }}</td>
                        <td>{{ $pendaftar->nik }}</td>
                        <td>{{ $pendaftar->nama }}</td>
                        <td>{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->isoFormat('D MMMM YYYY') }}</td>
                        <td>{{ $pendaftar->jenis_kelamin }}</td>
                        <td>{{ $pendaftar->is_accepted == 1 ? 'Diterima' : 'Pending' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY, HH:mm:ss') }}
    </div>

</body>

</html>
