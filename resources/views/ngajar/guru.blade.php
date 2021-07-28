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
                <div>{{$pelajaran->kelas->nama}} - {{$pelajaran->mapel->nama_mapel}}
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
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#materi">
                                <span>Basic</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#nilai">
                                <span>Kehadiran</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#absen">
                                <span>Nilai</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="materi" role="tabpanel">
            <button type="button" class="btn mr-2 mb-2 btn-primary create" id="#create" data-toggle="modal" data-target="#createModal">Buat Materi</button>
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        @foreach($materi as $p)
                        <div class="accordion-item card mb-2">
                            <div id="headingTwo" class="card-header">
                                <button data-bs-toggle="collapse" data-bs-target="#{{$p->kode}}" aria-expanded="true" aria-controls="{{$p->judul}}" class="text-left m-0 p-0 btn btn-link btn-block">
                                    <h5 class="m-0 p-0">Pertemuan {{$p->pertemuan}} - {{$p->judul}}</h5>
                                    <div class="float-right"><button type="button" class="btn mr-2 mb-2 btn-warning edit" id="#edit" 
                                    data-id="{{$p->id}}"
                                    data-pertemuan="{{$p->pertemuan}}"
                                    data-judul="{{$p->judul}}"
                                    data-keterangan="{{$p->keterangan}}"
                                    data-toggle="modal" data-target="#createModal">edit</button>
                                </button>
                            </div>
                            <div id="{{$p->kode}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="card-body">
                                        <table class="table">
                                            <td width="76%" rowspan="10">{{$p->keterangan}}</td> 
                                            <tr class="text-center">
                                                <td width="8%"><h1>{{$p->belumSelesai->where('jadwal_id', $pelajaran->id)->count()}}</h1></br>Belum</td>
                                                <td width="8%"><h1>{{$p->selesai->where('jadwal_id', $pelajaran->id)->count()}}</h1></br>Selesai</td>
                                                <td width="8%"><h1>{{$p->dinilai->where('jadwal_id', $pelajaran->id)->count()}}</h1></br>Dinilai</td>
                                            </tr>
                                        </table>
                                        
                                        @foreach($p->materiFile as $file)
                                            <a href="{{ asset('storage/'.$file->file) }}" target="_blank">Download Materi</a>
                                        @endforeach
                                </div>
                                <div class="d-block text-right card-footer">    
                                    <a href="{{route('tugas.detail', ['materi_id'=>$p->id,'jadwal_id'=>$pelajaran->id])}}" type="submit" class="btn-wide btn btn-success">Lihat Tugas</a>
                                </div> 
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade" id="absen" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                Nilai Siswa
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-hover" style="width: 100%;">
                                        <thead>
                                            @php
                                            $no = 1;
                                            $jumlah = $pertemuan->count();
                                            @endphp
                                            <tr>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">NIS</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">Nama</th>
                                                <th style="vertical-align: middle; text-align: center;" colspan="{{$jumlah}}">Pertemuan</th>
                                            </tr>
                                            <tr>
                                                @foreach($pertemuan as $p)
                                                <th style="vertical-align: middle; text-align: center;">{{$p->materi->pertemuan}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tugas as $w)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$w->nis}}</td>
                                                <td>{{$w->nama}}</td>
                                                @foreach($nilai as $p)
                                                @if($w->nis == $p->siswa_id)
                                                    @if($p->nilai != NULL)
                                                    <td>{{$p->nilai}}</td>
                                                    @else
                                                    <td>-</td>
                                                    @endif
                                                @endif
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
                                Kehadiran Siswa
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="myTable2" class="table table-striped table-hover" style="width: 100%;">
                                        <thead>
                                            @php
                                            $no = 1;
                                            $jumlah = $pertemuan->count();
                                            @endphp
                                            <tr>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">NIS</th>
                                                <th style="vertical-align: middle; text-align: center;" rowspan="2">Nama</th>
                                                <th style="vertical-align: middle; text-align: center;" colspan="{{$jumlah}}">Pertemuan</th>
                                            </tr>
                                            <tr>
                                                @foreach($pertemuan as $p)
                                                <th style="vertical-align: middle; text-align: center;">{{$p->materi->pertemuan}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tugas as $w)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$w->nis}}</td>
                                                <td>{{$w->nama}}</td>
                                                @foreach($pertemuan as $p)
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
    </div>
</div>
@include('materi.create')
<script>
    $(document).ready(function(){
          $(document).on('click','.create', function(){
                $('#createModal').appendTo('body');
          });
        });
    $(document).ready(function(){
          $(document).on('click','.edit', function(){
                var materi_id = $(this).attr('data-id');
                var pertemuan = $(this).attr('data-pertemuan');
                var judul = $(this).attr('data-judul');
                var keterangan = $(this).attr('data-keterangan');
                $("#materi_id").val(materi_id);
                $("#pertemuan").val(pertemuan);
                $("#judul").val(judul);
                $("#keterangan").val(keterangan);
                $('#createModal').appendTo('body');
          });
        });
  $('#myselect').select2({
    width: '100%',
    placeholder: "Pilih Kelas",
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
@endsection