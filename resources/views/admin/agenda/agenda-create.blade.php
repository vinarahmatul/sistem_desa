@extends('layout.main1')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Tambah Agenda Kegiatan</h5>
                    <div class="card-body">
                    <form action="/Tambah-Agenda-Kegiatan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="judul_kegiatan" class="form-label">Judul Kegiatan</label>
                                <textarea name="judul_kegiatan" id="judul_kegiatan" class="form-control" placeholder="Masukkan Judul Kegiatan" rows="4" required></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                                <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" class="form-control" placeholder="Masukkan Deskripsi Kegiatan" rows="4" required></textarea>
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6"> 
                                <label for="gambar_kegiatan" class="form-label">Foto Kegiatan</label>
                                <input type="file" name="gambar_kegiatan" class="form-control" 
                                id="gambar_kegiatan" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                                <input
                                    class="form-control"
                                    type="datetime-local"
                                    placeholder="Masukkan Tanggal Kegiatan"
                                    id="tanggal_kegiatan"
                                    name="tanggal_kegiatan"
                                    required
                                />
                                </div>
                            </div> 

                            <div class="col-md-6 mt-2">
                                <a href="/Agenda-Kegiatan" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
                                <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                                <button class="btn btn-sm btn-primary" type="submit" style="margin-bottom: 20px;">
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
        $("#Agenda").addClass("active");
    </script>
@endsection
