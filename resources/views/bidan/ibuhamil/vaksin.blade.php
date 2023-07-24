@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Vaksin</h1>
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
            </div>
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('vaksin_ibu/create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                     <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Vaksin</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_vaksin }}</td>
                        <td>{{ $item->ket }}</td>
                        <td>
                        <a href="{{route ('vaksinibu.edit', $item->id_vaksin) }}" 
                        onclick="javascript:return confirm(`Data ingin diubah ?`);" title="Edit">
                        <b>Edit</b> 
                        </a> |
                            <form action="{{ route('vaksinibu.destroy', $item->id_vaksin)}}" method="POST"
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
</body>
@endsection
