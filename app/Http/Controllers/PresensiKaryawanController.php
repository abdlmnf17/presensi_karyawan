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
            return view('karyawan.presensi.form', compact('konfigurasi', 'presensiHariIni'));
        }

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
        }






    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Pastikan model User memiliki relasi dengan Karyawan
        $karyawan = optional($user->karyawan);

        // Pengecekan apakah user saat ini terkait dengan data karyawan
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'lokasi' => 'required',
            // Tambahkan validasi untuk input lainnya jika diperlukan
        ]);

        // Lakukan validasi dan simpan data presensi karyawan

        // $lokasiKantor = [
        //     '-6.295111666666666, 10747422533333334',
        //     '-6.2948106, 107.4731015',
        //     '-6.2948042, 107.4731039',
        //     '-6.209536, 106.82368',
        //     '-6.209536, 106.82368',

        // ];




        // if ($request->lokasi != $lokasiKantor) {
        //     return redirect()->back()->with('error', 'Anda tidak berada di lokasi kantor.');
        // }

        // Verifikasi apakah karyawan_id yang diambil dari user benar-benar milik user saat ini
        // if ($karyawan->id !== $user->id) {
        //     return redirect()->back()->with('error', 'Data karyawan tidak sesuai dengan user saat ini.');
        // }
        $statusdata = "HADIR";

        // Buat data presensi
        $presensiData = [
            'karyawan_id' => $karyawan->id,
            'tanggal' => now()->toDateString(),
            'lokasi' => $request->lokasi,
            'jam_masuk' => now()->format('H:i:s'),
            'status' => $statusdata,
        ];

        // // Validasi presensiData sebelum disimpan
        // $validation = Presensi::validate($presensiData);

        // // Jika validasi gagal, kembalikan pesan kesalahan
        // if ($validation->fails()) {
        //     return redirect()->back()->with('error', $validation->errors()->first());
        // }

        // Simpan presensi jika validasi berhasil
        Presensi::create($presensiData);

        return redirect()->back()->with('success', 'Absensi masuk berhasil.');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $karyawan = optional($user->karyawan);

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        $request->validate([
            'lokasi' => 'required',

        ]);

        // $lokasiKantor = '-6.209536, 106.82368';


        // if ($request->lokasi != $lokasiKantor) {
        //     return redirect()->back()->with('error', 'Anda tidak berada di lokasi kantor atau anda belum terdaftar sebagai karyawan');
        // }


        $presensi = Presensi::where('karyawan_id', $karyawan->id)
                            ->whereDate('tanggal', now()->toDateString())
                            ->whereNull('jam_pulang')
                            ->first();

        if ($presensi) {
            $presensi->update([
                'jam_pulang' => now()->format('H:i:s'),
                'lokasi' => $request->lokasi,
    
            ]);

            return redirect()->back()->with('success', 'Absensi pulang berhasil.');
        }

        return redirect()->back()->with('error', 'Data presensi tidak ditemukan.');
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







}
