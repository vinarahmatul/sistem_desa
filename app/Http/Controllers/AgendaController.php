<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\agenda;
use Dompdf\Dompdf;
use Carbon\Carbon;

class agendacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printPDF()
    {
        $tahun = session('tahun');
        $bulan = session('bulan');

        $query = agenda::query();

        $jumlah = agenda::count();

        // Filter data berdasarkan bulan
        if ($bulan) {
            $query->whereMonth('tanggal_kegiatan', $bulan);
        }

        // Filter data berdasarkan tahun
        if ($tahun) {
            $query->whereYear('tanggal_kegiatan', $tahun);
        }

        $agenda = $query->orderBy('tanggal_kegiatan', 'asc')->get();

        $dompdf = new Dompdf();
        $html = view('admin.agenda.pdf', compact('agenda', 'tahun', 'jumlah'))->render();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $filename = 'Data Agenda';
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
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Simpan nilai bulan dan tahun ke dalam sesi
    session(['bulan' => $bulan, 'tahun' => $tahun]);

    $query = agenda::query();

    // Filter data berdasarkan bulan dan tahun pada kolom tanggal_kegiatan
    if ($bulan && $tahun) {
        $query->whereRaw('MONTH(tanggal_kegiatan) = ?', [date('m', strtotime($bulan))])
              ->whereRaw('YEAR(tanggal_kegiatan) = ?', [$tahun]);
    } elseif ($bulan) {
        $query->whereRaw('MONTH(tanggal_kegiatan) = ?', [date('m', strtotime($bulan))]);
    }

    // Filter data berdasarkan tahun
    if ($tahun) {
        $query->whereRaw('YEAR(tanggal_kegiatan) = ?', [$tahun]);
    }

    $agenda = $query->orderBy('tanggal_kegiatan', 'asc')->get();
    $jumlah = $agenda->count();

    // Mengirim data ke view index
    return view('admin.agenda.agenda', compact('agenda', 'bulan', 'tahun', 'jumlah'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agenda.agenda-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // agenda::create($request->all());

        $this->validate($request, [
            'judul_kegiatan'      => 'required',
            'deskripsi_kegiatan'  => 'required',
            'gambar_kegiatan'      => 'required|file|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2024',
            'tanggal_kegiatan'  => 'required',
        ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('gambar_kegiatan')->getClientOriginalName();
        $path = $request->file('gambar_kegiatan')->storeAs('images', $fileName, 'public');
        $requestData["gambar_kegiatan"] = '/' . $path;
        agenda::create($requestData);

        return redirect('/Agenda-Kegiatan')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = agenda::find($id);

        return view('admin.agenda.agenda-detail', ['agenda' => $agenda]);
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
        $agenda = agenda::find($id); 
          
        // passing data yang didapat ke view edit.blade.php 
        return view('admin.agenda.agenda-edit', compact('agenda')); 

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
                'judul_kegiatan'      => 'required',
                'deskripsi_kegiatan'  => 'required',
                'gambar_kegiatan'      => 'nullable|file|mimes:jpeg,png,jpg,JPEG,JPG,PNG|max:2024',
                'tanggal_kegiatan'  => 'required',
            ]);

            $requestData = $request->all();

            // Mendapatkan data dari request
            $requestData = $request->except('_token');

            if ($request->hasFile('gambar_kegiatan')) {
                // Mengunggah file gambar_kegiatan baru
                $fileName = time() . $request->file('gambar_kegiatan')->getClientOriginalName();
                $path = $request->file('gambar_kegiatan')->storeAs('images', $fileName, 'public');
                $requestData["gambar_kegiatan"] = '/' . $path;
            }

            // Menyimpan data ke dalam database
            agenda::where('id', $id)->update($requestData);

        return redirect('/Agenda-Kegiatan')->with('success', 'Data Berhasil Diperbarui'); 
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
            DB::table('agendas')->where('id', $id)->delete();

            return redirect('/Agenda-Kegiatan')->with('toast_success', 'Data telah dihapus');
            //code...
        } catch (\Throwable $th) {
            return $th->getMessage();
            //throw $th; 
        }
    }
}
