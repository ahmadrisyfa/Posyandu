@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Persediaan Obat</h1>
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
            <p class="mb-3">Obat / <a href="{{ url('obat/master') }}" >Data Obat</a></p>
            </div>
            <div class="col-lg-8 text-end mb-2">
               <a href="{{ url('obat/create') }}" class="btn btn-primary" title="Tambah">Tambah Data</a>
               <a href="{{ url('obat/pdf') }}" target="_blank" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                   <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Sisa Obat</th>
                        <th>Tanggal Expired Date</th>
                        <th>Status Obat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->jenis_obat }}</td>
                        <td>{{ $item->sisa_obat }}</td>
                        <td>{{ $item->tgl_ed }}</td>
                        <td>{{ \App\Http\Controllers\ObatController::status($item->tgl_ed) }}</td>
                        <td>
                        <a href="{{route ('obat.edit', $item->id_obat) }}" 
                        onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                        <b>Edit</b> 
                        </a> |
                            <form action="{{ route('obat.destroy', $item->id_obat)}}" method="POST"
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
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
@endsection
