@extends('layout.main1')
@section('web')
    <h1 class="m-0">Edit Profil Admin</h1>
@endsection
@section('page')
    <li class="breadcrumb-item active">Edit Profil Admin</li>
@endsection
@section('content')

<div class="container fw-bold" style="background-color: #ffff; margin-top: 100px;">
    <div class="col-10 m-auto">
    <br>
        <h3 align="center" style="font-weight: bold; font-family: serif;">EDIT PROFILE ADMIN DESA LABANASEM</h3>
    <br>
    <form action="/Admin-Update/{{ Auth::user()->id}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            </div>
            <div class="mb-3">
                <label for="Nama">Nama</label>
                <input type="text" required="required" name="nama" value="{{ Auth::user()->nama }}">
            </div>
            <div class="mb-3">
                <label for="Email">Email</label>
                <input type="text" required="required" name="email" value="{{ Auth::user()->email}}">
            </div>
            <div class="mb-3">
                <label for="NIK">NIK</label>
                <input type="text" required="required" name="nik" value="{{ Auth::user()->nik }}">
            </div>
            <div class="mb-3">
                <label for="Alamat">Alamat</label>
                <input type="text" required= "required" name="alamat" value="{{ Auth::user()->alamat }}">
            </div>
            <div class="mb-3">
                <a href="/profile-admin" class="btn btn-sm me-2" style="background-color: #E30202; margin-bottom: 20px; color:white;">
                <i class="bi bi-backspace-fill"></i> Kembali</a>
                <button class="btn btn-sm" type="submit" style="background-color: #1C891A; margin-bottom: 20px; color:white;">
                <i class="bi bi-pencil-square"></i> Edit Data</button>
            </div>
        </form>
    </div>
</div>

@endsection