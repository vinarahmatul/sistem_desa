@extends('layout.main1')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h4 class="card-header">Pelayanan Masyarakat Desa Labanasem</h4>
                <div class="text-nowrap">
                    <a href="/Tambah-Layanan-Masyarakat" class="btn btn-sm btn-primary mb-3 me-2 ms-4" >
                        <i class="bx bxs-plus-square"></i> Tambah Data
                    </a>

                    <a href="{{ route('layanan.pdf') }}" class="btn btn-sm btn-primary mb-3">
                        <i class='bx bxs-printer'></i> Cetak PDF
                    </a>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">Jenis</th>
                            <th style="text-align:center;">Persyaratan</th>
                            <th style="text-align:center;">Langkah-langkah</th>
                            <th style="text-align:center;">Petugas</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($layanan as $la)
                            <tr>
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center; white-space: normal;">{{ $la->jenis_pelayanan }}</td>
                                <td style="word-wrap: break-word;">
                                    <ol>
                                        @foreach(explode("\n", strip_tags($la->syarat_pelayanan)) as $syarat)
                                            @if (trim($syarat) !== '')
                                                <li style="white-space: pre-line;">{{ $syarat }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </td>
                                <td style="word-wrap: break-word;">
                                    <ol>
                                        @foreach(explode("\n", strip_tags($la->langkah_pelayanan)) as $langkah)
                                            @if (trim($langkah) !== '')
                                                <li style="white-space: pre-line;">{{ $langkah }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </td>
                                <td style="text-align:center;">{{ $la->petugas_pelayanan}}</td>
                                <td style="text-align:center;">
                                    <a href="/Show-Update-Layanan-Masyarakat/{{ $la->id }}" class="btn btn-sm btn-success" style="color:white;">
                                    Edit <i class="bx bxs-edit"></i> </a> <br>
                                    <a href="/Tambah-Layanan-Masyarakat/hapus/{{ $la->id }}}"
                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm mt-2" style="margin-bottom: 20px; color:white;"
                                    id="liveToastBtn">Hapus <i class="bx bxs-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $("#Layanan").addClass("active");
    </script>
@endsection
