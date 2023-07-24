@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Detail Data Pemeriksaan</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail / Pemeriksaan Ibu Hamil/ <span class="color-primary">{{ $pemeriksaan_ibu->ibuhamil->nama_ibu }}</span></p>
            <div class="col-lg-4 mb-2">
                <a href="{{ url('ibuhamil/pemeriksaan') }}" class="btn btn-primary">Kembali</a>
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
                            <h5 class="fs-medium"><strong>ID Pemeriksaan Ibu Hamil</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->id_periksa }}</p>
                        </div> 
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>ID Daftar Hadir Ibu Hamil</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->daftarhadiribu->id_dhi }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>ID Ibu Hamil</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->ibuhamil->id_ibu }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Tanggal Pemeriksaan</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->jadwal->tanggal_posyandu_ibuhamil }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Nama Ibu Hamil</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->ibuhamil->nama_ibu }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Tanggal Lahir</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->ibuhamil->tgl_lahir }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Umur Ibu Hamil</strong></h5>
                            <p class="color-primary">{{ \App\Http\Controllers\IbuhamilController::hitung_umur($pemeriksaan_ibu->ibuhamil->tgl_lahir) }}</p>
                        </div><div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Umur Kehamilan</strong></h5>
                            <p class="color-primary">{{ \App\Http\Controllers\IbuhamilController::hitung_usiakehamilan($pemeriksaan_ibu->ibuhamil->hpht) }}</p>
                        </div><div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Rentang Umur Kehamilan</strong></h5>
                            <p class="color-primary">{{ \App\Http\Controllers\IbuhamilController::rentang_kehamilan($pemeriksaan_ibu->ibuhamil->hpht) }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Berat Badan</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->berat_badan }} Kg</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Tinggi Badan</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->tinggi_badan }} CM</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Lila/IMT-</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->lila_imt }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Hb/Gol.Darah</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->hb_goldarah }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Tensi Darah</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->tensi }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Status Imunisasi</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->vaksin->nama_vaksin }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="fs-medium"><strong>Keterangan</strong></h5>
                            <p class="color-primary">{{ $pemeriksaan_ibu->ket }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
