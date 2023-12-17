<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Konfigurasi;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $konfigurasi = Konfigurasi::first(); // Gunakan first() alih-alih all()

    if (auth()->user()->role === 'admin') {
        return view('admin.dashboard');
    } elseif (auth()->user()->role === 'karyawan') {
        return view('karyawan.dashboard', compact('konfigurasi'));
    }

    return view('home', compact('konfigurasi'));
}


    // public function konfig()
    // {
    //     $konfigurasi = Konfigurasi::all();
    //     return view('home', compact('konfigurasi'));
    // }


}
