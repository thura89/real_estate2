<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('admin.dashboard')}}" class="@yield('dashboard-active')">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboards
                    </a>
                </li>
                <li class="app-sidebar__heading">User Management</li>
                <li>
                    <a href="{{ route('admin.admin-user.index')}}" class="@yield('admin-user-active')">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Admin Management
                    </a>
                    <a href="{{ route('admin.agent-user.index')}}" class="@yield('agent-user-active')">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Agent Management
                    </a>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-user"></i>
                        User Management
                    </a>
                  
                </li>
                <li class="app-sidebar__heading">Properties Management</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-menu"></i>
                        Properties
                    </a>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Want to Buy List
                    </a>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Want to Rent List
                    </a>
                </li>
                <li class="app-sidebar__heading">News</li>
                <li>
                    <a href="forms-controls.html">
                        <i class="metismenu-icon pe-7s-news-paper">
                        </i>News Management
                    </a>
                </li>
                <li class="app-sidebar__heading">Settings</li>
                <li>
                    <a href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="metismenu-icon pe-7s-power">
                        </i>Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              
            </ul>
        </div>
    </div>
</div>