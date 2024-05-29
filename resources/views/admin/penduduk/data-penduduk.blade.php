@extends('layout.main')

@section('content')

<div class="container-fluid">
    @if(auth()->user()->level == 'admin')
    <div class="row justify-content-md-center">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top: 70px;">
            <div class="card" style="background-color: #3D5093;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white mb-0 text-uppercase" style="font-weight: bold; font-size:20px;">
                                    Pekerjaan
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-briefcase-fill text-lg opacity-10" style="font-size: 4rem; color:white;" aria-hidden="true"></i>
                            <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-light ml-8 mr-8 mb-8 text-danger" type="button">Button</button> -->
                <a class="btn btn-light ml-8 mr-8 mb-8" href="/Berdasarkan-Pekerjaan" role="button" style="color: #3D5093; font-weight: bold; font-size: 18px;">Lihat <i class="bi bi-caret-right-fill"></i></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top: 70px;">
            <div class="card" style="background-color: #539036;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white mb-0 text-uppercase" style="font-weight: bold; font-size:20px;">
                                    Kesehatan
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-file-earmark-medical-fill text-lg opacity-10" style="font-size: 4rem; color:white;" aria-hidden="true"></i>
                            <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-light ml-8 mr-8 mb-8 text-danger" type="button">Button</button> -->
                <a class="btn btn-light ml-8 mr-8 mb-8" href="/Berdasarkan-Kesehatan" role="button" style="color: #539036; font-weight: bold; font-size: 18px;">Lihat <i class="bi bi-caret-right-fill"></i></a>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top: 40px;">
            <div class="card" style="background-color: #A9A04A;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white mb-0 text-uppercase" style="font-weight: bold; font-size:20px;">
                                    Usia dan Jenis Kelamin
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-people-fill text-lg opacity-10" style="font-size: 4rem; color:white;" aria-hidden="true"></i>
                            <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-light ml-8 mr-8 mb-8 text-danger" type="button">Button</button> -->
                <a class="btn btn-light ml-8 mr-8 mb-8" href="/Berdasarkan-Usia" role="button" style="color: #A9A04A; font-weight: bold; font-size: 18px;">Lihat <i class="bi bi-caret-right-fill"></i></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top: 40px;">
            <div class="card" style="background-color: #5FB8B8;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white mb-0 text-uppercase" style="font-weight: bold; font-size:20px;">
                                    Agama
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-building text-lg opacity-10" style="font-size: 4rem; color:white;" aria-hidden="true"></i>
                            <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-light ml-8 mr-8 mb-8 text-danger" type="button">Button</button> -->
                <a class="btn btn-light ml-8 mr-8 mb-8" href="/Berdasarkan-Agama" role="button" style="color: #5FB8B8; font-weight: bold; font-size: 18px;">Lihat <i class="bi bi-caret-right-fill"></i></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top: 40px;">
            <div class="card" style="background-color: #954E92;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white mb-0 text-uppercase" style="font-weight: bold; font-size:20px;">
                                    Pendidikan
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-graph-up text-lg opacity-10" style="font-size: 4rem; color:white;" aria-hidden="true"></i>
                            <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-light ml-8 mr-8 mb-8 text-danger" type="button">Button</button> -->
                <a class="btn btn-light ml-8 mr-8 mb-8" href="/Berdasarkan-Pendidikan" role="button" style="color: #954E92; font-weight: bold; font-size: 18px;">Lihat <i class="bi bi-caret-right-fill"></i></a>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
