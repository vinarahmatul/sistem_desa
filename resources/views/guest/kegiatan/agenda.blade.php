@php
    use Carbon\Carbon;
@endphp

@extends('guest.layout.main')

@section('content')
              
<main id="main">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="title-about mb-4 mt-3">
                <div style="text-align: center;">
                    <img src="../images/tulisan/agenda-baru.png" alt="desa" style="max-width: 100%; height: 50px;">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($agendas as $ags)
                        <div class="card" style="margin-bottom: 20px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img class="card-img-top" src="{{ asset('/storage'.$ags->gambar_kegiatan) }}" alt="{{ $ags->judul_kegiatan }}" style="max-width: 100%; height: auto;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="/Detail-Agenda-Kegiatan-Desa-Labanasem/{{ $ags->id }}"><h5 class="card-title" style="white-space: normal;">{!! nl2br($ags->judul_kegiatan) !!}</h5></a>
                                        <p class="card-text" style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{ $ags->deskripsi_kegiatan }}</p>
                                        <p class="card-text"><small class="text-muted"><i class='bx bxs-calendar'></i> {{ $ags->tanggal_kegiatan->format('d-m-Y') }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
