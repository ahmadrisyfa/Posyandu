@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Obat</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Data Obat/<span class="color-primary">Tambah</span></p>
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold color-primary">Data Obat</h6>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ !empty ($obat) ? route ('obat.update', $obat) : url('obat/create') }}" 
                method="POST" enctype="">
                @if(!empty ($obat))
                    @method('PATCH')
                @endif   
                @csrf
                <div class="row">
                <div class="col-xl-6 mr-auto">
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                            <input value="{{ old('nama_obat', @$obat->nama_obat) }}" type="text" class="form-control" name="nama_obat" id="nama_obat" placeholder="Nama Obat">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nama_obat') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="jenis_obat">Jenis Obat</label>
                            <select name="jenis_obat" id="jenis_obat" class="form-control">
                                <option @selected(old('jenis_obat', @$obat->jenis_obat)== '') value="">- Pilih Jenis Obat -</option>
                                <option @selected(old('jenis_obat', @$obat->jenis_obat)== 'Tablet') value="Tablet">Tablet</option>
                                <option @selected(old('jenis_obat', @$obat->jenis_obat)== 'Salep') value="Salep">Salep</option>
                                <option @selected(old('jenis_obat', @$obat->jenis_obat)== 'Tetes') value="Tetes">Tetes</option>
                                <option @selected(old('jenis_obat', @$obat->jenis_obat)== 'Sirup') value="Sirup">Sirup</option>
                                <option @selected(old('jenis_obat', @$obat->jenis_obat)== 'Inject') value="Inject">Inject</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('jenis_obat') }}
                                </div>
                            @endif
                    </div>

                    </div>
                    <div class="col-xl-6 ml-auto">

                    <div class="form-group">
                        <label for="sisa_obat">Sisa Obat</label>
                            <input value="{{ old('sisa_obat', @$obat->sisa_obat) }}" type="number" class="form-control" name="sisa_obat" id="sisa_obat" placeholder="Sisa Obat">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('sisa_obat') }}
                                </div>
                            @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="tgl_ed">Tanggal Expired Date</label>
                            <input value="{{ old('tgl_ed', @$obat->tgl_ed) }}" type="date" class="form-control" name="tgl_ed" id="tgl_ed" placeholder="Tanggal Expired Date">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tgl_ed') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option @selected(old('status', @$obat->status)== '') value="">- Pilih Status Obat -</option>
                                <option @selected(old('status', @$obat->status)== 'Tersedia') value="Tersedia">Tersedia</option>
                                <option @selected(old('status', @$obat->status)== 'Habis') value="Habis">Habis</option>
                                <option @selected(old('status', @$obat->status)== 'Expired Date') value="Expired Date">Expired Date</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('status') }}
                                </div>
                            @endif
                    </div>
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('obat/master') }}" class="btn btn-primary">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection