<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        {{-- <h1>Y</h1><h2>O<h2><h3>Y</h3><h4>O</h4><span class="badge">Real Estate</span> --}}
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
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
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
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
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="p-0 btn">
                                    @php
                                        if(Auth::guard('developer_user')->user()->images){
                                            $profile_img =  asset('storage/developer/'.Auth::guard('developer_user')->user()->images) ;
                                        }else{
                                            $profile_img = "https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=".Auth::guard('developer_user')->user()->company_name;
                                        }
                                    @endphp
                                    <img width="42" class="rounded-circle" src="{{ $profile_img }}" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('developer.profile')}}" class="dropdown-item">My
                                        Account</a>
                                  
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('developer.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('developer.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{ Auth::guard('developer_user')->user()->company_name }}
                            </div>
                            <div class="widget-subheading">
                                Ph : {{ Auth::guard('developer_user')->user()->phone }}
                            </div>
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <button type="button"
                                class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="scrollbar-container"></div>