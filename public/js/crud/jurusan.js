$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

//Tabel jurusan
    var tableJurusan = $('.table-jurusan').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kd_jurusan', name: 'kd_jurusan'},
            {data: 'nama_jurusan', name: 'nama_jurusan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Jurusan
    $('#createJurusan').click(function () {
        $('#saveBtn').val("create-mapel");
        $('#jurusan_id').val('');
        $('#jurusanFormCreate').trigger("reset");
        $('#modelHeading').html("Tambah Jurusan");
        $('#modalCreateJurusan').modal('show');
        $('#modalCreateJurusan').appendTo('body');
    });

//EDIT Jurusan
$('body').on('click', '.editJurusan', function () {
        var jurusan_id = $(this).data('id');
        $.get("jurusan" +'/' + jurusan_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Mata Pelajaran");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreateJurusan').modal('show');
                $('#modalCreateJurusan').appendTo('body');
                $('#jurusan_id').val(data.id);
                $('#kd_jurusan').val(data.kd_jurusan);
                $('#nama_jurusan').val(data.nama_jurusan);
        })
    });

//SAVE & UPDATE Jurusan
    $('#saveJurusan').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#jurusanFormCreate').serialize(),
            url: "jurusan",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#jurusanFormCreate').trigger("reset");
                $('#modalCreateJurusan').modal('hide');
                $('#saveJurusan').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                tableJurusan.draw();
                Swal.fire("Sukes!", "Jurusan Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });

//DELETE Jurusan
    $('body').on('click', '.deleteJurusan', function (){
        var jurusan_id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
        }).then((result) =>{
                if (result.isConfirmed){
                    $.ajax({
                    type: "DELETE",
                    url: "jurusan"+'/'+jurusan_id,
                    success: function (data) {
                        tableJurusan.draw();
                        Swal.fire("Sukes!", "Jurusan Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});