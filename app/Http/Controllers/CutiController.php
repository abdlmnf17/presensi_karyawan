<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Cuti;

class CutiController extends Controller
{
      // Menampilkan formulir cuti untuk karyawan
      public function create()
      {
          return view('karyawan.cuti.create');
      }

      // Menyimpan data cuti yang diajukan oleh karyawan
      public function store(Request $request)
      {
          $request->validate([
              'tanggal_mulai' => 'required|date',
              'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
              'alasan' => 'required|string|max:255',
          ]);

          $leave = new Cuti;
          $leave->user_id = Auth::id();
          $leave->tanggal_mulai = $request->input('tanggal_mulai');
          $leave->tanggal_selesai = $request->input('tanggal_selesai');
          $leave->alasan = $request->input('alasan');
          $leave->save();

          return redirect()->route('cuti.create')->with('success', 'Cuti berhasil diajukan! tunggu status dari admin.');
      }

      // Menampilkan riwayat cuti karyawan
      public function history()
      {
          $cutis = Cuti::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
          return view('karyawan.cuti.riwayat', ['cutis' => $cutis]);
      }
}
