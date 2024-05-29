@extends('layout.main1')

@section('content')

@if(auth()->user()->level == 'admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/Update-Profile-Admin/id" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="form-control" id="nama" value="{{ Auth::user()->nama }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" name="nik" placeholder="Masukkan NIK" class="form-control" id="nik" value="{{ Auth::user()->nik }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" placeholder="Masukkan Email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" id="alamat" value="{{ Auth::user()->alamat }}">
                                </div>

                                <div class="col-md-6 mt-4">
                                    <a href="/Berdasarkan-Agama" class="btn btn-sm btn-danger me-2" style="margin-bottom: 10px;">
                                    <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                                    <button class="btn btn-sm btn-success" type="submit" style="margin-bottom: 10px;">
                                    <i class="bx bxs-edit"></i> Edit Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
