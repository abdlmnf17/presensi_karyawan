@extends('layouts.karyawanapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Riwayat') }}</div>

                    <div class="card-body">
                        @if(count($riwayat) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Lokasi</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($riwayat as $presensi)
                                        <tr>
                                            <td>{{ $presensi->tanggal }}</td>
                                            <td>{{ $presensi->lokasi }}</td>
                                            <td>{{ $presensi->jam_masuk }}</td>
                                            <td>{{ $presensi->jam_pulang }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Tidak ada data presensi.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
