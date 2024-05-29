<!DOCTYPE html>
<html>
<head>
    <title>Data Penduduk Berdasarkan Usia Tahun {{ $tahun }}</title>
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
        <h3>DATA PENDUDUK BERDASARKAN USIA</h3>
        <h3>DESA LABANASEM KECAMATAN KABAT KABUPATEN BANYUWANGI</h3>
        <h4>TAHUN {{ $tahun }}</h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Rentang Usia</th>
                <th>Laki-Laki</th>
                <th>Perempuan</th>
                <th style="white-space: normal;">Jumlah Orang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dapenduk_usia as $us)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $us->bulan }}</td>
                    <td>{{ $us->kategori_usia }}</td>
                    <td>{{ $us->jumlah_orang_laki }}</td>
                    <td>{{ $us->jumlah_orang_perempuan }}</td>
                    <td>{{ $us->jumlah_total }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="table-border-bottom-0">
            <tr>
                <th colspan="3">Jumlah Total</th>
                <th>{{ $laki_laki }} Orang</th>
                <th>{{ $perempuan }} Orang</th>
                <th>{{ $jumlah_penduduk }} Orang</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
