<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\dapenduk_pendidikan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class dapenduk_pendidikan_controller extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function printPDF() {
      $tahun = session('tahun');

      $dapenduk_pendidikan = dapenduk_pendidikan::where('tahun', $tahun)->get();

      $jumlah = $dapenduk_pendidikan->sum(function ($pd) {
          return $pd->sd + $pd->smp + $pd->sma + $pd->pt_akademi + $pd->tidak_sekolah;
      });

      $dompdf = new Dompdf();
      $html = view('admin.penduduk.pendidikan.pendidikan', compact('dapenduk_pendidikan', 'tahun', 'jumlah'))->render();
      $dompdf->loadHtml($html);

      $dompdf->setPaper('A4', 'landscape');

      $dompdf->render();

      $agamas = 'Berdasarkan Pendidikan';
      $filename = sprintf('Data Penduduk %s', $agamas);
      if ($tahun) {
          $filename .= ' Tahun ' . $tahun;
      }
      $filename .= '.pdf';

      return $dompdf->stream($filename);
  }

  public function index(Request $request) {
    $query = dapenduk_pendidikan::query();

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

    $dapenduk_pendidikan = $query->get();
    $jumlah = $dapenduk_pendidikan->sum(function ($pd) {
      return $pd->sd + $pd->smp + $pd->sma + $pd->pt_akademi + $pd->tidak_sekolah;
    });

    // mengirim data ke view index
    return view('admin.penduduk.pendidikan.dapenduk-pendidikan',compact('dapenduk_pendidikan', 'bulan', 'tahun', 'jumlah'));
}
 
    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create() {
      return view('admin.penduduk.pendidikan.tambah-dapenduk-pendidikan');
    }
 
    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
      // insert data ke table 
      dapenduk_pendidikan::create($request->all());

        // DB::table('dapenduk_pendidikans')->insert([
        //     'jenis_pendidikan' => $request->jenis_pendidikan,
        //     'jumlah' => $request->jumlah,
        // ]);
 
         // $this->validate($request, [
         //     'jenis_kelamin' => 'required',
         //     'jumlah' => 'required'
         // ]);
 
         // User::create([
         //     'jenis_kelamin' => $request->jenis_kelamin,
         //     'jumlah' => $request->jumlah,
         // ]);
 
      // alihkan halaman ke halaman dapenduk-pendidikan
      return redirect('/Berdasarkan-Pendidikan')->with('success', 'Data Berhasil Ditambah');
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
      $dapenduk_pendidikan = dapenduk_pendidikan::find($id);
         
      // passing data yang didapat ke view edit.blade.php
      return view('admin.penduduk.pendidikan.edit-dapenduk-pendidikan', compact('dapenduk_pendidikan'));
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
      $dapenduk_pendidikan = dapenduk_pendidikan::find($id);
      $dapenduk_pendidikan->update($request->all());

        //  DB::table('dapenduk_jenis_kelamins')->where('id',$request->id)->update([
        //      'jenis_kelamin' => $request->jenis_kelamin,
        //      'jumlah' => $request->jumlah,
        //  ]);

      // alihkan halaman
      return redirect('/Berdasarkan-Pendidikan')->with('success', 'Data Berhasil Diperbarui');
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
             DB::table('dapenduk_pendidikans')->where('id', $id)->delete();
 
             return redirect('/Berdasarkan-Pendidikan')->with('toast_success', 'Data telah dihapus');
             //code...
         } catch (\Throwable $th) {
             return $th->getMessage();
             //throw $th; 
         }
     }
}
