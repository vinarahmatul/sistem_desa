@extends('layout.main1')

@section('content')

@if(auth()->user()->level == 'admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="row" style="justify-content: center;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-group">
                        {{-- <div class="col-lg-"> --}}
                        <div class="card mb-4 elevation-3" style=" border-radius: 10px">
                            <div class="row no-gutters">
                                <div class="col-md-3" style="margin-left: 80px;  margin-top: 30px;">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                    <h1
                                        style="font-family: 'Garamond', Times, serif; font-size: 25px; text-align: right; margin-left: 40px; margin-top: 10px">
                                        {{ Auth::user()->nama }}</h1>
                                    <a href="/Show-Admin-Update/{id}" class="btn btn-primary btn-sm" style="margin-left: 55px"><i
                                            class="mr-2 nav-icon fas fa-edit"></i> Edit</a>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Nama</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="mb-0">{{ Auth::user()->nama }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">NIK</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{ Auth::user()->nik }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Alamat</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{ Auth::user()->alamat }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection