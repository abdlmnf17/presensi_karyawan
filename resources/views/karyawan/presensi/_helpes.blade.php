@php
function getStatusPresensi($status)
{
    // Ubah angka status menjadi teks
    switch ($status) {
        case 0:
            return 'MASUK';
        case 1:
            return 'SAKIT';
        case 2:
            return 'IZIN';
        default:
            return 'MASUK';
    }
}
@endphp
