@extends('layouts.app')

@section('title')
    <title>{{$pelajaran->mapel->nama_mapel}}</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>{{$pelajaran->mapel->nama_mapel}}
                    <div class="page-title-subheading">Guru : <strong>{{$pelajaran->guru->nama_guru}}</strong>
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
                                <span>Materi</span>
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
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="forum" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        @foreach($materi as $p)
                        <div class="accordion-item card mb-2">
                            <div id="headingTwo" class="card-header">
                                <button data-bs-toggle="collapse" data-bs-target="#{{$p->kode}}" aria-expanded="true" aria-controls="{{$p->judul}}" class="text-left m-0 p-0 btn btn-link btn-block">
                                    <h5 class="m-0 p-0">Pertemuan {{$p->pertemuan}} - {{$p->judul}}</h5>
                                </button>
                            </div>
                            <div id="{{$p->kode}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    {{$p->keterangan}}<br><br>
                                        @foreach($p->materiFile as $file)
                                            <a href="{{ asset('storage/'.$file->file) }}" target="_blank"><strong>Download Materi</strong></a>
                                        @endforeach
                                        @foreach($p->tugasSiswa as $tugas)
                                                {{$tugas->status}}
                                            @endforeach
                                        
                                </div>
                                <div class="d-block text-right card-footer">
                                    <button type="button" class="btn mr-2 mb-2 btn-success tugas" id="#tugas" data-toggle="modal"    
                                            data-status="@foreach($p->tugasSiswa as $tugas)
                                                {{$tugas->status}}
                                            @endforeach"
                                            data-statusa="@foreach($p->tugasSiswa as $tugas)
                                                {{$tugas->id}}
                                            @endforeach"
                                            data-tugas="@foreach($p->tugasSiswa as $tugas)
                                                
                                            @if ($tugas->tugas != NULL)
                                                <a href='{{ asset('storage/'.$tugas->tugas) }}' target='_blank'><strong>Lihat Tugas</strong></a>
                                            @else
                                                Belum Dibuat
                                            @endif
                                            
                                            @endforeach"
                                        data-pertemuan="{{$p->pertemuan}}"
                                        data-judul="{{$p->judul}}"
                                    data-target="#exampleModal">Buat Tugas</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                                Nilai Siswa
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="8%">No</th>
                                                <th width="24%">Pertemuan</th>
                                                <th width="10%">Tugas</th>
                                                <th width="15%">Status</th>
                                                <th width="8%">Nilai</th>
                                                <th width="35%">Komentar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach($tugas_siswa as $p)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>Pertemuan {{$p->materi->pertemuan}} - {{$p->materi->judul}}</td>
                                                @if($p->tugas)
                                                <td><a href="{{ asset('storage/'.$p->tugas) }}" target="_blank"><strong>Lihat</strong></a></td>
                                                @else
                                                <td>Tidak Ada</td>
                                                @endif
                                                <td>{{$p->status}}</td>
                                                <td>{{$p->nilai}}</td>
                                                <td>{{$p->keterangan}}</td>
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
@include('materi.tugas')
<script>
    $(document).ready(function(){
          $(document).on('click','.tugas', function(){
              var pertemuan = $(this).attr('data-pertemuan');
              var status = $(this).attr('data-status');
              var statusa = $(this).attr('data-statusa');
              var judul = $(this).attr('data-judul');
              var tugas = $(this).attr('data-tugas');
                $("#pertemuan").html(pertemuan);
                $("#beres").html(tugas);
                $("#judul").html(judul);
                $("#status").html(status);
                $("#statusa").val(statusa);
              $('#exampleModal').appendTo('body');
          });
        });
  $('#myselect').select2({
    width: '100%',
    placeholder: "Pilih Kelas",
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
@endsection