@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h4 class="card-header">
                Data Penduduk Berdasarkan Pekerjaan
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
                <form action="{{ route('pekerjaan.filter') }}" method="get" class="mb-3">
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

                        <div class="col-md-12 mt-4">
                            <div class="card">
                                <div class="card-header fw-bolder">Keterangan</div>
                                    <div class="card-body">
                                        <table>
                                            <tr>
                                                <td style="padding-right: 20px;"><strong>1 :</strong> Petani</td>
                                                <td style="padding-right: 20px;"><strong>5 :</strong> Buruh Tani</td>
                                                <td style="padding-right: 20px;"><strong>9 :</strong> Perangkat Desa</td>
                                                <td style="padding-right: 20px;"><strong>13 :</strong> TNI/Polri</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-right: 20px;"><strong>2 :</strong> Pegawai Swasta</td>
                                                <td style="padding-right: 20px;"><strong>6 :</strong> Buruh Pabrik</td>
                                                <td style="padding-right: 20px;"><strong>10 :</strong> Tenaga Medis</td>
                                                <td style="padding-right: 20px;"><strong>14 :</strong> Lain-lain termasuk belum bekerja</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-right: 20px;"><strong>3 :</strong> Pegawai Negeri Sipil</td>
                                                <td style="padding-right: 20px;"><strong>7 :</strong> Tukang Batu</td>
                                                <td style="padding-right: 20px;"><strong>11 :</strong> Tukang Kayu</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-right: 20px;"><strong>4 :</strong> Perdagangan</td>
                                                <td style="padding-right: 20px;"><strong>8 :</strong> Jasa</td>
                                                <td style="padding-right: 20px;"><strong>12 :</strong> Tukang Jahir/Bordir</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="text-nowrap">
                    <a href="/Tambah-Data-Pekerjaan" class="btn btn-sm btn-primary mb-3 me-3 ms-4" >
                        <i class="bx bxs-plus-square"></i> Tambah Data
                    </a>

                    <a href="{{ route('pekerjaan.pdf', ['tahun' => $tahun]) }}" class="btn btn-sm btn-primary mb-3">
                        <i class='bx bxs-printer'></i> Cetak PDF
                    </a>

                    <div class="table-responsive">
                        <table class="table" style="text-align: center;">
                            <thead>
                            <tr>
                                <th>No</th> 
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                                <th>13</th>
                                <th>14</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th style="white-space: normal;">Jumlah Orang</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach($dapenduk_pekerjaan as $pj)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pj->petani }}</td>
                                    <td>{{ $pj->pegawai_swasta }}</td>
                                    <td>{{ $pj->pegawai_negeri_sipil }}</td>
                                    <td>{{ $pj->perdagangan }}</td>
                                    <td>{{ $pj->buruh_tani }}</td>
                                    <td>{{ $pj->buruh_pabrik }}</td>
                                    <td>{{ $pj->tukang_batu }}</td>
                                    <td>{{ $pj->jasa }}</td>
                                    <td>{{ $pj->perangkat_desa }}</td>
                                    <td>{{ $pj->tenaga_medis }}</td>
                                    <td>{{ $pj->tukang_kayu }}</td>
                                    <td>{{ $pj->tukang_jahir_bordir }}</td>
                                    <td>{{ $pj->tni_polri }}</td>
                                    <td>{{ $pj->lain_lain_termasuk_belum_bekerja }}</td>
                                    <td>
                                        <span class="badge badge-{{ strtolower($pj->bulan) }}">
                                            {{ $pj->bulan }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-tahun-{{ strtolower($pj->tahun) }}">
                                            {{ $pj->tahun }}
                                        </span>
                                    </td>
                                    <td>{{ $pj->petani + $pj->pegawai_swasta + $pj->pegawai_negeri_sipil + $pj->perdagangan + $pj->buruh_tani 
                                        + $pj->buruh_pabrik + $pj->tukang_batu + $pj->jasa + $pj->perangkat_desa + $pj->tenaga_medis + $pj->tukang_kayu 
                                        + $pj->tukang_jahir_bordir + $pj->tni_polri + $pj->lain_lain_termasuk_belum_bekerja }}
                                    </td>
                                    <td>
                                        <a href="/Show-Update-Data-Pekerjaan/{{ $pj->id }}" class="btn btn-sm me-3" style="background-color: #1C891A; color:white;">
                                        <i class="bx bxs-edit"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-border-bottom-0">
                                <tr>
                                    <th colspan="17">Jumlah Total</th>
                                    <th>{{ $jumlah }} Orang</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection