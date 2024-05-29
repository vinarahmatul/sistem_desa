@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Data Penduduk Berdasarkan Kesehatan</h5>
                    <div class="card-body">

                    <form action="/Update-Data-Kesehatan/{{ $dapenduk_kesehatan->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jenis_kesehatan" class="form-label">Jenis Kesehatan</label>
                                    <input type="text" name="jenis_kesehatan" placeholder="Masukkan Jenis Kesehatan" class="form-control" id="jenis_kesehatan" value="{{ $dapenduk_kesehatan->jenis_kesehatan }}" aria-describedby="defaultFormControlHelp">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Contoh : Animea
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah" class="form-label">Jumlah Orang</label>
                                    <input type="text" name="jumlah" placeholder="Masukkan Jumlah Orang" class="form-control" id="jumlah" value="{{ $dapenduk_kesehatan->jumlah }}" aria-describedby="defaultFormControlHelp">
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
                                        <option value="">-- Pilih Bulan --</option>
                                        <option value="Januari" {{ $dapenduk_kesehatan->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                                        <option value="Februari" {{ $dapenduk_kesehatan->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                                        <option value="Maret" {{ $dapenduk_kesehatan->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                                        <option value="April" {{ $dapenduk_kesehatan->bulan == 'April' ? 'selected' : '' }}>April</option>
                                        <option value="Mei" {{ $dapenduk_kesehatan->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                                        <option value="Juni" {{ $dapenduk_kesehatan->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                                        <option value="Juli" {{ $dapenduk_kesehatan->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                                        <option value="Agustus" {{ $dapenduk_kesehatan->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                                        <option value="September" {{ $dapenduk_kesehatan->bulan == 'September' ? 'selected' : '' }}>September</option>
                                        <option value="Oktober" {{ $dapenduk_kesehatan->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                                        <option value="November" {{ $dapenduk_kesehatan->bulan == 'November' ? 'selected' : '' }}>November</option>
                                        <option value="Desember" {{ $dapenduk_kesehatan->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-control" name="tahun" id="tahun" aria-label="Default select example">
                                        <option value="">-- Pilih Tahun --</option>
                                        <option value="2021" {{ $dapenduk_kesehatan->tahun == '2021' ? 'selected' : '' }}>2021</option>
                                        <option value="2022" {{ $dapenduk_kesehatan->tahun == '2022' ? 'selected' : '' }}>2022</option>
                                        <option value="2023" {{ $dapenduk_kesehatan->tahun == '2023' ? 'selected' : '' }}>2023</option>
                                        <option value="2024" {{ $dapenduk_kesehatan->tahun == '2024' ? 'selected' : '' }}>2024</option>
                                        <option value="2025" {{ $dapenduk_kesehatan->tahun == '2025' ? 'selected' : '' }}>2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="mb-3">
                            <a href="/Berdasarkan-Kesehatan" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
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