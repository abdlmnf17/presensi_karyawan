<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Lembur;
use App\Models\Cuti;
use App\Models\Karyawan;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with(['presensi', 'lembur', 'cuti'])->get();
        return view('admin.laporan.index', compact('karyawan'));
    }


    public function generatePDF(Request $request)
    {
        $karyawanId = $request->input('karyawan_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $karyawan = Karyawan::with([
            'presensi' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal', [$startDate, $endDate]);
            },
            'lembur' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal', [$startDate, $endDate]);
            },
            'cuti' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_mulai', [$startDate, $endDate])
                    ->orWhereBetween('tanggal_selesai', [$startDate, $endDate]);
            },
        ])->findOrFail($karyawanId);



        $data = compact('karyawan', 'startDate', 'endDate');

        $pdf = PDF::loadView('admin.laporan.pdf', $data);
        $fileName = 'laporan_' . Str::slug($karyawan->nama) . '_' . $startDate . '_to_' . $endDate . '.pdf';
return $pdf->download($fileName);

    }


    public function generatePDFBersama(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $karyawan = Karyawan::with([
        'presensi' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        },
        'lembur' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        },
        'cuti' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('tanggal_mulai', [$startDate, $endDate])
                ->orWhereBetween('tanggal_selesai', [$startDate, $endDate]);
        },
    ])->get();

    $data = compact('karyawan', 'startDate', 'endDate');

    $pdf = PDF::loadView('admin.laporan.pdf_semua', $data);
    $fileName = 'laporan_' . $startDate . '_to_' . $endDate . '.pdf';
    return $pdf->download($fileName);
}



    }
