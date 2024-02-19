<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\PresensiKaryawanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiAdminController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\AdminCutiController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route untuk karyawan
Route::middleware(['auth'])->group(function () {
    Route::get('/karyawan', function () {
        return view('karyawan.dashboard');
    });
    Route::get('/karyawan/presensi', function () {
        return view('karyawan.dashboard');
    });

Route::get('/karyawan/presensi/form', [PresensiKaryawanController::class, 'showForm'])->name('karyawan.presensi.form');
Route::get('/karyawan/profile', [KaryawanController::class, 'profile'])->name('karyawan.profile');
Route::post('/karyawan/presensi/store', [PresensiKaryawanController::class, 'store'])->name('karyawan.presensi.store');
Route::put('/presensi/update', [PresensiKaryawanController::class, 'update'])->name('karyawan.presensi.update');
Route::get('/karyawan/presensi/detail', [PresensiKaryawanController::class, 'detail'])->name('karyawan.presensi.detail');
Route::get('/karyawan/presensi/riwayat', [PresensiKaryawanController::class, 'riwayat'])->name('karyawan.presensi.riwayat');

Route::get('/karyawan/cuti', [CutiController::class, 'index'])->name('karyawan.cuti.index');
Route::post('/karyawan/cuti', [CutiController::class, 'create'])->name('karyawan.cuti.create');
Route::get('/karyawan/cuti/riwayat', [CutiController::class, 'history'])->name('cuti.riwayat');

Route::resource('/karyawan/lembur', LemburController::class)->names('karyawan.lembur');
// Route::get('/karyawan/lembur', [LemburController::class, 'index'])->name('karyawan.lembur.index');
Route::post('/karyawan/lembur/create', [LemburController::class, 'create'])->name('karyawan.lembur.create');

});

Route::middleware(['auth', 'admin'])->group(function () {
    // Rute-rute yang hanya bisa diakses oleh admin
    Route::resource('/admin/karyawan', KaryawanController::class)->except(['index'])->names('admin.karyawan');

    Route::get('/admin/karyawan', [KaryawanController::class, 'index'])->name('admin.karyawan.index');

    Route::resource('/admin/presensi', PresensiAdminController::class)->except(['index'])->names('presensi.admin');

    Route::get('/admin/presensi', [PresensiAdminController::class, 'index'])->name('presensi.admin.index');

    Route::get('/admin/presensi/edit/{id}', [PresensiAdminController::class, 'edit'])->name('presensi.admin.edit');



    Route::delete('/admin/presensi/destroy/{id}', [PresensiAdminController::class, 'destroy'])->name('presensi.admin.destroy');

    Route::post('admin/presensi/buka', [PresensiAdminController::class, 'bukaPresensi'])->name('presensi.buka');
    Route::post('admin/presensi/buka_pulang', [PresensiAdminController::class, 'bukaPresensiPulang'])->name('presensi.buka_pulang');
    Route::post('/admin/presensi/tutup', [PresensiAdminController::class, 'tutupPresensi'])->name('presensi.tutup');
    Route::resource('/admin/cuti', AdminCutiController::class)->except(['index'])->names('admin.cuti');
    Route::get('/admin/cuti', [AdminCutiController::class, 'index'])->name('admin.cuti.index');


    Route::get('/admin/lembur', [LemburController::class, 'indexAdmin'])->name('admin.lembur.index');

    Route::post('/admin/lembur/update/{lemburs}', [LemburController::class, 'update'])->name('admin.lembur.update');

    Route::delete('/admin/lembur/destroy/{lemburs}', [LemburController::class, 'destroy'])->name('admin.lembur.destroy');
    Route::get('/admin/lembur/edit/{id}', [LemburController::class, 'editAdmin'])->name('admin.lembur.edit');
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::post('/admin/laporan/generate-pdf', [LaporanController::class, 'generatePDF'])->name('admin.laporan.pdf');

    Route::post('/admin/laporan/generate-pdf-bersama', [LaporanController::class, 'generatePDFBersama'])->name('admin.laporan.pdf_semua');


    // Route::resource('/admin/karyawan/lembur', LemburController::class)->except(['index'])->names('admin.lembur');



// Route::get('/admin/cuti/{id}/edit', [AdminCutiController::class, 'edit'])->name('cuti.edit');
// Route::delete('/admin/cuti/{id}', [AdminCutiController::class, 'destroy'])->name('cuti.destroy');
// Route::put('/admin/cuti/{id}/update-status', [AdminCutiController::class, 'updateStatus'])->name('admin.cuti.update');

    // Route::post('/admin/presensi/update{id}', [PresensiAdminController::class, 'update'])->name('presensi.update');
});

