<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai Desa Labanasem Tahun {{ $tahun }}</title>
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
        <h3>NAMA-NAMA STRUKTUR ORGANISASI DAN TATA KERJA</h3>
        <h3>PEMERINTAHAN DESA LABANASEM KECAMATAN KABAT</h3>
        <h4>KABUPATEN BANYUWANGI TAHUN {{ $tahun }}</h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pegawai as $dp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td style="white-space: normal;">
                    {!! nl2br($dp->nama_pegawai) !!}
                </td>
                <td>
                    {!! nl2br($dp->jabatan) !!}
                </td>
                <td style="white-space: normal;">
                    {!! nl2br($dp->alamat) !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
