@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Tambah Data Penduduk Berdasarkan Agama</h5>
                    <div class="card-body">
                        <form action="/Tambah-Data-Usia" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="kategori_usia" class="form-label">Usia</label>
                                        <select class="form-control" name="kategori_usia" id="kategori_usia" aria-label="Default select example">
                                            <option selected>Pilih Kategori Usia</option>
                                            <option value="0-4 tahun">0-4 Tahun</option>
                                            <option value="5-9 tahun">5-9 Tahun</option>
                                            <option value="10-14 tahun">10-14 Tahun</option>
                                            <option value="15-19 tahun">15-19 Tahun</option>
                                            <option value="20-24 tahun">20-24 Tahun</option>
                                            <option value="25-29 tahun">25-29 Tahun</option>
                                            <option value="30-34 tahun">30-34 Tahun</option>
                                            <option value="35-39 tahun">35-39 Tahun</option>
                                            <option value="40-44 tahun">40-44 Tahun</option>
                                            <option value="45-49 tahun">45-49 Tahun</option>
                                            <option value="50-54 tahun">50-54 Tahun</option>
                                            <option value="55-58 tahun">55-58 Tahun</option>
                                            <option value=">59 tahun">>59 Tahun</option>
                                        </select>
                                    </div>

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

                                    <div class="col-md-6 mt-3">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jumlah_orang_laki" class="form-label">Jumlah Orang Laki Laki</label>
                                        <input type="number" name="jumlah_orang_laki" placeholder="Masukkan Jumlah Laki-laki" class="form-control" id="jumlah_orang_laki" aria-describedby="defaultFormControlHelp" required>
                                        <div id="defaultFormControlHelp" class="form-text">
                                            Isi dengan angka saja.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="jumlah_orang_perempuan" class="form-label">Jumlah Orang Perempuan</label>
                                        <input type="number" name="jumlah_orang_perempuan" placeholder="Masukkan Jumlah Perempuan" class="form-control" id="jumlah_orang_perempuan" aria-describedby="defaultFormControlHelp" required>
                                        <div id="defaultFormControlHelp" class="form-text">
                                            Isi dengan angka saja.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <a href="/Berdasarkan-Usia" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
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