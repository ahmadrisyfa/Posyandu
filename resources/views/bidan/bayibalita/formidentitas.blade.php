@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Identitas Bayi & Balita</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail/<span class="color-primary">Data Bayi Balita</span></p>
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold color-primary">Data Identitas</h6>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ !empty ($bayibalita) ? route ('bidanbayibalita.update', $bayibalita) : url('bayibalita/create') }}" 
                method="POST" enctype="">
                @if(!empty ($bayibalita))
                    @method('PATCH')
                @endif   
                @csrf
                <div class="row">
                <div class="col-xl-6 mr-auto">
                    <div class="form-group">
                        <label for="id_anak">ID Anak</label>
                            <input value="{{ old('id_anak', @$bayibalita->id_anak) }}" type="text" class="form-control" name="id_anak" id="id_anak" placeholder="Misal : BB-0622-001">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_anak') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="nik_anak">NIK Anak</label>
                            <input value="{{ old('nik_anak', @$bayibalita->nik_anak) }}" type="text" class="form-control" name="nik_anak" id="nik_anak" placeholder="isi NIK Anak dengan sesuai">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nik_anak') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                            <input value="{{ old('no_kk', @$bayibalita->no_kk) }}" type="text" class="form-control" name="no_kk" id="no_kk" placeholder="isi No KK dengan sesuai">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('no_kk') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="nama_anak">Nama Anak</label>
                            <input value="{{ old('nama_anak', @$bayibalita->nama_anak) }}" type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nama_anak') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control">
                                <option @selected(old('jk', @$bayibalita->jk)== '') value="">- Jenis Kelamin -</option>
                                <option @selected(old('jk', @$bayibalita->jk)== 'Laki-laki') value="Laki-laki">Laki-laki</option>
                                <option @selected(old('jk', @$bayibalita->jk)== 'Perempuan') value="Perempuan">Perempuan</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('jk') }}
                                </div>
                            @endif
                    </div>
                    </div>
                    <div class="col-xl-6 ml-auto">
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                            <input value="{{ old('tgl_lahir', @$bayibalita->tgl_lahir) }}" type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tgl_lahir') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                            <input value="{{ old('nama_ayah', @$bayibalita->nama_ayah) }}" type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nama_ayah') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                            <input value="{{ old('nama_ibu', @$bayibalita->nama_ibu) }}" type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nama_ibu') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                            <input value="{{ old('alamat', @$bayibalita->alamat) }}" type="text" class="form-control" name="alamat" id="alamat" placeholder="RT/RW">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('alamat') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="kia">Status buku KIA</label>
                            <select name="kia" id="kia" class="form-control">
                                <option @selected(old('kia', @$bayibalita->kia)== '') value="">- Status buku KIA -</option>
                                <option @selected(old('kia', @$bayibalita->kia)== 'Ya') value="Ya">Ya</option>
                                <option @selected(old('kia', @$bayibalita->kia)== 'Tidak') value="Tidak">Tidak</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('kia') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                            <input value="{{ old('ket', @$bayibalita->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('ket') }}
                                </div>
                            @endif
                    </div>
                </div>
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('bayibalita') }}" class="btn btn-primary">Kembali</a>
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