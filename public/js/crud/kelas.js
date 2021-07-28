$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

//Tabel Kelas
    var table = $('.table-kelas').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jurusan', name: 'jurusan'},
            {data: 'kelas', name: 'kelas'},
            {data: 'angkatan', name: 'angkatan'},
            {data: 'guru', name: 'guru'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Kelas
    $('#create').click(function () {
        $('#saveBtn').val("create-mapel");
        $('#mapel_id').val('');
        $('#formCreate').trigger("reset");
        $('#modelHeading').html("Tambah Kelas");
        $('#modalCreate').modal('show');
        $('#modalCreate').appendTo('body');
    });

//EDIT Kelas
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $.get("/kelas" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Kelas");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreate').modal('show');
                $('#modalCreate').appendTo('body');
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#jurusan_id').val(data.jurusan_id);
                $('#guru_id').val(data.guru_id);
                $('#angkatan').val(data.angkatan);
        })
    });


//SAVE & UPDATE Kelas
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#formCreate').serialize(),
            url: "/kelas",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#formCreate').trigger("reset");
                $('#modalCreate').modal('hide');
                $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                table.draw();
                Swal.fire("Sukes!", "Kelas Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });

//DELETE Kelas
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
                    url: "/kelas"+'/'+id,
                    success: function (data) {
                        table.draw();
                        Swal.fire("Sukes!", "Kelas Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});