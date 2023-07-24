
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
                <form action="{{ !empty ($obatkeluar) ? route ('obatkeluar.update', $obatkeluar) : url('obatkeluar/create') }}" 
                method="POST" enctype="">
                @if(!empty ($obatkeluar))
                    @method('PATCH')
                @endif   
                @csrf

                    <div class="mb-3 row">
                        <label for="id_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-5">
                            <select name="id_obat" id="id_obat" class="form-control">
                                <option disable value="">- Belum Diisi -</option>
                                @foreach ( $obat as $item)
                                <option value= "{{ $item->id_obat}}">{{ $item->nama_obat}}/Sisa Obat = {{ $item->sisa_obat}}</option>
                                @endforeach
                            </select>
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('id_obat') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_keluar" class="col-sm-2 col-form-label">Tanggal Keluar Obat</label>
                        <div class="col-sm-5">
                            <input value="{{ old('tgl_keluar', @$obatkeluar->tgl_keluar) }}" type="date" class="form-control" name="tgl_keluar" id="tgl_keluar" placeholder="Tanggal">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('tgl_keluar') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Obat</label>
                        <div class="col-sm-5">
                            <input value="{{ old('jumlah', @$obatkeluar->jumlah) }}" type="number" class="form-control" name="jumlah" id="jumlah" placeholder="jumlah obat">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('jumlah') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input value="{{ old('ket', @$obatkeluar->ket) }}" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                            @if (count($errors) > 0)
                                <div style="width: auto; color: #dc4c64; margin-top: 0.25rem;">
                                {{ $errors->first('ket') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="col-lg-8 text-end mb-2">
                            <a href="{{ url('obatkeluar') }}" class="btn btn-primary">Kembali</a>
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