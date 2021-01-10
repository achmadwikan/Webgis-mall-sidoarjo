<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Mall SIG</title>
    <link href="{{asset('pvktii/landing/plugin/fonts/transfonter/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('pvktii/landing/plugin/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/plugin/fonts/platicon/font/flaticon.css')}}"  rel="stylesheet">
    <link href="{{asset('pvktii/landing/plugin/fonts/themify/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/plugin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/plugin/animsition/css/animsition.min.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/plugin/lightbox/css/lightbox.min.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/plugin/slick/slick.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/plugin/player/mediaelementplayer.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/plugin/jquery-ui/jquery-ui.css')}}" rel="stylesheet" />

    <link href="{{asset('pvktii/landing/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('pvktii/landing/css/customize.css')}}" rel="stylesheet" />

    <script src="{{asset('pvktii/landing/plugin/modernizr.js')}}"></script>

</head>


<body>

<div class="animsition main-wrapper">

    <header class="vk-header vk-header-transparent">
        <div class="logo-header">
            <a href="index.html"><img src="images/logo/logo4.png" alt=""></a>
        </div>

        <div class="vk-menu-box">
            <div class="container vk-container">
                <nav class="vk-navbar navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle vk-btn-navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse vk-navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav vk-nav vk-navbar-nav">
                            <li class="active">
                                <a href="{{route('landing.index')}}">Beranda</a>
                            </li>
                            <li>
                                <a href="#">Informasi</a>
                                <ul class="vk-list vk-navbar-child">
                                    <li><a href="{{route('about.us')}}">Tentang Kami</a></li>
                                    <li><a href="#">Sejarah</a></li>
                                    <li><a href="#">Visi Misi</a></li>
                                    <li><a href="#">Organisasi</a></li>
                                    <li><a href="#">Program Kerja</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Peraturan</a>
                            </li>
                            <li>
                                <a href="#">Keanggotaan</a>
                                <ul class="vk-list vk-navbar-child">
                                    <li><a href="#">Prosedur</a></li>
                                    <li><a href="#">Pendaftaran</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('blog.index')}}">Blog</a>
                                <ul class="vk-list vk-navbar-child">
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('about.us')}}">Kontak</a>
                                <ul class="vk-list vk-navbar-child">
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masuk/Daftar</a>
                                <ul class="vk-list vk-navbar-child">
                                    <li><a href="{{route('auth.login')}}">Masuk</a></li>
                                    <li><a href="{{route('auth.regis')}}">Daftar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!--./container-->
        </div> <!--./vk-menu-box-->

        <div class="vk-function-header">
            <ul class="vk-list vk-list-inline vk-list-function-header">
                <li class="vk-lang dropdown">
                    <a href="#" class="vk-btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">
                        IND
                        <span class="vk-icon ti-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu vk-dropdown-menu">
                        <li><a href="#">ENG</a></li>
                        <li><a href="#">US</a></li>
                    </ul>
                </li>
            </ul>

            {{-- <div class="vk-bar-search vk-box collapse" id="collapseSearch">
                <div class="search-form">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="vk-btn-search vk-btn"><i class="fa fa-search"></i></button>
                </div>
            </div> --}}

        </div>
    </header>

    @yield('content')

    <footer class="vk-footer vk-footer-style-2 vk-background-image-11  vk-background-cover">
        <div class="container">
            <div class="vk-footer-top">
                <div class="col-md-4">
                    <div class="vk-footer-item item-1">
                        <div class="logo-footer">
                            <a href="#">
                                <img src="{{asset('pvktii/landing/images/logo/logo4.png')}}" alt="">
                            </a>

                        </div>
                        <p class="vk-text">Lorem Khaled Ipsum is a major key to success. They will try to close the door on you. Major key, don’t fall.</p>
                        <ul class="vk-list vk-list-inline vk-list-social-footer">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div> 
                <div class="col-md-3">
                    <div class="vk-footer-item item-2">
                        <h5 class="vk-heading">Contact us</h5>
                        <ul class="vk-list vk-list-style-1">
                            <li>
                                <i class="vk-icon fa fa-map-marker"></i>
                                2801 Carnegie Ave Cleveland,<br>
                                OH 44115, USA
                            </li>
                            <li>
                                <i class="vk-icon fa fa-phone"></i>
                                (0123) 456 879
                            </li>
                            <li>
                                <i class="vk-icon fa fa-envelope"></i>
                                pvkti@gmail.com
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-2">
                    <div class="vk-footer-item item-3">
                        <h5 class="vk-heading">Quicklink</h5>
                        <ul class="vk-list vk-list-style-2">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Tentang</a></li>
                            <li><a href="#">Peraturan</a></li>
                            <li><a href="#">Keanggotaan</a></li>
                            <li><a href="#">Berita</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="vk-footer-item item-3">
                        <h5 class="vk-heading">Tags Berita</h5>
                        <div class="vk-list-tag inverse">
                            @foreach(\App\Tag::orderBy('name', 'asc')->get()->take(9) as $tag)
                            <a href="#">{{$tag->name}}</a>
                            @endforeach
                            
                        </div>
                    </div>
                </div>

            </div> <!--./vk-footer-top-->

             <div class="vk-footer-bottom">

                <p class="vk-text">Copyright by <span class="vk-text-color-yellow-1"><a href="#">Team WebDev</a></span> with <span class="vk-text-color-yellow-1">Coffe</span></p>
            </div>


        </div><!--./container-->
    </footer>

</div>


<script src="{{asset('pvktii/landing/plugin/jquery/jquery-2.0.2.min.js')}}"></script>
<script src="{{asset('pvktii/landing/plugin/plugin.min.js')}}"></script>

<script src="{{asset('pvktii/landing/plugin/main.js')}}"></script>
<script src="{{asset('pvktii/landing/plugin/custom.js')}}"></script>

</body>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0128'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='../../../img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>

</html>