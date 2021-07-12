<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shopping Snap</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="apple-touch-icon" href="{{asset('/frontend/img/logo.png')}}" />
        <link rel="shortcut icon" type="frontend/x-icon" href="{{asset('/frontend/img/logo.png')}}" />

        <link rel="stylesheet" href="{{asset('frontend/css/templatemo.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
        <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}" />
        <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->

        <link rel="stylesheet" href="{{asset('frontend/header/lib/bootstrap/css/bootstrap.min.css')}}" />
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet" />

        <link href="{{asset('frontend/header/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <!-- Main Stylesheet File -->
        <link href="{{asset('frontend/header/css/style.css')}}" rel="stylesheet" />
        <link href="{{asset('frontend/header/lib/animate/animate.min.css')}}" rel="stylesheet" />
        <link href="{{asset('frontend/header/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('frontend/header/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{asset('frontend/header/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet" />


    </head>

    <body>
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
                        <a href="{{URL::to('/home')}}" style="color: grey;" class="scrollto">
                            <image src="/frontend/img/logo.png" alt="your image" />
                            <div style="float: right; padding: 7.5px;">
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
                            <div class="navbar align-self-center d-flex" style="margin-right: 30px;">
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
                                                   &ensp;
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

        <!-- Modal -->
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ..." />
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Start Content -->
        <div style="margin-top: 100px;" class="container py-5">
            <div class="row">
                <div style="margin-top:70px;" class="col-lg-3">
                    <h1 class="h2 pb-4"></h1>
                    <ul class="list-unstyled templatemo-accordion">
                        <li class="pb-3">
                            
                            <select name="product_filter" type="dropdown-toggle" class="input-sm form-control w-sm inline v-middle">
                            <option data-brand="all" value="brand">All brands</option>
                            @foreach($brand as $value)
                                @if($value->brand_slug == $selectedBrand)
                                @if($value->brand_status == 1)
                                <option selected data-brand="{{$value->brand_slug}}" value="brand">{{$value->brand_name}}</option>
                                @endif
                                @else
                                @if($value->brand_status == 1)
                                <option data-brand="{{$value->brand_slug}}" value="brand">{{$value->brand_name}}</option>
                                @endif
                                @endif
                            @endforeach
                            </select>
                            
                        </li>
                        <!--
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Sale
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Sport</a></li>
                            <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Bag</a></li>
                            <li><a class="text-decoration-none" href="#">Sweather</a></li>
                            <li><a class="text-decoration-none" href="#">Sunglass</a></li>
                        </ul>
                    </li>
                -->
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-inline shop-top-menu pb-3 pt-1">
                                <!--
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li>
                        -->
                            </ul>
                        </div>
                        <div class="col-md-6 pb-4">
                            <div class="d-flex">
                                <select name="product_filter" type="dropdown-toggle" class="input-sm form-control w-sm inline v-middle">
                                    @if($arrange == "newest")
                                    <option selected data-order="newest" value="arrange">Newest</option>
                                    <option data-order="high-to-low" value="arrange">Price: From High to Low</option>
                                    <option data-order="low-to-high" value="arrange">Price: From Low to High</option>
                                    @elseif($arrange == "high-to-low")
                                    <option data-order="newest" value="arrange">Newest</option>
                                    <option selected data-order="high-to-low" value="arrange">Price: From High to Low</option>
                                    <option data-order="low-to-high" value="arrange">Price: From Low to High</option>
                                    @elseif($arrange == "low-to-high")
                                    <option data-order="newest" value="arrange">Newest</option>
                                    <option data-order="high-to-low" value="arrange">Price: From High to Low</option>
                                    <option selected data-order="low-to-high" value="arrange">Price: From Low to High</option>
                                    @else
                                    <option data-order="newest" value="arrange">Newest</option>
                                    <option data-order="high-to-low" value="arrange">Price: From High to Low</option>
                                    <option data-order="low-to-high" value="arrange">Price: From Low to High</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--
                    ////////////////////////////////////////////////////////////////////
-->
                    @foreach($products as $value) 
                        @if($value->product_status == 1)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <div style="padding: 40px;">
                                        <a href="{{$url.'/'.$value->product_slug}}" style="font-weight: bold !important;" class="h3">
                                            <embed type="{{$value->product_image_mime}}" src="data:{{$value->product_image_mime}};base64,{{base64_encode($value->product_image)}}" height="200" />
                                        </a>
                                    </div>
                                    <div style="display: flex; justify-content: center;">
                                        <a style="width: 80px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 20px;" class="btn-success text-white mt-2" href="shop-single.html">
                                            <i class="fas fa-cart-plus"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div style="display: flex; justify-content: center;">
                                            <a href="{{$url.'/'.$value->product_slug}}" style="font-weight: bold !important;" class="h3">{{$value->product_name}} </a>
                                        </div>
                                        <!--
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li></li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                            
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                -->
                                        <div>
                                            <p style="font-size: 15px !important;" class="text-center mb-0">
                                                {{number_format($value->product_price)."Vnd"}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif 
                    @endforeach

                        <!--
                    ////////////////////////////////////////////////////////////////////
-->
                    </div>
                    <div div="row">
                        <ul class="pagination pagination-lg justify-content-end">
                            <div aria-label="Page navigation">        
                                {{ $products->links('vendor.pagination.bootstrap-5') }}
                            </div> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

        

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
        <script src="{{asset('frontend/js/jquery-1.11.0.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('frontend/js/templatemo.js')}}"></script>
        <script src="{{asset('frontend/js/custom.js')}}"></script>
        <script src="{{asset('frontend/js/cate_page_detail.js')}}"></script>
        <!-- End Script -->

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
