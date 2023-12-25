@extends('layouts.karyawanapp')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Detail Karyawan</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <i class="material-icons" style="font-size: 100px;">account_circle</i>
                            </div>

                            <div class="col-md-8">
                                <h3>{{ $karyawan->nama }} </h3>
                                <p><strong>No Badge:</strong> {{ $karyawan->no_badge }}</p>
                                <p><strong>No ID Karyawan:</strong> {{ $karyawan->no_id }}</p>
                                <p><strong>No NIK KTP:</strong> {{ $karyawan->no_kk }}</p>
                                <p><strong>Tanggal Lahir:</strong> {{ $karyawan->tanggal_lahir }}</p>
                                <p><strong>Jenis Kelamin:</strong> {{ $karyawan->jenis_kelamin }}</p>
                                <p><strong>Agama:</strong> {{ $karyawan->agama }}</p>
                                <p><strong>Klasifikasi:</strong> {{ $karyawan->klasifikasi }}</p>
                                <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
                                <p><strong>Telepon:</strong> {{ $karyawan->telepon }}</p>
                                <p><strong>Gaji Pokok:</strong> {{ $karyawan->gaji_pokok }}</p>
                            </div>

                            <button type="button" class="btn btn-warning text-white">
                                Jika ada perubahan data, segera hubungi Admin.
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
