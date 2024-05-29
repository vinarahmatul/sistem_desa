@extends('layout.main1')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Data Pegawai Desa Labanasem</h5>
                    <div class="card-body">
                    <form action="/Update-Data-Pegawai/{{ $pegawai->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" id="nama_pegawai" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="foto_pegawai" class="form-label">Foto Pegawai</label>
                                <input type="file" id="foto_pegawai" name="foto_pegawai" accept="image/jpeg, image/jpg, image/png, image/JPG, image/JPEG, image/PNG" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" id="nik" name="nik" value="{{ $pegawai->nik }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="niap" class="form-label">NIAP</label>
                                <input type="text" id="niap" name="niap" value="{{ $pegawai->niap }}" class="form-control">
                            </div>
                            <div class="col-md-6"> 
                                <label for="divisi" class="form-label">Divisi</label>
                                    <select class="form-control" id="divisi" name="divisi" aria-label="Default select example">
                                        <option disabled>Pilih Divisi</option>
                                        <option value="Pejabat Pemerintah" {{ $pegawai->divisi == 'Pejabat Pemerintah' ? 'selected' : '' }}>Pejabat Pemerintah</option>
                                        <option value="Badan Permusyawaratan" {{ $pegawai->divisi == 'Badan Permusyawaratan' ? 'selected' : '' }}>Badan Permusyawaratan</option>
                                        <option value="LPMD" {{ $pegawai->divisi == 'LPMD' ? 'selected' : '' }}>LPMD</option>
                                        <option value="PKK" {{ $pegawai->divisi == 'PKK' ? 'selected' : '' }}>PKK</option>
                                    </select>
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select class="form-control" name="jabatan" id="jabatan" aria-label="Default select example" class="form-control"> 
                                    <option selected disabled>Pilih Jabatan</option>
                                    <option value="Kepala Desa" {{ $pegawai->jabatan == 'Kepala Desa' ? 'selected' : '' }}>Kepala Desa</option>
                                    <option value="Sekertaris Desa" {{ $pegawai->jabatan == 'Sekertaris Desa' ? 'selected' : '' }}>Sekertaris Desa</option>
                                    <option value="Kepala Urusan Keuangan" {{ $pegawai->jabatan == 'Kepala Urusan Keuangan' ? 'selected' : '' }}>Kepala Urusan Keuangan</option> 
                                    <option value="Kaur Tata Usaha dan Umum" {{ $pegawai->jabatan == 'Kaur Tata Usaha dan Umum' ? 'selected' : '' }}>Kaur Tata Usaha dan Umum</option> 
                                    <option value="Kaur Perencanaan" {{ $pegawai->jabatan == 'Kaur Perencanaan' ? 'selected' : '' }}>Kaur Perencanaan</option> 
                                    <option value="Kepala Seksi Pelayanan" {{ $pegawai->jabatan == 'Kepala Seksi Kesra' ? 'selected' : '' }}>Kepala Seksi Kesra</option>
                                    <option value="Kepala Seksi Pelayanan" {{ $pegawai->jabatan == 'Kepala Seksi Pelayanan' ? 'selected' : '' }}>Kepala Seksi Pelayanan</option>
                                    <option value="Staf Kasi Pelayanan" {{ $pegawai->jabatan == 'Staf Seksi Pelayanan' ? 'selected' : '' }}>Staf Seksi Pelayanan</option>
                                    <option value="Kepala Seksi Pemerintahan" {{ $pegawai->jabatan == 'Kepala Seksi Pemerintahan' ? 'selected' : '' }}>Kepala Seksi Pemerintahan</option>
                                    <option value="Kasun Krajan Timur" {{ $pegawai->jabatan == 'Kasun Krajan Timur' ? 'selected' : '' }}>Kasun Krajan Timur</option>
                                    <option value="Kasun Krajan Barat" {{ $pegawai->jabatan == 'Kasun Krajan Barat' ? 'selected' : '' }}>Kasun Krajan Barat</option>
                                    <option value="Kasun Labansukadi" {{ $pegawai->jabatan == 'Kasun Labansukadi' ? 'selected' : '' }}>Kasun Labansukadi</option>
                                    <option value="Kasun Kawang" {{ $pegawai->jabatan == 'Kasun Kawang' ? 'selected' : '' }}>Kasun Kawang</option>
                                    <option value="Ketua" {{ $pegawai->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                    <option value="Wakil Ketua" {{ $pegawai->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                                    <option value="Sekertaris" {{ $pegawai->jabatan == 'Sekertaris' ? 'selected' : '' }}>Sekertaris</option>
                                    <option value="Bendahara" {{ $pegawai->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                    <option value="Anggota" {{ $pegawai->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" value="{{ $pegawai->alamat }}" class="form-control">
                            </div> 
                            <div class="col-md-6 mt-4">
                                <a href="/Data-Pegawai" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
                                <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                                <button class="btn btn-sm btn-success" type="submit" style="margin-bottom: 20px;">
                                <i class="bx bxs-plus-square"></i> Edit Data</button>
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