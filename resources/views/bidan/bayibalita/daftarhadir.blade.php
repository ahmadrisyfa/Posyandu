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
            <div class="form-group row">
                <label for="tanggal_posyandu_bayibalita" class="col-sm-2 col-form-label">Tanggal Posyandu</label>
                <div class="col-sm-4">
                    <form method="POST" action="{{ url('bayibalita/cetak-data-daftarhadir') }}" target="_blank">
                        @csrf
                        <select name="tanggal_posyandu_bayibalita" id="tanggal_posyandu_bayibalita" class="form-select">
                            <option disable value="" style="text-align: center">-- Belum Diisi --</option>
                            @foreach ( $jadwal as $item)
                            <option value="{{ $item->tanggal_posyandu_bayibalita}}">
                                {{ $item->tanggal_posyandu_bayibalita}}
                            </option>
                            @endforeach
                        </select>
                </div>
                <button type="submit" class="col-sm-2 btn btn-primary" title="Cetak"><b>Cetak PDF</b></button>
                </form>
            </div>
            <div class="form-group row">
                <label for="tanggal_posyandu_ibuhamil" class="col-sm-2 col-form-label">Tahun Posyandu</label>

                <div class="col-sm-4">
                    <form method="POST" action="{{ url('bayibalita/cetak-data-daftarhadir-tahun') }}" target="_blank">
                        @csrf
                        <select name="tahun" id="tahun" class="form-select">
                            <option disable value="" style="text-align: center">-- Belum Diisi --</option>
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @foreach ( $jadwal as $item)
                            <option value="{{ Carbon::parse($item->tanggal_posyandu_bayibalita)->format('Y') }}">
                                {{ Carbon::parse($item->tanggal_posyandu_bayibalita)->format('Y') }}
                            </option>
                            @endforeach
                        </select>
                </div>
                <button type="submit" class="col-sm-2 btn btn-primary" title="Cetak"><b>Cetak PDF</b></button>
                </form>
            </div>
            <div class="form-group row">
                <label for="tanggal_posyandu_ibuhamil" class="col-sm-2 col-form-label">Bulan Posyandu</label>

                <div class="col-sm-4">
                    <form method="POST" action="{{ url('bayibalita/cetak-data-daftarhadir-bulan') }}" target="_blank">
                        @csrf
                        <select name="bulan" id="bulan" class="form-select">
                            <option disable value="" style="text-align: center">-- Belum Diisi --</option>
                           
                            @foreach ( $jadwal as $item)
                            <option value="{{ Carbon::parse($item->tanggal_posyandu_bayibalita)->format('m') }}">
                                {{ Carbon::parse($item->tanggal_posyandu_bayibalita)->format('m') }}
                            </option>
                            @endforeach
                        </select>
                </div>
                <button type="submit" class="col-sm-2 btn btn-primary" title="Cetak"><b>Cetak PDF</b></button>
                </form>
            </div>
            <div class="col-lg-4 mb-2">
            </div>
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('/bayibalita/daftarhadir/create') }}" class="btn btn-primary" title="Tambah">Tambah
                    Data</a>
                <a href="{{ url('bayibalita/daftar_hadir') }}" target="_blank" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Posyandu</th>
                            <th>Bulan</th>
                            <th>Nama Ibu/Balita</th>
                            <th>Status Kehadiran </th>
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
                            <td>{{ $item->status }}</td>

                            <td>
                                <a href="{{route ('bidan.daftarhadir_edit', $item->id_dha) }}" onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                                    <b>Edit</b>
                                </a> |
                                <form action="{{ route('bidan.daftarhadir_destroy', $item->id_dha)}}" method="POST" onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Hapus">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Hapus" />
                                </form>
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