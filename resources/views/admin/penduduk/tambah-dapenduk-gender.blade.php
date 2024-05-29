@extends('layout.main')

@section('content')

<div class="container fw-bold" style="background-color: #ffff; margin-top: 100px;">
    <div class="col-10 m-auto">
        <form action="/Tambah-Data-Jenis-Kelamin" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="[Perempuan/Laki-laki]" aria-label="Default select example">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah">Jumlah Orang</label>
                <input type="text" name="jumlah" placeholder="Masukkan Jumlah Orang" class="form-control" id="jumlah" required>
            </div>

            <div class="mb-3">
                <a href="/Berdasarkan-Jenis-Kelamin" class="btn btn-sm me-2" style="background-color: #E30202; margin-bottom: 20px; color:white;">
                <i class="bi bi-backspace-fill"></i> Kembali</a>
                <button class="btn btn-sm" type="submit" style="background-color: #1C891A; margin-bottom: 20px; color:white;">
                <i class="bi bi-pencil-square"></i> Tambah Data</button>
            </div>

        </form>
    </div>
</div>

@endsection