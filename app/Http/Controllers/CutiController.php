<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuti;
use App\Models\User;


class CutiController extends Controller
{
    // Menampilkan formulir cuti untuk karyawan

    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        return view('karyawan.cuti.create');
    }

    // Menyimpan data cuti yang diajukan oleh karyawan
    public function create(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan_cuti' => 'required|string|max:255',
        ], [
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
        ]);

        Cuti::create([
            'user_id' => Auth::id(),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'alasan_cuti' => $request->input('alasan_cuti'),
        ]);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diajukan! Tunggu status dari admin.');
    }


    // Menampilkan riwayat cuti karyawan
    public function history()
    {
        $cuti = Cuti::where('user_id', Auth::id())->orderByDesc('created_at')->get();
        return view('karyawan.cuti.riwayat', ['cuti' => $cuti]);
    }
}
