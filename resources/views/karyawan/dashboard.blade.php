@extends('layouts.karyawanapp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('success'))
                       <div class="alert alert-success">
                             {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                         {{ session('error') }}
                        </div>
                    @endif
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>  {{ __('Selamat Datang ')}}, {{ Auth::user()->name }}.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>

                    <div class="container mt-4">

                        <br/>
                    <div class="container mt-4">
                        <div class="container mt-4 text-center">
                            {!! QrCode::size(100)->generate('https://localhost:8080/karyawan/presensi/form'); !!}
                        </div>
                        <br/>
                        <div class="d-flex justify-content-around flex-wrap">
                        <a href="/karyawan/presensi/form" class="card text-white bg-primary mb-3" style="max-width: 18rem; text-decoration: none; color: inherit;">
                            <div class="card-header">ABSEN KARYAWAN</div>
                            <div class="card-body">
                                <i class="material-icons"><span class="material-symbols-outlined">group</span></i>
                                <p class="card-text">Absen masuk dan pulang (08.00 - 17.00)</p>
                            </div>
                        </a>

                        {{-- <a href="/karyawan/presensi/riwayat" class="card text-white bg-primary mb-3" style="max-width: 18rem; text-decoration: none; color: inherit;">
                            <div class="card-header">Riwayat Presensi</div>
                            <div class="card-body">
                                <i class="material-icons"><span class="material-symbols-outlined">group</span></i>
                                <p class="card-text">Lihat riwayat presensi</p>
                            </div>
                        </a> --}}
                        </div>




                        {{-- <div class="d-flex justify-content-around flex-wrap">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Data Karyawan</div>
                                <div class="card-body">
                                    <i class="material-icons"><span class="material-symbols-outlined">group</span></i>
                                </a>

                                <p class="card-text">Kelola data karyawan, lihat, buat, hapus, dan edit.</p>

                                </div>
                            </div>

                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Data Presensi </div>
                                <div class="card-body">
                                    <i class="material-icons"><span class="material-symbols-outlined">fingerprint</span></i>
                                    <p class="card-text">Kelola semua data Absensi Karyawan.</p>
                                </div>
                            </div>

                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Cuti Karyawan</div>
                                <div class="card-body">
                                    <i class="material-icons"><span class="material-symbols-outlined">event_available</span></i>
                                    <p class="card-text">Kelola data Cuti karyawan, HRD, buat formulir data cuti.</p>
                                </div>
                            </div>

                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-header">Data Lemburan</div>
                                <div class="card-body">
                                    <i class="material-icons"><span class="material-symbols-outlined">calendar_view_month</span></i>
                                    <p class="card-text">Kelola data lemburan, buat data, edit dan hapus data.</p>
                                </div>
                            </div>

                            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                <div class="card-header">Rekap</div>
                                <div class="card-body">
                                    <i class="material-icons"><span class="material-symbols-outlined">summarize</span></i>
                                    <p class="card-text">Kelola data laporan presensi karyawan.</p>
                                </div>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
