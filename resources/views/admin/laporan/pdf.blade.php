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
    </center>
    <hr>
    <br/>
    <div>
        <b>Nama Karyawan:</b> {{ $karyawan->nama }} <br/>
        <b>No Badge:</b> {{ $karyawan->no_badge }} <br/>
        <b>Jabatan:</b> {{ $karyawan->jabatan}}
        <br/><br/>
        <h4>Laporan</h4>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Absensi</th>
                    <th>Cuti</th>
                    <th>Lembur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan->presensi as $presensi)
                    <tr>
                        <td>{{ $presensi->tanggal }}</td>
                        <td>Jam Masuk: {{ $presensi->jam_masuk }}<br/>Jam Keluar: {{ $presensi->jam_pulang }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach

                @foreach ($karyawan->cuti as $cuti)
                    <tr>
                        <td>{{ $cuti->tanggal_mulai }} - {{ $cuti->tanggal_selesai }}</td>
                        <td></td>
                        <td>{{ $cuti->alasan_cuti }} <b> ({{ $cuti->status }}) </b></td>
                        <td></td>
                    </tr>
                @endforeach

                @foreach ($karyawan->lembur as $lembur)
                    <tr>
                        <td>{{ $lembur->tanggal }}</td>
                        <td></td>
                        <td></td>
                        <td>Jam Mulai: {{ $lembur->jam_mulai }}<br/>Jam Selesai: {{ $lembur->jam_selesai }}<br/>Keterangan: {{ $lembur->alasan }} <b>
                            ({{ $lembur->status }})</b></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
    </div>
</body>
</html>
