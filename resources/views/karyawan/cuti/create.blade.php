

@extends('layouts.karyawanapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajukan Cuti</div>

                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>

                        @elseif (session('error'))
                        <div class="alert alert-danger">
                         {{ session('error') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('cuti.create') }}">
                            @csrf
                            <div class="form-group">
                            <label for="name">Nama:</label>
                            <select class="form-select" required>
                                <option value="{{ Auth::user()->name }}"> {{ Auth::user()->name }}</option>
                            </select>
                            </div><br/>

                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai:</label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div><br/>
                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai:</label>
                                <input type="date" class="form-control" id='tanggal_selesai' name="tanggal_selesai" required>
                            </div><br/>

                            <div class="form-group">
                                <label for="alasan_cuti">Alasan:</label>
                                <textarea class="form-control" id="alasan_cuti" name="alasan_cuti" rows="3" required></textarea>
                            </div><br/>

                            <button type="submit" class="btn btn-primary">Ajukan Cuti</button>


                            <a href="/karyawan/cuti/riwayat" class="btn btn-outline-primary" role="button">Lihat Riwayat Cuti</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
