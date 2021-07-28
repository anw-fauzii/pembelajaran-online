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
                                        <th>Kehadiran</th>
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
                                    @foreach($ortu_siswa as $p)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>Pertemuan {{$p->materi->pertemuan}} - {{$p->materi->judul}}</td>
                                            @foreach($absen_siswa as $absen)
                                                @if($absen->tanggal == $p->materi->created_at->format('Y-m-d'))
                                                    @if($absen->keterangan != NULL)
                                                    <td>{{$absen->keterangan}}</td>
                                                    @else
                                                    <td>-</td>
                                                    @endif
                                                @else
                                                <td>-</td>
                                                @endif
                                                
                                            @endforeach
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
@endsection