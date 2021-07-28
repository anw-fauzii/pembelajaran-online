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
        <form action="{{ route('jadwal.lihat') }}" method="get" enctype="multipart/form-data">
            @csrf 
            <div class="position-relative row form-group">
            <label class="col-sm-5" for="kelas_id"><select name="tp" id="tp" class="form-control">   
            <option disable="true" selected="true" disabled> --- Pilih Tahun Ajaran --- </option>
                @foreach ($tp as $p)
                    <option value="{{ $p->tp }}">{{ $p->tp }}</option>
                @endforeach
            </select></label>
        <div class="col-sm-7">
            <input class="btn btn-primary" name="filter" type="submit" value="Lihat">
        </form>
        </div>
    </div>
    <div class="row">
    @foreach($jadwal as $p)
        <div class="col-md-4">
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="tab-content">
                        @role('Siswa')
                            Guru &nbsp; : <strong> {{$p->guru->nama_guru}}</strong></br>
                            Mapel : <strong> {{$p->mapel->nama_mapel}}</strong></br>
                            Tahun : <strong> {{$p->tp}}</strong></br>
                        @endrole
                        @role('Guru')
                            Kelas &nbsp; : <strong> {{$p->kelas->nama}}</strong></br>
                            Mapel : <strong> {{$p->mapel->nama_mapel}}</strong></br>
                            Tahun : <strong> {{$p->tp}}</strong></br>
                        @endrole
                        @role('Ortu')
                            Guru &nbsp; : <strong> {{$p->guru->nama_guru}}</strong></br>
                            Mapel : <strong> {{$p->mapel->nama_mapel}}</strong></br>
                            Tahun : <strong> {{$p->tp}}</strong></br>
                        @endrole
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <a href="{{route('materi.show', [$p->id])}}" class="btn-wide btn btn-success">Lihat Kelas</a>
                </div> 
            </div>
        </div>
    @endforeach 
    </div>
</div> 
@endsection