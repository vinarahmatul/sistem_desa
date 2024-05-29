@extends('layout.main1')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row" style="justify-content: center;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <a href="/Agenda-Kegiatan" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
                    <i class="bx bxs-left-arrow-alt"></i> Kembali</a>

                    <h2 style="font-weight:bold; text-align:center;">{{ $agenda->judul_kegiatan }}</h2>
                    <br>
                    <div class="text-center">
                        <img src="{{ asset('/storage'.$agenda->gambar_kegiatan) }}" class="img img-responsive" style="border-radius: 10px; max-width:100%; max-height:100%;" />
                    </div>
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive" style="text-align:left;">
                                <tr>
                                    <td style="font-weight:bold;">Deskripsi Kegiatan</td>
                                    <td style="white-space: pre-line; text-align: justify;">{{ $agenda->deskripsi_kegiatan }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Tanggal</td>
                                    <td>{{ $agenda->created_at->format('d-m-Y') }}</td>
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