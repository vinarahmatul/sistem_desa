@extends('layout.main')

@section('content')

<div class="container fw-bold" style="background-color: #ffff; margin-top: 100px;">
    <div class="col-10 m-auto">
        
        <form action="/Update-Data-Jenis-Kelamin/{{ $dapenduk_jenis_kelamin->id }}" method="post">
            @csrf 
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ $dapenduk_jenis_kelamin->id }}">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <!-- <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example">
                    <option selected>{{ $dapenduk_jenis_kelamin->jenis_kelamin }}</option>
                </select> -->
                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="{{ $dapenduk_jenis_kelamin->jenis_kelamin }}" readonly>
            </div>
            <div class="mb-3">
                <label for="jumlah">Jumlah Orang</label>
                <input type="text" name="jumlah" placeholder="Masukkan Jumlah Orang" class="form-control" id="jumlah" value="{{ $dapenduk_jenis_kelamin->jumlah }}" required>
            </div>

            <div class="mb-3">
                <a href="/Berdasarkan-Jenis-Kelamin" class="btn btn-sm me-2" style="background-color: #E30202; margin-bottom: 20px; color:white;">
                <i class="bi bi-backspace-fill"></i> Kembali</a>
                <button class="btn btn-sm" type="submit" style="background-color: #1C891A; margin-bottom: 20px; color:white;">
                <i class="bi bi-pencil-square"></i> Edit Data</button>
            </div>
        </form>
    </div>
</div>

@endsection