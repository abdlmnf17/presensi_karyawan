<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Presensi;

class PresensiController extends Controller
{
    // public function index()
    // {
    //     $karyawans = Karyawan::all();
    //     return view('admin.presensi.index', compact('karyawans'));
    // }

    public function index()
    {
        $presensis = Presensi::all();
        $karyawans = Karyawan::all();
        return view('admin.presensis.index', compact('presensis', 'karyawans'));
    }

    public function create()
    {
        // Tampilkan formulir untuk menambahkan presensi
        return view('presensis.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            // Tambahkan validasi untuk kolom-kolom lainnya
        ]);

        // Simpan data presensi ke database
        Presensi::create($request->all());

        return redirect()->route('presensis.index')->with('success', 'Presensi berhasil ditambahkan');
    }

    public function edit(Presensi $presensi)
    {
        // Tampilkan formulir untuk mengedit presensi
        return view('presensis.edit', compact('presensi'));
    }

    public function update(Request $request, Presensi $presensi)
    {
        // Validasi input dari formulir
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            // Tambahkan validasi untuk kolom-kolom lainnya
        ]);

        // Update data presensi di database
        $presensi->update($request->all());

        return redirect()->route('presensis.index')->with('success', 'Presensi berhasil diperbarui');
    }

    public function destroy(Presensi $presensi)
    {
        // Hapus data presensi dari database
        $presensi->delete();

        return redirect()->route('presensis.index')->with('success', 'Presensi berhasil dihapus');
    }






}
