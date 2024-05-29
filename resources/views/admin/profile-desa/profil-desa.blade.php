@extends('layout.main1')

@section('content')

@if(auth()->user()->level == 'admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="row" style="justify-content: center;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                    <a href="/Tambah-Profile-Desa" class="btn btn-sm me-2 mb-3" style="background-color: #75ACFF; color:white;">
                        <i class="bi bi-file-earmark-plus-fill"></i> Tambah Profile Desa
                    </a>

                    <a href="{{ route('profil_desa.pdf') }}" class="btn btn-sm btn-primary mb-3 me-2">
                        <i class='bx bxs-printer'></i> Cetak PDF
                    </a>

                    <!-- Post content-->
                    @foreach($profil as $p)
                    <a href="/Show-Update-Profile-Desa/{{ $p->id }}" class="btn btn-sm mb-3" style="background-color: #1C891A; color:white;">
                    Edit Profile Desa <i class="bi bi-pencil-square"></i> </a>

                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1" style="text-align:center; color:#038258;">{{ $p->nama_desa }}</h1>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4" style="text-align:center;"><img class="img-fluid rounded" src="{{ asset('/storage'.$p->gambar_desa) }}" alt="Gambar Desa" style="max-width:50%; height:100%;" /></figure>
                            <!-- Post content-->
                            <section class="mb-7" style="text-align:center;">
                                <h2 class="fw-bolder mb-4 mt-5" style="color:#038258;">Sejarah {{ $p->nama_desa }}</h2>
                                <p class="fs-5 mb-4" style="white-space: pre-line; text-align: justify;">{{ $p->sejarah }}</p>
                            </section>
                            <section class="mb-7" style="text-align:center;">
                                <h2 class="fw-bolder mb-4 mt-5" style="color:#038258;">Visi</h2>
                                <!--<p class="fs-5 mb-4" style="text-align: justify;">{{ $p->visi }}</p>
                                <p class="fs-5 mb-4" style="text-align: justify;">{{ $p->misi }}</p> -->
                                <ol>
                                    @foreach(explode("\n", strip_tags($p->visi)) as $visi)
                                        @if (trim($visi) !== '')
                                        <li class="fs-5 mb-4" style="text-align: justify;">{{ $visi }}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            </section>
                            <section class="mb-7" style="text-align:center;">
                                <h2 class="fw-bolder mb-4 mt-5" style="color:#038258;">Misi</h2>
                                <!--<p class="fs-5 mb-4" style="text-align: justify;">{{ $p->visi }}</p>
                                <p class="fs-5 mb-4" style="text-align: justify;">{{ $p->misi }}</p> -->
                                <ol>
                                    @foreach(explode("\n", strip_tags($p->misi)) as $misi)
                                        @if (trim($misi) !== '')
                                        <li class="fs-5 mb-4" style="text-align: justify;">{{ $misi }}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            </section>
                            <section class="mb-7" style="text-align:center;">
                                <h2 class="fw-bolder mb-4 mt-5" style="color:#038258;">Peta dan Letak Geografis {{ $p->nama_desa }}</h2>
                                <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('/storage'.$p->peta_desa) }}" alt="Peta Desa" style="max-width:50%; height:100%;" /></figure>
                                <p class="fs-5 mb-4" style="white-space: pre-line; text-align: justify;">{{ $p->deskripsi_peta }}</p>
                            </section>
                            <section class="mb-7" style="text-align:center;">
                                <h2 class="fw-bolder mb-4 mt-5" style="color:#038258;">Struktur Perangkat {{ $p->nama_desa }}</h2>
                                <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('/storage'.$p->struktur_desa) }}" alt="Struktur Desa" style="width:600px; height:400px;" /></figure>
                            </section>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@endsection