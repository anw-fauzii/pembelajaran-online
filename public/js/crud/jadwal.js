$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
//Tabel Jadwal
    var table = $('.table-jadwal').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kelas', name: 'kelas'},
            {data: 'mapel', name: 'mapel'},
            {data: 'hari', name: 'hari'},
            {data: 'jam_mulai', name: 'jam_mulai'},
            {data: 'jam_selesai', name: 'jam_selesai'},
            {data: 'guru', name: 'guru'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Jadwal
    $('#create').click(function () {
        $('#saveBtn').val("create-mapel");
        $('#mapel_id').val('');
        $('#formCreate').trigger("reset");
        $('#modelHeading').html("Tambah Jadwal");
        $('#modalCreate').modal('show');
        $('#modalCreate').appendTo('body');
    });

//EDIT Jadwal
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $.get("jadwal" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Jadwal");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreate').modal('show');
                $('#modalCreate').appendTo('body');
                $('#id').val(data.id);
                $('#kelas_id').val(data.kelas_id);
                $('#mapel_id').val(data.mapel_id);
                $('#hari').val(data.hari);
                $('#jam_mulai').val(data.jam_mulai);
                $('#jam_selesai').val(data.jam_selesai);
                $('#guru_id').val(data.guru_id);
        })
    });


//SAVE & UPDATE Jadwal
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#formCreate').serialize(),
            url: "jadwal",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#formCreate').trigger("reset");
                $('#modalCreate').modal('hide');
                $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                table.draw();
                Swal.fire("Sukes!", "Jadwal Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });

//DELETE Jadwal
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
                    url: "jadwal"+'/'+id,
                    success: function (data) {
                        table.draw();
                        Swal.fire("Sukes!", "Jadwal Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});