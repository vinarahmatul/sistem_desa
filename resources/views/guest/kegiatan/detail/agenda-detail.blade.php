@extends('guest.layout.main')

@section('content')
<main id="main">
    <!-- ======= Agenda Details Section ======= -->
    <section id="kegiatan-details" class="kegiatan-details">
        <div class="container" style="margin-top: 20px;">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="kegiatan-details">
                        <a href="/Agenda-Kegiatan-Desa-Labanasem" class="btn btn-sm btn-danger mt-2 mb-4" style="margin-bottom: 20px;">
                        <i class="bx bxs-left-arrow-alt"></i> Kembali</a>

                        <div class="gambar-wrapper">
                            <img src="{{ asset('/storage'.$agenda->gambar_kegiatan) }}" alt="Gambar Kegiatan" class="gambar-kegiatan">
                        </div>
                        <div class="kegiatan-description">
                            <h2 style="font-weight:bold; white-space: normal;">{{ $agenda->judul_kegiatan }}</h2>
                            <p class="card-text"><small class="text-muted"><i class='bx bxs-calendar'></i> {{ $agenda->tanggal_kegiatan }}</small></p>
                            <p style="white-space: pre-line; text-align: justify;">{{ $agenda->deskripsi_kegiatan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
