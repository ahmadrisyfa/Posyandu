@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Detail Data Penimbangan Anak</h1>
    </div>
</section>
<main>
    <div class="container">
    <p class="mb-3">Detail / Penimbangan / <span class="color-primary">{{ $penimbangan_anak->bayibalita->nama_anak }}</span></p>
        <div class="col-lg-4 mb-2">
            <a href="{{ url('bayibalita/penimbangan') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
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
                            <h5 class="fs-medium"><strong>Tanggal Penimbangan</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->tanggal_posyandu_bayibalita }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Penimbangan Bulan</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->jadwal->bulan }}</p>
                        </div>
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>ID Penimbangan</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->id_timbang }}</p>
                        </div> 
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>ID Daftar Hadir Anak</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->id_dha }}</p>
                        </div> 
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>ID Anak</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->id_anak }}</p>
                        </div> 
                        <div class="col-lg-4"> 
                            <h5 class="fs-medium"><strong>Nama Anak</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->bayibalita->nama_anak }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Jenis Kelamin</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->jk }}</p>
                        </div> 
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Umur Anak</strong></h5>
                            <p class="color-primary">{{ \App\Http\Controllers\BayibalitaController::hitung_umur($penimbangan_anak->bayibalita->tgl_lahir) }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Rentang Umur</strong></h5>
                            <td>{{ \App\Http\Controllers\BayibalitaController::rentang_umur($penimbangan_anak->bayibalita->tgl_lahir) }}</td>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Berat Badan</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->berat_badan }} Kg</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Status Penimbangan</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->st }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Status Imunisasi</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->vaksin->nama_vaksin }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Keterangan</strong></h5>
                            <p class="color-primary">{{ $penimbangan_anak->ket }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection