@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Stock Opname Obat</h1>
    </div>
</section>
<main>
    <div class="container">
       <div>
            <h5>Data Obat Keluar</h5>
        </div>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="col-lg-4 mb-2">
            <p class="mb-3">Obat / <a href="{{ url('obat') }}">Persediaan Obat</a>/<a href="{{ url('obatkeluar') }}" >Obat Keluar</a></p>
            </div>
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('obatkeluar/create') }}" class="btn btn-primary" title="Tambah">Tambah Data</a>
                <a href="#" target="_blank" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Obat</th>
                        <th>Tanggal Keluar Obat</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->obatkeluar->nama_obat }}</td>
                        <td>{{ $item->tgl_keluar }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->ket }}</td>
                        <td>
                        <a href="{{route ('obatkeluar.edit', $item->id_OK) }}"
                        onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                        <b>Edit</b> 
                        </a> |
                            <form action="{{ route('obatkeluar.destroy', $item->id_OK)}}" method="POST"
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
            </div>
            <div class="col-lg-4 mb-2">
                
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection