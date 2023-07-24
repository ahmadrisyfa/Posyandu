@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Pemeriksaan Ibu Hamil</h1>
    </div>
</section>
<main>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bulan dan Tahun</label>
            <div class="col-sm-2">
                <input type="month" class="form-control" name="date" value="{{ old('date') }}">
            </div>
    </div>
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
                <a href="{{ url('/ibuhamil/pemeriksaan/create') }}" class="btn btn-primary" title="Tambah">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Posyandu</th>
                        <th>Nama Ibu Hamil</th>
                        <th>Usia Ibu Hamil</th>
                        <th>Usia Kehamilan</th>
                        <th>Rentang Usia Kehamilan</th>
                        <th>Berat Badan(KG) </th>
                        <th>Tinggi Badan(CM)</th>
                        <th>Status Imunisasi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_posyandu_ibuhamil}}</td>
                        <td>{{ $item->ibuhamil->nama_ibu }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::hitung_umur($item->ibuhamil->tgl_lahir) }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::hitung_usiakehamilan($item->ibuhamil->hpht) }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::rentang_kehamilan($item->ibuhamil->hpht) }}</td>
                        <td>{{ $item->berat_badan }}</td>
                        <td>{{ $item->tinggi_badan }}</td>
                        <td>{{ $item->vaksin->nama_vaksin }}</td>

                        <td>
                            <a href="{{route ('bidan.pemeriksaan_detail', $item->id_periksa) }}" title="Detail">
                            <b>Detail</b> 
                            </a> |
                            <a href="{{route ('bidan.pemeriksaan_edit', $item->id_periksa) }}"
                            onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                            <b>Edit</b> 
                            </a> |
                            <form action="{{ route('bidan.pemeriksaan_destroy', $item->id_periksa)}}" method="POST"
                            onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Hapus">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Hapus"/>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection
