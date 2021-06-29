$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

//Tabel Siswa
    var table = $('.table-siswa').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nis', name: 'nis'},
            {data: 'nama', name: 'nama'},
            {data: 'jk', name: 'jk'},
            {data: 'ortu', name: 'ortu'},
            {data: 'kontak', name: 'kontak'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Siswa
    $('#create').click(function () {
        $('#saveBtn').val("create-mapel");
        $('#mapel_id').val('');
        $('#formCreate').trigger("reset");
        $('#modelHeading').html("Tambah Siswa");
        $('#modalCreate').modal('show');
        $('#modalCreate').appendTo('body');
    });

//EDIT Siswa
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $.get("/siswa" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Siswa");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreate').modal('show');
                $('#modalCreate').appendTo('body');
                $('#id').val(data.id);
                $('#nis').val(data.nis);
                $('#nis_old').val(data.nis);
                $('#nama').val(data.nama);
                $("input[value='"+data.jk+"']").prop('checked', true);
                $('#jk').val(data.jk);
                $('#kontak').val(data.kontak);
                $('#ortu').val(data.ortu);
        })
    });


//SAVE & UPDATE Siswa
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#formCreate').serialize(),
            url: "/siswa",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#formCreate').trigger("reset");
                $('#modalCreate').modal('hide');
                $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                table.draw();
                Swal.fire("Sukes!", "Siswa Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });

//DELETE Siswa
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
                    url: "/siswa"+'/'+id,
                    success: function (data) {
                        table.draw();
                        Swal.fire("Sukes!", "Siswa Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});