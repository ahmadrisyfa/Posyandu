<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <style>
        body {
            background-color: lightgray !important;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">LARAVEL CRUD AJAX </a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">
                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-daftarhadir">TAMBAH</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Posyandu</th>
                                <th>Nama Ibu</th>
                                <th>Status Kehadiran </th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="table-daftarhadir">
                                @foreach($daftarhadir as $item)
                                <tr id="index_{{ $item->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tgl }}</td>
                                <td>{{ $item->nama_ibu }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->ket }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-daftarhadir" data-id="{{ $item->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-daftarhadir" data-id="{{ $item->id }}" class="btn btn-danger btn-sm">HAPUS</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('kader.ibuhamil.daftarhadir-create')
    @include('kader.ibuhamil.daftarhadir-edit')
    <script> //delete
    //button create event
    $('body').on('click', '#btn-delete-daftarhadir', function () {

        let item_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Hapus data?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: `/daftarhadir/${item_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove on table
                        $(`#index_${item_id}`).remove();
                    }
                });

                
            }
        })
        
    });
</script>
</body>
</html>