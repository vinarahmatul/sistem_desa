<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\dapenduk_pekerjaan_controller;
use App\Http\Controllers\dapenduk_kesehatan_controller;
use App\Http\Controllers\dapenduk_pendidikan_controller;
use App\Http\Controllers\dapenduk_agama_controller;
use App\Http\Controllers\dapenduk_usia_controller;
use App\Http\Controllers\profile_admin_controller;
use App\Http\Controllers\profil_desa_controller;
use App\Http\Controllers\guest_controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () { return view('home'); 
// });

// Route::get('/admin',[AdminController::class, 'admin'])->name('admin');

// Guest
Route::get('/Beranda', [guest_controller::class, "index"])->name('index');

Route::get('/Agenda-Kegiatan-Desa-Labanasem', [guest_controller::class, "agendas"])->name('agendas');
Route::get('/Detail-Agenda-Kegiatan-Desa-Labanasem/{data}', [guest_controller::class, "agenda"])->name('agenda');
Route::get('/Berita-Acara-Desa-Labanasem', [guest_controller::class, "beritas"])->name('beritas');
Route::get('/Detail-Berita-Acara-Desa-Labanasem/{data}', [guest_controller::class, "berita"])->name('berita');

Route::get('/Tentang-Desa-Labanasem', [guest_controller::class, "profil"])->name('profil');
Route::get('/Pegawai-Desa-Labanasem', [guest_controller::class, "pegawai"])->name('pegawai');
Route::get('/Potensi-Desa-Labanasem', [guest_controller::class, "penduduk"])->name('penduduk');
Route::get('/Pelayanan-Masyarakat-Desa-Labanasem', [guest_controller::class, "pelayanan"])->name('pelayanan');



// Login & Logout
Route::get('/Login',[LoginController::class, 'login'])->name('login');
Route::post('/login-Proses',[LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/Logout',[LoginController::class, 'logout'])->name('logout');

    // Admin
    Route::group(['middleware' => 'auth:admin'], function () {
    // Dashboard /////////
    Route::get('/Dashboard',[dashboardcontroller::class, 'index'])->name('index');
    // Route::get('/Dashboard',[AdminController::class, 'index'])->name('index');

    //Berita Acara
    Route::get('/Berita-Acara', [beritacontroller::class, "index"])->name('berita.filter');
    Route::get('/Tambah-Berita-Acara', [beritacontroller::class, "create"])->name('create');
    Route::post('/Tambah-Berita-Acara', [beritacontroller::class, "store"])->name('store');
    Route::get('/view-pdf/{filename}', [beritacontroller::class, 'viewPDF'])->name('view.pdf');
    Route::get('/Show-Detail-Berita-Acara/{data}', [beritacontroller::class, "show"])->name('show');
    Route::get('/Show-Update-Berita-Acara/{id}', [beritacontroller::class, "edit"])->name('edit');
    Route::post('/Update-Berita-Acara/{id}', [beritacontroller::class, "update"])->name('update');
    Route::get('/Tambah-Berita-Acara/hapus/{id}', [beritacontroller::class, "destroy"])->name('destroy');
    Route::get('/berita-pdf', [beritacontroller::class, 'printPDF'])->name('berita.pdf');
    
    //Agenda
    Route::get('/Agenda-Kegiatan', [agendacontroller::class, "index"])->name('agenda.filter');
    Route::get('/Tambah-Agenda-Kegiatan', [agendacontroller::class, "create"])->name('create');
    Route::post('/Tambah-Agenda-Kegiatan', [agendacontroller::class, "store"])->name('store');
    Route::get('/Show-Detail-Agenda-Kegiatan/{data}', [agendacontroller::class, "show"])->name('show');
    Route::get('/Show-Update-Agenda-Kegiatan/{id}', [agendacontroller::class, "edit"])->name('edit');
    Route::post('/Update-Agenda-Kegiatan/{id}', [agendacontroller::class, "update"])->name('update');
    Route::get('/Tambah-Agenda-Kegiatan/hapus/{id}', [agendacontroller::class, "destroy"])->name('destroy');
    Route::get('/agenda-pdf', [agendacontroller::class, 'printPDF'])->name('agenda.pdf');

    //Data Kepegawaian
    Route::get('/Data-Pegawai', [pegawaicontroller::class, "index"])->name('pegawai.filter');
    Route::get('/Tambah-Data-Pegawai', [pegawaicontroller::class, "create"])->name('create');
    Route::post('/Tambah-Data-Pegawai', [pegawaicontroller::class, "store"])->name('store');
    Route::get('/Show-Update-Data-Pegawai/{id}', [pegawaicontroller::class, "edit"])->name('edit');
    Route::post('/Update-Data-Pegawai/{id}', [pegawaicontroller::class, "update"])->name('update');
    Route::get('/Tambah-Data-Pegawai/hapus/{id}', [pegawaicontroller::class, "destroy"])->name('destroy');
    Route::get('/pegawai-pdf', [pegawaicontroller::class, 'printPDF'])->name('pegawai.pdf');

    //Data Layanan
    Route::get('/Layanan-Masyarakat', [LayananController::class, "index"])->name('index');
    Route::get('/Tambah-Layanan-Masyarakat', [LayananController::class, "create"])->name('create');
    Route::post('/Tambah-Layanan-Masyarakat', [LayananController::class, "store"])->name('store');
    Route::get('/Show-Update-Layanan-Masyarakat/{id}', [LayananController::class, "edit"])->name('edit');
    Route::post('/Update-Layanan-Masyarakat/{id}', [LayananController::class, "update"])->name('update');
    Route::get('/Tambah-Layanan-Masyarakat/hapus/{id}', [LayananController::class, "destroy"])->name('destroy');
    Route::get('/layanan-pdf', [LayananController::class, 'printPDF'])->name('layanan.pdf');

    //Data Kependudukan
    Route::get('/Data-Penduduk', [dashboardcontroller::class, "data"])->name('data');
    
    //Berdasarkan Pekerjaan
    Route::get('/Berdasarkan-Pekerjaan', [dapenduk_pekerjaan_controller::class, "index"])->name('pekerjaan.filter');
    Route::get('/Tambah-Data-Pekerjaan', [dapenduk_pekerjaan_controller::class, "create"])->name('create');
    Route::post('/Tambah-Data-Pekerjaan', [dapenduk_pekerjaan_controller::class, "store"])->name('store');
    Route::get('/Show-Update-Data-Pekerjaan/{id}', [dapenduk_pekerjaan_controller::class, "edit"])->name('edit');
    Route::post('/Update-Data-Pekerjaan/{id}', [dapenduk_pekerjaan_controller::class, "update"])->name('update');
    Route::get('/Tambah-Data-Pekerjaan/hapus/{id}', [dapenduk_pekerjaan_controller::class, "destroy"])->name('destroy');
    Route::get('/pekerjaan-pdf', [dapenduk_pekerjaan_controller::class, 'printPDF'])->name('pekerjaan.pdf');

    //Berdasarkan Kesehatan
    Route::get('/Berdasarkan-Kesehatan', [dapenduk_kesehatan_controller::class, "index"])->name('kesehatan.filter');
    Route::get('/Tambah-Data-Kesehatan', [dapenduk_kesehatan_controller::class, "create"])->name('create');
    Route::post('/Tambah-Data-Kesehatan', [dapenduk_kesehatan_controller::class, "store"])->name('store');
    Route::get('/Show-Update-Data-Kesehatan/{id}', [dapenduk_kesehatan_controller::class, "edit"])->name('edit');
    Route::post('/Update-Data-Kesehatan/{id}', [dapenduk_kesehatan_controller::class, "update"])->name('update');
    Route::get('/Tambah-Data-Kesehatan/hapus/{id}', [dapenduk_kesehatan_controller::class, "destroy"])->name('destroy');
    Route::get('/kesehatan-pdf', [dapenduk_kesehatan_controller::class, 'printPDF'])->name('kesehatan.pdf');

    //Berdasarkan Pendidikan
    Route::get('/Berdasarkan-Pendidikan', [dapenduk_pendidikan_controller::class, "index"])->name('pendidikan.filter');
    Route::get('/Tambah-Data-Pendidikan', [dapenduk_pendidikan_controller::class, "create"])->name('create');
    Route::post('/Tambah-Data-Pendidikan', [dapenduk_pendidikan_controller::class, "store"])->name('store');
    Route::get('/Show-Update-Data-Pendidikan/{id}', [dapenduk_pendidikan_controller::class, "edit"])->name('edit');
    Route::post('/Update-Data-Pendidikan/{id}', [dapenduk_pendidikan_controller::class, "update"])->name('update');
    Route::get('/Tambah-Data-Pendidikan/hapus/{id}', [dapenduk_pendidikan_controller::class, "destroy"])->name('destroy');
    Route::get('/pendidikan-pdf', [dapenduk_pendidikan_controller::class, 'printPDF'])->name('pendidikan.pdf');

    //Berdasarkan Agama
    Route::get('/Berdasarkan-Agama', [dapenduk_agama_controller::class, "index"])->name('agama.filter');
    Route::get('/Tambah-Data-Agama', [dapenduk_agama_controller::class, "create"])->name('create');
    Route::post('/Tambah-Data-Agama', [dapenduk_agama_controller::class, "store"])->name('store');
    Route::get('/Show-Update-Data-Agama/{id}', [dapenduk_agama_controller::class, "edit"])->name('edit');
    Route::post('/Update-Data-Agama/{id}', [dapenduk_agama_controller::class, "update"])->name('update');
    Route::get('/Tambah-Data-Agama/hapus/{id}', [dapenduk_agama_controller::class, "destroy"])->name('destroy');
    Route::get('/agama-pdf', [dapenduk_agama_controller::class, 'printPDF'])->name('agama.pdf');

    //Berdasarkan Usia
    Route::get('/Berdasarkan-Usia', [dapenduk_usia_controller::class, "index"])->name('usia.filter');
    Route::get('/Tambah-Data-Usia', [dapenduk_usia_controller::class, "create"])->name('create');
    Route::post('/Tambah-Data-Usia', [dapenduk_usia_controller::class, "store"])->name('store');
    Route::get('/Show-Update-Data-Usia/{id}', [dapenduk_usia_controller::class, "edit"])->name('edit');
    Route::post('/Update-Data-Usia/{id}', [dapenduk_usia_controller::class, "update"])->name('update');
    Route::get('/Tambah-Data-Usia/hapus/{id}', [dapenduk_usia_controller::class, "destroy"])->name('destroy');
    Route::get('/usia-pdf', [dapenduk_usia_controller::class, 'printPDF'])->name('usia.pdf');

    //Profile Admin
    Route::get('/Profile-Admin', [profile_admin_controller::class, "index"])->name('index');
    Route::get('/Show-Update-Profile-Admin/{id}', [profile_admin_controller::class, "edit"])->name('edit');
    Route::post('/Update-Data-Admin/{id}', [profile_admin_controller::class, "update"])->name('update');

    //Profil Desa
    Route::get('/Profile-Desa', [profil_desa_controller::class, "index"])->name('index');
    Route::get('/Tambah-Profile-Desa', [profil_desa_controller::class, "create"])->name('create');
    Route::post('/Tambah-Profile-Desa', [profil_desa_controller::class, "store"])->name('store');
    Route::get('/Show-Update-Profile-Desa/{id}', [profil_desa_controller::class, "edit"])->name('edit');
    Route::post('/Update-Profile-Desa/{id}', [profil_desa_controller::class, "update"])->name('update');
    Route::get('/profil_desa-pdf', [profil_desa_controller::class, 'printPDF'])->name('profil_desa.pdf');
});