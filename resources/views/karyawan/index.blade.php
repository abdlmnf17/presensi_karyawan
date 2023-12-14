
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Karyawan Non Organik</div>

                <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                @endif





                    <div class="d-flex left-content-start">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createKaryawanModal">
                            Tambah Karyawan
                        </button>
                    </div>
                    <br/>



                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Badge</th>
                                <th>Nama Karyawan</th>
                                <th>Klasifikasi</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $karyawan->no_badge }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->klasifikasi }}</td>
                                    <td>{{ $karyawan->jabatan }}</td>
                                    <td>
                                        <a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-danger">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">Tidak ada data karyawan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="modal fade" id="createKaryawanModal" tabindex="-1" aria-labelledby="createKaryawanModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-slide-right" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createKaryawanModalLabel">Tambah Karyawan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Your create form here -->
                                    <form method="POST" action="{{ route('karyawan.store') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="no_badge" class="form-label">No Badge</label>
                                            <input type="number" class="form-control" id="no_badge" name="no_badge" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="agama" class="form-label">Agama</label>
                                            <input type="text" class="form-control" id="agama" name="agama" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="klasifikasi" class="form-label">Klasifikasi</label>
                                            <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jabatan" class="form-label">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Telepon</label>
                                            <input type="number" class="form-control" id="telepon" name="telepon" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                            <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
    <style>
        /* Custom CSS */
        .modal-dialog-slide-right {
            width: 400px; /* Adjust the width as needed */
            transform: translateX(100%);
            transition: transform 0.3s ease-out;
        }

        .modal.fade.show .modal-dialog-slide-right {
            transform: translateX(0);
        }
    </style>
@endsection
