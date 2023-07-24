@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Daftar Hadir Bayi & Balita</h1>
    </div>
</section>
<main>
    <div class="container">
    <p class="mb-3">Detail/<span class="color-primary">Edit Data</span></p>
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold color-primary">Daftar Hadir</h6>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ !empty ($daftar_hadirbayi) ? route ('bidan.daftarhadir_update', $daftar_hadirbayi) : url('bayibalita/daftarhadir/create') }}" 
                method="POST" enctype="">
                @if(!empty ($daftar_hadirbayi))
                    @method('PATCH')
                @endif   
                @csrf
                <div class="row">
                <div class="col-xl-6 mr-auto">
                    <div class="form-group">
                        <label for="id_jadwal">Tanggal Posyandu</label>
                            <select name="id_jadwal" id="id_jadwal" class="form-control">
                                <option value= "{{ $daftar_hadirbayi->id_jadwal}}">{{ $daftar_hadirbayi->jadwal->tanggal_posyandu_bayibalita}}</option>
                                @foreach ( $jadwal as $item)
                                <option value= "{{ $item->id_jadwal}}">{{ $item->tanggal_posyandu_bayibalita}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_jadwal') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="id_anak">Nama Anak</label>
                            <select name="id_anak" id="id_anak" class="form-control">
                                <option value= "{{ $daftar_hadirbayi->id_anak}}">{{ $daftar_hadirbayi->bayi->nama_anak}}/{{ $daftar_hadirbayi->bayi->nama_ibu}}</option>
                                @foreach ( $bayibalita as $item)
                                <option value= "{{ $item->id_anak}}">{{ $item->nama_anak}}/{{ $item->nama_ibu}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_anak') }}
                                </div>
                            @endif
                    </div>

                    </div>
                    <div class="col-xl-6 ml-auto">

                    <div class="form-group">
                        <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option @selected(old('status', @$daftar_hadirbayi->status)== '') value="">- Belum Diisi -</option>
                                <option @selected(old('status', @$daftar_hadirbayi->status)== 'Hadir') value="Hadir">Hadir</option>
                                <option @selected(old('status', @$daftar_hadirbayi->status)== 'TidakHadir') value="TidakHadir">TidakHadir</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('status') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                            <input value="{{ old('ket', @$daftar_hadirbayi->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('ket') }}
                                </div>
                            @endif
                        </div>
                    </div>
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('bayibalita/daftarhadir') }}" class="btn btn-primary">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection