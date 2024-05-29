<!DOCTYPE html>
<html>
<head>
    <title>Profil Desa Labanasem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin: 0;
        }

        .judul {
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .bab {
            font-size: 12px;
            margin-top: 12px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .content {
            margin-bottom: 20px;
            text-align: justify;
        }

        .content p {
            margin-bottom: 10px;
        }

        .list {
            margin-bottom: 20px;
        }

        .list p {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .list ol {
            margin-left: 10px;
            padding-left: 0;
        }

        .list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="title">
        <p class="judul">PROFIL DESA LABANASEM</p>
        <p class="judul">KECAMATAN KABAT KABUPATEN BANYUWANGI</p>
    </div>
    @foreach($profil_desa as $p)
    <div class="content">
        <p class="judul">Sejarah {{ $p->nama_desa }}</p>
        @foreach(explode("\n", strip_tags($p->sejarah)) as $paragraf)
            @if (trim($paragraf) !== '')
            <p>{{ $paragraf }}</p>
            @endif
        @endforeach
    </div>
    <div class="list">
        <p class="judul">Visi</p>
        <ol>
            @foreach(explode("\n", strip_tags($p->visi)) as $visi)
                @if (trim($visi) !== '')
                <li>{{ $visi }}</li>
                @endif
            @endforeach
        </ol>
    </div>
    <div class="list">
        <p class="judul">Misi</p>
        <ol>
            @foreach(explode("\n", strip_tags($p->misi)) as $misi)
                @if (trim($misi) !== '')
                <li>{{ $misi }}</li>
                @endif
            @endforeach
        </ol>
    </div>
    <div class="content">
        <p class="judul">Peta dan Letak Geografis {{ $p->nama_desa }}</p>
        <p>{{ $p->deskripsi_peta }}</p>
    </div>
    <div class="content">
        <p class="judul">Struktur Perangkat {{ $p->nama_desa }}</p>
    </div>
    @endforeach
</body>
</html>
