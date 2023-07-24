@extends('layouts.home_bidan')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Penimbangan Bayibalita</h1>
    </div>
</section>
<main>
    <div class="container">
        <p class="mb-3">Detail/Penimbangan Bayi Balita/<span class="color-primary">Tambah Data</span></p>
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold color-primary">Data Penimbangan</h6>
            </div>
            <div class="card-body container-fluid">
                <form
                    action="{{ !empty ($penimbangan_anak) ? route ('bidan.penimbangan_update', $penimbangan_anak) : url('bayibalita/penimbangan/create') }}"
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
                                    <option disable value="">- Belum Diisi -</option>
                                    @foreach ( $jadwal as $item)
                                    <option value="{{ $item->id_jadwal}}">{{ $item->bulan}}</option>
                                    @endforeach
                                </select>
                                @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                    {{ $errors->first('id_jadwal') }}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="tanggal_posyandu_bayibalita">Tanggal Posyandu</label>
                                <select name="tanggal_posyandu_bayibalita" id="tanggal_posyandu_bayibalita"
                                    class="form-control">
                                    <option disable value="">- Belum Diisi -</option>
                                    @foreach ( $jadwal as $item)
                                    <option value="{{ $item->tanggal_posyandu_bayibalita}}">
                                        {{ $item->tanggal_posyandu_bayibalita}}
                                    </option>
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
                                <select name="id_dha" onchange="daftar_hadir()" id="id_dha" class="form-control">
                                    <option disable value="">- Belum Diisi -</option>

                                    @foreach ($daftar_hadirbayi as $item)
                                    @php
                                    $isExists = DB::table('penimbangan_anak')->where('id_dha', $item->id_dha)->exists();
                                    @endphp

                                    @if (!$isExists)
                                    <option value="{{ $item->id_dha }}">{{ $item->id_dha }}</option>
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
                                @php
                                function calculateAge($dateOfBirth) {
                                $today = date("Y-m-d");
                                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                $ageInMonths = ($diff->format('%y') * 12) + $diff->format('%m');
                                return $ageInMonths;
                                }
                                @endphp

                                <!-- <select name="id_anak" id="id_anak" class="form-control">
                                    <option disable value="">- Belum Diisi -</option>
                                    @foreach ($bayibalita as $item)
                                    @php
                                    $umur = calculateAge($item->tgl_lahir);
                                    @endphp
                                    @if ($umur < 59) <option value="{{ $item->id_anak }}">{{ $item->nama_anak }}
                                        </option>
                                        @endif
                                        @endforeach
                                </select> -->
                                <input type="hidden" name="id_anak" id="id_anak" readonly
                                    class="form-control form-control-sm">
                                <input type="text" name="nama_anak" id="nama_anak" readonly
                                    class="form-control form-control-sm">
                                @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                    {{ $errors->first('id_anak') }}
                                </div>
                                @endif
                            </div>
                            <script>
                            document.getElementById('id_anak').addEventListener('change', function() {
                                var id_anak = this.value;

                                fetch('/get-berat-badan/' + id_anak)
                                    .then(function(response) {
                                        return response.json();
                                    })
                                    .then(function(data) {
                                        var berat_badan = (data && data.berat_badan) ? data.berat_badan :
                                            '';
                                        var id_vaksin = (data && data.id_vaksin) ? data.id_vaksin : '';
                                        var nama_vaksin = (data && data.nama_vaksin) ? data.nama_vaksin :
                                            '';

                                        document.getElementById('berat_badan').value = berat_badan;
                                        document.getElementById('id_vaksin').value = id_vaksin;
                                        document.getElementById('nama_vaksin').value = nama_vaksin;
                                    })
                                    .catch(function(error) {
                                        console.log(error);
                                    });
                            });
                            </script>


                            <div class="form-group">
                                <label for="id_dha">Tanggal Lahir Anak</label>
                                <input type="text" name="tgl_lahir" id="tgl_lahir" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="id_dha">Umur Anak</label>
                                <input type="text" name="umur" id="umur" class="form-control" readonly>
                            </div>

                            <script>
                            function daftar_hadir() {
                                var id = $('#id_dha').val()
                                $.ajax({
                                    type: "get",
                                    url: "{{ url('get-daftar-hadir-bayi') }}/" + id,
                                    data: {},
                                    success: function(data) {
                                        console.log(data.data)
                                        $('#id_anak').val(data.data.anak.id_anak)
                                        $('#nama_anak').val(data.data.anak.nama_anak)
                                        $('#tgl_lahir').val(data.data.anak.tgl_lahir)
                                        $('#umur').val(calculateAge(data.data.anak.tgl_lahir) + ' bulan')
                                        $('#berat_badan').val(data.data.penimbangan.berat_badan)
                                        $('#id_vaksin').val(data.data.vaksin.id_vaksin)
                                        $('#nama_vaksin').val(data.data.vaksin.nama_vaksin)
                                    }
                                })
                            }

                            document.getElementById('id_anak').addEventListener('change', function() {
                                var selectedValue = this.value;
                                var tglLahirInput = document.getElementById('tgl_lahir');
                                var umurInput = document.getElementById('umur');

                                getData(selectedValue)
                                    .then(function(response) {
                                        tglLahirInput.value = response.tgl_lahir;

                                        var umur = calculateAge(response.tgl_lahir);

                                        umurInput.value = umur + ' bulan';
                                    })
                                    .catch(function(error) {
                                        console.log('Terjadi kesalahan saat mengambil data: ' + error);
                                    });
                            });

                            function getData(idAnak) {
                                return new Promise(function(resolve, reject) {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4) {
                                            if (xhr.status === 200) {
                                                var response = JSON.parse(xhr.responseText);
                                                if (response.error) {
                                                    reject(response.error);
                                                } else {
                                                    resolve(response);
                                                }
                                            } else {
                                                reject(xhr.statusText);
                                            }
                                        }
                                    };

                                    var url = '/get-tgl-lahir/' + idAnak;
                                    xhr.open('GET', url, true);
                                    xhr.send();
                                });
                            }

                            function calculateAge(dateOfBirth) {
                                var today = new Date();
                                var birthDate = new Date(dateOfBirth);
                                var ageInMonths = (today.getFullYear() - birthDate.getFullYear()) * 12;
                                ageInMonths += today.getMonth() - birthDate.getMonth();
                                return ageInMonths;
                            }
                            </script>

                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option @selected(old('jk', @$penimbangan_anak->jk)== '') value="">- Belum Diisi -
                                    </option>
                                    <option @selected(old('jk', @$penimbangan_anak->jk)== 'Laki-Laki')
                                        value="Laki-Laki">Laki-Laki</option>
                                    <option @selected(old('jk', @$penimbangan_anak->jk)== 'Perempuan')
                                        value="Perempuan">Perempuan</option>
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
                                <label for="berat_badan">Berat Badan (Kg) Yang Lama</label>
                                <input type="text" readonly class="form-control" name="berat_badan" id="berat_badan">
                                @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                    {{ $errors->first('berat_badan') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="berat_badan">Berat Badan (Kg)</label>
                                <input value="{{ old('berat_badan', @$penimbangan_anak->berat_badan) }}" type="text"
                                    class="form-control" name="berat_badan" placeholder="Misal : 10,3">
                                @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                    {{ $errors->first('berat_badan') }}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="st">ST</label>
                                <select name="st" id="st" class="form-control">
                                    <option @selected(old('st', @$penimbangan_anak->st)== '') value="">- Belum Diisi -
                                    </option>
                                    <option @selected(old('st', @$penimbangan_anak->st)== 'Naik') value="Naik">Naik
                                    </option>
                                    <option @selected(old('st', @$penimbangan_anak->st)== 'Tetap') value="Tetap">Tetap
                                    </option>
                                    <option @selected(old('st', @$penimbangan_anak->st)== 'Turun') value="Turun">Turun
                                    </option>
                                </select>
                                @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                    {{ $errors->first('st') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="id_vaksin">Imunisasi Yang Lama</label>
                                <input type="hidden" id="id_vaksin" readonly>
                                <input type="text" id="nama_vaksin" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="id_vaksin">Imunisasi</label>
                                <select name="id_vaksin" id="id_vaksin" class="form-control">
                                    <option disable value="">- Belum Diisi -</option>
                                    @foreach ( $vaksin_anak as $item)
                                    @if ($item->umur_anak >=
                                    \App\Http\Controllers\BayibalitaController::hitung_umur(@$penimbangan_anak->bayibalita->tgl_lahir)
                                    )
                                    <option value="{{ $item->id_vaksin}}">{{ $item->nama_vaksin}}</option>
                                    @endif
                                    @endforeach
                                </select>@if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                    {{ $errors->first('id_vaksin') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <input value="{{ old('ket', @$penimbangan_anak->ket) }}" type="text"
                                    class="form-control" name="ket" id="ket" placeholder="Keterangan">
                                @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                    {{ $errors->first('ket') }}
                                </div>
                                @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@endsection