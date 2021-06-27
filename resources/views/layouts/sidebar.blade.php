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
                    <a href="{{route('kehadiran')}}">
                        <i class="metismenu-icon pe-7s-clock"></i>
                            Absen Harian
                    </a>
                </li>
                <li>
                    <a href="{{route('forum')}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Forum
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-box2"></i>
                            Elements
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('mapel.index')}}">
                                <i class="metismenu-icon"></i>Mata Pelajaran
                            </a>
                        </li>
                        <li>
                            <a href="{{route('jurusan.index')}}">
                                <i class="metismenu-icon"></i>Jurusan
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-box2"></i>
                            Elements
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('guru.index')}}">
                                <i class="metismenu-icon"></i>Guru
                            </a>
                        </li>
                        <li>
                            <a href="{{route('kelas.index')}}">
                                <i class="metismenu-icon"></i>Kelas
                            </a>
                        </li>
                    </ul>
                </li>                 
            </ul>
        </div>
    </div>
</div> 