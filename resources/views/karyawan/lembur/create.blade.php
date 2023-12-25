@extends('layouts.karyawanapp')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Form Ajukan Lembur</div>
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
                        <form method="POST" action="{{ route('karyawan.lembur.create') }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                            <label for="name">Nama:</label>
                            <select class="form-select" required>
                                <option value="{{ Auth::user()->name }}"> {{ Auth::user()->name }}</option>
                            </select>
                            </div><br/>
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div><br/>
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai:</label>
                                <input type="time" class="form-control" id='jam_mulai' name="jam_mulai" required>
                            </div><br/>
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai:</label>
                                <input type="time" class="form-control" id='jam_selesai' name="jam_selesai" required>
                            </div><br/>
                            <div class="form-group">
                                <label for="alasan">Alasan:</label>
                                <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                            </div><br/>
                            <button type="submit" class="btn btn-primary">Ajukan Lembur</button>
                            <a href="/karyawan/lembur/riwayat" class="btn btn-outline-primary" role="button">Riwayat Lembur</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
