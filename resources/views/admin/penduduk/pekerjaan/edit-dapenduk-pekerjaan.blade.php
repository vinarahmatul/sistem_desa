@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Data Penduduk Berdasarkan Pekerjaan</h5>
                    <div class="card-body">

                    <form action="/Update-Data-Pekerjaan/{{ $dapenduk_pekerjaan->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="petani" class="form-label">Petani</label>
                                    <input type="text" name="petani" placeholder="Masukkan Jumlah Orang Petani" class="form-control" id="petani" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->petani }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="pegawai_swasta" class="form-label">Pegawai Swasta</label>
                                    <input type="text" name="pegawai_swasta" placeholder="Masukkan Jumlah Orang Pegawai Swasta" class="form-control" id="pegawai_swasta" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->pegawai_swasta }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pegawai_negeri_sipil" class="form-label">Pegawai Negeri Sipil</label>
                                    <input type="text" name="pegawai_negeri_sipil" placeholder="Masukkan Jumlah Orang Pegawai Negeri Sipil" class="form-control" id="pegawai_negeri_sipil" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->pegawai_negeri_sipil }}">
                                    <div id="defaultFormControlHelp" class="form-text"> 
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="perdagangan" class="form-label">Perdagangan</label>
                                    <input type="text" name="perdagangan" placeholder="Masukkan Jumlah Orang Perdagangan" class="form-control" id="perdagangan" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->perdagangan }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="buruh_tani" class="form-label">Buruh Tani</label>
                                    <input type="text" name="buruh_tani" placeholder="Masukkan Jumlah Orang Buruh Tani" class="form-control" id="buruh_tani" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->buruh_tani }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="buruh_pabrik" class="form-label">Buruh Pabrik</label>
                                    <input type="text" name="buruh_pabrik" placeholder="Masukkan Jumlah Orang Buruh Pabrik" class="form-control" id="buruh_pabrik" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->buruh_pabrik }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tukang_batu" class="form-label">Tukang Batu</label>
                                    <input type="text" name="tukang_batu" placeholder="Masukkan Jumlah Tukang Batu" class="form-control" id="tukang_batu" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->tukang_batu }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="jasa" class="form-label">Jasa</label>
                                    <input type="text" name="jasa" placeholder="Masukkan Jumlah Orang Jasa" class="form-control" id="jasa" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->jasa }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="perangkat_desa" class="form-label">Perangkat Desa</label>
                                    <input type="text" name="perangkat_desa" placeholder="Masukkan Jumlah Orang Perangkat Desa" class="form-control" id="perangkat_desa" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->perangkat_desa }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tenaga_medis" class="form-label">Tenaga Medis</label>
                                    <input type="text" name="tenaga_medis" placeholder="Masukkan Jumlah Orang Tenaga Medis" class="form-control" id="tenaga_medis" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->tenaga_medis }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tukang_kayu" class="form-label">Tukang Kayu</label>
                                    <input type="text" name="tukang_kayu" placeholder="Masukkan Jumlah Orang Tukang Kayu" class="form-control" id="tukang_kayu" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->tukang_kayu }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tukang_jahir_bordir" class="form-label">Tukang Jahir/Bordir</label>
                                    <input type="text" name="tukang_jahir_bordir" placeholder="Masukkan Jumlah Orang Tukang Jahir/Bordir" class="form-control" id="tukang_jahir_bordir" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->tukang_jahir_bordir }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tni_polri" class="form-label">TNI/POLRI</label>
                                    <input type="text" name="tni_polri" placeholder="Masukkan Jumlah Orang TNI/POLRI" class="form-control" id="tni_polri" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->tni_polri }}">
                                    <div id="defaultFormControlHelp" class="form-text">
                                        Isi dengan angka saja.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="lain_lain_termasuk_belum_bekerja" class="form-label">Lain-lain termasuk belum bekerja</label>
                                    <input type="text" name="lain_lain_termasuk_belum_bekerja" placeholder="Masukkan Jumlah Orang Pegawai Swasta" class="form-control" id="lain_lain_termasuk_belum_bekerja" aria-describedby="defaultFormControlHelp" value="{{ $dapenduk_pekerjaan->lain_lain_termasuk_belum_bekerja }}">
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
                                        <option value="Januari" {{ $dapenduk_pekerjaan->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                                        <option value="Februari" {{ $dapenduk_pekerjaan->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                                        <option value="Maret" {{ $dapenduk_pekerjaan->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                                        <option value="April" {{ $dapenduk_pekerjaan->bulan == 'April' ? 'selected' : '' }}>April</option>
                                        <option value="Mei" {{ $dapenduk_pekerjaan->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                                        <option value="Juni" {{ $dapenduk_pekerjaan->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                                        <option value="Juli" {{ $dapenduk_pekerjaan->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                                        <option value="Agustus" {{ $dapenduk_pekerjaan->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                                        <option value="September" {{ $dapenduk_pekerjaan->bulan == 'September' ? 'selected' : '' }}>September</option>
                                        <option value="Oktober" {{ $dapenduk_pekerjaan->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                                        <option value="November" {{ $dapenduk_pekerjaan->bulan == 'November' ? 'selected' : '' }}>November</option>
                                        <option value="Desember" {{ $dapenduk_pekerjaan->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-control" name="tahun" id="tahun" aria-label="Default select example">
                                        <option value="">-- Pilih Tahun --</option>
                                        <option value="2021" {{ $dapenduk_pekerjaan->tahun == '2021' ? 'selected' : '' }}>2021</option>
                                        <option value="2022" {{ $dapenduk_pekerjaan->tahun == '2022' ? 'selected' : '' }}>2022</option>
                                        <option value="2023" {{ $dapenduk_pekerjaan->tahun == '2023' ? 'selected' : '' }}>2023</option>
                                        <option value="2024" {{ $dapenduk_pekerjaan->tahun == '2024' ? 'selected' : '' }}>2024</option>
                                        <option value="2025" {{ $dapenduk_pekerjaan->tahun == '2025' ? 'selected' : '' }}>2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <a href="/Berdasarkan-Pekerjaan" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
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