<script type="text/javascript">
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

//CREATE Mapel
    $('#createMapel').click(function () {
        $('#saveJurusan').val("create-mapel");
        $('#mapel_id').val('');
        $('#mapelFormCreate').trigger("reset");
        $('#modelHeading').html("Tambah Mata Pelajaran");
        $('#modalCreateMapel').modal('show');
        $('#modalCreateMapel').appendTo('body');
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

//EDIT Mapel
    $('body').on('click', '.editMapel', function () {
        var mapel_id = $(this).data('id');
        $.get("{{ route('mapel.index') }}" +'/' + mapel_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Mata Pelajaran");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreateMapel').modal('show');
                $('#modalCreateMapel').appendTo('body');
                $('#mapel_id').val(data.id);
                $('#kd_mapel').val(data.kd_mapel);
                $('#nama_mapel').val(data.nama_mapel);
        })
    });

//EDIT Jurusan
$('body').on('click', '.editJurusan', function () {
        var jurusan_id = $(this).data('id');
        $.get("{{ route('jurusan.index') }}" +'/' + jurusan_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Mata Pelajaran");
                $('#saveBtn').val("edit-mapel");
                $('#modalCreateJurusan').modal('show');
                $('#modalCreateJurusan').appendTo('body');
                $('#jurusan_id').val(data.id);
                $('#kd_jurusan').val(data.kd_jurusan);
                $('#nama_jurusan').val(data.nama_jurusan);
        })
    });

//SAVE & UPDATE Mapel
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#mapelFormCreate').serialize(),
            url: "{{ route('mapel.store') }}",
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

//SAVE & UPDATE Jurusan
    $('#saveJurusan').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#jurusanFormCreate').serialize(),
            url: "{{ route('jurusan.store') }}",
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
                    url: "{{ route('mapel.store') }}"+'/'+mapel_id,
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
                    url: "{{ route('jurusan.store') }}"+'/'+jurusan_id,
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
</script>