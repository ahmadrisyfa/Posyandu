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
    <h><b>Data Ibu Hamil</b></h>
    <p><b>Posyandu Mawar 1 Desa Sukadana</b></p>
</center>
<main style="margin-top: 30px">
    <div class="container">
    <p>Hari/Tanggal     :  </p>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="table-responsive">
            <table class='table table-bordered' border="5px">
                    <thead>
                    <tr>
                        <th><center>NO</center></th>
                        <th><center>NO KK</center></th>
                        <th><center>NIK Ibu Hamil</center></th>
                        <th><center>Nama Ibu Hamil</center></th>
                        <th><center>Tanggal Lahir</center></th>
                        <th><center>Usia Ibu Hamil</center></th>
                        <th><center>Usia Kehamilan</center></th>
                        <th><center>Nama Suami</center></th>
                        <th><center>Alamat</center></th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($ibuhamil as $item)
                    <tr>
                        <td><center>{{ $loop->iteration }}</center></td>
                        <td><center>{{ $item->no_kk }}</center></td>
                        <td><center>{{ $item->nik_ibu }}</center></td>
                        <td>{{ $item->nama_ibu }}</td>
                        <td>{{ $item->tgl_lahir }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::hitung_umur($item->tgl_lahir) }}</td>
                        <td>{{ \App\Http\Controllers\IbuhamilController::hitung_usiakehamilan($item->hpht) }}</td>
                        <td>{{ $item->nama_suami }}</td>
                        <td>{{ $item->alamat }}</td>
                        </tr>
                    @endforeach
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