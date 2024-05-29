<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\dapenduk_usia;
use Dompdf\Dompdf;

class dapenduk_usia_controller extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function printPDF() {
      $tahun = session('tahun');

      $dapenduk_usia = dapenduk_usia::query()->where('tahun', $tahun);

      // Mengurutkan data berdasarkan tahun
      $dapenduk_usia->orderBy('tahun', 'asc')
      ->orderByRaw("FIELD(bulan, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')");

      $dapenduk_usia = $dapenduk_usia->get();

      // Menghitung jumlah orang perempuan dan laki-laki
      $perempuan = $dapenduk_usia->reduce(function ($carry, $us) {
          return $carry + $us->jumlah_orang_perempuan;
      }, 0);

      $laki_laki = $dapenduk_usia->reduce(function ($carry, $us) {
          return $carry + $us->jumlah_orang_laki;
      }, 0);

      $jumlah_penduduk = $perempuan + $laki_laki;

      $dompdf = new Dompdf();
      $html = view('admin.penduduk.usia.usia', compact('dapenduk_usia', 'tahun', 'jumlah_penduduk', 'perempuan', 'laki_laki'))->render();
      $dompdf->loadHtml($html);

      $dompdf->setPaper('A4', 'landscape');

      $dompdf->render();

      $agamas = 'Berdasarkan Usia';
      $filename = sprintf('Data Penduduk %s', $agamas);
      if ($tahun) {
          $filename .= ' Tahun ' . $tahun;
      }
      $filename .= '.pdf';

      return $dompdf->stream($filename);
  }

  public function index(Request $request) {
    $query = dapenduk_usia::query();

    // Mengurutkan data berdasarkan tahun
    $query->orderBy('tahun', 'asc')
          ->orderByRaw("FIELD(bulan, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')");

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

    // Menghitung jumlah orang perempuan dan laki-laki
    $perempuan = DB::table('dapenduk_usias')->sum('jumlah_orang_perempuan');
    $laki_laki = DB::table('dapenduk_usias')->sum('jumlah_orang_laki');

    $dapenduk_usia = $query->get();
    $jumlah_penduduk = $dapenduk_usia->sum(function ($us) {
      return $us->jumlah_orang_laki + $us->jumlah_orang_perempuan;;
    });

    // mengirim data ke view index
    return view('admin.penduduk.usia.dapenduk-usia',compact('dapenduk_usia', 'bulan', 'tahun', 'jumlah_penduduk', 'perempuan', 'laki_laki'));
}

  /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
  */
  public function create() {
      return view('admin.penduduk.usia.tambah-dapenduk-usia');
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
      // insert data ke table 
      $dapenduk_usia = new dapenduk_usia();
      $dapenduk_usia->kategori_usia = $request->kategori_usia;
      $dapenduk_usia->bulan = $request->bulan;
      $dapenduk_usia->tahun = $request->tahun;
      $dapenduk_usia->jumlah_orang_laki = $request->jumlah_orang_laki;
      $dapenduk_usia->jumlah_orang_perempuan = $request->jumlah_orang_perempuan;
      $dapenduk_usia->jumlah_total = $request->jumlah_orang_laki + $request->jumlah_orang_perempuan;
      $dapenduk_usia->save();

      // alihkan halaman ke halaman dapenduk-gender
      return redirect('/Berdasarkan-Usia')->with('success', 'Data Berhasil Ditambah');
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
      $dapenduk_usia = dapenduk_usia::find($id);
       
      // passing data yang didapat ke view edit.blade.php
      return view('admin.penduduk.usia.edit-dapenduk-usia', compact('dapenduk_usia'));
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
      $dapenduk_usia = dapenduk_usia::find($id);
      $dapenduk_usia->kategori_usia = $request->kategori_usia;
      $dapenduk_usia->bulan = $request->bulan;
      $dapenduk_usia->tahun = $request->tahun;
      $dapenduk_usia->jumlah_orang_laki = $request->jumlah_orang_laki;
      $dapenduk_usia->jumlah_orang_perempuan = $request->jumlah_orang_perempuan;
      $dapenduk_usia->jumlah_total = $request->jumlah_orang_laki + $request->jumlah_orang_perempuan;
      $dapenduk_usia->update($request->all());
      
      // alihkan halaman
      return redirect('/Berdasarkan-Usia')->with('success', 'Data Berhasil Diperbarui');
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
           DB::table('dapenduk_usias')->where('id', $id)->delete();

           return redirect('/Berdasarkan-Usia')->with('toast_success', 'Data telah dihapus');
           //code...
       } catch (\Throwable $th) {
           return $th->getMessage();
           //throw $th; 
       }
   }
}
