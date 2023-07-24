
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
    @if (count($errors) > 0)
    <div class="alert alert-danger">
    <b>Perhatian</b>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ !empty ($bayibalita) ? route ('kaderbayibalita.update', $bayibalita) : url('kader/bayibalita/create') }}" 
                method="POST" enctype="">
                @if(!empty ($bayibalita))
                    @method('PATCH')
                @endif   
                @csrf
                    <div class="mb-3 row">
                        <label for="id_anak" class="col-sm-2 col-form-label">ID Anak</label>
                        <div class="col-sm-5">
                            <input value="{{ old('id_anak', @$bayibalita->id_anak) }}" type="text" class="form-control" name="id_anak" id="id_anak" placeholder="ID Anak">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nik_anak" class="col-sm-2 col-form-label">NIK Anak</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nik_anak', @$bayibalita->nik_anak) }}" type="text" class="form-control" name="nik_anak" id="nik_anak" placeholder="NIK Anak">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="no_kk" class="col-sm-2 col-form-label">No KK</label>
                        <div class="col-sm-5">
                            <input value="{{ old('no_kk', @$bayibalita->no_kk) }}" type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No KK">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_anak" class="col-sm-2 col-form-label">Nama Anak</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nama_anak', @$bayibalita->nama_anak) }}" type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-5">
                            <select name="jk" id="jk" class="form-control">
                                <option @selected(old('jk', @$bayibalita->jk)== '') value="">- Jenis Kelamin -</option>
                                <option @selected(old('jk', @$bayibalita->jk)== 'Laki-laki') value="Laki-laki">Laki-laki</option>
                                <option @selected(old('jk', @$bayibalita->jk)== 'Perempuan') value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input value="{{ old('tgl_lahir', @$bayibalita->tgl_lahir) }}" type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nama_ayah', @$bayibalita->nama_ayah) }}" type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nama_ibu', @$bayibalita->nama_ibu) }}" type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                            <input value="{{ old('alamat', @$bayibalita->alamat) }}" type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kia" class="col-sm-2 col-form-label">Status buku KIA</label>
                        <div class="col-sm-5">
                            <select name="kia" id="kia" class="form-control">
                                <option @selected(old('kia', @$bayibalita->kia)== '') value="">- Status buku KIA -</option>
                                <option @selected(old('kia', @$bayibalita->kia)== 'Ya') value="Ya">Ya</option>
                                <option @selected(old('kia', @$bayibalita->kia)== 'Tidak') value="Tidak">Tidak</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input value="{{ old('ket', @$bayibalita->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('kader/bayibalita') }}" class="btn btn-primary">Kembali</a>
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