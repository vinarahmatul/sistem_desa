@extends('layout.main1')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row" style="justify-content: center;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <a href="/Berita-Acara" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
                    <i class="bx bxs-left-arrow-alt"></i> Kembali</a>

                    <h2 style="font-weight:bold; text-align:center;">{{ $berita->judul_berita }}</h2>
                    <br>
                    <div class="text-center">
                        <img src="{{ asset('/storage'.$berita->gambar_berita) }}" class="img img-responsive" style="border-radius: 10px; max-width:100%; max-height:100%;" />
                    </div>
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive" style="text-align:left;">
                                <tr>
                                    <td style="font-weight:bold;">Deskripsi Berita</td>
                                    <td style="white-space: pre-line; text-align: justify;">{{ $berita->deskripsi_berita }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Tanggal</td>
                                    <td>{{ $berita->tanggal_berita }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection