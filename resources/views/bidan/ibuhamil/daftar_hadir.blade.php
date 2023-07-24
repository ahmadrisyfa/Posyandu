@extends('layouts.home_bidan')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Hadir Ibu Hamil</h1>
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
            <div class="form-group row">
                <label for="tanggal_posyandu_ibuhamil" class="col-sm-2 col-form-label">Tanggal Posyandu</label>
                <div class="col-sm-4">
                    <form method="POST" action="{{ url('ibuhamil/cetak-data-daftar_hadiribu') }}" target="_blank">
                        @csrf
                        <select name="tanggal_posyandu_ibuhamil" id="tanggal_posyandu_ibuhamil" class="form-select">
                            <option disable value="" style="text-align: center">-- Belum Diisi --</option>
                            @foreach ( $jadwal as $item)
                            <option value="{{ $item->tanggal_posyandu_ibuhamil}}">{{ $item->tanggal_posyandu_ibuhamil}}
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
                    <form method="POST" action="{{ url('ibuhamil/cetak-data-daftar_hadiribu-tahun') }}" target="_blank">
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
                    <form method="POST" action="{{ url('ibuhamil/cetak-data-daftar_hadiribu-bulan') }}" target="_blank">
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
                <a href="{{ url('ibuhamil/daftar_hadiribu/create') }}" class="btn btn-primary" title="Tambah">Tambah
                    Data</a>
                <a href="{{ url('ibuhamil/daftar_hadiribu_pdf') }}" target="_blank" class="btn btn-primary">Cetak
                    PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ibu Hamil</th>
                            <th>Tanggal Posyandu</th>
                            <th>Status Kehadiran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->ibu->nama_ibu }}</td>
                            <td>{{ $item->jadwal->tanggal_posyandu_ibuhamil}}</td>
                            <td>{{ $item->status }}</td>

                            <td>
                                <a href="{{route ('daftar_hadiribu.edit', $item->id_dhi) }}"
                                    onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                                    <b>Edit</b>
                                </a> |
                                <form action="{{ route('daftar_hadiribu.destroy', $item->id_dhi)}}" method="POST"
                                    onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Hapus">
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
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

@endsection