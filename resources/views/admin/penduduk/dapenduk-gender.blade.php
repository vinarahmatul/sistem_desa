@extends('layout.main')

@section('content')

<div class="card" style="margin-top: 70px;">
    <div class="card-body">
        <table class="table table-bordered table-responsive" style="text-align:center;">

            <a href="/Tambah-Data-Jenis-Kelamin" class="btn btn-sm me-2" style="background-color: #75ACFF; margin-bottom: 20px; color:white;">
            <i class="bi bi-file-earmark-plus-fill"></i> Tambah Data </a>
            <a href="/Data-Penduduk" class="btn btn-sm" style="background-color: #E30202; margin-bottom: 20px; color:white;">
            <i class="bi bi-backspace-fill"></i> Kembali </a>

                <tr style="font-weight: bold; background-color: #9F3434; color:white;">
                    <th scope="col">No</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Jumlah Orang</th>
                    <th scope="col">Aksi</th>
                </tr>
                <tbody>

                @foreach($jenisKelamin as $jk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jk->jenis_kelamin }}</td>
                    <td>{{ $jk->jumlah }}</td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>
</div>
@endsection