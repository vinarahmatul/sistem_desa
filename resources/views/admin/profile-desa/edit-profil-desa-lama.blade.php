@extends('layout.main1')

@section('content')

<div class="container fw-bold" style="background-color: #ffff; margin-top: 30px;">
    <div class="col-10 m-auto">

        <br>
        <h3 align="center" style="font-weight: bold; font-family: serif;">EDIT DATA PROFIL DESA LABANASEM</h3>
        <br>
        <br>

        <form action="/Update-Profile-Desa/{{ $profil->id }}" method="post" enctype="multipart/form-data">
            @csrf 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_desa">Nama Desa</label>
                        <input type="text" name="nama_desa" placeholder="Masukkan Nama Desa" class="form-control" id="nama_desa" value="{{ $profil->nama_desa }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="gambar_desa">Gambar Desa</label>
                        <input type="file" name="gambar_desa" class="form-control" id="gambar_desa" accept="image/jpeg, image/png">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sejarah">Sejarah</label>
                    <textarea name="sejarah" id="sejarah" class="form-control" placeholder="Masukkan Sejarah" rows="4">{{ $profil->sejarah }}</textarea>
                </div>

                <div class="form-group">
                    <label for="visi">Visi</label>
                    <textarea name="visi" id="visi" class="form-control" placeholder="Masukkan Visi" rows="4">{{ $profil->visi }}</textarea>
                </div>

                <div class="form-group">
                    <label for="misi">Misi</label>
                    <textarea name="misi" id="misi" class="form-control" placeholder="Masukkan Misi" rows="4">{{ $profil->misi }}</textarea>
                </div>
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="peta_desa">Gambar Peta</label>
                        <input type="file" name="peta_desa" class="form-control" id="peta_desa" accept="image/jpeg, image/png">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="struktur_desa">Gambar Struktur Desa</label>
                        <input type="file" name="struktur_desa" class="form-control" id="struktur_desa" accept="image/jpeg, image/png">
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi_peta">Deskripsi Letak Geografis</label>
                    <textarea name="deskripsi_peta" id="deskripsi_peta" class="form-control" placeholder="Masukkan Deskrisi Letak Geografis" rows="4">{{ $profil->deskripsi_peta }}</textarea>
                </div>

                <div class="mb-3">
                    <a href="/Profile-Desa" class="btn btn-danger btn-sm me-2" style="margin-bottom: 20px; color:white;">
                    <i class="bi bi-backspace-fill"></i> Kembali </a>
                    <button class="btn btn-sm" type="submit" style="background-color: #1C891A; margin-bottom: 20px; color:white;">
                    <i class="bi bi-pencil-square"></i> Tambah Data</button>
                </div>
        </form>
    </div>
</div>
@endsection