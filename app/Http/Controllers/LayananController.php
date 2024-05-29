<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\layanan;
use Dompdf\Dompdf;

class layanancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function printPDF() {
         $layanan = layanan::orderBy('created_at', 'asc')->get();
     
         $dompdf = new Dompdf();
         $html = view('admin.pelayanan.pdf', compact('layanan'))->render();
         $dompdf->loadHtml($html);
     
         $dompdf->setPaper('A4', 'portrait');
     
         $dompdf->render();
     
         $filename = 'Daftar Pelayanan Masyarakat Desa Labanasem.pdf';
     
         return $dompdf->stream($filename);
     }
     
    public function index()
    {
        // mengambil data dari table
        $layanan = layanan::all();

        // mengirim ke view index
        return view('admin.pelayanan.layanan-masyarakat', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelayanan.layanan-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_pelayanan' => 'required',
            'syarat_pelayanan' => 'required',
            'langkah_pelayanan' => 'required',
            'petugas_pelayanan' => 'required',
        ]);

        // Mendapatkan data dari request
        $requestData = $request->all();
        
        $requestData["syarat_pelayanan"] = rtrim(strip_tags(nl2br($request->syarat_pelayanan)), '<br>');
        $requestData["langkah_pelayanan"] = rtrim(strip_tags(nl2br($request->langkah_pelayanan)), '<br>');

        // Menyimpan data ke dalam database
        layanan::create($requestData);

        return redirect('/Layanan-Masyarakat')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data berdasarkan id yang dipilih 
        $layanan = layanan::find($id); 
          
        // passing data yang didapat ke view edit.blade.php 
        return view('admin.pelayanan.layanan-edit', compact('layanan')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_pelayanan' => 'required',
            'syarat_pelayanan' => 'required',
            'langkah_pelayanan' => 'required',
            'petugas_pelayanan' => 'required',
        ]);

        // Mendapatkan data dari request
        $requestData = $request->all();
        
        $requestData["syarat_pelayanan"] = rtrim(strip_tags(nl2br($request->syarat_pelayanan)), '<br>');
        $requestData["langkah_pelayanan"] = rtrim(strip_tags(nl2br($request->langkah_pelayanan)), '<br>');

        // Mendapatkan data dari request
        $requestData = $request->except('_token');

        // Menyimpan data ke dalam database
        layanan::where('id', $id)->update($requestData);

        return redirect('/Layanan-Masyarakat')->with('success', 'Data Berhasil Diperbarui'); 
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
            DB::table('layanans')->where('id', $id)->delete();

            return redirect('/Layanan-Masyarakat')->with('toast_success', 'Data telah dihapus');
            //code...
        } catch (\Throwable $th) {
            return $th->getMessage();
            //throw $th; 
        }
    }
}
