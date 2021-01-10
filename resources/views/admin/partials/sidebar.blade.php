<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Mall SIG Admin</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
       
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" navigation-header"><span>Apps</span>
                </li>
                <li class=" nav-item {{ request()->is('admin/mall') ? 'active' : '' }}"><a href="{{route('admin.mall.index')}}"><i class="feather icon-map-pin"></i><span class="menu-title" data-i18n="Email">Mall</span></a>
                </li>
                <li class=" nav-item {{ request()->is('admin/polygon') ? 'active' : '' }}"><a href="{{route('admin.polygon.index')}}"><i class="feather icon-map"></i><span class="menu-title" data-i18n="Email">Polygon</span></a>
                </li>

                <li class=" navigation-header"><span>Utility</span>
                </li>
                <li class=" nav-item {{ request()->is('admin/kecamatan') ? 'active' : '' }}"><a href="{{route('admin.kecamatan.index')}}"><i class="feather icon-disc"></i><span class="menu-title" data-i18n="Email">Kecamatan</span></a>
                </li>
                <li class=" nav-item {{ request()->is('admin/kelurahan') ? 'active' : '' }}"><a href="{{route('admin.kelurahan.index')}}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Email">Kelurahan</span></a>
                </li>

            </ul>
        </div>
        
    </div>
    <!-- END: Main Menu-->