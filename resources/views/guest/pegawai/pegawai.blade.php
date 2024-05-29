@extends('guest.layout.main')

@section('content')
<main id="main">
    <section id="tim" class="tim section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title mb-2 mt-3">
            <img src="../images/tulisan/pemdes-baru.png" alt="desa" style="max-width: 100%; height: 50px;">
        </div>

        <div class="row">
            @foreach ($pegawais as $pg)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="members">
                      <div class="members-img">
                          <img src="{{ asset('/storage'.$pg->foto_pegawai) }}" class="img-fluid">
                      </div>
                      <div class="member-info">
                          <h4 style="white-space: normal; margin-top: 20px;">{!! nl2br($pg->nama_pegawai) !!}</h4>
                          <span style="white-space: normal; margin-bottom: 20px;">{!! nl2br($pg->jabatan) !!}</span>
                      </div>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
    </section>
</main>
@endsection