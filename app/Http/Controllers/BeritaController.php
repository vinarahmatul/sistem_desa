<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\berita;
use Dompdf\Dompdf;
use Carbon\Carbon;

class beritacontroller extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function printPDF()
    {
        $tahun = session('tahun');
        $bulan = session('bulan');

        $query = berita::query();

        $jumlah = berita::count();

        // Filter data berdasarkan tahun pada kolom created_at
        if ($tahun) {
            $query->whereYear('created_at', $tahun);
        }

        $berita = $query->orderBy('created_at', 'asc')->get();
        $beritaFiles = $berita->pluck('dokumen_berita')->values();
        $berita = $berita->map(function ($berita, $index) use ($beritaFiles) {
            return [
                'berita' => $berita,
                'file' => $beritaFiles[$index],
            ];
        });

        $dompdf = new Dompdf();
        $html = view('admin.berita.pdf', compact('berita', 'beritaFiles', 'tahun', 'jumlah'))->render();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $filename = 'Data Berita';
        if ($tahun) {
            $filename .= ' Tahun ' . $tahun;
        }
        if ($bulan) {
            $filename .= ' Bulan ' . date('F', mktime(0, 0, 0, $bulan, 1));
        }
        $filename .= '.pdf';

        return $dompdf->stream($filename);
    }

    public function index(Request $request)
{
    $tahun = $request->input('tahun');

    // Simpan nilai bulan dan tahun ke dalam sesi
    session(['tahun' => $tahun]);

    $query = berita::query();

    // Filter data berdasarkan tahun pada kolom created_at
    if ($tahun) {
        $query->whereYear('created_at', $tahun);
    }

    $berita = $query->orderBy('created_at', 'asc')->get();
    $jumlah = $berita->count();

    // Mengirim data ke view index
    return view('admin.berita.berita-acara', compact('berita', 'tahun', 'jumlah'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create() {
        return view('admin.berita.tambah-berita-acara');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        // insert data ke table 
        $request->validate([
            'judul_berita' => 'required',
            'dokumen_berita' => 'required|mimes:pdf,doc,docx|max:40960',
        ]);
    
        $requestData = $request->all();
    
        if ($request->hasFile('dokumen_berita')) {
            $file = $request->file('dokumen_berita');
            $fileName = $file->getClientOriginalName();
            // $file->storeAs('uploads', $fileName);
            $file->storeAs('uploads', $fileName, 'public');
            $requestData['dokumen_berita'] = $fileName;
        }
    
        berita::create($requestData);
    
        return redirect('/Berita-Acara')->with('success', 'Data Berhasil Ditambah');
    }

    public function viewPDF($filename) {
        $file = public_path('storage/uploads/' . $filename);

        return response()->file($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $berita = berita::find($id);

        return view('admin.berita.detail-berita-acara', ['berita' => $berita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        // mengambil data berdasarkan id yang dipilih
	    $berita = berita::find($id);
	    
        // passing data yang didapat ke view edit.blade.php
	    return view('admin.berita.edit-berita-acara', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        // Validasi input
        $request->validate([
            'judul_berita' => 'required',
            'dokumen_berita' => 'nullable|mimes:pdf,doc,docx|max:40960',
        ]);

        $berita = Berita::findOrFail($id);

        // Perbarui data judul_berita
        $berita->judul_berita = $request->judul_berita;

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('dokumen_berita')) {
            $file = $request->file('dokumen_berita');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
            $berita->dokumen_berita = $fileName;
        }

        // Simpan perubahan
        $berita->save();

        return redirect('/Berita-Acara')->with('success', 'Data Berhasil Diperbarui');
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
            DB::table('beritas')->where('id', $id)->delete();

            return redirect('/Berita-Acara')->with('toast_success', 'Data telah dihapus');
            //code...
        } catch (\Throwable $th) {
            return $th->getMessage();
            //throw $th; 
        }
    }
}
