@extends('guest.layout.main')

@section('content')
<main id="main">
    <div class="container" data-aos="fade-up">
        <div class="title">
            <h2 style="text-align: center;">{{ $berita->judul_berita }}</h2>
        </div>

        <div class="container" data-aos="fade-up">
            <a href="/Berita-Acara-Desa-Labanasem" class="btn btn-sm btn-danger mt-2 mb-2" style="margin-bottom: 20px;">
            <i class="bx bxs-left-arrow-alt"></i> Kembali</a>

            <iframe src="{{ asset('storage/uploads/' . $berita->dokumen_berita) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto" style="margin-bottom: 40px;"></iframe>
        </div>
    </div>
</main>
@endsection