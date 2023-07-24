<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
        </style>
<center>
    <h><b>Daftar Hadir Bayi & Balita</b></h>
    <p><b>Posyandu Mawar 1 Desa Sukadana</b></p>
</center>
<main style="margin-top: 30px">
    <div class="container">
    <p>Hari     :  </p>
    @if ($daftar_hadirbayi->count() > 0)
    <p>Tanggal: {{ $daftar_hadirbayi[0]->jadwal->tanggal_posyandu_bayibalita }}</p>
    @else
        <p>Tidak ada tanggal yang tersedia</p>
    @endif

    <p>Tempat     : POSKESDES  </p>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="table-responsive">
            <table class='table table-bordered' border="1px">
                    <thead>
                    <tr>
                        <th><center>NO</center></th>
                        <th><center>Nama Ibu/ Balita</center></th>
                        <th><center>Alamat</center></th>
                        <th><center>Status Kehadiran</center></th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($daftar_hadirbayi as $item)
                    <tr>
                        <td><center>{{ $loop->iteration }}</center></td>
                        <td>{{ $item->bayi->nama_ibu }}/{{ $item->bayi->nama_anak }}</td>
                        <td>{{ $item->bayi->alamat}}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Tanggal cetak:</td>
                        <td colspan="4">{{date('d-m-Y')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
 <script type="text/javascript">
        window.print();
    </script>
</body>
</html>