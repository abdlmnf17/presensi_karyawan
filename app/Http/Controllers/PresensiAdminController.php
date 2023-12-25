<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Konfigurasi;

class PresensiAdminController extends Controller
{
    public function index()
    {
        $presensis = Presensi::all();
        return view('admin.presensis.index', compact('presensis'));
    }

    public function update(Request $request, Presensi $presensi)
    {

        $validatedata = $request->validate([
            'status' => 'required',
        ]);

        $presensi->update($validatedata);


        return redirect()->route('presensi.admin.index')->with('success', 'Presensi berhasil diperbarui');
    }


    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();

        return redirect()->route('presensi.admin.index')->with('success', 'Presensi berhasil dihapus');
    }


    public function bukaPresensi()
    {
        Konfigurasi::updateOrCreate([], ['status_presensi' => 'buka']);

        return redirect()->back()->with('success', 'Presensi berhasil dibuka.');
    }

    public function bukaPresensiPulang()
    {
        Konfigurasi::updateOrCreate([], ['status_presensi' => 'buka_pulang']);

        return redirect()->back()->with('success', 'Presensi pulang berhasil dibuka.');
    }

    public function tutupPresensi()
    {
        Konfigurasi::updateOrCreate([], ['status_presensi' => 'tutup']);

        return redirect()->back()->with('success', 'Presensi berhasil ditutup.');
    }


}
