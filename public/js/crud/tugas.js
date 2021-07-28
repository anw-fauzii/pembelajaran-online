$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

//Tabel Siswa
    var table = $('.table-tugas').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'siswa', name: 'siswa'},
            {data: 'diskusi', name: 'diskusi'},
            {data: 'status', name: 'status'},
            {data: 'tugas', name: 'tugas'},
            {data: 'nilai', name: 'nilai'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#create').click(function () {
        $('#saveBtn').val("create-mapel");
        $('#mapel_id').val('');
        $('#modelHeading').html("Detail Tugas");
        $('#modalCreate').modal('show');
        $('#modalCreate').appendTo('body');
    });

    //EDIT Mapel
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        var radios =$('#input:radio[name="diskusi"]');
        $.get("/tugas" +'/' + id +'/edit', function (data) {
                var nilai = data.diskusi;
                $('#modelHeading').html("Edit Guru");
                $('#saveBtn').val("edit-mapel");
                $('#modalEdit').modal('show');
                $('#modalEdit').appendTo('body');
                $('#tugas_id').val(data.id);
                $('#nilai').val(data.nilai);
                if(radios.is(':checked') === false){
                    if (nilai === "Aktif"){
                        radios.filter('[value=Aktif]').prop('checked', true);
                    }
                }
            
                $('#keterangan').val(data.keterangan);

        })
    });

    //SAVE & UPDATE Mapel
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#formCreate').serialize(),
            url: "/tugas",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#formCreate').trigger("reset");
                $('#modalEdit').modal('hide');
                $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                table.draw();
                Swal.fire("Sukes!", "Tugas Berhasil Dinilai!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });
});