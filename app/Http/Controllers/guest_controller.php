<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agenda;
use App\Models\berita;
use App\Models\dapenduk_agama;
use App\Models\dapenduk_kesehatan;
use App\Models\dapenduk_pekerjaan;
use App\Models\dapenduk_pendidikan;
use App\Models\dapenduk_usia;
use App\Models\layanan;
use App\Models\pegawai;
use App\Models\profil_desa;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class guest_controller extends Controller {
    public function index() {
        //Count Section
        $perempuan = DB::table('dapenduk_usias')->sum('jumlah_orang_perempuan');
        $laki_laki = DB::table('dapenduk_usias')->sum('jumlah_orang_laki');
        $jumlahPenduduk = $perempuan + $laki_laki;
        $jumlahPegawai = DB::table('pegawais')->count();
        $jumlahLayanan = DB::table('layanans')->count();
        $jumlahAgenda = DB::table('agendas')->count();

        //Kegiatan Section
        $agendaTerbaru = agenda::orderBy('tanggal_kegiatan', 'asc')->take(6)->get();

        // Tim Section
        $pegawai = pegawai::all();

        return view('guest.home.dashboard', 
                compact(
                    'jumlahPenduduk', 'agendaTerbaru', 'pegawai',
                    'jumlahPegawai', 'jumlahLayanan', 'jumlahAgenda'
        ));
    }

    public function agenda(string $id) {
        $agenda = agenda::find($id);

        return view('guest.kegiatan.detail.agenda-detail', ['agenda' => $agenda]);
    }

    public function berita(string $id) {
        $berita = berita::find($id);

        return view('guest.kegiatan.detail.berita-detail', ['berita' => $berita]);
    }

    public function agendas() {
        $agendas = agenda::all();
        
        return view('guest.kegiatan.agenda', compact('agendas'));
    }

    public function beritas() {
        $beritas = berita::all();

        return view('guest.kegiatan.berita', compact('beritas'));
    }

    public function pegawai() {
        $pegawais = pegawai::all();

        return view('guest.pegawai.pegawai', compact('pegawais'));
    }

    public function profil() {
        $profil_desa = profil_desa::all();

        // Ambil data pegawai dari database
        $kepalaDesa = pegawai::where('jabatan', 'Kepala Desa')->first();
        $sekretaris = pegawai::where('jabatan', 'Sekertaris Desa')->first();
        $staff1 = pegawai::where('jabatan', 'Staf Urusan Keuangan')->first();
        $staff2 = pegawai::where('jabatan', 'Staf Urusan Pemerintahan')->first();
        $staff3 = pegawai::where('jabatan', 'Staf Urusan Umum')->first();
        $kasun1 = pegawai::where('jabatan', 'Kasun Krajan Timur')->first();
        $kasun2 = pegawai::where('jabatan', 'Kasun Krajan Barat')->first();
        $kasun3 = pegawai::where('jabatan', 'Kasun Labansukadi')->first();
        $kasun4 = pegawai::where('jabatan', 'Kasun Kawang')->first();

        return view('guest.profil.profile-desa', compact('profil_desa', 'kepalaDesa', 'sekretaris', 'staff1', 'staff2', 
        'staff3', 'kasun1', 'kasun2', 'kasun3', 'kasun4'));
    }

    public function penduduk(Request $request)
{
    $tahun = $request->input('tahun');

    // Simpan nilai bulan dan tahun ke dalam sesi
    session(['tahun' => $tahun]);

    // Query untuk tabel dapenduk_agamas
    $agamaQuery = dapenduk_agama::query();
    if ($tahun) {
        $agamaQuery->where('tahun', $tahun);
    }
    $agamas = $agamaQuery->get();
    $jumlahag = $agamas->sum(function ($ag) {
        return $ag->jumlah_islam + $ag->jumlah_kristen + $ag->jumlah_katolik + $ag->jumlah_hindu + $ag->jumlah_budha + $ag->jumlah_konghucu;
    });

    // Query untuk tabel dapenduk_kesehatans
    $kesehatanQuery = dapenduk_kesehatan::query();
    if ($tahun) {
        $kesehatanQuery->where('tahun', $tahun);
    }
    $kesehatans = $kesehatanQuery->get();
    $jumlahkh = $kesehatans->sum('jumlah');

    // Query untuk tabel dapenduk_pekerjaans
    $pekerjaanQuery = dapenduk_pekerjaan::query();
    if ($tahun) {
        $pekerjaanQuery->where('tahun', $tahun);
    }
    $pekerjaans = $pekerjaanQuery->get();
    $jumlahpj = $pekerjaans->sum(function ($pj) {
        return 
        $pj->petani + $pj->pegawai_swasta + $pj->pegawai_negeri_sipil + $pj->perdagangan + $pj->buruh_tani 
        + $pj->buruh_pabrik + $pj->tukang_batu + $pj->jasa + $pj->perangkat_desa + $pj->tenaga_medis + $pj->tukang_kayu 
        + $pj->tukang_jahir_bordir + $pj->tni_polri + $pj->lain_lain_termasuk_belum_bekerja;
      });

    // Query untuk tabel dapenduk_pendidikans
    $pendidikanQuery = dapenduk_pendidikan::query();
    if ($tahun) {
        $pendidikanQuery->where('tahun', $tahun);
    }
    $pendidikans = $pendidikanQuery->get();
    $jumlahpd = $pendidikans->sum(function ($pd) {
        return $pd->sd + $pd->smp + $pd->sma + $pd->pt_akademi + $pd->tidak_sekolah;
    });

    // Query untuk tabel dapenduk_usias
    $usiaQuery = dapenduk_usia::query();
    if ($tahun) {
        $usiaQuery->where('tahun', $tahun);
    }
    $usias = $usiaQuery->get();
    $usias = $usias->sortBy(function ($item) {
        return [
            $item->tahun,
            array_search($item->bulan, [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ]),
            ($item->kategori_usia === '0-4 tahun' ? 0 : 1), // Prioritas 0-4 tahun
            $item->jenis_usia
        ];
    });
    
    
    $jumlahlk = $usias->sum('jumlah_orang_laki');
    $jumlahpr = $usias->sum('jumlah_orang_perempuan');
    $jumlahus = $usias->sum('jumlah_total');

    // Mengirim data ke view index
    return view('guest.penduduk.penduduk', compact('agamas', 'kesehatans', 'pekerjaans', 'pendidikans', 'usias', 'tahun', 'jumlahag', 'jumlahkh', 'jumlahpj', 'jumlahpd', 'jumlahlk', 'jumlahpr', 'jumlahus'));
}

    public function pelayanan(){
        $layanans = layanan::all();

        return view('guest.layanan.pelayanan', compact('layanans'));
    }
}
