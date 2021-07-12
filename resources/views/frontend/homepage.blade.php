<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shopping Snap</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{asset('/frontend/img/logo.png')}}">
        <link rel="shortcut icon" type="frontend/x-icon" href="{{asset('/frontend/img/logo.png')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/templatemo.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/custom.css')}}">
        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="{{asset('/frontend/css/fontawesome.min.css')}}">
        <!--
            TemplateMo 559 Zay Shop
            
            https://templatemo.com/tm-559-zay-shop
            
            -->

        <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>

        <link rel="stylesheet" href="{{asset('frontend/header/lib/bootstrap/css/bootstrap.min.css')}}">
        <link href="{{asset('frontend/header/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- Main Stylesheet File -->
        <link href="{{asset('frontend/header/css/style.css')}}" rel="stylesheet">

        <link href="{{asset('frontend/header/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/header/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/header/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/header/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        

    </head>
    <body>
        <!--==========================
            Header
            ============================-->
        <header id="header">
            <div id="topbar">
                <div class="container">
                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div style="display: flex; justify-content: space-between;">
                    <div class="logo">
                        <a href="{{URL::to('/home')}}" style="color:grey;" class="scrollto">
                        <image src="frontend/img/logo.png" alt="your image"/>
                        <div style="float: right; padding:7.5px;">
                            <h3 class="h3"><b class="text-success">Shopping</b>Snap</h3>
                        </div>
                        </a>
                    </div>
                    <div style="display: flex; justify-content: flex-end;">
                        <div>
                            <nav class="main-nav float-right d-none d-lg-block">
                                <ul>
                                    <li><a href="{{URL::to('/home/phone')}}">Mobile</a></li>
                                    <li><a href="{{URL::to('/home/tablet')}}">Tablet</a></li>
                                    <li><a href="{{URL::to('/home/laptop')}}">Laptop</a></li>
                                    <li><a href="{{URL::to('/home/watch')}}">Watch</a></li>
                                    <li class="drop-down">
                                        <a href="{{URL::to('/home/accessories')}}">Accessories</a>
                                        <ul>
                                        <li><a href="#">Cases & Protection</a></li>
                                        <li class="drop-down">
                                            <a href="#">Photography</a>
                                            <ul>
                                                <li><a href="#">Lens</a></li>
                                                <li><a href="#">Body</a></li>
                                                <li><a href="#">Memory Stick</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Headphones & Speakers</a></li>
                                        <li><a href="#">Software</a></li>
                                        <li><a href="#">Power & Cables</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                
                            </nav>
                            <!-- .main-nav -->
                        </div>
                        <div>
                            <div class="navbar align-self-center d-flex" style="margin-right:30px;">
                                <div style="margin-right: 15px;">
                                    <a class="nav-icon position-relative text-decoration-none" href="#">
                                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                                    </a>
                                </div>
                                <div>
                                    @if(Auth::user())
                                    <div style="margin-top:0px !important
                                    " class="top-nav clearfix">
                                        <ul style="border-radius:20px;" class="nav pull-right top-menu">
                                            <!-- user login dropdown start-->
                                            <li class="dropdown">
                                                <a style="color:rgb(134, 134, 134) !important;" data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                   
                                                    <span class="username">
                                                        {{Auth::user()->name}}
                                                    </span>
                                                </a>
                                                <ul class="dropdown-menu extended logout">
                                                    <li><a style="margin-left: 20px; color:rgb(134, 134, 134) !important;" href="{{asset('logout')}}"><i class="fa fa-key"></i>&ensp;Log Out</a></li>
                                                </ul>
                                            </li>
                                            <!-- user login dropdown end -->
                                        
                                        </ul>
                                    </div>
                                    @else
                                        <a class="nav-icon position-relative text-decoration-none" href="{{URL::to('authLogin')}}">
                                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                                            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                                        </a>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </header>
        <!-- #header -->
        <!-- Modal -->
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                </form>
            </div>
        </div>
        <!-- Start Banner Hero -->
        <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel"  style="padding-top:130px;">
            <ol class="carousel-indicators">
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <div style="height:500px;">
                            <img class="img-fluid" src="/frontend/img/imac-24-banner.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>iMac</b> 2021</h1>
                            <h3 class="h2">with Apple M1 chip</h3>
                            <p>
                                This extraordinary design is only possible thanks to M1, the first system on a chip for Mac. It makes iMac so thin and compact that it fits in more places than ever.

                                 <a rel="sponsored" class="text-success" href="https://templatemo.com" target="_blank">A perfectly poised stand.</a> And blazingly fast Thunderbolt ports 
                                
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <div style="height:500px;">
                            <img class="img-fluid" src="/frontend/img/aw-banner.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                            <h1 class="h1">Apple Watch series 6</h1>
                            <h3 class="h2">Future of health is on your wrist</h3>
                            <p>
                                Measure your blood oxygen level with a revolutionary sensor and app. Take an ECG anytime, anywhere. See your fitness metrics at a glance with the enhanced Always-On Retina display. With Apple Watch Series 6 on your wrist, a healthier, more active, more connected life is within reach.
                                <strong>not permitted</strong> to re-distribute the template ZIP file in any kind of template collection websites.
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <div style="height:500px;">
                            <img class="img-fluid" src="/frontend/img/ipad-banner.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                            <h1 class="h1">iPad Pro and M1</h1>
                            <h3 class="h2">Supercharged by the Apple M1 chip</h3>
                            <p>
                                The ultimate iPad experience. Now with breakthrough M1 performance, a breathtaking XDR display, and blazing‑fast 5G wireless. Buckle up    
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <!-- End Banner Hero -->
        <!-- Start Categories of The Month -->
        <section class="container py-5">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Buy directly from Shopping Snap with special carrier offers </br>
                    Get up 3% Daily Cash back with every purchase
                </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{URL::to('/home/tablet')}}"><img src="/frontend/img/mostDevice1.png" style="padding:20px;" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Tablet</h5>
                <p class="text-center"><a href="{{URL::to('/home/tablet')}}" class="btn btn-success">Go Shop</a></p>
                </div>
                <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{URL::to('/home/watch')}}"><img src="frontend/img/mostDevice2.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Watch</h2>
                <p class="text-center"><a href="{{URL::to('/home/watch')}}" class="btn btn-success">Go Shop</a></p>
                </div>
                <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{URL::to('/home/laptop')}}"><img src="frontend/img/mostDevice3.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Laptop</h2>
                <p class="text-center"><a href="{{URL::to('/home/laptop')}}" class="btn btn-success">Go Shop</a></p>
                </div>
            </div>
        </section>
        <!-- End Categories of The Month -->
        
        <!-- Start Footer -->
        <footer class="bg-dark" id="tempaltemo_footer">
            <div class="container">
                <div class="row">
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Shopping Snap</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Ho Chi Minh City, Viet Nam
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Mobile</a></li>
                        <li><a class="text-decoration-none" href="#">Laptop</a></li>
                        <li><a class="text-decoration-none" href="#">Tablet</a></li>
                        <li><a class="text-decoration-none" href="#">Watch</a></li>
                        <li><a class="text-decoration-none" href="#">Accessories</a></li>
                    </ul>
                </div>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>
                </div>
                <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
                </div>
            </div>
            <div class="w-100 bg-black py-3">
                <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        
                    </div>
                </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
        <!-- Start Script -->
        <script src="{{asset('/frontend/js/jquery-1.11.0.min.js')}}"></script>
        <script src="{{asset('/frontend/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script src="{{asset('/frontend/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/frontend/js/templatemo.js')}}"></script>
        <script src="{{asset('/frontend/js/custom.js')}}"></script>
        <!-- End Script -->
        <!-- JavaScript Libraries -->
        <script src="{{asset('frontend/header/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('frontend/header/js/main.js')}}"></script>

        <script src="{{asset('frontend/header/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/lightbox/js/lightbox.min.js')}}"></script>
        <!-- Contact Form JavaScript File -->
        <script src="{{asset('frontend/header/contactform/contactform.js')}}"></script>

        <script src="{{asset('frontend/header/lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/jquery/jquery-migrate.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('frontend/header/lib/mobile-nav/mobile-nav.js')}}"></script>
    </body>
</html>