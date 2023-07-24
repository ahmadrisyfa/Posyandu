@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Identitas Ibu Hamil</h1>
    </div>
</section>
<main>
    <div class="container">
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="col-lg-4 mb-2">
            </div>
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('ibuhamil/create') }}" class="btn btn-primary">Tambah Data</a>
                <a href="{{ url('ibuhamil/identitas') }}" target="_blank" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                     <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Ibu Hamil</th>
                        <th>Nama Ibu Hamil</th>
                        <th>Usia Ibu Hamil</th>
                        <th>Usia Kehamilan</th>
                        <th>Rentang Usia Kehamilan</th>
                        <th>Nama Suami</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik_ibu }}</td>
                        <td>{{ $item->nama_ibu }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::hitung_umur($item->tgl_lahir) }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::hitung_usiakehamilan($item->hpht) }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::rentang_kehamilan($item->hpht) }}</td>
                        <td>{{ $item->nama_suami }}</td>
                        <td>{{ $item->alamat }}</td>

                        <td>
                            <a href="{{route ('bidanibuhamil.detail', $item->id_ibu) }}">
                            <b>Detail</b> 
                            </a> |
                            <a href="{{route ('bidanibuhamil.edit', $item->id_ibu) }}"
                            onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                            <b>Edit</b> 
                            </a>   
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $result->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection
