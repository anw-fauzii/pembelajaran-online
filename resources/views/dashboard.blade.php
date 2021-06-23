@extends('layouts.app')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Dashboard
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
                        Success!
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card-body">
                            @if ($libur)
                                <div class="text-center">
                                    <p>Absen Libur (Hari Libur Nasional {{ $holiday }})</p>
                                </div>
                            @else
                                @if (date('l') == "Saturday" || date('l') == "Sunday") 
                                    <div class="text-center">
                                        <p>Absen Libur</p>
                                    </div>
                                @else
                                    @if ($absen)
                                        @if ($absen->keterangan == 'Alpha')
                                            <div class="text-center">
                                                @if (strtotime(date('H:i:s')) >= strtotime('07:00:00') && strtotime(date('H:i:s')) <= strtotime('17:00:00'))
                                                    <p>Silahkan Check-in</p>
                                                    <form action="{{ route('absen') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        <button class="btn btn-primary" type="submit">Check-in</button>
                                                    </form>
                                                @else
                                                    <p>Check-in Belum Tersedia</p>
                                                @endif
                                            </div>
                                        @elseif($absen->keterangan == 'Cuti')
                                            <div class="text-center">
                                                <p>Anda Sedang Cuti</p>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <p>
                                                    Check-in hari ini pukul : ({{ ($absen->jam_absen) }})
                                                </p>
                                            </div>
                                        @endif
                                    @else
                                        <div class="text-center">
                                            @if (strtotime(date('H:i:s')) >= strtotime('0 :00:00') && strtotime(date('H:i:s')) <= strtotime('17:00:00'))
                                                <p>Silahkan Check-in</p>
                                                <form action="{{ route('absen') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <button class="btn btn-primary" type="submit">Check-in</button>
                                                </form>
                                            @else
                                                <p>Check-in Belum Tersedia</p>
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
</div>
@endsection