<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ URL::asset('assets-user/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ URL::asset('assets-user/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ URL::asset('assets-user/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ URL::asset('assets-user/images/fevicon.png') }}" type="image/gif" />
    {{-- select 2 --}}
    <link href="{{ URL::asset('assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets-user/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ URL::asset('assets-user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets-user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <style>
        .feedback {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            border-color: #46b8da;
            margin-bottom: 30px;
        }

        #mybutton {
            position: fixed;
            bottom: -4px;
            right: 10px;
            border-radius: 40px;
        }

    </style>
    @yield('css')
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ URL::asset('assets-user/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header class="section">
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"> <a href="/"><img
                                            src="{{ URL::asset('assets-user/images/logo.png') }}" alt="#"></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                                            <a href="/">Home</a>
                                        </li>
                                        <li class="{{ request()->is('about') ? 'active' : '' }}">
                                            <a href="/about">About</a>
                                        </li>
                                        <li class="{{ request()->is('keranjang') ? 'active' : '' }}">
                                            @auth
                                                <a href="{{ route('keranjang', auth()->user()->id) }}">Keranjang</a>
                                            @endauth
                                            @guest
                                                <a href="#" id="keranjang">Keranjang</a>
                                            @endguest
                                        </li>
                                        <li>
                                            @auth
                                                <a href="{{ route('logoutUser') }}">Logout</a>
                                            @endauth
                                            @guest
                                                <a href="{{ route('login') }}">Login</a>
                                            @endguest
                                        </li>
                                        <li class="{{ request()->is('index-detail-transaksi') ? 'active' : '' }}">
                                            <a href="/index-detail-transaksi">Detail Transaksi</a>
                                        </li>
                                        @if (request()->is('/'))
                                            <li class="d-flex justify-content-end">
                                                <input type="text" class="form-control btn-sm"
                                                    placeholder="Search product.." id="input-search">
                                                <button class="btn-sm" id="btn-seacrh">Cari..</button>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    <section>
        <div style="margin-bottom: 100px" id="main_slider" class="section carousel slide banner-main"
            data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                <li data-target="#main_slider" data-slide-to="1"></li>
                <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="carousel-caption ">
                                    <h1>Welcome to <strong class="color">Our Shop</strong></h1>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour</p>
                                    <a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a>
                                    <a class="btn btn-lg btn-primary" href="about.html" role="button">About </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box">
                                    <figure><img src="{{ URL::asset('assets-user/images/boksing-gloves.png') }}"
                                            alt="img" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="carousel-caption ">
                                    <h1>Welcome to <strong class="color">Our Shop</strong></h1>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour</p>
                                    <a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a>
                                    <a class="btn btn-lg btn-primary" href="about.html" role="button">About</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box ">
                                    <figure><img src="{{ URL::asset('assets-user/images/boksing-gloves.png') }}"
                                            alt="img" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="carousel-caption ">
                                    <h1>Welcome to <strong class="color">Our Shop</strong></h1>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour</p>
                                    <a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a>
                                    <a class="btn btn-lg btn-primary" href="about.html" role="button">About</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box">
                                    <figure><img src="{{ URL::asset('assets-user/images/boksing-gloves.png') }}"
                                            alt="img" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i></a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>

    @yield('content')

    {{-- <div class="contact_us_2 layout_padding paddind_bottom_0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="soc_text">soC</div>
                </div>
                <div class="col-md-6">
                    <div class="email_btn">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Name" name="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Email"
                                    name="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Phone"
                                    name="Phone">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Massage"
                                    name="text3">
                            </div>
                            <div class="submit_btn">
                                <button type="submit" class="btn btn-primary"
                                    style="background: #081b30; color: #fff; padding: 11px;">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="contact_us_3 layout_padding">

                </div>
            </div>
        </div>
    </div> --}}


    <div id="footer" class="Address layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titlepage">
                        <div class="main">
                            <h1 class="address_text">Address</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="address_2">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="site_info">
                            <span class="info_icon"><img src="images/map-icon.png" /></span>
                            <span style="margin-top: 10px;">No.123 Chalingt Gates, Supper market New York</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="site_info">
                            <span class="info_icon"><img src="images/phone-icon.png" /></span>
                            <span style="margin-top: 21px;">( +71 7986543234 )</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="site_info">
                            <span class="info_icon"><img src="images/email-icon.png" /></span>
                            <span style="margin-top: 21px;">demo@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu_main">
            <div class="menu_text">
                <ul class="">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="testmonial.html">Testmonial</a></li>
                    <li><a href="clients.html">Shop</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="mybutton">
        <button class="feedback">Whatsapp</button>
    </div>
    </div>

    <!-- end Contact Us-->
    <!-- footer start-->
    <div id="plant" class="footer layout_padding">
        <div class="container">
            <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
        </div>
    </div>

    <!-- Javascript files-->
    <script src="{{ URL::asset('assets-user/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets-user/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets-user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets-user/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets-user/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ URL::asset('assets-user/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ URL::asset('assets-user/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ URL::asset('assets-user/js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <!-- sweetalert -->
    <script src="{{ URL::asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ URL::asset('assets/select2/js/select2.min.js') }}"></script>
    @yield('javascript')
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
            $('#keranjang').on('click', function() {
                Swal.fire(
                    'Warning!!',
                    'anda harus login terlebih dahulu..',
                    'warning'
                )
            })
        });

    </script>
</body>

</html>
