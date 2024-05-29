@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Data Penduduk Berdasarkan Agama</h5>
                    <div class="card-body">

                    <form action="/Update-Data-Agama/{{ $dapenduk_agama->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jumlah_islam" class="form-label">Islam</label>
                                    <input type="number" name="jumlah_islam" id="jumlah_islam" class="form-control" placeholder="Masukkan Jumlah Orang Islam" value="{{ $dapenduk_agama->jumlah_islam }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_kristen" class="form-label">Kristen</label>
                                    <input type="number" name="jumlah_kristen" id="jumlah_kristen" class="form-control" placeholder="Masukkan Jumlah Orang Kristen" value="{{ $dapenduk_agama->jumlah_kristen }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jumlah_katolik" class="form-label">Katolik</label>
                                    <input type="number" name="jumlah_katolik" id="jumlah_katolik" class="form-control" placeholder="Masukkan Jumlah Orang Katolik" value="{{ $dapenduk_agama->jumlah_katolik }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_hindu" class="form-label">Hindu</label>
                                    <input type="number" name="jumlah_hindu" id="jumlah_hindu" class="form-control" placeholder="Masukkan Jumlah Orang Hindu" value="{{ $dapenduk_agama->jumlah_hindu }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_budha" class="form-label">Budha</label>
                                    <input type="number" name="jumlah_budha" id="jumlah_budha" class="form-control" placeholder="Masukkan Jumlah Orang Budha" value="{{ $dapenduk_agama->jumlah_budha }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_konghucu" class="form-label">Konghucu</label>
                                    <input type="number" name="jumlah_konghucu" id="jumlah_konghucu" class="form-control" placeholder="Masukkan Jumlah Orang Konghucu" value="{{ $dapenduk_agama->jumlah_konghucu }}" aria-describedby="defaultFormControlHelp">
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
                                        <option value="Januari" {{ $dapenduk_agama->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                                        <option value="Februari" {{ $dapenduk_agama->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                                        <option value="Maret" {{ $dapenduk_agama->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                                        <option value="April" {{ $dapenduk_agama->bulan == 'April' ? 'selected' : '' }}>April</option>
                                        <option value="Mei" {{ $dapenduk_agama->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                                        <option value="Juni" {{ $dapenduk_agama->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                                        <option value="Juli" {{ $dapenduk_agama->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                                        <option value="Agustus" {{ $dapenduk_agama->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                                        <option value="September" {{ $dapenduk_agama->bulan == 'September' ? 'selected' : '' }}>September</option>
                                        <option value="Oktober" {{ $dapenduk_agama->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                                        <option value="November" {{ $dapenduk_agama->bulan == 'November' ? 'selected' : '' }}>November</option>
                                        <option value="Desember" {{ $dapenduk_agama->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                <label for="tahun" class="form-label">Tahun</label>
                                <select class="form-control" name="tahun" id="tahun" aria-label="Default select example">
                                    <option disabled>-- Pilih Tahun --</option>
                                    <option value="2021" {{ $dapenduk_agama->tahun == '2021' ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ $dapenduk_agama->tahun == '2022' ? 'selected' : '' }}>2022</option>
                                    <option value="2023" {{ $dapenduk_agama->tahun == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2024" {{ $dapenduk_agama->tahun == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2025" {{ $dapenduk_agama->tahun == '2025' ? 'selected' : '' }}>2025</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <a href="/Berdasarkan-Agama" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
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

@endsection