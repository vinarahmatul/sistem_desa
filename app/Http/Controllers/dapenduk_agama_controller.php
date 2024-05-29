<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\dapenduk_agama;
use Dompdf\Dompdf;

class dapenduk_agama_controller extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function printPDF() {
        $tahun = session('tahun');

        $dapenduk_agama = dapenduk_agama::where('tahun', $tahun)->get();

        $jumlah = $dapenduk_agama->sum(function ($ag) {
            return $ag->jumlah_islam + $ag->jumlah_kristen + $ag->jumlah_katolik + $ag->jumlah_hindu + $ag->jumlah_budha + $ag->jumlah_konghucu;
        });

        $dompdf = new Dompdf();
        $html = view('admin.penduduk.agama.agama', compact('dapenduk_agama', 'tahun', 'jumlah'))->render();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $agamas = 'Berdasarkan Agama';
        $filename = sprintf('Data Penduduk %s', $agamas);
        if ($tahun) {
            $filename .= ' Tahun ' . $tahun;
        }
        $filename .= '.pdf';

        return $dompdf->stream($filename);
    }

    public function index(Request $request) {
      $query = dapenduk_agama::query();

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

      $dapenduk_agama = $query->get();
      $jenis = $query->count();
      $jumlahag = $dapenduk_agama->sum(function ($ag) {
        return $ag->jumlah_islam + $ag->jumlah_kristen + $ag->jumlah_katolik + $ag->jumlah_hindu + $ag->jumlah_budha + $ag->jumlah_konghucu;
      });

      // mengirim data ke view index
      return view('admin.penduduk.agama.dapenduk-agama',compact('dapenduk_agama', 'jenis', 'bulan', 'tahun', 'jumlahag'));
  }

  /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
  */
  public function create() {
      return view('admin.penduduk.agama.tambah-dapenduk-agama');
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
      // insert data ke table
      dapenduk_agama::create($request->all());

      //  DB::table('dapenduk_agamas')->insert([
      //      'jenis_agama' => $request->jenis_agama,
      //      'jumlah' => $request->jumlah,
      //  ]);

       // $this->validate($request, [
       //     'jenis_kelamin' => 'required',
       //     'jumlah' => 'required'
       // ]);

       // User::create([
       //     'jenis_kelamin' => $request->jenis_kelamin,
       //     'jumlah' => $request->jumlah,
       // ]);

      // alihkan halaman ke halaman dapenduk-agama
      return redirect('/Berdasarkan-Agama')->with('success', 'Data Berhasil Ditambah');
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
    $dapenduk_agama = dapenduk_agama::find($id);
    
      // passing data yang didapat ke view edit.blade.php
    return view('admin.penduduk.agama.edit-dapenduk-agama', compact('dapenduk_agama'));
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
      $dapenduk_agama = dapenduk_agama::find($id);
      $dapenduk_agama->update($request->all());

      //  DB::table('dapenduk_jenis_kelamins')->where('id',$request->id)->update([
      //      'jenis_kelamin' => $request->jenis_kelamin,
      //      'jumlah' => $request->jumlah,
      //  ]);

      // alihkan halaman
      return redirect('/Berdasarkan-Agama')->with('success', 'Data Berhasil Diperbarui');
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
           DB::table('dapenduk_agamas')->where('id', $id)->delete();

           return redirect('/Berdasarkan-Agama')->with('toast_success', 'Data telah dihapus');
           //code...
       } catch (\Throwable $th) {
           return $th->getMessage();
           //throw $th; 
       }
   }
}
