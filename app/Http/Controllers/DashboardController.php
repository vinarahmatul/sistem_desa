<?php

namespace App\Http\Controllers;
use App\Models\agenda;
use App\Models\berita;
use Illuminate\Support\Facades\DB;

class dashboardcontroller extends Controller
{
    public function index(){
        // Menghitung jumlah orang perempuan dan laki-laki untuk card jumlah penduduk
        $perempuan = DB::table('dapenduk_usias')->sum('jumlah_orang_perempuan');
        $laki_laki = DB::table('dapenduk_usias')->sum('jumlah_orang_laki');
        $penduduk = $perempuan + $laki_laki;

        //Card untuk jumlah pegawai
        $pegawai = DB::table('pegawais')->count();

        //Card untuk jumlah layanan
        $layanan = DB::table('layanans')->count();

        //Tabel untuk berita terbaru
        $beritaTerbaru = berita::latest()->limit(10)->get();

        //Tabel untuk agenda terbaru
        $agendaTerbaru = agenda::latest()->limit(10)->get();

        return view('admin.home.dashboard', compact('penduduk', 'pegawai', 'layanan', 'beritaTerbaru', 'agendaTerbaru'));
    }

    public function data(){
        return view('data-penduduk');
    }
}
