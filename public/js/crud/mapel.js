$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
//Tabel Mata Pelajaran
    var tableMapel = $('.table-mapel').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kd_mapel', name: 'kd_mapel'},
            {data: 'nama_mapel', name: 'nama_mapel'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Mapel
    $('#createMapel').click(function () {
        $('#saveJurusan').val("create-mapel");
        $('#mapel_id').val('');
        $('#mapelFormCreate').trigger("reset");
        $('#modelHeading').html("Tambah Mata Pelajaran");
        $('#modalCreateMapel').modal('show');
        $('#modalCreateMapel').appendTo('body');
    });

//EDIT Mapel
    $('body').on('click', '.editMapel', function () {
        var mapel_id = $(this).data('id');
        $.get("mapel" +'/' + mapel_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Mata Pelajaran");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreateMapel').modal('show');
                $('#modalCreateMapel').appendTo('body');
                $('#mapel_id').val(data.id);
                $('#kd_mapel').val(data.kd_mapel);
                $('#nama_mapel').val(data.nama_mapel);
        })
    });


//SAVE & UPDATE Mapel
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#mapelFormCreate').serialize(),
            url: "mapel",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#mapelFormCreate').trigger("reset");
                $('#modalCreateMapel').modal('hide');
                $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                tableMapel.draw();
                Swal.fire("Sukes!", "Mata Pelajaran Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });

//DELETE Mapel
    $('body').on('click', '.deleteMapel', function (){
        var mapel_id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
        }).then((result) =>{
                if (result.isConfirmed){
                    $.ajax({
                    type: "DELETE",
                    url: "mapel"+'/'+mapel_id,
                    success: function (data) {
                        tableMapel.draw();
                        Swal.fire("Sukes!", "Mata Pelajaran Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});