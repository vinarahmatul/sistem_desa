@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Data Penduduk Berdasarkan Pendidikan</h5>
                    <div class="card-body">

                    <form action="/Update-Data-Pendidikan/{{ $dapenduk_pendidikan->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sd" class="form-label">SD</label>
                                    <input type="number" name="sd" id="sd" class="form-control" placeholder="Masukkan Jumlah Orang SD" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pendidikan->sd }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="smp" class="form-label">SMP</label>
                                    <input type="number" name="smp" id="smp" class="form-control" placeholder="Masukkan Jumlah Orang SMP" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pendidikan->smp }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="sma" class="form-label">SMA</label>
                                    <input type="number" name="sma" id="sma" class="form-control" placeholder="Masukkan Jumlah Orang SMA" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pendidikan->sma }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pt_akademi" class="form-label">PT/Akademi</label>
                                    <input type="number" name="pt_akademi" id="pt_akademi" class="form-control" placeholder="Masukkan Jumlah Orang PT/Akademi" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pendidikan->pt_akademi }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tidak_sekolah" class="form-label">Tidak Sekolah</label>
                                    <input type="number" name="tidak_sekolah" id="tidak_sekolah" class="form-control" placeholder="Masukkan Jumlah Orang Tidak Sekolah" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pendidikan->tidak_sekolah }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select class="form-control" name="bulan" id="bulan" aria-label="Default select example">
                                        <option disabled>-- Pilih Bulan --</option>
                                        <option value="Januari" {{ $dapenduk_pendidikan->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                                        <option value="Februari" {{ $dapenduk_pendidikan->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                                        <option value="Maret" {{ $dapenduk_pendidikan->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                                        <option value="April" {{ $dapenduk_pendidikan->bulan == 'April' ? 'selected' : '' }}>April</option>
                                        <option value="Mei" {{ $dapenduk_pendidikan->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                                        <option value="Juni" {{ $dapenduk_pendidikan->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                                        <option value="Juli" {{ $dapenduk_pendidikan->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                                        <option value="Agustus" {{ $dapenduk_pendidikan->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                                        <option value="September" {{ $dapenduk_pendidikan->bulan == 'September' ? 'selected' : '' }}>September</option>
                                        <option value="Oktober" {{ $dapenduk_pendidikan->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                                        <option value="November" {{ $dapenduk_pendidikan->bulan == 'November' ? 'selected' : '' }}>November</option>
                                        <option value="Desember" {{ $dapenduk_pendidikan->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-control" name="tahun" id="tahun" aria-label="Default select example">
                                    <option disabled>-- Pilih Tahun --</option>
                                    <option value="2021" {{ $dapenduk_pendidikan->tahun == '2021' ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ $dapenduk_pendidikan->tahun == '2022' ? 'selected' : '' }}>2022</option>
                                    <option value="2023" {{ $dapenduk_pendidikan->tahun == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2024" {{ $dapenduk_pendidikan->tahun == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2025" {{ $dapenduk_pendidikan->tahun == '2025' ? 'selected' : '' }}>2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="/Berdasarkan-Pendidikan" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
                            <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                            <button class="btn btn-sm btn-success" type="submit" style="margin-bottom: 20px;">
                            <i class="bx bxs-edit"></i> Edit Data</button>
                        </div>
                    </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container fw-bold" style="background-color: #ffff; margin-top: 100px;">
    <div class="col-10 m-auto">
    
        <br>
        <h3 align="center" style="font-weight: bold; font-family: serif;">EDIT DATA PENDUDUK BERDASARKAN PENDIDIKAN</h3>
        <br>

        <form action="/Update-Data-Pendidikan/{{ $dapenduk_pendidikan->id }}" method="post" enctype="multipart/form-data">
            @csrf 
            

            <div class="mb-3">
                <a href="/Berdasarkan-Pendidikan" class="btn btn-sm me-2" style="background-color: #E30202; margin-bottom: 20px; color:white;">
                <i class="bi bi-backspace-fill"></i> Kembali</a>
                <button class="btn btn-sm" type="submit" style="background-color: #1C891A; margin-bottom: 20px; color:white;">
                <i class="bi bi-pencil-square"></i> Edit Data</button>
            </div>

        </form>
    </div>
</div>

@endsection