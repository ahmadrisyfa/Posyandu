@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Identitas Bayi & Balita</h1>
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
                <a href="{{ url('bayibalita/create') }}" class="btn btn-primary" title="Tambah">Tambah Data</a>
                <a href="{{ url('bayibalita/identitas') }}" target="_blank" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Anak</th>
                        <th>Nama Anak</th>
                        <th>Umur Anak</th>
                        <th>Rentang Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik_anak }}</td>
                        <td>{{ $item->nama_anak }}</td>
                        <td>{{ \App\Http\Controllers\BayibalitaController::hitung_umur($item->tgl_lahir) }}</td>
                        <td>{{ \App\Http\Controllers\BayibalitaController::rentang_umur($item->tgl_lahir) }}</td>
                        <td>{{ $item->jk }}</td>
                        <td>{{ $item->alamat }}</td>

                        <td>
                        
                            <a href="{{route ('bidanbayibalita.detail', $item->id_anak) }}" title="Detail">
                            <b>Detail</b> 
                            </a> |
                            <a href="{{route ('bidanbayibalita.edit', $item->id_anak) }}"
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
