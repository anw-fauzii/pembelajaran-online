@extends('layouts.app')

@section('title')
    <title>Absen Harian</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Absen Harian
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
                        Absen Harian
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        @if ($libur)
                            <div class="text-center">
                                <p>Absen Libur (Hari Libur Nasional {{ $holiday }})</p>
                            </div>
                        @else
                            @if (date('l') == "Sunday") 
                                <div class="text-center">
                                    <p>Sekolah Libur</p>
                                </div>
                            @else
                                @if ($absen)
                                    @if ($absen->keterangan == 'Alpha')
                                        <div class="text-center">
                                            @if (strtotime(date('H:i:s')) >= strtotime('06:00:00') && strtotime(date('H:i:s')) <= strtotime('23:00:00'))
                                                <p>Silahkan Absen</p>
                                                <form action="{{ route('harian') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="siswa_id" value="{{ Auth::user()->id }}">
                                                    <div class="col-md-12 mb-2 text-center">
                                                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                            alt="preview image" style="max-height: 150px;">
                                                        <div class="col-md-6 mt-2">
                                                            <input name="logo" id="logo" type="file" class="form-control-file">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <input class="btn btn-primary" name="hadir" type="submit" value="Hadir">
                                                        <input class="btn btn-primary" name="sakit" type="submit" value="Sakit">
                                                        <input class="btn btn-primary" name="izin" type="submit" value="Izin">
                                                    </div>
                                                </form>
                                                
                                            @else
                                                <p>Absen Belum Tersedia</p>
                                            @endif
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <p>
                                                Absen hari ini pukul : ({{ ($absen->jam_absen) }})
                                                {{$absen->keterangan}}
                                            </p>
                                        </div>
                                    @endif
                                @else
                                    <div class="text-center">
                                        @if (strtotime(date('H:i:s')) >= strtotime('06:00:00') && strtotime(date('H:i:s')) <= strtotime('23:00:00'))
                                            <p>Silahkan Absen</p>
                                            <form action="{{ route('harian') }}" method="post" enctype="multipart/form-data" >
                                                @csrf
                                                    <input type="hidden" name="siswa_id" value="{{ Auth::user()->id }}">
                                                    <div class="col-md-12 mb-2 text-center">
                                                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                            alt="preview image" style="max-height: 150px;">
                                                        <div class="col-md-6 mt-2">
                                                            <input name="logo" id="logo" type="file" class="form-control-file">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <input class="btn btn-primary" name="hadir" type="submit" value="Hadir">
                                                        <input class="btn btn-primary" name="sakit" type="submit" value="Sakit">
                                                        <input class="btn btn-primary" name="izin" type="submit" value="Izin">
                                                    </div>
                                            </form>
                                        @else
                                            <p>Absen Belum Tersedia</p>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
<script type="text/javascript"> 
$(document).ready(function (e) {
   $('#logo').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
   });
});
 
</script>
@endsection