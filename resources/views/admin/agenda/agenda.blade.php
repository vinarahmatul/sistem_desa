@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h4 class="card-header">
                List Agenda Kegiatan
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
                <form action="{{ route('agenda.filter') }}" method="get" class="mb-3">
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
                    <a href="/Tambah-Agenda-Kegiatan" class="btn btn-sm btn-primary mb-3 me-2 ms-4" >
                        <i class="bx bxs-plus-square"></i> Tambah Data
                    </a>

                    <a href="{{ route('agenda.pdf', ['tahun' => $tahun]) }}" class="btn btn-sm btn-primary mb-3">
                        <i class='bx bxs-printer'></i> Cetak PDF
                    </a>
                    <table class="table" style="text-align: center;">
                        <caption class="ms-4">
                            Total Agenda Kegiatan adalah {{ $jumlah }} Agenda
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
                            @foreach ($agenda as $ag)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="white-space: normal;">
                                    {!! nl2br($ag->judul_kegiatan) !!}
                                </td>
                                <td style="word-wrap: break-word; max-width: 200px;">
                                    <div style="overflow: hidden; text-overflow: ellipsis;">
                                        {{ $ag->deskripsi_kegiatan }}
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('/storage'.$ag->gambar_kegiatan) }}" class="card-img" style="max-width: 100%; max-height: 100px;" alt="...">
                                </td> 
                                <td>{{ $ag->tanggal_kegiatan->format('d-m-Y') }}</td>
                                <td>
                                    <a href="/Show-Update-Agenda-Kegiatan/{{ $ag->id }}" class="btn btn-sm" style="background-color: #1C891A; color:white;">
                                    Edit <i class="bx bxs-edit"></i> </a> <br>
                                    <a href="/Show-Detail-Agenda-Kegiatan/{{ $ag->id }}" class="btn btn-sm mt-2" style="background-color: #1C891A; color:white;">
                                    Detail <i class="bx bxs-detail"></i> </a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection


    