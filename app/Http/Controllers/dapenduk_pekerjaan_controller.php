<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\dapenduk_pekerjaan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class dapenduk_pekerjaan_controller extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function printPDF() {
      $tahun = session('tahun');

      $dapenduk_pekerjaan = dapenduk_pekerjaan::where('tahun', $tahun)->get();

      $jumlah = $dapenduk_pekerjaan->sum(function ($pj) {
        return 
        $pj->petani + $pj->pegawai_swasta + $pj->pegawai_negeri_sipil + $pj->perdagangan + $pj->buruh_tani 
        + $pj->buruh_pabrik + $pj->tukang_batu + $pj->jasa + $pj->perangkat_desa + $pj->tenaga_medis + $pj->tukang_kayu 
        + $pj->tukang_jahir_bordir + $pj->tni_polri + $pj->lain_lain_termasuk_belum_bekerja;
      });
      $jumlahs = DB::table('dapenduk_pekerjaans')->sum('jumlah');

      $dompdf = new Dompdf();
      $html = view('admin.penduduk.pekerjaan.pekerjaan', compact('dapenduk_pekerjaan', 'tahun', 'jumlah', 'jumlahs'))->render();
      $dompdf->loadHtml($html);

      $dompdf->setPaper('A4', 'landscape');

      $dompdf->render();

      $agamas = 'Berdasarkan Pekerjaan';
      $filename = sprintf('Data Penduduk %s', $agamas);
      if ($tahun) {
          $filename .= ' Tahun ' . $tahun;
      }
      $filename .= '.pdf';

      return $dompdf->stream($filename);
  }

  public function index(Request $request) {
    $query = dapenduk_pekerjaan::query();

    // Mengurutkan data berdasarkan tahun
    $query->orderBy('tahun', 'asc');

    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Simpan nilai bulan dan tahun ke dalam sesi
    session(['tahun' => $tahun]);

    // Filter data berdasarkan bulan
    if ($bulan) {
        $query->where('bulan', $bulan);
    }

    // Filter data berdasarkan tahun
    if ($tahun) {
        $query->where('tahun', $tahun);
    }

    $dapenduk_pekerjaan = $query->get();
    $jenis = $query->count();
    $jumlah = $dapenduk_pekerjaan->sum(function ($pj) {
        return 
        $pj->petani + $pj->pegawai_swasta + $pj->pegawai_negeri_sipil + $pj->perdagangan + $pj->buruh_tani 
        + $pj->buruh_pabrik + $pj->tukang_batu + $pj->jasa + $pj->perangkat_desa + $pj->tenaga_medis + $pj->tukang_kayu 
        + $pj->tukang_jahir_bordir + $pj->tni_polri + $pj->lain_lain_termasuk_belum_bekerja;
    });

    // mengirim data ke view index
    return view('admin.penduduk.pekerjaan.dapenduk-pekerjaan',compact('dapenduk_pekerjaan', 'jenis', 'bulan', 'tahun', 'jumlah'));
}
 
    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create() {
      return view('admin.penduduk.pekerjaan.tambah-dapenduk-pekerjaan');
    }
 
    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
      // insert data ke table 
      dapenduk_pekerjaan::create($request->all());
 
      // alihkan halaman ke halaman dapenduk-gender
      return redirect('/Berdasarkan-Pekerjaan')->with('success', 'Data Berhasil Ditambah');
    }
 
    /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
    */
    public function show($id) {
      //
    }
 
    /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
    */
    public function edit($id) {
      // mengambil data berdasarkan id yang dipilih
      $dapenduk_pekerjaan = dapenduk_pekerjaan::find($id);
         
      // passing data yang didapat ke view edit.blade.php
      return view('admin.penduduk.pekerjaan.edit-dapenduk-pekerjaan', compact('dapenduk_pekerjaan'));
    }
 
    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
      // update data
      $dapenduk_pekerjaan = dapenduk_pekerjaan::find($id);
      $dapenduk_pekerjaan->update($request->all());
      
      // alihkan halaman
      return redirect('/Berdasarkan-Pekerjaan')->with('success', 'Data Berhasil Diperbarui');
    }
 
    /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
    */
     public function destroy($id)
     {
         try {
             DB::table('dapenduk_pekerjaans')->where('id', $id)->delete();
 
             return redirect('/Berdasarkan-Pekerjaan')->with('toast_success', 'Data telah dihapus');
             //code...
         } catch (\Throwable $th) {
             return $th->getMessage();
             //throw $th; 
         }
     }
}
