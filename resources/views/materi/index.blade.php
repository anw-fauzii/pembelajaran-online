@extends('layouts.app')

@section('title')
    <title>Jadwal</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Tugas dan Materi
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    @role('Guru')
    <button type="button" class="btn mr-2 mb-2 btn-primary create" id="#create" data-toggle="modal" data-target="#createModal">Buat Materi</button>
    @endrole
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                    <a class="btn btn-success" href="javascript:void(0)" id="create"><i class="metismenu-icon pe-7s-note"></i> Tambah Kelas</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-materi">
                                <thead>
                                    <tr class="text-center">
                                        <th width="8%">No</th>
                                        <th width="25%">Jurusan</th>
                                        <th width="15%">Kelas</th>
                                        <th width="12%">Angkatan</th>
                                        <th width="20%">Wali Kelas</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
@include('materi.create')
@include('materi.tugas')
<script>
    $(document).ready(function(){
          $(document).on('click','.create', function(){
              $('#createModal').appendTo('body');
          });
        });
    $(document).ready(function(){
          $(document).on('click','.tugas', function(){
            var judula = $(this).attr('data-judula'),
                mapel = $(this).attr('data-mapel');
            $("#judula").html(judula);
            $("#mapel").html(mapel);
            $('#createTugasModal').appendTo('body');
          });
        });
  $('#myselect').select2({
    width: '100%',
    placeholder: "Pilih Kelas",
  });
</script>

@endsection