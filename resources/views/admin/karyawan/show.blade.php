@extends('layouts.app')

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
                                <h3>{{ $karyawan->nama }}</h3>
                                <p><strong>No Badge:</strong> {{ $karyawan->no_badge }}</p>
                                <p><strong>Tanggal Lahir:</strong> {{ $karyawan->tanggal_lahir }}</p>
                                <p><strong>Jenis Kelamin:</strong> {{ $karyawan->jenis_kelamin }}</p>
                                <p><strong>Agama:</strong> {{ $karyawan->agama }}</p>
                                <p><strong>Klasifikasi:</strong> {{ $karyawan->klasifikasi }}</p>
                                <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
                                <p><strong>Telepon:</strong> {{ $karyawan->telepon }}</p>
                                <p><strong>Gaji Pokok:</strong> {{ $karyawan->gaji_pokok }}</p>

                                <div class="mt-3">
                                    <a href="/admin/karyawan" class="btn btn-primary">Kembali</a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editKaryawanModal">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.karyawan.destroy', $karyawan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus Profil</button>
                                    </form>
                                </div>
                            </div>


                            <div class="modal fade" id="editKaryawanModal" tabindex="-1" aria-labelledby="editKaryawanModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editKaryawanModalLabel">Edit Karyawan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form Edit Karyawan -->
                                            <form method="POST" action="{{ route('admin.karyawan.update', $karyawan->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="user_id" class="form-label">User</label>
                                                    <select class="form-select" id="user_id" name="user_id" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Nama -->
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="no_badge" class="form-label">No Badge</label>
                                                    <input type="number" class="form-control" id="no_badge" name="no_badge" value="{{ $karyawan->no_badge }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_kk" class="form-label">NIK</label>
                                                    <input type="number" class="form-control" id="no_kk" name="no_kk" value="{{ $karyawan->no_kk }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_id" class="form-label">No ID</label>
                                                    <input type="number" class="form-control" id="no_id" name="no_id" value="{{ $karyawan->no_id }}" required>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status" name="status" required>
                                                        <option value="Insidentil" {{ $karyawan->status == 'Insidentil' ? 'selected' : '' }}>Insidentil</option>
                                                        <option value="Rutin" {{ $karyawan->status == 'Rutin' ? 'selected' : '' }}>Rutin</option>
                                                    </select>
                                                </div>



                                                <!-- Tanggal Lahir -->
                                                <div class="mb-3">
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" required>
                                                </div>

                                                <!-- Jenis Kelamin -->
                                                <div class="mb-3">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                                        <option value="Laki-laki" {{ $karyawan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ $karyawan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>

                                                <!-- Agama -->
                                                <div class="mb-3">
                                                    <label for="agama" class="form-label">Agama</label>
                                                    <input type="text" class="form-control" id="agama" name="agama" value="{{ $karyawan->agama }}" required>
                                                </div>

                                                <!-- Klasifikasi -->
                                                <div class="mb-3">
                                                    <label for="klasifikasi" class="form-label">Klasifikasi</label>
                                                    <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="{{ $karyawan->klasifikasi }}" required>
                                                </div>

                                                <!-- Jabatan -->
                                                <div class="mb-3">
                                                    <label for="jabatan" class="form-label">Jabatan</label>
                                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $karyawan->jabatan }}" required>
                                                </div>

                                                <!-- Telepon -->
                                                <div class="mb-3">
                                                    <label for="telepon" class="form-label">Telepon</label>
                                                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $karyawan->telepon }}" required>
                                                </div>

                                                <!-- Gaji Pokok -->
                                                <div class="mb-3">
                                                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                                    <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="{{ $karyawan->gaji_pokok }}" required>
                                                </div>

                                                <!-- Tombol untuk menyimpan perubahan -->
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
    </div>
@endsection
