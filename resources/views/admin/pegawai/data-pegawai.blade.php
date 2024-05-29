@extends('layout.main1')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h4 class="card-header">
                Data Pegawai Desa Labanasem 
                @if($tahun)
                    Tahun {{ $tahun }}
                @endif
            </h4>

                        <!-- Form filter -->
                        <div class="card-body">
                            <form action="{{ route('pegawai.filter') }}" method="get" class="mb-3">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <select name="tahun" id="filter_tahun" class="form-select">
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                <div class="text-nowrap">
                    <a href="/Tambah-Data-Pegawai" class="btn btn-sm btn-primary mb-3 me-2 ms-4" >
                        <i class="bx bxs-plus-square"></i> Tambah Data
                    </a>

                    <a href="{{ route('pegawai.pdf', ['tahun' => $tahun]) }}" class="btn btn-sm btn-primary mb-3">
                        <i class='bx bxs-printer'></i> Cetak PDF
                    </a>

                <div class="table-responsive">
                    <table class="table" style="text-align: center;">
                        <caption class="ms-4">
                            Total Keseluruhan adalah {{ $jumlah }} Orang
                        </caption>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>NIAP</th>
                            <th>Divisi</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($pegawai as $dp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="white-space: normal;">
                                    {!! nl2br($dp->nama_pegawai) !!}
                                </td>
                                <td>
                                    <img src="{{ asset('/storage'.$dp->foto_pegawai) }}" class="card-img" style="max-width: 100%; max-height: 100px;" alt="...">
                                </td>
                                <td>{{ $dp->nik }}</td>
                                <td>{{ $dp->niap }}</td>
                                <td style="white-space: normal;">
                                    {!! nl2br($dp->divisi) !!}
                                </td>
                                <td>
                                    {!! nl2br($dp->jabatan) !!}
                                </td>
                                <td style="white-space: normal;">
                                    {!! nl2br($dp->alamat) !!}
                                </td>
                                <td>
                                    <a href="/Show-Update-Data-Pegawai/{{ $dp->id }}" class="btn btn-sm" style="background-color: #1C891A; color:white;">
                                    <i class="bx bxs-edit"></i> </a> <br>
                                    <a href="/Tambah-Data-Pegawai/hapus/{{ $dp->id }}}"
                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm mt-2" style="background-color: #FF0000; color:white;"
                                    id="liveToastBtn"><i class="bx bxs-trash"></i></a>
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
        $("#Pegawai").addClass("active");
    </script>
@endsection