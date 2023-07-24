@extends('layouts.home_kader')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Daftar Hadir Bayi & Balita</h1>
    </div>
</section>
<main style="margin-top: 70px">
    <div class="container">
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="col-lg-4 mb-2">
                <form action="" method="GET" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Cari" value="{{ @$q }}">
                    </div>
                </form>
            </div>
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('/kader/daftar_hadirbayi/create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Daftar</th>
                        <th>Tanggal Posyandu</th>
                        <th>Nama Anak</th>
                        <th>Nama Ibu</th>
                        <th>Status Kehadiran </th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id_dha }}</td>
                        <td>{{ $item->tgl }}</td>
                        <td>{{ $item->nama_anak }}</td>
                        <td>{{ $item->nama_ibu }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->ket }}</td>

                        <td>
                        <a href="{{route ('kader_daftar_hadirbayi.edit', $item->id_dha) }}"
                        onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                        <b>Edit</b> 
                        </a> |
                            <form action="{{ route('kader_daftar_hadirbayi.destroy', $item->id_dha)}}" method="POST"
                            onclick="javascript:return confirm(`Data ingin dihapus ?`);" title="Delete">
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
