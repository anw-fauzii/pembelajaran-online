@extends('layouts.app')

@section('title')
    <title>Siswa</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Siswa
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
                    <a class="btn btn-success" href="javascript:void(0)" id="create"><i class="metismenu-icon pe-7s-note"></i> Tambah Siswa</a>
                    &nbsp;<a class="btn btn-info" href="javascript:void(0)" id="import"><i class="metismenu-icon pe-7s-upload"></i> Import Siswa</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-siswa-all">
                                <thead>
                                    <tr class="text-center">
                                        <th width="8%">No</th>
                                        <th width="12%">NIS</th>
                                        <th width="%">Jurusan</th>
                                        <th width="12%">Kelas</th>
                                        <th width="10%">Nama</th>
                                        <th width="8%">JK</th>
                                        <th width="15%">Rayon</th>
                                        <th width="12%">Kontak</th>
                                        <th width="10%">Aksi</th>
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
@include('siswa.createSiswa')
@include('siswa.siswaImport')
<script src="{{asset('js/crud/siswa.js')}}"></script>     
@endsection