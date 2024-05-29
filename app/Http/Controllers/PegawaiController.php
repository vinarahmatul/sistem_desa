<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\pegawai;
use Dompdf\Dompdf;

class pegawaicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function printPDF()
    {
        $tahun = session('tahun');

        $query = pegawai::query();

        $jumlah = pegawai::count();

        // Filter data berdasarkan tahun pada kolom created_at
        if ($tahun) {
            $query->whereYear('created_at', $tahun);
        }

        $pegawai = $query->orderBy('created_at', 'asc')->get();

        $dompdf = new Dompdf();
        $html = view('admin.pegawai.pdf', compact('pegawai', 'tahun', 'jumlah'))->render();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $filename = 'Data Pegawai Desa Labanasem';
        if ($tahun) {
            $filename .= ' Tahun ' . $tahun;
        }
        $filename .= '.pdf';

        return $dompdf->stream($filename);
    }

    public function index(Request $request)
{
    $tahun = $request->input('tahun');

    // Simpan nilai bulan dan tahun ke dalam sesi
    session(['tahun' => $tahun]);

    $query = pegawai::query();

    // Filter data berdasarkan tahun pada kolom created_at
    if ($tahun) {
        $query->whereYear('created_at', $tahun);
    }

    $pegawai = $query->orderByRaw("FIELD(jabatan, 'Kepala Desa') DESC, created_at ASC")->get();
    $jumlah = $pegawai->count();

    // Mengirim data ke view index
    return view('admin.pegawai.data-pegawai', compact('pegawai', 'tahun', 'jumlah'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pegawai.dapega-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert data ke table 
            $this->validate($request, [
                'nama_pegawai'      => 'required',
                'foto_pegawai'  => 'required|file|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:40960',
                'nik'      => 'required',
                'niap'      => 'required',
                'divisi'  => 'required',
                'jabatan'     => 'required',
                'alamat'  => 'required',
            ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('foto_pegawai')->getClientOriginalName();
        $path = $request->file('foto_pegawai')->storeAs('images', $fileName, 'public');
        $requestData["foto_pegawai"] = '/' . $path;
        pegawai::create($requestData);

        return redirect('/Data-Pegawai')->with('success', 'Data Berhasil Ditambah');
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
        $pegawai = pegawai::find($id); 
          
        // passing data yang didapat ke view edit.blade.php 
        return view('admin.pegawai.dapega-edit', compact('pegawai')); 
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
        // update data  
        $this->validate($request, [ 
            'nama_pegawai'      => 'required', 
            'foto_pegawai'  => 'nullable|file|mimes:jpeg,png,jpg,JPEG,JPG,PNG|max:40960', 
            'nik'      => 'required',
            'niap'      => 'required',
            'divisi'  => 'required',
            'jabatan'     => 'required',
            'alamat'  => 'required' 
        ]); 

        $requestData = $request->all(); 

        // Mendapatkan data dari request 
        $requestData = $request->except('_token'); 

        if ($request->hasFile('foto_pegawai')) { 
            // Mengunggah file foto_pegawai baru 
            $fileName = time() . $request->file('foto_pegawai')->getClientOriginalName(); 
            $path = $request->file('foto_pegawai')->storeAs('images', $fileName, 'public'); 
            $requestData["foto_pegawai"] = '/' . $path; 
        } 

        // Menyimpan data ke dalam database 
        pegawai::where('id', $id)->update($requestData); 

        return redirect('/Data-Pegawai')->with('success', 'Data Berhasil Diperbarui'); 
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
            DB::table('pegawais')->where('id', $id)->delete();

            return redirect('/Data-Pegawai')->with('toast_success', 'Data telah dihapus');
            //code...
        } catch (\Throwable $th) {
            return $th->getMessage();
            //throw $th; 
        }
    }
}
