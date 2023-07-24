@extends('layouts.home_kader')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Identitas Ibu Hamil</h1>
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
                <a href="{{ url('kader/ibuhamil/create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                    <tr>
                            <th>No</th>
                            <th>ID Ibu Hamil</th>
                            <th>NIK Ibu Hamil</th>
                            <th>Nama Ibu Hamil</th>
                            <th>Nama Suami</th>
                            <th>Alamat</th>
                            <th>Status buku KIA </th>
                            <th>Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($result as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id_ibu }}</td>
                            <td>{{ $item->nik_ibu }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->nama_suami }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kia }}</td>
                        <td>
                            <a href="{{route ('kaderibuhamil.detail', $item->id_ibu) }}">
                            <b>Detail</b> 
                            </a> |
                            <a href="{{route ('kaderibuhamil.edit', $item->id_ibu) }}"
                            onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                            <b>Edit</b> 
                            </a> |
                            <form action="{{ route('kaderibuhamil.destroy', $item->id_ibu)}}" method="POST"
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
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection
