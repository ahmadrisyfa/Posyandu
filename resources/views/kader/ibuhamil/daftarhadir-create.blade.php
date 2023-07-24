<!-- Modal -->
<div class="modal fade" id="daftrahadir-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <div class="form-group">
                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal Posyandu</label>
                    <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
                <div class="form-group">
                    <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option  value="">- Belum Diisi -</option>
                            <option  value="Hadir">Hadir</option>
                            <option  value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
                <div class="form-group">
                    <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                    <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create event
    $('body').on('click', '#btn-create-daftarhadir', function () {

        //open modal
        $('#daftarhadir-create').modal('show');
    });

    //action create 
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let title   = $('#title').val();
        let content = $('#content').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/daftarhadir`,
            type: "POST",
            cache: false,
            data: {
                "title": title,
                "content": content,
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

                //data 
                let item = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.title}</td>
                        <td>${response.data.content}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-daftarhadir" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-daftarhadir" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-daftarhadir').prepend(daftarhadir);
                
                //clear form
                $('#title').val('');
                $('#content').val('');

                //close modal
                $('#daftarhadir-create').daftarhadir('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title').removeClass('d-none');
                    $('#alert-title').addClass('d-block');

                    //add message to alert
                    $('#alert-title').html(error.responseJSON.title[0]);
                } 

                if(error.responseJSON.content[0]) {

                    //show alert
                    $('#alert-content').removeClass('d-none');
                    $('#alert-content').addClass('d-block');

                    //add message to alert
                    $('#alert-content').html(error.responseJSON.content[0]);
                } 

            }

        });

    });

</script>