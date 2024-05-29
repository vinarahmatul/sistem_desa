<!DOCTYPE html>
<html>
<head>
    <title>Data Penduduk Berdasarkan Pekerjaan Tahun {{ $tahun }}</title>
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
        <h3>DATA PENDUDUK BERDASARKAN PEKERJAAN</h3>
        <h3>DESA LABANASEM KECAMATAN KABAT KABUPATEN BANYUWANGI</h3>
        <h4>TAHUN {{ $tahun }}</h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Petani</th>
                <th style="white-space: normal;">Pegawai Swasta</th>
                <th style="white-space: normal;">Pegawai Negeri Sipil</th>
                <th>Perdagangan</th>
                <th style="white-space: normal;">Buruh Tani</th>
                <th style="white-space: normal;">Buruh Pabrik</th>
                <th style="white-space: normal;">Tukang Batu</th>
                <th>Jasa</th>
                <th style="white-space: normal;">Perangkat Desa</th>
                <th style="white-space: normal;">Tenaga Medis</th>
                <th style="white-space: normal;">Tukang Kayu</th>
                <th style="white-space: normal;">Tukang Jahir/Bordir</th>
                <th>TNI/Polri</th>
                <th style="white-space: normal;">Lain-lain termasuk belum bekerja</th>
                <th>Jumlah Orang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dapenduk_pekerjaan as $pj)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <span class="badge badge-{{ strtolower($pj->bulan) }}">
                            {{ $pj->bulan }}
                        </span>
                    </td>
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
                    <td>
                        {{ $pj->petani + $pj->pegawai_swasta + $pj->pegawai_negeri_sipil + $pj->perdagangan + $pj->buruh_tani 
                        + $pj->buruh_pabrik + $pj->tukang_batu + $pj->jasa + $pj->perangkat_desa + $pj->tenaga_medis + $pj->tukang_kayu 
                        + $pj->tukang_jahir_bordir + $pj->tni_polri + $pj->lain_lain_termasuk_belum_bekerja }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="table-border-bottom-0">
            <tr>
                <th colspan="16">Jumlah Total</th>
                <th>{{ $jumlah }} Orang</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
