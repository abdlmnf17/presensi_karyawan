<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Karyawan</title>
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

    <h1>Rekap Laporan Karyawan <br/>
    PT. MAKMUR GUNA CIPTA</h1>
    <p>Periode: {{ $startDate }} - {{ $endDate }}</p>
<br/>
    <div>
        </center>

        <hr>
        <br/>

        <b>Nama Karyawan:</b> {{ $karyawan->nama }} <br/>
        <b>No Badge:</b> {{ $karyawan->no_badge }} <br/>
        <b>Jabatan:</b> {{ $karyawan->jabatan}}
<br/><br/>
        <h4>Presensi</h4>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan->presensi as $presensi)
                    <tr>
                        <td>{{ $presensi->tanggal }}</td>
                        <td>{{ $presensi->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Lembur</h4>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan->lembur as $lembur)
                    <tr>
                        <td>{{ $lembur->tanggal }}</td>
                        <td>{{ $lembur->jam_mulai }}</td>
                        <td>{{ $lembur->jam_selesai }}</td>
                        <td>{{ $lembur->alasan }}</td>
                        <td>{{ $lembur->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Cuti</h4>
        <table>
            <thead>
                <tr>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Alasan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan->cuti as $cuti)
                    <tr>
                        <td>{{ $cuti->tanggal_mulai }}</td>
                        <td>{{ $cuti->tanggal_selesai }}</td>
                        <td>{{ $cuti->alasan_cuti }}</td>
                        <td>{{ $cuti->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
    </div>
</body>
</html>
