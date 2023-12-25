
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Lembur Karyawan</div>
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
                            <th>Tanggal </th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lembur as $lemburs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                  <td>{{ optional($lemburs->karyawan)->nama }}</td>
                                <td>{{ $lemburs->tanggal }}</td>
                                <td>{{ $lemburs->jam_mulai }}</td>
                                <td>{{ $lemburs->jam_selesai }}</td>
                                <td>{{ $lemburs->status }}</td>
                                <td> <a href="{{ route('admin.lembur.edit', $lemburs->id) }}" class="btn btn-info">Edit</a>

                                    <form method="post" action="{{ route('admin.lembur.destroy', $lemburs->id) }}" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data lembur ini?')">Hapus</button>
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
