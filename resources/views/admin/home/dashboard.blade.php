@extends('layout.main1')

@section('content')

    @if(auth()->user()->level == 'admin')
    <div class="container flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                <h5 class="text-nowrap mb-2" style="color:#3D5093; font-weight:bolder;">Jumlah Penduduk</h5>
                            </div>
                            <div class="mt-sm-auto">
                                <h3 class="mb-0">{{ $penduduk }}</h3>
                                <!-- <h3 class="mb-0" data-purecounter-start="0" data-purecounter-end="{{ $penduduk }}" data-purecounter-duration="2" class="purecounter">0</h3> -->
                                <small class="text-nowrap fw-semibold"> <span class="badge" style="background-color:#3D5093;">Orang</span></small>
                              </div>
                            </div>
                            <div class="col-4 align-self-center">
                            <!-- <i class="menu-icon tf-icons "></i> -->
                                <i class="bx bxs-user" style="font-size: 5rem; color:#3D5093; margin-left:12px;" aria-hidden="true"></i>
                            </div>
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                <h5 class="text-nowrap mb-2" style="color:#539036; font-weight:bolder;">Jumlah Pegawai</h5>
                            </div>
                            <div class="mt-sm-auto">
                                <h3 class="mb-0">{{ $pegawai }}</h3>
                                <small class="text-nowrap fw-semibold"><span class="badge" style="background-color:#539036;">Orang</span></small>
                              </div>
                            </div>
                            <div class="col-4 align-self-center">
                            <!-- <i class="menu-icon tf-icons "></i> -->
                                <i class="bx bxs-user" style="font-size: 5rem; color:#539036; margin-left:12px;" aria-hidden="true"></i>
                            </div>
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                <h5 class="text-nowrap mb-2" style="color:#954E92; font-weight:bolder;">Jumlah Pelayanan</h5>
                            </div>
                            <div class="mt-sm-auto">
                                <h3 class="mb-0">{{ $layanan }}</h3>
                                <small class="text-nowrap fw-semibold"><span class="badge" style="background-color:#954E92;">Jenis</span></small>
                              </div>
                            </div>
                            <div class="col-4 align-self-center">
                            <!-- <i class="menu-icon tf-icons "></i> -->
                                <i class="bx bxs-receipt" style="font-size: 5rem; color:#954E92; margin-left:12px;" aria-hidden="true"></i>
                            </div>
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mb-4"> 
            <h5 class="card-header" style="font-weight: bolder; color:#038258; font-size:25px;">Berita Terbaru</h5> 
            <div class="card-body"> 
                <div class="text-nowrap">
                        <table class="table table-bordered" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($beritaTerbaru as $ba)
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
                @foreach($beritaTerbaru as $ba)
                <div class="modal fade" id="previewDoc{{ $ba->id }}" tabindex="-1" aria-labelledby="previewDocLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <a href="/Show-Update-Berita-Acara/{{ $ba->id }}" class="btn btn-sm btn-success me-2">
                                        Edit <i class="bx bxs-edit"></i>
                                    </a>
                                    <a href="/Tambah-Berita-Acara/hapus/{{ $ba->id }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm" id="liveToastBtn">
                                        Hapus <i class="bx bxs-trash"></i>
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
            </div>
        </div>

        <div class="card"> 
            <h5 class="card-header" style="font-weight: bolder; color:#038258; font-size:25px;">Agenda Terbaru</h5> 
                <div class="card-body"> 
                    <div class="text-nowrap"> 
                        <table class="table table-bordered" style="text-align: center;"> 
                        <thead> 
                            <tr> 
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach ($agendaTerbaru as $ag)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="white-space: normal;">
                                    {!! nl2br($ag->judul_kegiatan) !!}
                                </td>
                                <td style="word-wrap: break-word; max-width: 200px;">
                                    <div style="overflow: hidden; text-overflow: ellipsis;">
                                        {{ $ag->deskripsi_kegiatan }}
                                    </div>
                                </td>
                                <!-- <td>{{ $ag->deskripsi_kegiatan }}</td> -->
                                <td>
                                    <img src="{{ asset('/storage'.$ag->gambar_kegiatan) }}" class="card-img" style="max-width: 100%; max-height: 100px;" alt="...">
                                </td> 
                                <td>{{ $ag->tanggal_kegiatan->format('d-m-Y') }}</td>
                                <td>
                                    <a href="/Show-Detail-Agenda-Kegiatan/{{ $ag->id }}" class="btn btn-sm mt-2" style="background-color: #1C891A; color:white;">
                                    Detail <i class="bx bxs-detail"></i> </a> <br>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    @endif

@endsection

@section('scripts')
<script>
    // Inisialisasi PureCounter pada elemen dengan kelas "purecounter"
    var counters = document.querySelectorAll('.purecounter');
    counters.forEach(function (counter) {
        var start = parseInt(counter.dataset.purecounterStart);
        var end = parseInt(counter.dataset.purecounterEnd);
        var duration = parseInt(counter.dataset.purecounterDuration);

        var options = {
            start: start,
            end: end,
            duration: duration
        };

        var purecounter = new PureCounter(counter, options);
        purecounter.start();
    });
</script>
@endsection
