<div class="row">
    <div class="col-md-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    Identitas Siswa
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 card">
                                <div class="card-body text-center">
                                    <img width="85%" src="{{asset('storage/user.png')}}" alt="">
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <table class="table">
                                    <tr>
                                        <td>NIS</td>
                                        <td>:</td>
                                        <td>{{$siswa->nis}}</td>
                                    </tr>    
                                    <tr>
                                        <td width="10%">Nama</td>
                                        <td width="5%">:</td>
                                        <td width="85%">{{$siswa->nama}}</td>
                                    </tr>
                                    <tr>
                                        <td>Rayon</td>
                                        <td>:</td>
                                        <td>{{$siswa->rayon}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td>{{$siswa->kelas->nama}}</td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan</td>
                                        <td>:</td>
                                        <td>{{$siswa->kelas->angkatan}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    Absensi Siswa
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <table class="table">
                        <tr>
                            <td>Tepat Waktu</td>
                            <td>:</td>
                            <td>{{$absen->where('keterangan', "Tepat waktu")->count()}}</td>
                        </tr>    
                        <tr>
                            <td width="30%">Tanpa Keterangan</td>
                            <td width="10%">:</td>
                            <td width="60%">{{$absen->where('keterangan', "Alpha")->count()}}</td>
                        </tr>
                        <tr>
                            <td>Sakit</td>
                            <td>:</td>
                            <td>{{$absen->where('keterangan', "Sakit")->count()}}</td>
                        </tr>
                        <tr>
                            <td>Izin</td>
                            <td>:</td>
                            <td>{{$absen->where('keterangan', "Izin")->count()}}</td>
                        </tr>
                        <tr>
                            <td>Telat</td>
                            <td>:</td>
                            <td>{{$absen->where('keterangan', "Telat")->count()}}</td>
                        </tr>
                    </table>
                </div>
            </div> 
        </div>
    </div>  
    <div class="col-md-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    Tugas Siswa
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <table class="table">
                        <tr>
                            <td width="30%">Selesai</td>
                            <td width="10%">:</td>
                            <td width="60%">{{$tugas->where('status', "Selesai")->count()}}</td>
                        </tr>
                        <tr>
                            <td>Belum Selesai</td>
                            <td>:</td>
                            <td>{{$tugas->where('status', "Belum Selesai")->count()}}</td>
                        </tr>
                        <tr>
                            <td>Sudah Dinilai</td>
                            <td>:</td>
                            <td>{{$tugas->where('status', "Sudah Dinilai")->count()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>