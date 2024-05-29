@extends('layout.main1')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Berita Acara</h5>
                    <div class="card-body">
                    <form action="/Update-Berita-Acara/{{ $berita->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="judul_berita" class="form-label">Judul Berita Acara</label>
                                <textarea name="judul_berita" placeholder="Masukkan Judul Berita" class="form-control" id="judul_berita" rows="4" >{{ $berita->judul_berita }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="dokumen_berita" class="form-label">Deskripsi Berita</label>
                                <input type="file" name="dokumen_berita" class="form-control" id="dokumen_berita" accept=".pdf,.doc,.docx">
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <a href="/Berita-Acara" class="btn btn-sm btn-danger me-2" style="margin-bottom: 20px;">
                                <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                                <button class="btn btn-sm btn-success" type="submit" style="margin-bottom: 20px;">
                                <i class="bx bxs-plus-square"></i> Edit Data</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#Agenda").addClass("active");
    </script>
@endsection