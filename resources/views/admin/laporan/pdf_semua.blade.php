<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Semua Karyawan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center>
        <hr>
        <h1>Rekap Laporan Semua Karyawan <br/>
        PT. MAKMUR GUNA CIPTA</h1>
        <p>Periode: {{ $startDate }} - {{ $endDate }}</p>
        <br/>
    </center>
    <hr>
    <br/>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>No Badge</th>
                    <th>Jabatan</th>
                    <th>Jumlah Absen</th>
                    <th>Jumlah Cuti</th>
                    <th>Jumlah Lembur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $karyawanItem)
                    <tr>
                        <td>{{ $karyawanItem->nama }}</td>
                        <td>{{ $karyawanItem->no_badge }}</td>
                        <td>{{ $karyawanItem->jabatan }}</td>
                        <td>{{ count($karyawanItem->presensi) }}</td>
                        <td>{{ count($karyawanItem->cuti) }}</td>
                        <td>{{ count($karyawanItem->lembur) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
    </div>
</body>
</html>
