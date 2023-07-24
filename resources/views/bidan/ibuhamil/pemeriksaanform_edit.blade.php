@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Pemeriksaan Ibu Hamil</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail/Pemeriksaan Ibu Hamil/<span class="color-primary">Edit Data</span></p>
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold color-primary">Data Pemeriksaan</h6>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ !empty ($pemeriksaan_ibu) ? route ('bidan.pemeriksaan_update', $pemeriksaan_ibu) : url('ibuhamil/pemeriksaan/create') }}" 
                method="POST" enctype="">
                @if(!empty ($pemeriksaan_ibu))
                    @method('PATCH')
                @endif   
                @csrf
                <div class="row">
                <div class="col-xl-6 mr-auto">
                    <div class="form-group"> 
                        <label for="id_jadwal">Pemeriksaan Bulan</label>
                        <select name="id_jadwal" id="id_jadwal" class="form-control">
                                <option value= "{{ $pemeriksaan_ibu->id_jadwal}}">{{ $pemeriksaan_ibu->jadwal->bulan}}</option>
                                @foreach ( $jadwal as $item)
                                <option value= "{{ $item->id_jadwal}}">{{ $item->bulan}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_jadwal') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group"> 
                        <label for="tanggal_posyandu_ibuhamil">Tanggal Penimbangan</label>
                        <select name="tanggal_posyandu_ibuhamil" id="tanggal_posyandu_ibuhamil" class="form-control">
                                <option value= "{{ $pemeriksaan_ibu->tanggal_posyandu_ibuhamil}}">{{ $pemeriksaan_ibu->jadwal->tanggal_posyandu_ibuhamil}}</option>
                                @foreach ( $jadwal as $item)
                                <option value= "{{ $item->tanggal_posyandu_ibuhamil}}">{{ $item->tanggal_posyandu_ibuhamil}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tanggal_posyandu_ibuhamil') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="id_dhi">ID Daftar hadir Ibu</label>
                        <select name="id_dhi" id="id_dhi" class="form-control">
                                <option value= "{{ $pemeriksaan_ibu->id_dhi}}">{{ $pemeriksaan_ibu->daftarhadiribu->id_dhi}}</option>
                                @foreach ( $daftar_hadiribu as $item)
                                <option value= "{{ $item->id_dhi}}">{{ $item->id_dhi}}</option>
                                @endforeach
                            </select>@if (count($errors) > 0)
                            <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_dhi') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="id_ibu">Nama Ibu Hamil</label>
                            <select name="id_ibu" id="id_ibu" class="form-control">
                                <option value= "{{ $pemeriksaan_ibu->id_ibu}}">{{ $pemeriksaan_ibu->ibuhamil->nama_ibu}}</option>
                                @foreach ( $ibuhamil as $item)
                                <option value= "{{ $item->id_ibu}}">{{ $item->nama_ibu}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_ibu') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="berat_badan">Berat Badan(Kg)</label>
                            <input value="{{ old('berat_badan', @$pemeriksaan_ibu->berat_badan) }}" type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Misal : 60,5">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('berat_badan') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="tinggi_badan">Tinggi Badan(CM)</label>
                            <input value="{{ old('tinggi_badan', @$pemeriksaan_ibu->tinggi_badan) }}" type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Misal : 150">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tinggi_badan') }}
                                </div>
                            @endif
                    </div>
                    </div>
                        <div class="col-xl-6 ml-auto">
                    <div class="form-group">
                        <label for="lila_imt">LILA/IMT</label>
                            <input value="{{ old('lila_imt', @$pemeriksaan_ibu->lila_imt) }}" type="text" class="form-control" name="lila_imt" id="lila_imt" placeholder="Misal : 30/27.7">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('lila_imt') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="hb_goldarah">HB/Gol.Darah</label>
                            <input value="{{ old('hb_goldarah', @$pemeriksaan_ibu->hb_goldarah) }}" type="text" class="form-control" name="hb_goldarah" id="hb_goldarah" placeholder="Misal : 13,6/A">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('hb_goldarah') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="tensi">Tensi Darah</label>
                            <input value="{{ old('tensi', @$pemeriksaan_ibu->tensi) }}" type="text" class="form-control" name="tensi" id="tensi" placeholder="Misal : 123/75">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tensi') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="id_vaksin">Imunisasi</label>
                            <select name="id_vaksin" id="id_vaksin" class="form-control">
                                <option value= "{{ $pemeriksaan_ibu->id_vaksin}}">{{ $pemeriksaan_ibu->vaksin->nama_vaksin}}</option>
                                @foreach ( $vaksin_ibu as $item)
                                <option value= "{{ $item->id_vaksin}}">{{ $item->nama_vaksin}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_vaksin') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group"> 
                        <label for="id_obat">Nama Obat</label>
                            <select name="id_obat" id="id_obat" class="form-control">
                            <option value= "{{ $pemeriksaan_ibu->id_obat}}">{{ $pemeriksaan_ibu->obat->nama_obat}}-(Stok Obat = {{ $pemeriksaan_ibu->obat->sisa_obat}})</option>
                                @foreach ( $obat as $item)
                                <option value= "{{ $item->id_obat}}">{{ $item->nama_obat}}-(Stok Obat = {{ $item->sisa_obat}})</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_obat') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group"> 
                        <label for="jumlah">Jumlah</label>
                            <input value="{{ old('jumlah', @$pemeriksaan_ibu->jumlah) }}" type="text" class="form-control fs-normal form-spacer-20x15" name="jumlah" id="jumlah" placeholder="Misal : ">
                        @if (count($errors) > 0)
                            <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('jumlah') }}
                            </div>
                        @endif
                    </div>                        

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                            <input value="{{ old('ket', @$pemeriksaan_ibu->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan (isi - bila tidak ada ket)">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('ket') }}
                                </div>
                            @endif
                    </div>
                </div>
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('ibuhamil/pemeriksaan') }}" class="btn btn-primary">Kembali</a>
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