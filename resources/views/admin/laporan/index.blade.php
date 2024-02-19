@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rekap Laporan Karyawan</div>

                <div class="card-body">
                    <form action="{{ route('admin.laporan.pdf') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Pilih Karyawan</label>
                            <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                                <option value="">---- Pilih Karyawan ----</option>
                                @foreach ($karyawan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Unduh Laporan</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <br/>
    <br/>
    <br/>





    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rekap Laporan Semua Karyawan</div>

                <div class="card-body">
                    <form action="{{ route('admin.laporan.pdf_semua') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Unduh Semua Laporan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
