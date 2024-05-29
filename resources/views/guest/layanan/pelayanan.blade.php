@extends('guest.layout.main')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="title-about mb-4 mt-3">
                <div style="text-align: center;">
                    <img src="../images/tulisan/pelayanan.png" alt="desa" style="max-width: 100%; height: 50px;">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-bordered" style="color:black;">
                            <thead>
                            <tr>
                                <th style="text-align:center; font-weight:bold;">No</th>
                                <th style="text-align:center; font-weight:bold;">Jenis</th>
                                <th style="text-align:center; font-weight:bold;">Persyaratan</th>
                                <th style="text-align:center; font-weight:bold;">Langkah-langkah</th>
                                <th style="text-align:center; font-weight:bold;">Petugas</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($layanans as $la)
                                <tr>
                                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                                    <td style="text-align:center; white-space: normal;">{{ $la->jenis_pelayanan }}</td>
                                    <td style="word-wrap: break-word;">
                                        <ol>
                                            @foreach(explode("\n", strip_tags($la->syarat_pelayanan)) as $syarat)
                                                @if (trim($syarat) !== '')
                                                    <li style="white-space: pre-line;">{{ $syarat }}</li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td style="word-wrap: break-word;">
                                        <ol>
                                            @foreach(explode("\n", strip_tags($la->langkah_pelayanan)) as $langkah)
                                                @if (trim($langkah) !== '')
                                                    <li style="white-space: pre-line;">{{ $langkah }}</li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td style="text-align:center;">{{ $la->petugas_pelayanan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection