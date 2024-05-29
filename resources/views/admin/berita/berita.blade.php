@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h4 class="card-header">List Berita Acara</h4>
                <div class="text-nowrap">
                    <a href="/Tambah-Berita-Acara" class="btn btn-sm btn-primary mb-3 me-3 ms-4" >
                    <i class="bx bxs-plus-square"></i> Tambah Data</a>
                    <table class="table" style="text-align: center;">
                        <caption class="ms-4">
                            Total Berita Acara adalah {{ $jumlah }} Berita
                        </caption>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($berita as $ba)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="white-space: normal;">
                                {!! nl2br($ba->judul_berita) !!}
                            </td>
                            <td style="word-wrap: break-word; max-width: 200px;">
                                <div style="overflow: hidden; text-overflow: ellipsis;">
                                    {{ $ba->deskripsi_berita }}
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('/storage'.$ba->gambar_berita) }}" class="card-img" style="max-width: 100%; max-height: 100px;" alt="...">
                            </td> 
                            <td>{{ $ba->tanggal_berita }}</td>
                            <td>
                                <a href="/Show-Update-Berita-Acara/{{ $ba->id }}" class="btn btn-sm" style="background-color: #1C891A; color:white;">
                                Edit <i class="bx bxs-edit"></i> </a> <br>
                                <a href="/Show-Detail-Berita-Acara/{{ $ba->id }}" class="btn btn-sm mt-2" style="background-color: #1C891A; color:white;">
                                Detail <i class="bx bxs-detail"></i> </a> <br>
                                <a href="/Tambah-Berita-Acara/hapus/{{ $ba->id }}}"
                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm mt-2" style="background-color: #FF0000; color:white;"
                                id="liveToastBtn">Hapus <i class="bx bxs-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
    
@section('script')
    <script type="text/javascript">
        $("#Agenda").addClass("active");
    </script>
@endsection

    