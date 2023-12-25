@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Lembur</div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.lembur.update', $lembur->id) }}">
                            @csrf


                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Karyawan</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ optional($lembur->karyawan)->nama }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $lembur->tanggal }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $lembur->jam_mulai }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $lembur->jam_selesai }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alasan" class="form-label">Alasan</label>
                                <select class="form-select" id="alasan" name="alasan" required>
                                    <option value="alasan1" {{ $lembur->alasan }}> {{ $lembur->alasan }}</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="disetujui">Acc</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
