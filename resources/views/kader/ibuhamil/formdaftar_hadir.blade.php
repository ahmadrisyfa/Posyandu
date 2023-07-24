
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
                <form action="{{ !empty ($daftar_hadiribu) ? route ('kader_daftar_hadiribu.update', $daftar_hadiribu) : url('kader/daftar_hadiribu/create') }}" 
                method="POST" enctype="">
                @if(!empty ($daftar_hadiribu))
                    @method('PATCH')
                @endif   
                @csrf
                    <div class="mb-3 row">
                        <label for="id_dhi" class="col-sm-2 col-form-label">ID Daftar</label>
                        <div class="col-sm-5">
                            <input value="{{ old('id_dhi', @$daftar_hadiribu->id_dhi) }}" type="text" class="form-control" name="id_dhi" id="id_dhi" placeholder="ID daftar hadir">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl" class="col-sm-2 col-form-label">Tanggal Posyandu</label>
                        <div class="col-sm-5">
                            <input value="{{ old('tgl', @$daftar_hadiribu->tgl) }}" type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal">
                        </div>
                    </div>
                
                    <div class="mb-3 row">
                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nama_ibu', @$daftar_hadiribu->nama_ibu) }}" type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-5">
                            <select name="status" id="status" class="form-control">
                                <option @selected(old('status', @$daftar_hadiribu->status)== '') value="">- Belum Diisi -</option>
                                <option @selected(old('status', @$daftar_hadiribu->status)== 'Hadir') value="Hadir">Hadir</option>
                                <option @selected(old('status', @$daftar_hadiribu->status)== 'Tidak Hadir') value="Tidak Hadir">Tidak Hadir</option>
                            </select>
                        </div>
                    </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input value="{{ old('ket', @$daftar_hadiribu->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('kader/daftar_hadiribu') }}" class="btn btn-primary">Kembali</a>
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