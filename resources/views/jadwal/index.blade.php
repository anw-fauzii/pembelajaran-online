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
                <div>Jadwal
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                    <a class="btn btn-success" href="javascript:void(0)" id="create"><i class="metismenu-icon pe-7s-note"></i> Tambah Jurusan</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-jadwal">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10%">No</th>
                                        <th width="15%">Kelas</th>
                                        <th width="20%">Mapel</th>
                                        <th width="10%">Hari</th>
                                        <th width="10%">Mulai</th>
                                        <th width="10%">Selesai</th>
                                        <th width="15%">Guru</th>
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
@include('jadwal.create')
<script src="{{asset('js/crud/jadwal.js')}}"></script>     
@endsection