@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Stock Opname Obat</h1>
    </div>
</section>
<main>
    <div class="container">
    <p class="mb-3">Obat / <a href="{{ url('obat') }}">Persediaan Obat</a>/<a href="{{ url('stockopname') }}" >Stock Opname Obat</a></p>
        <div>
            <h4>Data Obat Masuk</h4>
        </div>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('obatmasuk') }}" class="btn btn-primary" title="obat"> Obat Masuk</a>
                <a href="{{ url('obatkeluar') }}" class="btn btn-primary" title="obat"> Obat Keluar</a>
                <a href="#" target="_blank" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Obat</th>
                        <th>Sisa Obat</th>
                        <th>Tanggal Masuk Obat</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->obatmasuk->nama_obat }}</td>
                        <td>{{ $item->obatmasuk->sisa_obat }}</td>
                        <td>{{ $item->tgl_masuk }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                        <a href="#"
                        onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                        <b>Edit</b> 
                        </a> |
                            <form action="#" method="POST"
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