@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Penimbangan Bayi & Balita</h1>
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
                <a href="{{ url('bayibalita/penimbangan/create') }}" class="btn btn-primary" title="Tambah">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">   <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Posyandu</th>
                        <th>Bulan </th>
                        <th>Nama Anak </th>
                        <th>Jenis kelamin</th>
                        <th>Umur Anak(bulan) </th>
                        <th>Rentang umur </th>
                        <th>Berat Badan(KG) </th>
                        <th>ST </th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_posyandu_bayibalita}}</td>
                        <td>{{ $item->jadwal->bulan}}</td>
                        <td>{{ $item->bayibalita->nama_anak}}</td>
                        <td>{{ $item->jk }}</td>
                        <td>{{ \App\Http\Controllers\BayibalitaController::umur_bulan($item->bayibalita->tgl_lahir) }}</td>
                        <td>{{ \App\Http\Controllers\BayibalitaController::rentang_umur($item->bayibalita->tgl_lahir) }}</td>
                        <td>{{ $item->berat_badan }}</td>
                        <td>{{ $item->st }}</td>

                        <td>
                            <a href="{{route ('bidan.penimbangan_detail', $item->id_timbang) }}" title="Detail">
                            <b>Detail</b> 
                            </a> |
                            <a href="{{route ('bidan.penimbangan_edit', $item->id_timbang) }}"
                            onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                            <b>Edit</b> 
                            </a> |
                            <form action="{{ route('bidan.penimbangan_destroy', $item->id_timbang)}}" method="POST"
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
