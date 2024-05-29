@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Data Penduduk Berdasarkan Usia</h5>
                    <div class="card-body">

                    <form action="/Update-Data-Usia/{{ $dapenduk_usia->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="kategori_usia" class="form-label">Usia</label>
                                    <select class="form-control" name="kategori_usia" id="kategori_usia" aria-label="Default select example">
                                        <option value="">Pilih Kategori Usia</option>
                                        <option value="0-4 tahun" {{ $dapenduk_usia->kategori_usia == '0-4 tahun' ? 'selected' : '' }}>0-4 Tahun</option>
                                        <option value="5-9 tahun" {{ $dapenduk_usia->kategori_usia == '5-9 tahun' ? 'selected' : '' }}>5-9 Tahun</option>
                                        <option value="10-14 tahun" {{ $dapenduk_usia->kategori_usia == '10-14 tahun' ? 'selected' : '' }}>10-14 Tahun</option>
                                        <option value="15-19 tahun" {{ $dapenduk_usia->kategori_usia == '15-19 tahun' ? 'selected' : '' }}>15-19 Tahun</option>
                                        <option value="20-24 tahun" {{ $dapenduk_usia->kategori_usia == '20-24 tahun' ? 'selected' : '' }}>20-24 Tahun</option>
                                        <option value="25-29 tahun" {{ $dapenduk_usia->kategori_usia == '25-29 tahun' ? 'selected' : '' }}>25-29 Tahun</option>
                                        <option value="30-34 tahun" {{ $dapenduk_usia->kategori_usia == '30-34 tahun' ? 'selected' : '' }}>30-34 Tahun</option>
                                        <option value="35-39 tahun" {{ $dapenduk_usia->kategori_usia == '35-39 tahun' ? 'selected' : '' }}>35-39 Tahun</option>
                                        <option value="40-44 tahun" {{ $dapenduk_usia->kategori_usia == '40-44 tahun' ? 'selected' : '' }}>40-44 Tahun</option>
                                        <option value="45-49 tahun" {{ $dapenduk_usia->kategori_usia == '45-49 tahun' ? 'selected' : '' }}>45-49 Tahun</option>
                                        <option value="50-54 tahun" {{ $dapenduk_usia->kategori_usia == '50-54 tahun' ? 'selected' : '' }}>50-54 Tahun</option>
                                        <option value="55-58 tahun" {{ $dapenduk_usia->kategori_usia == '55-58 tahun' ? 'selected' : '' }}>55-58 Tahun</option>
                                        <option value=">59 tahun" {{ $dapenduk_usia->kategori_usia == '>59 tahun' ? 'selected' : '' }}>>59 Tahun</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select class="form-control" name="bulan" id="bulan" aria-label="Default select example">
                                        <option disabled>-- Pilih Bulan --</option>
                                        <option value="Januari" {{ $dapenduk_usia->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                                        <option value="Februari" {{ $dapenduk_usia->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                                        <option value="Maret" {{ $dapenduk_usia->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                                        <option value="April" {{ $dapenduk_usia->bulan == 'April' ? 'selected' : '' }}>April</option>
                                        <option value="Mei" {{ $dapenduk_usia->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                                        <option value="Juni" {{ $dapenduk_usia->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                                        <option value="Juli" {{ $dapenduk_usia->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                                        <option value="Agustus" {{ $dapenduk_usia->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                                        <option value="September" {{ $dapenduk_usia->bulan == 'September' ? 'selected' : '' }}>September</option>
                                        <option value="Oktober" {{ $dapenduk_usia->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                                        <option value="November" {{ $dapenduk_usia->bulan == 'November' ? 'selected' : '' }}>November</option>
                                        <option value="Desember" {{ $dapenduk_usia->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-control" name="tahun" id="tahun" aria-label="Default select example">
                                    <option disabled>-- Pilih Tahun --</option>
                                    <option value="2021" {{ $dapenduk_usia->tahun == '2021' ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ $dapenduk_usia->tahun == '2022' ? 'selected' : '' }}>2022</option>
                                    <option value="2023" {{ $dapenduk_usia->tahun == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2024" {{ $dapenduk_usia->tahun == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2025" {{ $dapenduk_usia->tahun == '2025' ? 'selected' : '' }}>2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jumlah_orang_laki" class="form-label">Jumlah Orang Laki Laki</label>
                                    <input type="text" name="jumlah_orang_laki" placeholder="Masukkan Jumlah Orang" class="form-control" id="jumlah_orang_laki" value="{{ $dapenduk_usia->jumlah_orang_perempuan }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_orang_perempuan" class="form-label">Jumlah Orang Perempuan</label>
                                    <input type="text" name="jumlah_orang_perempuan" placeholder="Masukkan Jumlah Orang" class="form-control" id="jumlah_orang_perempuan" value="{{ $dapenduk_usia->jumlah_orang_laki }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <a href="/Berdasarkan-Usia" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
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