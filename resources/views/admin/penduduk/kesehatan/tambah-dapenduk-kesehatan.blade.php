@extends('layout.main1')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Tambah Data Penduduk Berdasarkan Kesehatan</h5>
                    <div class="card-body">
                    <form action="/Tambah-Data-Kesehatan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jenis_kesehatan" class="form-label">Jenis Kesehatan</label>
                                    <input type="text" name="jenis_kesehatan" placeholder="Masukkan Jenis Kesehatan" class="form-control" id="jenis_kesehatan" aria-describedby="defaultFormControlHelp" required>
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Contoh : Animea
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jumlah" class="form-label">Jumlah Orang</label>
                                    <input type="text" name="jumlah" placeholder="Masukkan Jumlah Orang" class="form-control" id="jumlah" aria-describedby="defaultFormControlHelp" required>
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
                            <a href="/Berdasarkan-Kesehatan" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
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