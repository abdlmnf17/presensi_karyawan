<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Lembur;

class LemburController extends Controller
{
    public function index()
    {
        return view('karyawan.lembur.create');
    }

    public function create(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
        'alasan' => 'required',
    ]);

    Lembur::create([
        'karyawan_id' => auth()->user()->karyawan->id,
        'tanggal' => $request->input('tanggal'),
        'jam_mulai' => $request->input('jam_mulai'),
        'jam_selesai' => $request->input('jam_selesai'),
        'alasan' => $request->input('alasan'),
    ]);

    return redirect()->route('karyawan.lembur.index')->with('success', 'Lembur berhasil diajukan! Tunggu status dari admin.');
}

      // Menampilkan riwayat cuti karyawan
      public function show()
      {
          $lembur = Lembur::where('karyawan_id', Auth::user()->karyawan->id)->get();
          return view('karyawan.lembur.riwayat', [
              'lembur' => $lembur,
              'presensiController' => new PresensiKaryawanController(), // Instance PresensiKaryawanController
          ]);
      }




      public function indexAdmin()
    {
        $lembur = Lembur::with('karyawan')->get();
        return view('admin.lembur.index', compact('lembur'));
    }

    public function editAdmin($id)
    {
        $lembur = Lembur::findOrFail($id);
        return view('admin.lembur.edit', compact('lembur'));


    }

    public function update(Request $request, Lembur $lemburs)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $lemburs->update($validatedData);

        return redirect()->route('admin.lembur.index')->with('success', 'Data lembur berhasil diperbarui');
    }


    public function destroy(Lembur $lemburs)
    {
        $lemburs->delete();

        return redirect()->route('admin.lembur.index')->with('success', 'Lembur berhasil dihapus.');
    }




}
