
@extends('layouts.karyawanapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Riwayat Cuti</div>

                    <div class="card-body">
                        @if($cuti->isEmpty())
                            <p>Tidak ada riwayat cuti.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cutis as $cuti)
                                        <tr>
                                            <td>{{ $cuti->tanggal_mulai }}</td>
                                            <td>{{ $cuti->tanggal_selesai }}</td>
                                            <td>{{ $cuti->alasan }}</td>
                                            <td>{{ ucfirst($cuti->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
