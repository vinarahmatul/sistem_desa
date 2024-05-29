@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Tambah Data Penduduk Berdasarkan Agama</h5>
                    <div class="card-body">
                    <form action="/Tambah-Data-Agama" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jumlah_islam" class="form-label">Islam</label>
                                    <input type="number" name="jumlah_islam" id="jumlah_islam" class="form-control" placeholder="Masukkan Jumlah Orang Islam" aria-describedby="defaultFormControlHelp" required>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah_kristen" class="form-label">Kristen</label>
                                    <input type="number" name="jumlah_kristen" id="jumlah_kristen" class="form-control" placeholder="Masukkan Jumlah Orang Kristen" aria-describedby="defaultFormControlHelp" required>
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
                                    <input type="number" name="jumlah_katolik" id="jumlah_katolik" class="form-control" placeholder="Masukkan Jumlah Orang Katolik" aria-describedby="defaultFormControlHelp" required>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_hindu" class="form-label">Hindu</label>
                                    <input type="number" name="jumlah_hindu" id="jumlah_hindu" class="form-control" placeholder="Masukkan Jumlah Orang Hindu" aria-describedby="defaultFormControlHelp" required>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_budha" class="form-label">Budha</label>
                                    <input type="number" name="jumlah_budha" id="jumlah_budha" class="form-control" placeholder="Masukkan Jumlah Orang Budha" aria-describedby="defaultFormControlHelp" required>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah_konghucu" class="form-label">Konghucu</label>
                                    <input type="number" name="jumlah_konghucu" id="jumlah_konghucu" class="form-control" placeholder="Masukkan Jumlah Orang Konghucu" aria-describedby="defaultFormControlHelp" required>
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

                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-control" name="tahun" id="tahun" aria-label="Default select example">
                                        <option value="">-- Pilih Tahun --</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <a href="/Berdasarkan-Agama" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
                            <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                            <button class="btn btn-sm btn-primary" type="submit" style="margin-bottom: 20px;">
                            <i class="bx bxs-plus-square"></i> Tambah Data</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection