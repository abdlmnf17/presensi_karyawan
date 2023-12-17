<!-- resources/views/karyawan/presensi/detail.blade.php -->

@extends('layouts.karyawanapp')

@section('content')

<div class="container">
    @include('karyawan.presensi._helpes')
    <h1>Detail Presensi</h1>

    <table class="table">
        <thead>
            <tr>
                <th>No Badge</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Periode / Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presensiHariIni as $presensi)
            <tr>
                <td>{{ $presensi->karyawan ? $presensi->karyawan->no_badge : 'Data tidak ditemukan' }}</td>
                <td>{{ $presensi->karyawan ? $presensi->karyawan->nama : 'Data tidak ditemukan' }}</td>
                <td>{{ $presensi->karyawan ? $presensi->karyawan->klasifikasi : 'Data tidak ditemukan' }}</td>
                <td>{{ $presensi->tanggal }}</td>
                <td>{{ getStatusPresensi($presensi->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
