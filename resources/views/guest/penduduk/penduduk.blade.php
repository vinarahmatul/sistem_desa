
@extends('guest.layout.main')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title mb-2 mt-3">
                <img src="../images/tulisan/dapenduk.png" alt="desa" style="max-width: 100%; height: 50px;"><img src="../images/tulisan/desa.png" alt="desa" style="max-width: 100%; height: 50px;">
                <h2>@if($tahun)
                    Tahun {{ $tahun }}
                    @endif
                </h2>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <form action="{{ route('penduduk') }}" method="get" class="mb-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select name="tahun" id="filter_tahun" class="form-select">
                                        <option value="">-- Pilih Tahun --</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="col-xl-12">
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <button type="button"
                                    class="nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-agama"
                                    aria-controls="navs-top-agama"
                                    aria-selected="true"
                                    style="color: #013b26;"
                                    >
                                    Agama
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-usia"
                                    aria-controls="navs-top-usia"
                                    aria-selected="false"
                                    style="color: #013b26;"
                                    >
                                    Usia
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-pekerjaan"
                                    aria-controls="navs-top-pekerjaan"
                                    aria-selected="false"
                                    style="color: #013b26;"
                                    >
                                    Pekerjaan
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-pendidikan"
                                    aria-controls="navs-top-pendidikan"
                                    aria-selected="false"
                                    style="color: #013b26;"
                                    >
                                    Pendidikan
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-kesehatan"
                                    aria-controls="navs-top-kesehatan"
                                    aria-selected="false"
                                    style="color: #013b26;"
                                    >
                                    Kesehatan
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-top-agama" role="tabpanel">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered" style="text-align: center;">
                                            <thead>
                                                <tr class="table-success">
                                                    <th style="color:#111;">No</th>
                                                    <th style="color:#111;">Islam</th>
                                                    <th style="color:#111;">Kristen</th>
                                                    <th style="color:#111;">Katolik</th>
                                                    <th style="color:#111;">Hindu</th>
                                                    <th style="color:#111;">Budha</th>
                                                    <th style="color:#111;">Konghucu</th>
                                                    <th style="color:#111;">Bulan</th>
                                                    <th style="white-space: normal; color:#111;">Jumlah Orang</th>
                                                </tr>
                                            </thead>

                                            <tbody class="table-border-bottom-0">
                                                @foreach($agamas as $ag)
                                                <tr data-tahun="{{ \Carbon\Carbon::parse($ag->created_at)->year }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $ag->jumlah_islam }}</td>
                                                    <td>{{ $ag->jumlah_kristen }}</td>
                                                    <td>{{ $ag->jumlah_katolik }}</td>
                                                    <td>{{ $ag->jumlah_hindu }}</td>
                                                    <td>{{ $ag->jumlah_budha }}</td>
                                                    <td>{{ $ag->jumlah_konghucu }}</td>
                                                    <td>{{ $ag->bulan }}</td>
                                                    <td>{{ $ag->jumlah_islam + $ag->jumlah_kristen + $ag->jumlah_katolik + $ag->jumlah_hindu + $ag->jumlah_budha + $ag->jumlah_konghucu }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-border-bottom-0">
                                                <tr>
                                                    <th colspan="8">Jumlah Total</th>
                                                    <th>{{ $jumlahag }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-usia" role="tabpanel">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered" style="text-align: center;">
                                            <thead>
                                                <tr class="table-success">
                                                    <th style="color:#111;">No</th>
                                                    <th style="color:#111;">Rentang Usia</th>
                                                    <th style="color:#111;">Laki-Laki</th>
                                                    <th style="color:#111;">Perempuan</th>
                                                    <th style="color:#111;">Bulan</th>
                                                    <th style="color:#111;">Jumlah Orang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($usias as $uss)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $uss->kategori_usia }}</td>
                                                    <td>{{ $uss->jumlah_orang_laki }}</td>
                                                    <td>{{ $uss->jumlah_orang_perempuan }}</td>
                                                    <td>{{ $uss->bulan }}</td>
                                                    <td>{{ $uss->jumlah_total }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-border-bottom-0">
                                                <tr>
                                                    <th colspan="3">Jumlah Total</th>
                                                    <th>{{ $jumlahlk }}</th>
                                                    <th>{{ $jumlahpr }}</th>
                                                    <th>{{ $jumlahus }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-pekerjaan" role="tabpanel">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered" style="text-align: center;">
                                            <thead>
                                                <tr class="table-success">
                                                    <th style="color:#111;">No</th>
                                                    <th style="color:#111;">Petani</th>
                                                    <th style="color:#111;">Pegawai Swasta</th>
                                                    <th style="color:#111;">Pegawai Negeri Sipil</th>
                                                    <th style="color:#111;">Perdagangan</th>
                                                    <th style="color:#111;">Buruh Tani</th>
                                                    <th style="color:#111;">Buruh Pabrik</th>
                                                    <th style="color:#111;">Tukang Batu</th>
                                                    <th style="color:#111;">Jasa</th>
                                                    <th style="color:#111;">Perangkat Desa</th>
                                                    <th style="color:#111;">Tenaga Medis</th>
                                                    <th style="color:#111;">Tukang Kayu</th>
                                                    <th style="color:#111;">Tukang Jahir/Bordir</th>
                                                    <th style="color:#111;">TNI/Polri</th>
                                                    <th style="color:#111;">Lain-lain termasuk belum bekerja</th>
                                                    <th style="color:#111;">Bulan</th>
                                                    <th style="color:#111;">Jumlah Orang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pekerjaans as $pj)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pj->petani }}</td>
                                                    <td>{{ $pj->pegawai_swasta }}</td>
                                                    <td>{{ $pj->pegawai_negeri_sipil }}</td>
                                                    <td>{{ $pj->perdagangan }}</td>
                                                    <td>{{ $pj->buruh_tani }}</td>
                                                    <td>{{ $pj->buruh_pabrik }}</td>
                                                    <td>{{ $pj->tukang_batu }}</td>
                                                    <td>{{ $pj->jasa }}</td>
                                                    <td>{{ $pj->perangkat_desa }}</td>
                                                    <td>{{ $pj->tenaga_medis }}</td>
                                                    <td>{{ $pj->tukang_kayu }}</td>
                                                    <td>{{ $pj->tukang_jahir_bordir }}</td>
                                                    <td>{{ $pj->tni_polri }}</td>
                                                    <td>{{ $pj->lain_lain_termasuk_belum_bekerja }}</td>
                                                    <td>{{ $pj->bulan }}</td>
                                                    <td>{{ $pj->petani + $pj->pegawai_swasta + $pj->pegawai_negeri_sipil + $pj->perdagangan + $pj->buruh_tani 
                                                        + $pj->buruh_pabrik + $pj->tukang_batu + $pj->jasa + $pj->perangkat_desa + $pj->tenaga_medis + $pj->tukang_kayu 
                                                        + $pj->tukang_jahir_bordir + $pj->tni_polri + $pj->lain_lain_termasuk_belum_bekerja }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-border-bottom-0">
                                                <tr>
                                                    <th colspan="16">Jumlah Total</th>
                                                    <th>{{ $jumlahpj }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-pendidikan" role="tabpanel">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered" style="text-align: center;">
                                            <thead>
                                                <tr class="table-success">
                                                    <th style="color:#111;">No</th>
                                                    <th style="color:#111;">SD</th>
                                                    <th style="color:#111;">SMP</th>
                                                    <th style="color:#111;">SMA</th>
                                                    <th style="color:#111;">PT/Akademi</th>
                                                    <th style="color:#111;">Tidak Sekolah</th>
                                                    <th style="color:#111;">Bulan</th>
                                                    <th style="color:#111;">Jumlah Orang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pendidikans as $pd)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pd->sd }}</td>
                                                    <td>{{ $pd->smp }}</td>
                                                    <td>{{ $pd->sma }}</td>
                                                    <td>{{ $pd->pt_akademi }}</td>
                                                    <td>{{ $pd->tidak_sekolah }}</td>
                                                    <td>{{ $pd->bulan }}</td>
                                                    <td>{{ $pd->sd + $pd->smp + $pd->sma + $pd->pt_akademi + $pd->tidak_sekolah }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-border-bottom-0">
                                                <tr>
                                                    <th colspan="7">Jumlah Total</th>
                                                    <th>{{ $jumlahpd }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-kesehatan" role="tabpanel">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered" style="text-align: center;">
                                            <thead>
                                                <tr class="table-success">
                                                    <th style="color:#111;">No</th>
                                                    <th style="color:#111;">Jenis Kesehatan</th>
                                                    <th style="color:#111;">Bulan</th>
                                                    <th style="color:#111;">Jumlah Orang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kesehatans as $khs)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $khs->jenis_kesehatan }}</td>
                                                    <td>{{ $khs->bulan }}</td>
                                                    <td>{{ $khs->jumlah }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-border-bottom-0">
                                                <tr>
                                                    <th colspan="3">Jumlah Total</th>
                                                    <th>{{ $jumlahkh }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Mengatur event saat tombol tahun di klik
                $('.tahun-btn').click(function() {
                    var tahun = $(this).data('tahun');
                    var url = "{{ route('penduduk') }}" + "?tahun=" + tahun;
                    window.location.href = url;
                });

                // Memuat data potensi desa berdasarkan tahun saat halaman pertama kali dimuat
                loadData();

                function loadData() {
                    var tahun = "{{ $tahun }}";
                    $.ajax({
                        url: "{{ route('penduduk') }}",
                        method: 'GET',
                        data: { tahun: tahun },
                        success: function(response) {
                            // Mengisi data agama
                            var agamaData = response.agama;
                            // ...
                            // Kode untuk mengisi data pada elemen HTML yang sesuai

                            // Mengisi data usia
                            var usiaData = response.usia;
                            // ...
                            // Kode untuk mengisi data pada elemen HTML yang sesuai

                            // Mengisi data pekerjaan
                            var pekerjaanData = response.pekerjaan;
                            // ...
                            // Kode untuk mengisi data pada elemen HTML yang sesuai

                            // Mengisi data pendidikan
                            var pendidikanData = response.pendidikan;
                            // ...
                            // Kode untuk mengisi data pada elemen HTML yang sesuai

                            // Mengisi data kesehatan
                            var kesehatanData = response.kesehatan;
                            // ...
                            // Kode untuk mengisi data pada elemen HTML yang sesuai

                            // Mengisi jumlah total pada setiap kategori
                            var jumlahAgama = response.jumlahag;
                            // ...
                            // Kode untuk mengisi data pada elemen HTML yang sesuai

                            // ...
                            // Kode untuk mengisi data jumlah total pada kategori lainnya
                        }
                    });
                }
            });
        </script>
    </section>
</main>
@endsection
