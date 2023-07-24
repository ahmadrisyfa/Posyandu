@extends('layouts.home_bidan')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Hadir Bayi & Balita</h1>
    </div>
</section>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-2">
            </div>
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('/bayibalita/daftarhadir/create') }}" class="btn btn-primary" title="Tambah">Tambah Data</a>
                <a href="{{ url('bayibalita/daftar_hadir') }}" target="_blank" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">   <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Posyandu</th>
                        <th>Bulan</th>
                        <th>Nama Ibu/Balita</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jadwal->tanggal_posyandu_bayibalita }}</td>
                        <td>{{ $item->jadwal->bulan }}</td>
                        <td>{{ $item->bayi->nama_ibu }}/{{ $item->bayi->nama_anak }}</td>

                        <td>  
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $result->withQueryString()->links('pagination::bootstrap-5') !!}
            
            </div>
            </div>
        </div>
    </div>
</main>

@endsection
