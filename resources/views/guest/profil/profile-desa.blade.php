@extends('guest.layout.main')

@section('content')
<main id="main">
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="title-about mb-4 mt-3">
          <div style="text-align: center;">
            <img src="../images/tulisan/desa.png" alt="desa" style="max-width: 100%; height: 50px;">
          </div>
        </div>

        <div class="col-md-8 col-md-offset-3 mx-auto">
          <div class="row content section-bg">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
              </ol>
              
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../images/elements/11.jpg" alt="First slide" />
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/elements/2.jpg" alt="Second slide" />
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="../images/elements/13.jpg" alt="Third slide" />
                </div>
              </div>
              
              <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>

              <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
        

        <div class="row content">
          @foreach($profil_desa as $pd)
          <div class="col-lg-12 mb-4 mt-4">
            <p style="white-space: pre-line; text-align: justify;">{{ $pd->sejarah }}</p>
          </div>
          <div class="col-lg-12 mb-4">
            <h3>Visi</h3>
            <ul class="mt-4">
            @foreach(explode("\n", strip_tags($pd->visi)) as $visi)
              @if (trim($visi) !== '')
                <li><i class="ri-check-double-line" style="text-align: justify;"></i>{{ $visi }}</li>
              @endif
            @endforeach
            </ul>
          </div>
          <div class="col-lg-12 mb-4 mt-4">
            <h3>Misi</h3>
            <ul class="mt-4">
            @foreach(explode("\n", strip_tags($pd->misi)) as $misi)
              @if (trim($misi) !== '')
                <li><i class="ri-check-double-line" style="text-align: justify;"></i>{{ $misi }}</li>
              @endif
            @endforeach
            </ul>
          </div>
          <div class="col-lg-12 mb-4 mt-4">
            <h3>Peta dan Letak Geografis {{ $pd->nama_desa }}</h3>
            <figure class="mb-4 mt-4"><img class="img-fluid rounded" src="{{ asset('storage'.$pd->peta_desa) }}" alt="Peta Desa" style="max-width:50%; height:100%;" /></figure>
            <p style="white-space: pre-line; text-align: justify;">{{ $pd->deskripsi_peta }}</p>
          </div>
          <div class="col-lg-12 mt-4">
            <h3>Struktur {{ $pd->nama_desa }}</h3>
            <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('/storage'.$pd->struktur_desa) }}" alt="Struktur Desa" style="width:600px; height:400px;" /></figure>
          </div>
          @endforeach
        </div>
      </div>
    </section>
</main>
@endsection
