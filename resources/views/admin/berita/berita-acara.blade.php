@extends('layout.main1')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                        <h4 class="card-header">
                            List Berita
                            @if($tahun)
                                Tahun {{ $tahun }}
                            @endif
                        </h4>

                        <!-- Form filter -->
                        <div class="card-body">
                            <form action="{{ route('berita.filter') }}" method="get" class="mb-3">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <select name="tahun" id="filter_tahun" class="form-select">
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    <div class="text-nowrap">
                        <a href="/Tambah-Berita-Acara" class="btn btn-sm btn-primary mb-3 me-2 ms-4">
                            <i class="bx bxs-plus-square"></i> Tambah Data
                        </a>

                        <a href="{{ route('berita.pdf', ['tahun' => $tahun]) }}" class="btn btn-sm btn-primary mb-3">
                            <i class='bx bxs-printer'></i> Cetak PDF
                        </a>

                            <table class="table" style="text-align: center;">
                                <caption class="ms-4">
                                    Total Berita Acara adalah {{ $jumlah }} Berita
                                </caption>
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($berita as $ba)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="white-space: normal;">
                                            {!! nl2br($ba->judul_berita) !!}
                                        </td>
                                        <td>{{ $ba->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#previewDoc{{ $ba->id }}">
                                                <i class='bx bxs-news'></i> Lihat
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
            </div>
        </div>

@foreach($berita as $ba)
<div class="modal fade" id="previewDoc{{ $ba->id }}" tabindex="-1" aria-labelledby="previewDocLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <a href="/Show-Update-Berita-Acara/{{ $ba->id }}" class="btn btn-sm btn-success me-2">
                    Edit <i class="bx bxs-edit"></i>
                    <a href="/Tambah-Berita-Acara/hapus/{{ $ba->id }}}"
                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"
                    id="liveToastBtn">Hapus <i class="bx bxs-trash"></i></a>
                    </a>
                </div>
                <h5 class="modal-title" id="previewDocLabel" style="white-space: normal; text-align: center; margin: 0 auto;">{!! nl2br($ba->judul_berita) !!}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="{{ route('view.pdf', ['filename' => $ba->dokumen_berita]) }}" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('script')
<script type="text/javascript">
    $("#Agenda").addClass("active");
</script>
@endsection
