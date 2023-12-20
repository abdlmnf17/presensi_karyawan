
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Cuti Karyawan</div>

                <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button type="button" class="btn" data-dismiss="alert" aria-label="btn-Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Alasan Cuti</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cutiList as $cuti)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cuti->user->name }}</td>
                                <td>{{ $cuti->tanggal_mulai }}</td>
                                <td>{{ $cuti->tanggal_selesai }}</td>
                                <td>{{ $cuti->alasan_cuti }}</td>
                                <td>{{ $cuti->status }}</td>
                                <td> <a href="{{ route('admin.cuti.edit', $cuti->id) }}" class="btn btn-info">Edit</a>
                                    <form method="post" action="{{ route('admin.cuti.destroy', $cuti->id) }}" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus cuti ini?')">Hapus</button>
                                    </form></td>



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
