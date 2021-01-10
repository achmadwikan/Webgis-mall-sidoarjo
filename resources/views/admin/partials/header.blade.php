<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">

                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons" style="display:flex;align-items:center">
                        <li class="nav-item d-none d-lg-block d-xl-block">
                            <strong>Selamat Datang di Halaman {{auth()->user()->role_id == 1 ? 'Admin' : 'Member'}}</strong>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    {{-- @include('layouts.partials.notification') --}}
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{ auth()->user()->name ?? '' }}</span><span class="user-status">{{auth()->user()->role_id == 1 ? 'Admin' : 'Member'}}</span></div><span><img class="round" src="{{ auth()->user()->image ? asset('web_asset/profile/'.auth()->user()->image) : asset('pvktii/profile.png') }}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('auth.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
    @csrf
</form>