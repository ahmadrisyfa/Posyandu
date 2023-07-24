@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Identitas Ibu Hamil</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail/<span class="color-primary">Data Ibu Hamil</span></p>
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold color-primary">Data Identitas</h6>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ !empty ($ibuhamil) ? route ('bidanibuhamil.update', $ibuhamil) : url('ibuhamil/create') }}" 
                method="POST" enctype="">
                @if(!empty ($ibuhamil))
                    @method('PATCH')
                @endif   
                @csrf
                <div class="row">
                <div class="col-xl-6 mr-auto">
                    <div class="form-group">
                        <label for="nik_ibu">NIK Ibu Hamil</label>
                            <input value="{{ old('nik_ibu', @$ibuhamil->nik_ibu) }}" type="text" class="form-control" name="nik_ibu" id="nik_ibu" placeholder="Isi NIK dengan sesuai">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nik_ibu') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                            <input value="{{ old('no_kk', @$ibuhamil->no_kk) }}" type="text" class="form-control" name="no_kk" id="no_kk" placeholder="isi No KK dengan sesuai">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('no_kk') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu Hamil</label>
                            <input value="{{ old('nama_ibu', @$ibuhamil->nama_ibu) }}" type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nama_ibu') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                            <input value="{{ old('tgl_lahir', @$ibuhamil->tgl_lahir) }}" type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="BB/HH/TTTT">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tgl_lahir') }}
                                </div>
                            @endif
                    </div>
                    </div>
                    <div class="col-xl-6 ml-auto">
                    <div class="form-group">
                        <label for="hamil_ke">Hamil ke-</label>
                            <select name="hamil_ke" id="hamil_ke" class="form-control">
                                <option @selected(old('hamil_ke', @$ibuhamil->hamil_ke)== '') value="">- Pilih data -</option>
                                <option @selected(old('hamil_ke', @$ibuhamil->hamil_ke)== '1') value="1">1</option>
                                <option @selected(old('hamil_ke', @$ibuhamil->hamil_ke)== '2 s/d 4') value="2 s/d 4">2 s/d 4</option>
                                <option @selected(old('hamil_ke', @$ibuhamil->hamil_ke)== '> 5') value="> 5"> > 5</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('hamil_ke') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="hpht">Hari Pertama Haid Hari Terakhir/HPHT</label>
                            <input value="{{ old('hpht', @$ibuhamil->hpht) }}" type="date" class="form-control" name="hpht" id="hpht" placeholder="BB/HH/TTTT">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('hpht') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="nama_suami">Nama Suami</label>
                            <input value="{{ old('nama_suami', @$ibuhamil->nama_suami) }}" type="text" class="form-control" name="nama_suami" id="nama_suamil" placeholder="Nama Suami">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nama_suami') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                            <input value="{{ old('alamat', @$ibuhamil->alamat) }}" type="text" class="form-control" name="alamat" id="alamat" placeholder="RT/RW">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('alamat') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="kia">Status buku KIA</label>
                            <select name="kia" id="kia" class="form-control">
                                <option @selected(old('kia', @$ibuhamil->kia)== '') value="">- Status buku KIA -</option>
                                <option @selected(old('kia', @$ibuhamil->kia)== 'Ya') value="Ya">Ya</option>
                                <option @selected(old('kia', @$ibuhamil->kia)== 'Tidak') value="Tidak">Tidak</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('kia') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                            <input value="{{ old('ket', @$ibuhamil->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan (isi - jika tidak ada ket)">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('ket') }}
                                </div>
                            @endif
                    </div>
                </div>
                    <div class="col-lg-8 text-end mb-2">
                        <a href="{{ url('ibuhamil') }}" class="btn btn-primary">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection