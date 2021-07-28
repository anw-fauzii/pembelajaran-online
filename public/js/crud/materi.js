$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
//Tabel Guru
    var table = $('.table-materi').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'pertemuan', name: 'pertemuan'},
            {data: 'judul', name: 'judul'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Mapel
    $('#create').click(function () {
        $('#saveBtn').val("create-mapel");
        $('#mapel_id').val('');
        $('#formCreate').trigger("reset");
        $('#modelHeading').html("Tambah Guru");
        $('#modalCreate').modal('show');
        $('#modalCreate').appendTo('body');
    });

//EDIT Mapel
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $.get("guru" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Guru");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreate').modal('show');
                $('#modalCreate').appendTo('body');
                $('#id').val(data.id);
                $('#nip').val(data.nip);
                $('#nip_old').val(data.nip);
                $('#nama_guru').val(data.nama_guru);
                $('#kontak').val(data.kontak);
        })
    });


//SAVE & UPDATE Mapel
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#formCreate').serialize(),
            url: "guru",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#formCreate').trigger("reset");
                $('#modalCreate').modal('hide');
                $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                table.draw();
                Swal.fire("Sukes!", "Guru Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });

//DELETE Mapel
    $('body').on('click', '.delete', function (){
        var id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
        }).then((result) =>{
                if (result.isConfirmed){
                    $.ajax({
                    type: "DELETE",
                    url: "guru"+'/'+id,
                    success: function (data) {
                        table.draw();
                        Swal.fire("Sukes!", "Guru Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});