@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Identitas Bayi & Balita</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail / Identitas / <span class="color-primary">{{ $bayibalita->nama_anak }}</span></p>
            <div class="col-lg-4 mb-2">
                <a href="{{ url('bayibalita') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-lg-12">
                <div class="card shadow border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold color-primary">Informasi Pribadi</h6>
                    </div>
                    <div class="card-body">
                    <div class="row container-fluid">
                    {{-- <div class="col-lg-6">
                            <h5 class="fs-medium"><strong></strong></h5>
                            <p class="color-primary">XXXX</p>
                        </div> --}}
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>ID Anak</strong></h5>
                            <p class="color-primary">{{ $bayibalita->id_anak }}</p>
                        </div> 
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>NIK Anak</strong></h5>
                            <p class="color-primary">{{ $bayibalita->nik_anak }}</p>
                        </div> 
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>No KK</strong></h5>
                            <p class="color-primary">{{ $bayibalita->no_kk }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Nama Anak</strong></h5>
                            <p class="color-primary">{{ $bayibalita->nama_anak }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Jenis Kelamin</strong></h5>
                            <p class="color-primary">{{ $bayibalita->jk }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Tanggal Lahir</strong></h5>
                            <p class="color-primary">{{ $bayibalita->tgl_lahir }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Umur Anak</strong></h5>
                            <p class="color-primary">{{ \App\Http\Controllers\BayibalitaController::hitung_umur($bayibalita->tgl_lahir) }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Rentang Umur</strong></h5>
                            <p class="color-primary">{{ \App\Http\Controllers\BayibalitaController::rentang_umur($bayibalita->tgl_lahir) }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Nama Ayah</strong></h5>
                            <p class="color-primary">{{ $bayibalita->nama_ayah }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Nama Ibu</strong></h5>
                            <p class="color-primary">{{ $bayibalita->nama_ibu }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Alamat</strong></h5>
                            <p class="color-primary">{{ $bayibalita->alamat }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Status Buku KIA</strong></h5>
                            <p class="color-primary">{{ $bayibalita->kia }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Keterangan</strong></h5>
                            <p class="color-primary">{{ $bayibalita->ket }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
