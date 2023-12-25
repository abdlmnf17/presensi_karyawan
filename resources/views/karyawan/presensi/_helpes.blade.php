@php
// Di dalam file helper atau di dalam controller Anda

function getStatusColorClass($status)
{
    switch ($status) {
        case 'pending':
            return 'text-warning'; // Ganti dengan kelas CSS yang sesuai untuk warna kuning
        case 'ditolak':
            return 'text-danger'; // Ganti dengan kelas CSS yang sesuai untuk warna merah
        case 'acc':
            return 'text-success'; // Ganti dengan kelas CSS yang sesuai untuk warna hijau
        default:
            return '';
    }
}

@endphp
