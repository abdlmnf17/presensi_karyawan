@extends('layouts.karyawanapp')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Riwayat Lembur</div>

                    <div class="card-body">
                        @if($lembur->isEmpty())
                            <p>Tidak ada riwayat lembur.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lembur as $lemburs)
                                    @if($lemburs->karyawan->user_id == Auth::id())
                                        <tr>
                                            <td>{{ $lemburs->tanggal }}</td>
                                            <td>{{ $lemburs->jam_mulai }}</td>
                                            <td>{{ $lemburs->jam_selesai }}</td>
                                            <td>{{ $lemburs->alasan }}</td>
                                            <td>
                                                <button class="btn {{ $presensiController->getStatusColorClass($lemburs->status) }}">
                                                    {{ ucfirst($lemburs->status) }}
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
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
