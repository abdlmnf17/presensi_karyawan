<!-- resources/views/admin/presensi/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Presensi</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('presensi.buka') }}" method="post">
                            @csrf
                            <button type="submit" name="status_presensi" value="terbuka">Buka Absensi Masuk</button>

                        </form>
                        <br/>
                        <form action="{{ route('presensi.buka_pulang') }}" method="post">
                            @csrf
                            <button type="submit" name="status_presensi" value="terbuka">Buka Absensi Pulang</button>

                        </form>
                        <br/>

                        <form action="{{ route('presensi.tutup') }}" method="post">
                            @csrf

                            <button type="submit" name="status_presensi" value="ditutup">Tutup Absensi</button>
                        </form>

                        <br/>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Karyawan</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presensis as $presensi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $presensi->karyawan->nama }}</td>
                                        <td>{{ $presensi->tanggal }}</td>
                                        <td>{{ $presensi->lokasi }}</td>
                                        <td>{{ $presensi->jam_masuk }}</td>
                                        <td>{{ $presensi->jam_pulang }}</td>
                                        <td>{{ $presensi->status }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editKaryawanModal">
                                                Edit
                                            </button>

                                            <form action="{{ route('presensi.admin.destroy', $presensi->id) }}" method="post" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                            </form>

                                            <div class="modal fade" id="editKaryawanModal" tabindex="-1" aria-labelledby="editKaryawanModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editKaryawanModalLabel">Edit Absensi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form Edit Karyawan -->
                                                            <form method="POST" action="{{ route('presensi.admin.update', $presensi->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <!-- Nama -->


                                                                <!-- Jenis Kelamin -->
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select class="form-select" id="status" name="status" required>
                                                                        <option value="HADIR" {{ $presensi->status == 'HADIR' ? 'selected' : '' }}>HADIR</option>
                                                                        <option value="ALPA" {{ $presensi->status == 'ALPA' ? 'selected' : '' }}>ALPA</option>
                                                                        <option value="SAKIT" {{ $presensi->status == 'SAKIT' ? 'selected' : '' }}>SAKIT</option>
                                                                        <option value="IZIN" {{ $presensi->status == 'IZIN' ? 'selected' : '' }}>IZIN</option>
                                                                    </select>
                                                                </div>


                                                                <!-- Tombol untuk menyimpan perubahan -->
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
