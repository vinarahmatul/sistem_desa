<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelayanan Masyarakat Desa Labanasem</title>
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
            margin-top: 30px;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .left-align {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="title">
        <h3>DAFTAR PELAYANAN MASYARAKAT DESA LABANASEM</h3>
        <h3>KECAMATAN KABAT KABUPATEN BANYUWANGI</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pelayanan</th>
                <th>Persyaratan</th>
                <th>Langkah-langkah</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($layanan as $la)
            <tr>
                <td style="text-align:center;">{{ $loop->iteration }}</td>
                <td style="text-align:center; white-space: normal;">{{ $la->jenis_pelayanan }}</td>
                <td class="left-align" style="word-wrap: break-word;">
                    <ol>
                        @foreach(explode("\n", strip_tags($la->syarat_pelayanan)) as $syarat)
                            @if (trim($syarat) !== '')
                                <li style="white-space: pre-line;">{{ $syarat }}</li>
                            @endif
                        @endforeach
                    </ol>
                </td>
                <td class="left-align" style="word-wrap: break-word;">
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
</body>
</html>
