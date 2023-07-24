
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title></title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<main style="margin-top: 70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ !empty ($jadwal) ? route ('jadwal.update', $jadwal) : url('jadwal/create') }}" 
                method="POST" enctype="">
                @if(!empty ($jadwal))
                    @method('PATCH')
                @endif   
                @csrf
                    <div class="mb-3 row">
                        <label for="tanggal_posyandu_bayibalita" class="col-sm-2 col-form-label">Tanggal Posyandu Bayi & Balita</label>
                        <div class="col-sm-5">
                            <input value="{{ old('tanggal_posyandu_bayibalita', @$jadwal->tanggal_posyandu_bayibalita) }}" type="date" class="form-control" name="tanggal_posyandu_bayibalita" id="tanggal_posyandu_bayibalita" placeholder="">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tanggal_posyandu_bayibalita') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_posyandu_ibuhamil" class="col-sm-2 col-form-label">Tanggal Posyandu Ibu Hamil</label>
                        <div class="col-sm-5">
                            <input value="{{ old('tanggal_posyandu_ibuhamil', @$jadwal->tanggal_posyandu_ibuhamil) }}" type="date" class="form-control" name="tanggal_posyandu_ibuhamil" id="tanggal_posyandu_ibuhamil" placeholder="">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tanggal_posyandu_ibuhamil') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="bulan" class="col-sm-2 col-form-label">Penimbangan Bulan</label>
                        <div class="col-sm-5">
                            <select name="bulan" id="bulan" class="form-control">
                                <option @selected(old('bulan', @$jadwal->bulan)== '') value="">- Belum Diisi -</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Januari') value="Januari">Januari</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Februari') value="Februari">Februari</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Maret') value="Maret">Maret</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'April') value="April">April</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Mei') value="Mei">Mei</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Juni') value="Juni">Juni</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Juli') value="Juli">Juli</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Agustus') value="Agustus">Agustus</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'September') value="September">September</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Oktober') value="Oktober">Oktober</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'November') value="November">Nopember</option>
                                <option @selected(old('bulan', @$jadwal->bulan)== 'Desember') value="Desember">Desember</option>
                            </select>@if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('bulan') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('jadwal') }}" class="btn btn-primary">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>