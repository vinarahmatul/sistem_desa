@extends('guest.layout.main')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="title-about mb-4 mt-3">
                <div style="text-align: center;">
                    <img src="../images/tulisan/berita.png" alt="desa" style="max-width: 100%; height: 50px;">
                </div>
            </div>

            <div class="row mb-4">
                @foreach ($beritas as $ba)
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" style="background-color:#029765; margin-bottom:40px;">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-white mb-0 text-uppercase" style="font-weight: bold; font-size:16px; white-space: normal; min-width: 150px; height: 40px;">
                                        {!! nl2br($ba->judul_berita) !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="bx bxs-file-pdf text-lg opacity-10" style="font-size: 4rem; color:white;" aria-hidden="true"></i>
                                    <!-- <i class="bi bi-file-earmark-plus-fill text-lg opacity-10" style="font-size: 4rem; color:white;" aria-hidden="true"></i> -->
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-light ml-8 mr-8 mb-8" href="/Detail-Berita-Acara-Desa-Labanasem/{{ $ba->id }}" role="button" style="color: #029765; font-weight: bold; font-size: 16px;">Lihat <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection