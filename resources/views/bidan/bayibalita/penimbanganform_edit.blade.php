@extends('layouts.home_bidan')

@section('content')
<section class="section">
<div class="section-header">
        <h1>Data Penimbangan Anak</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail/Penimbangan Bayi Balita/<span class="color-primary">Edit Data</span></p>
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold color-primary">Data Penimbangan</h6>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ !empty ($penimbangan_anak) ? route ('bidan.penimbangan_update', $penimbangan_anak) : url('bayibalita/penimbangan/create') }}" 
                method="POST" enctype="">
                @if(!empty ($penimbangan_anak))
                    @method('PATCH')
                @endif   
                @csrf
                <div class="row">
                <div class="col-xl-6 mr-auto">
                    <div class="form-group"> 
                        <label for="id_jadwal">Penimbangan Bulan</label>
                        <select name="id_jadwal" id="id_jadwal" class="form-control">
                                <option value= "{{ $penimbangan_anak->id_jadwal}}">{{ $penimbangan_anak->jadwal->bulan}}</option>
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
                        <label for="tanggal_posyandu_bayibalita">Tanggal Penimbangan</label>
                        <select name="tanggal_posyandu_bayibalita" id="tanggal_posyandu_bayibalita" class="form-control">
                                <option value= "{{ $penimbangan_anak->tanggal_posyandu_bayibalita}}">{{ $penimbangan_anak->jadwal->tanggal_posyandu_bayibalita}}</option>
                                @foreach ( $jadwal as $item)
                                <option value= "{{ $item->tanggal_posyandu_bayibalita}}">{{ $item->tanggal_posyandu_bayibalita}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tanggal_posyandu_bayibalita') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group"> 
                        <label for="id_dha">ID Daftar Hadir Anak</label>
                        <select name="id_dha" id="id_dha" class="form-control">
                        <option value= "{{ $penimbangan_anak->id_dha}}">{{ $penimbangan_anak->daftarhadir->id_dha}}</option>
                                @foreach ( $daftar_hadirbayi as $item)
                                @if ($item->id_dha > @$penimbangan_anak->daftarhadir->id_dha )
                                <option value= "{{ $item->id_dha}}">{{ $item->id_dha}}</option>
                                @endif
                                @endforeach
                        </select>
                        @if (count($errors) > 0)
                            <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_dha') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group"> 
                        <label for="id_anak">Nama Anak</label>
                        <select name="id_anak" id="id_anak" class="form-control">
                                <option value= "{{ $penimbangan_anak->id_anak}}">{{ $penimbangan_anak->bayibalita->nama_anak}}</option>
                                @foreach ( $bayibalita as $item)
                                <option value= "{{ $item->id_anak}}">{{ $item->nama_anak}}</option>
                                @endforeach
                        </select>
                        @if (count($errors) > 0)
                            <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_anak') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group"> 
                        <label for="jk">Jenis Kelamin</label>
                        <input value="{{ old('jk', @$penimbangan_anak->jk) }}" type="text" class="form-control" name="jk" id="jk" placeholder="Jenis Kelamin ">   
                        @if (count($errors) > 0)
                            <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('jk') }}
                            </div>
                        @endif
                    </div>

                    </div>
                    <div class="col-xl-6 ml-auto">

                    <div class="form-group"> 
                        <label for="berat_badan">Berat Badan (Kg)</label>
                            <input value="{{ old('berat_badan', @$penimbangan_anak->berat_badan) }}" type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Misal : 10,3">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('berat_badan') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group"> 
                        <label for="st">ST</label>
                            <select name="st" id="st" class="form-control">
                                <option @selected(old('st', @$penimbangan_anak->st)== '') value="">- Belum Diisi -</option>
                                <option @selected(old('st', @$penimbangan_anak->st)== 'Naik') value="Naik">Naik</option>
                                <option @selected(old('st', @$penimbangan_anak->st)== 'Tetap') value="Tetap">Tetap</option>
                                <option @selected(old('st', @$penimbangan_anak->st)== 'Turun') value="Turun">Turun</option>
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('st') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group"> 
                        <label for="id_vaksin">Imunisasi</label>
                            <select name="id_vaksin" id="id_vaksin" class="form-control">
                                <option value= "{{ $penimbangan_anak->id_vaksin}}">{{ $penimbangan_anak->vaksin->nama_vaksin}}</option>
                                @foreach ( $vaksin_anak as $item)
                                @if ($item->umur_anak <=  \App\Http\Controllers\BayibalitaController::hitung_umur(@$penimbangan_anak->bayibalita->tgl_lahir) )
                                
                                <option value= "{{ $item->id_vaksin}}">{{ $item->nama_vaksin}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_vaksin') }}
                                </div>
                            @endif
                    </div>                     
                 
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <div class="col-sm-5">
                            <input value="{{ old('ket', @$penimbangan_anak->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('ket') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('bayibalita/penimbangan') }}" class="btn btn-primary">Kembali</a>
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