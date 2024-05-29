<!DOCTYPE html>
<html>
<head>
    <title>Data Penduduk Berdasarkan Agama Tahun {{ $tahun }}</title>
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
        <h3>DATA PENDUDUK BERDASARKAN AGAMA</h3>
        <h3>DESA LABANASEM KECAMATAN KABAT KABUPATEN BANYUWANGI</h3>
        <h4>TAHUN {{ $tahun }}</h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Islam</th>
                <th>Kristen</th>
                <th>Katolik</th>
                <th>Hindu</th>
                <th>Budha</th>
                <th>Konghucu</th>
                <th>Jumlah Orang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dapenduk_agama as $ag)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ag->bulan }}</td>
                <td>{{ $ag->jumlah_islam }}</td>
                <td>{{ $ag->jumlah_kristen }}</td>
                <td>{{ $ag->jumlah_katolik }}</td>
                <td>{{ $ag->jumlah_hindu }}</td>
                <td>{{ $ag->jumlah_budha }}</td>
                <td>{{ $ag->jumlah_konghucu }}</td>
                <td>{{ $ag->jumlah_islam + $ag->jumlah_kristen + $ag->jumlah_katolik + $ag->jumlah_hindu + $ag->jumlah_budha + $ag->jumlah_konghucu }} Orang</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="table-border-bottom-0">
            <tr>
                <th colspan="8">Jumlah Total</th>
                <th>{{ $jumlah }} Orang</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
