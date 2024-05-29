@extends('layout.main1')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row" style="justify-content: center;">
            <div class="col-md-12">
                <div class="card mb-4">
                <h5 class="card-header">Edit Pelayanan Masyarakat Desa Labanasem</h5>
                    <div class="card-body">
                    <form action="/Update-Layanan-Masyarakat/{{ $layanan->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jenis_pelayanan" class="form-label">Jenis Pelayanan</label>
                                <input type="text" name="jenis_pelayanan" value="{{ $layanan->jenis_pelayanan }}" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="petugas_pelayanan" class="form-label">Petugas</label>
                                <input type="text" name="petugas_pelayanan" value="{{ $layanan->petugas_pelayanan }}" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6"> 
                                <label for="langkah_pelayanan" class="form-label">Langkah Langkah</label>
                                <textarea name="langkah_pelayanan" id="langkah_pelayanan" class="form-control" placeholder="Masukkan Langka-langka &#10;Contoh: &#10;Memfotocopy KTP&#10;Memfotocopy KKh" rows="4">{{ $layanan->langkah_pelayanan }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="syarat_pelayanan" class="form-label">Persyaratan</label>
                                <textarea name="syarat_pelayanan" id="syarat_pelayanan" class="form-control" placeholder="Masukkan Persyaratan &#10;Contoh: &#10;Memfotocopy KTP&#10;Memfotocopy KK" rows="4">{{ $layanan->syarat_pelayanan }}</textarea>
                            </div> 

                            <div class="col-md-6 mt-4">
                                <a href="/Layanan-Masyarakat" class="btn btn-sm btn-danger me-2" style="margin-bottom: 10px;">
                                <i class="bx bxs-left-arrow-alt"></i> Kembali</a>
                                <button class="btn btn-sm btn-success" type="submit" style="margin-bottom: 10px;">
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
        $("#Layanan").addClass("active");
    </script>
@endsection