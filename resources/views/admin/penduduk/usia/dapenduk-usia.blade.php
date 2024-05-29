@extends('layout.main1')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h4 class="card-header">
                Data Penduduk Berdasarkan Usia
                @if($bulan && $tahun)
                    Bulan {{ $bulan }} Tahun {{ $tahun }}
                @elseif($bulan)
                    Bulan {{ $bulan }}
                @elseif($tahun)
                    Tahun {{ $tahun }}
                @endif
            </h4>

            <!-- Form filter -->
            <div class="card-body">
                <form action="{{ route('usia.filter') }}" method="get" class="mb-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <select name="bulan" id="filter_bulan" class="form-select">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
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
                    <a href="/Tambah-Data-Usia" class="btn btn-sm btn-primary mb-3 me-2 ms-4" >
                        <i class="bx bxs-plus-square"></i> Tambah Data
                    </a>

                    <a href="{{ route('usia.pdf', ['tahun' => $tahun]) }}" class="btn btn-sm btn-primary mb-3">
                        <i class='bx bxs-printer'></i> Cetak PDF
                    </a>

                    <table class="table" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rentang Usia</th>
                                <th>Laki-Laki</th>
                                <th>Perempuan</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Jumlah Orang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($dapenduk_usia as $us)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $us->kategori_usia }}</td>
                                <td>{{ $us->jumlah_orang_laki }}</td>
                                <td>{{ $us->jumlah_orang_perempuan }}</td>
                                <td>
                                    <span class="badge badge-{{ strtolower($us->bulan) }}">
                                        {{ $us->bulan }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-tahun-{{ strtolower($us->tahun) }}">
                                        {{ $us->tahun }}
                                    </span>
                                </td>
                                <td>{{ $us->jumlah_total }}</td>
                                <td>
                                    <a href="/Show-Update-Data-Usia/{{ $us->id }}" class="btn btn-sm me-3" style="background-color: #1C891A; color:white;">
                                    <i class="bx bxs-edit"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-border-bottom-0">
                            <tr>
                                <th colspan="2">Jumlah Total</th>
                                <th>{{ $laki_laki }} Orang</th>
                                <th>{{ $perempuan }} Orang</th>
                                <th colspan="2"></th>
                                <th>{{ $jumlah_penduduk }} Orang</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
        </div>
    </div>
@endsection