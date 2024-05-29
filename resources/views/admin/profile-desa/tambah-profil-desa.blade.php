@extends('layout.main1')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Tambah Profile Desa Labanasem</h5>
                    <div class="card-body">
                    <form action="/Tambah-Profile-Desa" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_desa" class="form-label">Nama Desa</label>
                                <input type="text" name="nama_desa" placeholder="Masukkan Nama Desa" class="form-control" id="nama_desa" required>
                            </div>

                            <div class="col-md-6">
                                <label for="gambar_desa" class="form-label">Gambar Desa</label>
                                <input type="file" name="gambar_desa" class="form-control" id="gambar_desa" required>
                            </div> 
                        </div>

                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Sejarah</label>
                            <textarea name="sejarah" id="sejarah" class="form-control" placeholder="Masukkan Sejarah Desa" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea name="visi" id="visi" class="form-control" placeholder="Masukkan Visi, &#10;Contoh: &#10;Visi 1&#10;Visi 2&#10;dst" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea name="misi" id="misi" class="form-control" placeholder="Masukkan Misi, &#10;Contoh: &#10;Misi 1&#10;Misi 2&#10;dst" rows="4" required></textarea>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="peta_desa" class="form-label">Gambar Peta</label>
                                <input type="file" name="peta_desa" class="form-control" id="peta_desa" required>
                            </div>

                            <div class="col-md-6">
                                <label for="struktur_desa" class="form-label">Gambar Struktur Desa</label>
                                <input type="file" name="struktur_desa" class="form-control" id="struktur_desa" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_peta" class="form-label">Deskripsi Letak Geografis</label>
                            <textarea name="deskripsi_peta" id="deskripsi_peta" class="form-control" placeholder="Masukkan Deskrisi Letak Geografis" rows="4" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <a href="/Profile-Desa" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
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