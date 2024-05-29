@extends('layout.main1')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Tambah Data Pegawai Desa Labanasem</h5>
                    <div class="card-body">
                    <form action="/Tambah-Data-Pegawai" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" placeholder="Masukkan Nama Pegawai" class="form-control"
                                id="nama_pegawai" required>
                            </div>

                            <div class="col-md-6">
                                <label for="foto_pegawai" class="form-label">Foto Pegawai</label>
                                <input type="file" name="foto_pegawai" class="form-control" 
                                id="foto_pegawai" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" name="nik" placeholder="Masukkan NIK" class="form-control"
                                id="nik" required>
                            </div>
                            <div class="col-md-6">
                                <label for="niap" class="form-label">NIAP</label>
                                <input type="text" name="niap" placeholder="Masukkan NIAP" class="form-control"
                                id="niap" required>
                            </div>
                            <div class="col-md-6 mt-3">
                            <label for="divisi" class="form-label">Divisi</label> 
                            <select class="form-control" name="divisi" id="divisi" aria-label="Default select example"> 
                                <option selected>Pilih Divisi</option> 
                                <option value="Pejabat Pemerintah">Pejabat Pemerintah</option> 
                                <option value="Badan Permusyawaratan">Badan Permusyawaratan</option> 
                                <option value="LPMD">LPMD</option>
                                <option value="PKK">PKK</option>
                            </select> 
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-control" name="jabatan" id="jabatan" aria-label="Default select example"> 
                                <option selected>Pilih Jabatan</option> 
                                <option value="Kepala Desa">Kepala Desa</option> 
                                <option value="Sekertaris Desa">Sekertaris Desa</option> 
                                <option value="Kepala Urusan Keuangan">Kepala Urusan Keuangan</option> 
                                <option value="Kaur Tata Usaha dan Umum">Kaur Tata Usaha dan Umum</option> 
                                <option value="Kaur Perencanaan">Kaur Perencanaan</option> 
                                <option value="Kepala Seksi Kesra">Kepala Seksi Kesra</option>
                                <option value="Kepala Seksi Pelayanan">Kepala Seksi Pelayanan</option>
                                <option value="Staf Kasi Pelayanan">Staf Seksi Pelayanan</option>
                                <option value="Kepala Seksi Pemerintahan">Kepala Seksi Pemerintahan</option>
                                <option value="Kasun Krajan Timur">Kasun Krajan Timur</option> 
                                <option value="Kasun Krajan Barat">Kasun Krajan Barat</option> 
                                <option value="Kasun Labansukadi">Kasun Labansukadi</option>
                                <option value="Kasun Kawang">Kasun Kawang</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="Sekertaris">Sekertaris</option>
                                <option value="Bendahara">Bendahara</option>
                                <option value="Anggota">Anggota</option>
                            </select> 
                            </div>
                            <div class="col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" placeholder="Masukkan Alamat Pegawai" class="form-control"
                                    id="alamat" required>
                            </div>
                            <div class="col-md-6 mt-4">
                                <a href="/Data-Pegawai" class="btn btn-sm btn-danger me-2" style="margin-bottom: 10px;">
                                <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                                <button class="btn btn-sm btn-primary" type="submit" style="margin-bottom: 10px;">
                                <i class="bx bxs-plus-square"></i> Tambah Data</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#Pegawai").addClass("active");
    </script>
@endsection
