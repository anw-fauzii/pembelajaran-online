@extends('layouts.app')

@section('title')
    <title>Murid Bimbingan</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Murid Bimbingan
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header">
                    <ul class="tabs-animated body-tabs-animated nav nav-justified">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#forum">
                                <span>Kehadiran</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#nilai">
                                <span>Nilai</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-12">
            <form action="{{ route('bimbingan', $kelasss->id) }}" method="get" enctype="multipart/form-data">
                @csrf 
            <div class="position-relative row form-group">
                <label class="col-sm-5" for="kelas_id"><select name="mapel" id="mapel" class="form-control">   
                <option disable="true" selected="true" disabled> --- Pilih Mata Pelajaran --- </option>
                    @foreach ($jadwal as $p)
                        <option value="{{ $p->id }}">{{ $p->mapel->nama_mapel }}</option>
                    @endforeach
                </select></label>
                <div class="col-sm-7">
                    <input class="btn btn-primary" name="filter" type="submit" value="Lihat">
                </form>
                </div>
        </div>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="forum" role="tabpanel">
            <div class="row">
                <div class="col-md-12">    
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                @if($judul == "")
                                Silakhan Pilih mapel Dahulu
                                @else
                                Kehadiran {{$judul->mapel->nama_mapel}}
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-hover" style="width: 100%;">
                                        <thead>
                                            @php
                                            $no = 1;
                                            $jumlah = $materi->count();
                                            @endphp
                                            <tr>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">NIS</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">Nama</th>
                                                <th style="vertical-align: middle; text-align: center;" colspan="{{$jumlah}}">Pertemuan</th>
                                            </tr>
                                            <tr>
                                                @if($jumlah != 0)
                                                @foreach($materi as $p)
                                                <th style="vertical-align: middle; text-align: center;">{{$p->materi->pertemuan}}</th>
                                                @endforeach
                                                @else
                                                <th>-</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($siswa as $w)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$w->nis}}</td>
                                                <td>{{$w->nama}}</td>
                                                @foreach($materi as $p)
                                                    @foreach($absen as $a)
                                                        @if($w->nis == $a->siswa_id && $a->tanggal == $p->materi->created_at->format('Y-m-d'))
                                                            @if($a->keterangan != NULL)
                                                            <td>{{$a->keterangan}}</td>
                                                            @else
                                                            <td>-</td>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade" id="nilai" role="tabpanel">
            <div class="row">  
                <div class="col-md-12">    
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                @if($judul == "")
                                Silakhan Pilih mapel Dahulu
                                @else
                                Nilai {{$judul->mapel->nama_mapel}}
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-hover" style="width: 100%;">
                                        <thead>
                                            @php
                                            $no = 1;
                                            $jumlah = $materi->count();
                                            @endphp
                                            <tr>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">NIS</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">Nama</th>
                                                <th style="vertical-align: middle; text-align: center;" colspan="{{$jumlah}}">Pertemuan</th>
                                            </tr>
                                            <tr>
                                                @if($jumlah != 0)
                                                @foreach($materi as $p)
                                                <th style="vertical-align: middle; text-align: center;">{{$p->materi->pertemuan}}</th>
                                                @endforeach
                                                @else
                                                <th>-</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($siswa as $w)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$w->nis}}</td>
                                                <td>{{$w->nama}}</td>
                                                    @foreach($nilai as $p)
                                                    @if($w->nis == $p->siswa_id)
                                                        @if($p->nilai != NULL)
                                                        <td>
                                                            @if($p->diskusi == "Aktif")
                                                            <a href="#" data-toggle="tooltip" title="Aktif Berdiskusi" class="mb-2 mr-2 badge badge-success">{{$p->nilai}}</a>
                                                            @else
                                                            <a href="#" data-toggle="tooltip" title="Tidak Aktif Berdiskusi" class="mb-2 mr-2 badge badge-danger">{{$p->nilai}}</a>
                                                            @endif
                                                        </td>
                                                        @else
                                                        <td>-</td>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if($jumlah == 0)
                                                <td>-</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>  
@endsection