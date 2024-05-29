<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\dapenduk_kesehatan;
use Dompdf\Dompdf;

class dapenduk_kesehatan_controller extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

      public function printPDF() {
        $tahun = session('tahun');

        $dapenduk_kesehatan = dapenduk_kesehatan::where('tahun', $tahun)->get();
        $jumlah = DB::table('dapenduk_kesehatans')->sum('jumlah');

        $dompdf = new Dompdf();
        $html = view('admin.penduduk.kesehatan.kesehatan', compact('dapenduk_kesehatan', 'tahun', 'jumlah'))->render();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $agamas = 'Berdasarkan Kesehatan';
        $filename = sprintf('Data Penduduk %s', $agamas);
        if ($tahun) {
            $filename .= ' Tahun ' . $tahun;
        }
        $filename .= '.pdf';

        return $dompdf->stream($filename);
    }

    public function index(Request $request) {
      $query = dapenduk_kesehatan::query();

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

      $dapenduk_kesehatan = $query->get();
      $jenis = $query->count();
      $jumlah = DB::table('dapenduk_kesehatans')->sum('jumlah');

      // mengirim data ke view index
      return view('admin.penduduk.kesehatan.dapenduk-kesehatan', compact('dapenduk_kesehatan', 'jenis', 'bulan', 'tahun', 'jumlah'));
  }

  /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
  */
  public function create() {
      return view('admin.penduduk.kesehatan.tambah-dapenduk-kesehatan');
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
      // insert data ke table 
      dapenduk_kesehatan::create($request->all());

      //  DB::table('dapenduk_kesehatans')->insert([
      //      'jenis_kesehatan' => $request->jenis_kesehatan,
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

      // alihkan halaman ke halaman dapenduk-gender
      return redirect('/Berdasarkan-Kesehatan')->with('success', 'Data Berhasil Ditambah');
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
      $dapenduk_kesehatan = dapenduk_kesehatan::find($id);
       
      // passing data yang didapat ke view edit.blade.php
      return view('admin.penduduk.kesehatan.edit-dapenduk-kesehatan', compact('dapenduk_kesehatan'));
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
      $dapenduk_kesehatan = dapenduk_kesehatan::find($id);
      $dapenduk_kesehatan->update($request->all());

      //  DB::table('dapenduk_jenis_kelamins')->where('id',$request->id)->update([
      //      'jenis_kelamin' => $request->jenis_kelamin,
      //      'jumlah' => $request->jumlah,
      //  ]);
      
      // alihkan halaman
      return redirect('/Berdasarkan-Kesehatan')->with('success', 'Data Berhasil Diperbarui');
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
           DB::table('dapenduk_kesehatans')->where('id', $id)->delete();

           return redirect('/Berdasarkan-Kesehatan')->with('toast_success', 'Data telah dihapus');
           //code...
       } catch (\Throwable $th) {
           return $th->getMessage();
           //throw $th; 
       }
   }
}
