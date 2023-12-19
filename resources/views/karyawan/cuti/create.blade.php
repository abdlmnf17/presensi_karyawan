

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
                        @endif

                        <form method="post" action="{{ route('cuti.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai:</label>
                                <input type="date" class="form-control" name="tanggal_mulai" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai:</label>
                                <input type="date" class="form-control" name="tanggal_Selesai" required>
                            </div>

                            <div class="form-group">
                                <label for="alasan">Alasan:</label>
                                <textarea class="form-control" name="reason" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
