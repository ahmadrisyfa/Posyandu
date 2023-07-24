@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Identitas Ibu Hamil</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail / Identitas / <span class="color-primary">{{ $ibuhamil->nama_ibu }}</span></p>
            <div class="col-lg-4 mb-2">
                <a href="{{ url('ibuhamil') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-lg-12">
                <div class="card shadow border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold color-primary">Informasi Pribadi</h6>
                    </div>
                    <div class="card-body">
                    <div class="row container-fluid">
                    {{-- <div class="col-lg-6">
                            <h5 class="fs-medium"><strong>ID Bayi</strong></h5>
                            <p class="color-primary">XXXX</p>
                        </div> --}}
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>ID Ibu Hamil</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->id_ibu }}</p>
                        </div> 
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>NIK Ibu Hamil</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->nik_ibu }}</p>
                        </div> 
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>No KK</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->no_kk }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Nama Ibu hamil</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->nama_ibu }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Tanggal Lahir</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->tgl_lahir }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Umur Ibu Hamil</strong></h5>
                            <p class="color-primary"><td>{{ \App\Http\Controllers\IbuhamilController::hitung_umur($ibuhamil->tgl_lahir) }}</td></p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Hamil ke-</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->hamil_ke }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Hari </strong></h5>
                            <p class="color-primary">{{ $ibuhamil->hpht }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Nama Suami</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->nama_suami }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Alamat</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->alamat }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Status Buku KIA</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->kia }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Keterangan</strong></h5>
                            <p class="color-primary">{{ $ibuhamil->ket }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
