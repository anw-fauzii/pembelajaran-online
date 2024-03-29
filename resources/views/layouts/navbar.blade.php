<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"><img src="{{asset('storage/logo.png')}}" width="150px"></div>
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
        <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">                                 
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img width="42" class="rounded-circle" src="{{asset('storage/user.png')}}" alt="">
                                        </a>
                                        <div class="dropdown-menu">
                                        <div class="text-center">
                                            <img width="100" class="rounded-circle" src="{{asset('storage/user.png')}}" alt="">
                                        </div>
                                        <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Profil</a>
                                            <a class="dropdown-item" href="#">Ganti Password</a>
                                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Keluar</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-right ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <strong>{{ Auth::user()->id }}</strong>
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->id }}    
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>      
        </div>
    </div>
</div> 