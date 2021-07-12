<!DOCTYPE html>
<head>
<title>Admin</title>
<link rel="apple-touch-icon" href="{{asset('/frontend/img/logo.png')}}">
    <link rel="shortcut icon" type="frontend/x-icon" href="{{asset('/frontend/img/logo.png')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> 
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
function hideURLbar(){ 
	window.scrollTo(0,1); 
	} 
</script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('/admin/css/bootstrap.min.css')}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('admin/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('admin/js/raphael-min.js')}}"></script>
<script src="{{asset('admin/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('adminPage')}}" class="logo" style="font-weight: bold;">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="username">
                    <?php 
                        $name = Session::get('admin_name');
                        if($name){
							
                            echo $name;
                        }
                    ?>
                </span>
            </a>
            <ul class="dropdown-menu extended logout">
				<!--
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
				-->
                <li><a href="{{asset('adminPage/logout')}}"><i class="fa fa-key"></i>Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('adminPage')}}">
                        <i class="fa fa-home" style="font-size:18px;"></i>
                        <span>Home</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub">
						@can('add product')
						<li><a href="{{URL::to('adminPage/addCategory')}}">Add category</a></li>
						@endcan
						<li><a href="{{URL::to('adminPage/showCategories')}}">All categories</a></li>
                    </ul>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tags"></i>
                        <span>Brands</span>
                    </a>
                    <ul class="sub">
						@can('add product')
						<li><a href="{{URL::to('adminPage/addBrand')}}">Add brand</a></li>
						@endcan
						<li><a href="{{URL::to('adminPage/showBrands')}}">All brands</a></li>
                    </ul>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cubes"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub">
						@can('add product')
						<li><a href="{{URL::to('adminPage/addProduct')}}">Add product</a></li>
                        @endcan
                        <li><a href="{{URL::to('adminPage/showProducts')}}">Show all products</a></li>
                        @can('add product')
                        <li><a href="{{URL::to('adminPage/addProductImage')}}">Add product image</a></li>
                        @endcan
                        <li><a href="{{URL::to('adminPage/showProductsImage')}}">Show all images</a></li>
						
                        
						
                    </ul>
                </li>
                
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
	</section>
 
</section>
<!--main content end-->
</section>
<script src="{{asset('admin/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>
<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
