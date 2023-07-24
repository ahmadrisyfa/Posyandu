
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
                <form action="{{ !empty ($vaksin_anak) ? route ('vaksinanak.update', $vaksin_anak) : url('vaksin_anak/create') }}" 
                method="POST" enctype="">
                @if(!empty ($vaksin_anak))
                    @method('PATCH')
                @endif   
                @csrf

                    <div class="mb-3 row">
                        <label for="id_vaksin" class="col-sm-2 col-form-label">ID Vaksin</label>
                        <div class="col-sm-5">
                            <input value="{{ old('id_vaksin', @$vaksin_anak->id_vaksin) }}" type="text" class="form-control" name="id_vaksin" id="id_vaksin" placeholder="Misal : VA-0623-001">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_vaksin') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_vaksin" class="col-sm-2 col-form-label">Nama Vaksin</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nama_vaksin', @$vaksin_anak->nama_vaksin ) }}" type="text" class="form-control" name="nama_vaksin" id="nama_vaksin" placeholder="Nama Vaksin">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('nama_vaksin') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input value="{{ old('ket', @$vaksin_anak->ket ) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('ket') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('vaksin_anak') }}" class="btn btn-primary">Kembali</a>
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