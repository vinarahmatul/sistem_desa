@extends('guest.layout.main')

@section('content')
  <!-- ======= Welcome Section ======= -->
  <section id="welcome" class="d-flex align-items-center">
  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="overlay"></div>
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <div class="image-container">
            <img src="../images/tulisan/welcome.png" alt="selamat" class="selamat">
          </div>
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahPenduduk }}" data-purecounter-duration="2" class="purecounter"></span>
              <p>Jumlah Penduduk</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahPegawai }}" data-purecounter-duration="2" class="purecounter"></span>
              <p>Jumlah Pegawai</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahLayanan }}" data-purecounter-duration="2" class="purecounter"></span>
              <p>Jumlah Pelayanan Masyarakat</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahAgenda }}" data-purecounter-duration="2" class="purecounter"></span>
              <p>Jumlah Agenda</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Kegiatan Section ======= -->
    <section id="kegiatan" class="kegiatan">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <img src="../images/tulisan/d-ag-terbaru.png" style="max-width: 100%; height: 80px;" alt="Agenda Kegiatan Image">
        </div>

        <div class="row kegiatan-container" data-aos="fade-up" data-aos-delay="300" style="justify-content:center;">
          @foreach ($agendaTerbaru as $key => $at)
            @if ($key < 6)
              <div class="col-lg-12 kegiatan-item filter-agenda my-2">
                <div class="kegiatan-wrap" style="display: flex; align-items: flex-start;">
                  <div class="gambar-wrap" style="width: 250px; height: 150px;">
                    <img class="card-img-top" src="{{ asset('/storage'.$at->gambar_kegiatan) }}" style="width: 100%; height: 100%; object-fit: contain;">
                  </div>
                  <div class="card-body" style="flex: 1;">
                    <a href="/Detail-Agenda-Kegiatan-Desa-Labanasem/{{ $at->id }}"><h5 class="card-title" style="white-space: normal; font-weight:bold; color:#029765; margin-bottom: 10px;">{!! nl2br($at->judul_kegiatan) !!}</h5></a>
                    <p class="card-text" style="word-wrap: break-word; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{ $at->deskripsi_kegiatan }}</p>
                    <p class="card-text"><small class="text-muted"><i class='bx bxs-calendar'></i> {{ $at->tanggal_kegiatan->format('d-m-Y') }}</small></p>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </section>

    <!-- ======= Tim Section ======= -->
    <section id="tim" class="tim section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
          <img src="../images/tulisan/d-pemdes-terbaru.png" style="max-width: 100%; height: 80px;" alt="Agenda Kegiatan Image">
        </div>

        <div class="row">
            @foreach ($pegawai as $pgw)
              @if ($pgw->jabatan == 'Kepala Desa' || $pgw->jabatan == 'Kaur Tata Usaha dan Umum' || $pgw->jabatan == 'Kepala Seksi Pemerintahan' || $pgw->jabatan == 'Sekertaris Desa')
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch justify-content-center" data-aos="fade-up" data-aos-delay="100">
                  <div class="members">
                      <div class="members-img">
                          <img src="{{ asset('/storage'.$pgw->foto_pegawai) }}" class="img-fluid">
                      </div>
                      <div class="member-info mt-3 mb-3">
                          <h4 style="white-space: normal;">{!! nl2br($pgw->nama_pegawai) !!}</h4>
                          <span style="white-space: normal;">{!! nl2br($pgw->jabatan) !!}</span>
                      </div>
                  </div>
              </div>
              @endif
            @endforeach
        </div>
    </div>
    </section>

  </main>
@endsection