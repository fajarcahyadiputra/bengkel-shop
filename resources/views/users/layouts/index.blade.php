<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets-user/images/favicon.png">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/ruangAdmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/assets-user/css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets-user/css/font-awesome.css">
    <link href="{{ URL::asset('assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <!-- Fancybox -->
    <link rel="stylesheet" href="/assets-user/css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="/assets-user/css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/assets-user/css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/assets-user/css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/assets-user/css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/assets-user/css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="/assets-user/css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="/assets-user/css/reset.css">
    <link rel="stylesheet" href="/assets-user/style.css">
    <link rel="stylesheet" href="/assets-user/css/responsive.css">



</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->


    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                                <li><i class="ti-email"></i> support@shophub.com</li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="/assets-user/images/logo.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->

                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>

                    <div class="col-md-10 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="sinlge-bar shopping">
                                <a href="#" class="single-icon"><i class="ti-bag"></i> <span
                                        class="total-count">2</span></a>
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>
                                        <a href="#">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <a href="#" class="remove" title="Remove this item"><i
                                                    class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70"
                                                    alt="#"></a>
                                            <h4><a href="#">Woman Ring</a></h4>
                                            <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                        </li>
                                        <li>
                                            <a href="#" class="remove" title="Remove this item"><i
                                                    class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70"
                                                    alt="#"></a>
                                            <h4><a href="#">Woman Necklace</a></h4>
                                            <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">$134.00</span>
                                        </div>
                                        <a href="checkout.html" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">

                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li><a href="/">Home</a></li>
                                                <li><a href="#">Kategori
                                                        <i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        @foreach ($data->kategori as $key => $value)
                                                            <li>
                                                                <a
                                                                    href="/kategoris/{{ $value->id }}">{{ $value->nama }}</a>
                                                            </li>

                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li><a href="/kontak-kami">Kontak Kami</a></li>
                                                @auth
                                                    <li><a href="#">Kategori
                                                            <i class="ti-angle-down"></i></a>
                                                        <ul class="dropdown">
                                                            @foreach ($data->kategori as $key => $value)
                                                                <li>
                                                                    <a
                                                                        href="/kategoris/{{ $value->id }}">{{ $value->nama }}</a>
                                                                </li>

                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endauth
                                                @guest
                                                    <li><a href="{{ route('login') }}">Masuk</a></li>
                                                    <li class="active"><a href="{{ route('register') }}">Daftar</a></li>
                                                @endguest
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->


    @yield("contents")

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="index.html"><img src="/assets-user/images/logo2.png" alt="#"></a>
                            </div>
                            <p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna
                                eros eu erat.
                                Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus,
                                metus.</p>
                            <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456
                                        789</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Customer Service</h4>
                            <ul>
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Get In Tuch</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>NO. 342 - London Oxford Street.</li>
                                    <li>012 United Kingdom.</li>
                                    <li>info@eshop.com</li>
                                    <li>+032 3456 7890</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com"
                                        target="_blank">Wpthemesgrid</a> - All Rights
                                    Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right">
                                <img src="/assets-user/images/payments.png" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Footer Area -->
    <!-- Jquery -->
    <script src="/assets-user/js/jquery.min.js"></script>
    <script src="/assets-user/js/jquery-migrate-3.0.0.js"></script>
    <script src="/assets-user/js/jquery-ui.min.js"></script>
    <!-- Popper JS -->
    <script src="/assets-user/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets-user/js/bootstrap.min.js"></script>
    <!-- Color JS -->
    <script src="/assets-user/js/colors.js"></script>
    <!-- Slicknav JS -->
    <script src="/assets-user/js/slicknav.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="/assets-user/js/owl-carousel.js"></script>
    <!-- Magnific Popup JS -->
    <script src="/assets-user/js/magnific-popup.js"></script>
    <!-- Waypoints JS -->
    <script src="/assets-user/js/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="/assets-user/js/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="/assets-user/js/nicesellect.js"></script>
    <!-- Flex Slider JS -->
    <script src="/assets-user/js/flex-slider.js"></script>
    <!-- ScrollUp JS -->
    <script src="/assets-user/js/scrollup.js"></script>
    <!-- Onepage Nav JS -->
    <script src="/assets-user/js/onepage-nav.min.js"></script>
    <!-- Easing JS -->
    <script src="/assets-user/js/easing.js"></script>
    <!-- Active JS -->
    <script src="/assets-user/js/active.js"></script>
    <script src="{{ URL::asset('assets/select2/js/select2.min.js') }}"></script>
    @yield('javascript')
</body>

</html>
