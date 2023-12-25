<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Konfigurasi;
use Symfony\Contracts\Service\Attribute\Required;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PresensiKaryawanController extends Controller
{
    public function showForm()
    {
        $user = auth()->user();
        $karyawan = optional($user->karyawan);
        $presensiHariIni = Presensi::where('karyawan_id', $karyawan->id)->get();
        $konfigurasi = Konfigurasi::first();

        if (auth()->user()->role === 'admin') {
            return view('admin.dashboard');
        } elseif (auth()->user()->role === 'karyawan') {
            // Jika karyawan belum terdaftar, beri informasi kesalahan
            if (!$karyawan) {
                return redirect()->back()->with('error', 'Anda belum terdaftar sebagai karyawan.');
            }

            return view('karyawan.presensi.form', compact('konfigurasi', 'presensiHariIni'));
        }

        // Informasi kesalahan umum jika tidak sesuai dengan role karyawan atau admin
        return redirect()->back()->with('error', 'Akses ditolak.');

    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Pastikan model User memiliki relasi dengan Karyawan
        $karyawan = optional($user->karyawan);

        // Pengecekan apakah user saat ini terkait dengan data karyawan
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Anda belum terdaftar sebagai karyawan.');
        }

        // Pengecekan apakah sudah melakukan absensi masuk pada hari ini
        $presensiMasukHariIni = Presensi::where('karyawan_id', $karyawan->id)
            ->whereDate('tanggal', now()->toDateString())
            ->whereNull('jam_pulang')
            ->first();

        // Jika sudah melakukan absensi masuk, kembalikan pesan kesalahan
        if ($presensiMasukHariIni) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absen masuk hari ini.');
        }

        // Validasi input
        $request->validate([
            'lokasi' => 'required',
            // Tambahkan validasi untuk input lainnya jika diperlukan
        ]);

        // Buat data presensi
        $presensiData = [
            'karyawan_id' => $karyawan->id,
            'tanggal' => now()->toDateString(),
            'lokasi' => $request->lokasi,
            'jam_masuk' => now()->format('H:i:s'),
            'status' => 'HADIR', // Anda dapat mengganti ini sesuai kebutuhan
        ];

        // Simpan presensi jika user terkait dengan karyawan
        if ($karyawan->id) {
            Presensi::create($presensiData);
            return redirect()->back()->with('success', 'Absensi masuk berhasil.');
        } else {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan, Anda bukan karyawan. Silahkan hubungi Admin');
        }
    }



    public function update(Request $request)
    {
        $user = auth()->user();
        $karyawan = optional($user->karyawan);

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        // Pengecekan apakah karyawan sudah absen masuk hari ini dan jam pulang belum diisi
        $presensiMasuk = Presensi::where('karyawan_id', $karyawan->id)
            ->whereDate('tanggal', now()->toDateString())
            ->whereNotNull('jam_masuk')
            ->whereNull('jam_pulang')
            ->first();

        if (!$presensiMasuk) {
            return redirect()->back()->with('error', 'Anda belum melakukan absen masuk hari ini atau sudah absen pulang.');
        }

        $request->validate([
            'lokasi' => 'required',
        ]);

        // Update data presensi pulang
        $presensiMasuk->update([
            'jam_pulang' => now()->format('H:i:s'),
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Absensi pulang berhasil.');
    }




    public function detail()
    {
        $user = auth()->user();
        $karyawan = optional($user->karyawan);

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        $presensiHariIni = Presensi::where('karyawan_id', $karyawan->id)->get();

        return view('karyawan.presensi.detail', compact('presensiHariIni'));
    }


    public function riwayat()
    {
        $user = auth()->user();
        $karyawan = optional($user->karyawan);

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        $riwayat = Presensi::where('karyawan_id', $karyawan->id)->get();

        return view('karyawan.presensi.riwayat', compact('riwayat'));
    }




function getStatusColorClass($status)
{
    switch ($status) {
        case 'pending':
            return 'bg-warning text-white'; // Ganti dengan kelas CSS yang sesuai untuk warna kuning
        case 'ditolak':
            return 'bg-danger text-white'; // Ganti dengan kelas CSS yang sesuai untuk warna merah
        case 'disetujui':
            return 'bg-success text-white'; // Ganti dengan kelas CSS yang sesuai untuk warna merah
        case 'ACC':
            return 'bg-success text-white'; // Ganti dengan kelas CSS yang sesuai untuk warna hijau
        default:
            return '';
    }
}








}
