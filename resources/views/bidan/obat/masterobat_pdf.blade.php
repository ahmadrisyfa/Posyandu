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
    <h><b>Data Obat Posyandu Mawar 1</b></h5>
</center>
<main style="margin-top: 30px">
    <div class="container">
    <p>Tanggal :  </p>
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th><center>NO</center></th>
                        <th><center>Nama Obat</center></th>
                        <th><center>Jenis Obat</center></th>
                        <th><center>Sisa Obat</center></th>
                        <th><center>Tanggal Expired Date</center></th>
                        <th><center>Status Obat</center></th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($obat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->jenis_obat }}</td>
                        <td>{{ $item->sisa_obat }}</td>
                        <td>{{ $item->tgl_ed }}</td>
                        <td>{{ \App\Http\Controllers\ObatController::status($item->tgl_ed) }}</td>
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