<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu Utama</li>
                <li>
                    <a href="{{route('dashboard')}}" class="{{(request()->is('dashboard')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Dashboard
                    </a>
                </li>
                @role('Admin')
                <li>
                    <a href="#" class="{{(request()->is('mapel*') || request()->is('jurusan*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-study"></i>
                           Mapel dan Jurusan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{(request()->is('mapel*') || request()->is('jurusan*')) ? 'mm-show' : ''}}">
                        <li>
                            <a href="{{route('mapel.index')}}" class="{{(request()->is('mapel*')) ? 'mm-active' : ''}}">
                                <i class="metismenu-icon"></i>Mata Pelajaran
                            </a>
                        </li>
                        <li>
                            <a href="{{route('jurusan.index')}}" class="{{(request()->is('jurusan*')) ? 'mm-active' : ''}}">
                                <i class="metismenu-icon"></i>Jurusan
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{(request()->is('kelas*') || request()->is('siswa*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Kelas dan Siswa
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{(request()->is('siswa*') || request()->is('kelas*')) ? 'mm-show' : ''}}">
                        <li>
                            <a href="{{route('kelas.index')}}" class="{{(request()->is('kelas*')) ? 'mm-active' : ''}}">
                                <i class="metismenu-icon"></i>Kelas
                            </a>
                        </li>
                        <li>
                            <a href="{{route('siswa.index')}}" class="{{(request()->is('siswa*')) ? 'mm-active' : ''}}">
                                <i class="metismenu-icon"></i>Siswa
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('guru.index')}}" class="{{(request()->is('guru*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-user"></i>
                            Guru
                    </a>
                </li>
                <li>
                    <a href="{{route('ajaran.index')}}" class="{{(request()->is('ajaran*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-date"></i>
                            Tahun Ajaran
                    </a>
                </li>
                <li>
                    <a href="{{route('jadwal.index')}}" class="{{(request()->is('jadwal*')) ? 'mm-active' : ''}}"> 
                        <i class="metismenu-icon pe-7s-note2"></i>
                            Alokasi Mapel
                    </a>
                </li>
                @endrole
                @role('Ortu') 
                <li>
                    <a href="{{route('jadwal.index')}}" class="{{(request()->is('jadwal*') || request()->is('materi*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-study"></i>
                            Kelas
                    </a>
                </li>
                @endrole
                @role('Siswa') 
                <li>
                    <a href="{{route('kehadiran')}}" class="{{(request()->is('kehadiran*')) ? 'mm-show' : ''}}">
                        <i class="metismenu-icon pe-7s-clock"></i>
                            Absen Harian
                    </a>
                </li>
                <li>
                    <a href="{{route('jadwal.index')}}" class="{{(request()->is('jadwal*') || request()->is('materi*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-study"></i>
                            Kelas
                    </a>
                </li>
                @endrole
                @role('Guru') 
                <li>
                    <a href="{{route('jadwal.index')}}" class="{{(request()->is('jadwal*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-study"></i>
                            Kelas
                    </a>
                    @foreach($kelas as $p)
                    <a href="{{route('bimbingan', $p->id)}}" class="{{(request()->is('ajaran*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-users"></i>
                            Murid Bimbingan <strong>{{$p->nama}}</strong>
                    </a>
                    @endforeach
                </li>
                @endrole
                <li>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="metismenu-icon pe-7s-power"></i>Keluar</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                </li>                 
            </ul>
        </div>
    </div>
</div> 