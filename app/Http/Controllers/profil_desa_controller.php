<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\profil_desa;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class profil_desa_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function printPDF() {
        $profil_desa = profil_desa::orderBy('created_at', 'asc')->get();
    
        $dompdf = new Dompdf();
        $html = view('admin.profile-desa.pdf', compact('profil_desa'))->render();
        $dompdf->loadHtml($html);
    
        $dompdf->setPaper('A4', 'portrait');
    
        $dompdf->render();
    
        $filename = 'Profil Desa Labanasem.pdf';
    
        return $dompdf->stream($filename);
    }

    public function index()
    {
        $profil = profil_desa::all();

        return view('admin.profile-desa.profil-desa', compact('profil'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile-desa.tambah-profil-desa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'nama_desa' => 'required',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'deskripsi_peta' => 'required',
            'gambar_desa' => 'required|file|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2024',
            'peta_desa' => 'required|file|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2024',
            'struktur_desa' => 'required|file|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2024'
        ]);

        // Mendapatkan data dari request
        $requestData = $request->all();
        
        $requestData["visi"] = rtrim(strip_tags(nl2br($request->visi)), '<br>');
        $requestData["misi"] = rtrim(strip_tags(nl2br($request->misi)), '<br>');

        // Mengunggah file gambar_desa
        $fileGambar = time() . $request->file('gambar_desa')->getClientOriginalName();
        $path = $request->file('gambar_desa')->storeAs('images', $fileGambar, 'public');
        $requestData["gambar_desa"] = '/' . $path;

        // Mengunggah file peta_desa
        $filePeta = time() . $request->file('peta_desa')->getClientOriginalName();
        $path = $request->file('peta_desa')->storeAs('images', $filePeta, 'public');
        $requestData["peta_desa"] = '/' . $path;

        // Mengunggah file struktur_desa
        $fileStruktur = time() . $request->file('struktur_desa')->getClientOriginalName();
        $path = $request->file('struktur_desa')->storeAs('images', $fileStruktur, 'public');
        $requestData["struktur_desa"] = '/' . $path;

        // Menyimpan data ke dalam database
        profil_desa::create($requestData);

        return redirect('/Profile-Desa')->with('success', 'Data Berhasil Ditambah');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id) {
    //     $profile = profil_desa::find($id);

    //     return view('admin.profile-desa.profil-desa', compact('profile'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data berdasarkan id yang dipilih
        $profil = profil_desa::find($id);

        // Memastikan data ditemukan sebelum ditampilkan
        if (!$profil) {
            return redirect('/Profile-Desa')->with('error', 'Data tidak ditemukan');
        }
         
        // passing data yang didapat ke view edit.blade.php
        return view('admin.profile-desa.edit-profil-desa', compact('profil'));
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
            'nama_desa' => 'required',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'deskripsi_peta' => 'required',
            'gambar_desa' => 'nullable|file|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2024',
            'peta_desa' => 'nullable|file|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2024',
            'struktur_desa' => 'nullable|file|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2024'
        ]);

        // Mendapatkan data dari request
        $requestData = $request->all();
        
        $requestData["visi"] = rtrim(strip_tags(nl2br($request->visi)), '<br>');
        $requestData["misi"] = rtrim(strip_tags(nl2br($request->misi)), '<br>');

        // Mendapatkan data dari request
        $requestData = $request->except('_token');

        // Cek apakah ada gambar_desa yang diunggah
        if ($request->hasFile('gambar_desa')) {
            // Mengunggah file gambar_desa baru
            $fileGambar = time() . $request->file('gambar_desa')->getClientOriginalName();
            $path = $request->file('gambar_desa')->storeAs('images', $fileGambar, 'public');
            $requestData["gambar_desa"] = '/' . $path;
        }

        // Cek apakah ada gambar_desa yang diunggah
        if ($request->hasFile('peta_desa')) {
            // Mengunggah file gambar_desa baru
            $filePeta = time() . $request->file('peta_desa')->getClientOriginalName();
            $path = $request->file('peta_desa')->storeAs('images', $filePeta, 'public');
            $requestData["peta_desa"] = '/' . $path;
        }

        // Cek apakah ada gambar_desa yang diunggah
        if ($request->hasFile('struktur_desa')) {
            // Mengunggah file gambar_desa baru
            $fileStruktur = time() . $request->file('struktur_desa')->getClientOriginalName();
            $path = $request->file('struktur_desa')->storeAs('images', $fileStruktur, 'public');
            $requestData["struktur_desa"] = '/' . $path;
        }

        // Menyimpan data ke dalam database
        profil_desa::where('id', $id)->update($requestData);

        return redirect('/Profile-Desa')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
