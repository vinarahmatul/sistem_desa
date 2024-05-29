<!DOCTYPE html>
<html>
<head>
    <title>Berita Acara Desa Labanasem Tahun {{ $tahun }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .title {
            text-align: center;
        }

        h2, h3 {
            margin: 0;
        }

        h2 {
            font-size: 24px;
        }

        h3 {
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="title">
        <h3>BERITA ACARA DESA LABANASEM</h3>
        <h3>KECAMATAN KABAT KABUPATEN BANYUWANGI</h3>
        <h4>TAHUN {{ $tahun }}</h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Berita</th>
                <th>Dokumen Berita</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $ba)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="white-space: normal;">
                        {!! nl2br($ba['berita']->judul_berita) !!}
                    </td>
                    <td style="word-wrap: break-word; max-width: 200px;">
                        {{ basename($ba['file']) }}
                    </td>
                    <td>{{ $ba['berita']->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
