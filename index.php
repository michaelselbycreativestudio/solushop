<?php 
    include("config/db.php");
    include("session.php");
    include("mailinglistadd.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Solushop - Ghana's Most Trusted Online Store</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	
	<!-- Ionicons Font CSS-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
	<!-- font awesome CSS-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Animate CSS-->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- UI CSS-->
	<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
	<!-- Chosen CSS-->
	<link rel="stylesheet" href="assets/css/chosen.css">
	<!-- Meanmenu CSS-->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- Fancybox CSS-->
	<link rel="stylesheet" href="assets/css/jquery.fancybox.css">
	<!-- Normalize CSS-->
	<link rel="stylesheet" href="assets/css/normalize.css">
	<!-- Nivo Slider CSS-->
	<link rel="stylesheet" href="assets/css/nivo-slider.css">
	<!-- Owl Carousel CSS-->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<!-- EasyZoom CSS-->
	<link rel="stylesheet" href="assets/css/easyzoom.css">
	<!-- Slick CSS-->
	<link rel="stylesheet" href="assets/css/slick.css">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Default CSS -->
	<link rel="stylesheet" href="assets/css/default.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- Modernizr Js -->
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper home">
		<!--Header Area Start-->
		<header>
		   <div class="header-container">
		       
               <?php include("header-top-area.php") ?>
               <?php include("header-middle-area.php") ?>
               <!--Header bottom Area Start-->
               <div class="header-bottom-area header-sticky">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-12">
                               <!--Logo Sticky Start-->
                               <div class="logo-sticky">
                                 <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                               </div>
                               <!--Logo Sticky End-->
                               <!--Main Menu Area Start-->
                               <div class="main-menu-area" style="text-align:center;">
                                   <nav>
                                       <ul class="main-menu">
                                           <li class="active"><a href="index.php">Home</a></li>
                                           <li><a href="shop.php">Shop</a></li>
                                           <li><a href="about.php">About Us</a></li>
                                           <li><a href="blog.php">Blog</a></li>
                                           <li><a href="contact.php">Contact Us</a></li>
                                       </ul>
                                   </nav>
                               </div>
                               <!--Main Menu Area End-->
                           </div>
                       </div>
                   </div>
               </div>
               <!--Header bottom Area End-->
               <!--Mobile Menu Area Start-->
               <div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
                   <div class="container">
                       <div class="row">
                           <div class="col-xs-12">
                               <div class="mobile-menu">
                                   <nav>
                                       <ul>
                                           <li><a href="index.php">Home</a></li>
                                           <li><a href="shop.php">Shop</a></li>
                                           <li><a href="about.php">About Us</a></li>
                                           <li><a href="blog.php">Blog</a></li>
                                           <li><a href="contact.php">Contact Us</a></li>
                                       </ul>
                                   </nav>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
               <!--Mobile Menu Area End--> 
               </div> 
		</header>
		<!--Header Area End-->
		<!--Slider Area Start-->
		<section class="slider-area ptb-30 white-bg">
		    <div class="container">
		        <div class="row">
                    <!--Slider Start-->
		            <div class="col-md-9 col-sm-9">
		                 <div class="slider-wrapper theme-default">
                            <!--Slider Background Image Start-->
                            <div id="slider" class="nivoSlider">
                                <img src="assets/img/slider/1.jpg"  alt="" title="#htmlcaption" />
                                <img src="assets/img/slider/2.jpg"  alt="" title="#htmlcaption2" /> 
                            </div>
                            <!--Slider Background Image End-->
                            <!--1st Slider Caption Start-->
                            <div id="htmlcaption" class="nivo-html-caption">
                                <div class="slider-caption">
                                    <div class="slider-text">
                                        <h5 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">Exclusive Offer -20% Off This Week </h5>
                                        <h1 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">Gone Gear Vr <br>Sale 70% Off</h1>
                                        <h4 class="wow animated fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">Starting at <span>$560.99</span></h4>
                                        <div class="slider-button">
                                            <a href="#" class="wow button animated fadeInLeft" data-text="Shop now" data-wow-duration="2.5s" data-wow-delay="0.5s">shopping Now</a>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <!--1st Slider Caption End-->
                            <!--2nd Slider Caption Start-->
                            <div id="htmlcaption2" class="nivo-html-caption">
                                <div class="slider-caption">
                                    <div class="slider-text">
                                        <h5 class="wow animated fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">Exclusive Offer -40% Off This Week  </h5>
                                        <h1 class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">Gone <br>X7/X7 edge 2018</h1>
                                        <h4 class="wow animated fadeInLeft" data-wow-duration="2s" data-wow-delay="0.5s">Starting at <span>$560.99</span></h4>
                                        <div class="slider-button">
                                            <a href="#" class="wow button animated fadeInLeft" data-text="Shop now" data-wow-duration="2.5s" data-wow-delay="0.5s">shopping Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--2nd Slider Caption End-->
                        </div>
		            </div>
		            <!--Slider End-->
		            <!--Offer Image Start-->
		            <div class="col-md-3 col-sm-3">
		                <div class="single-offer mb-20">
		                    <div class="offer-img img-full">
                                <a href="#"><img src="assets/img/offer/1.jpg" alt=""></a>
                            </div>
		                </div>
		                <div class="offer">
		                    <div class="offer-img2 img-full">
                                <a href="#"><img src="assets/img/offer/2.jpg" alt=""></a>
                            </div>
		                </div>
		            </div>
		            <!--Offer Image End-->
		        </div>
		    </div>
		</section>
		<!--Slider Area End-->
		
		<!--All Product Area Start-->
		<section class="All Product Area pt-100">
		    <div class="container">
		        <div class="row">
                    <!--Left Side Product Start-->
		            <div class="col-md-9 col-sm-9">
		                <!--Desktop & Television Product Start-->
		                <div class="desktop-television-product">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <!--Section Title1 Start-->
                                    <div class="section-title1-border">
                                        <div class="section-title1">
                                            <h3>desktop & television</h3>
                                        </div>
                                    </div> 
                                    <!--Section Title1 End-->
		                        </div>
		                    </div>
		                    <div class="row">
                                <div class="col-md-12">
                                    <!--Product Tab Menu Start-->
                                    <div class="product-tab-menu-area">
                                        <div class="product-tab">
                                            <ul>
                                                <li class="active"><a data-toggle="tab" href="#amply">Amply</a></li>
                                                <li><a data-toggle="tab" href="#smarttV">Smart TV</a></li>
                                                <li><a data-toggle="tab" href="#speaker">Speaker</a></li>
                                                <li><a data-toggle="tab" href="#tv">TV</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Product Tab Menu End-->
                                </div>
                            </div>
                            <!--Product Tab Start-->
                            <div class="tab-content">
                              <div id="amply" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="smarttV" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="speaker" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="tv" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                       <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!--Product Tab End-->
                            <!--Offer Image Start-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-offer">
                                        <div class="offer-img img-full">
                                            <a href="#"><img src="assets/img/offer/3.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Offer Image End-->
		                </div>
                        <!--Desktop & Television Product End-->
                        <br><br>
                        <!--Desktop & Television Product Start-->
		                <div class="desktop-television-product">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <!--Section Title1 Start-->
                                    <div class="section-title1-border">
                                        <div class="section-title1">
                                            <h3>desktop & television</h3>
                                        </div>
                                    </div> 
                                    <!--Section Title1 End-->
		                        </div>
		                    </div>
		                    <div class="row">
                                <div class="col-md-12">
                                    <!--Product Tab Menu Start-->
                                    <div class="product-tab-menu-area">
                                        <div class="product-tab">
                                            <ul>
                                                <li class="active"><a data-toggle="tab" href="#amply">Amply</a></li>
                                                <li><a data-toggle="tab" href="#smarttV">Smart TV</a></li>
                                                <li><a data-toggle="tab" href="#speaker">Speaker</a></li>
                                                <li><a data-toggle="tab" href="#tv">TV</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Product Tab Menu End-->
                                </div>
                            </div>
                            <!--Product Tab Start-->
                            <div class="tab-content">
                              <div id="amply" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="smarttV" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="speaker" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="tv" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                       <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/7.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/8.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural passages</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">typesetting animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!--Product Tab End-->
                            <!--Offer Image Start-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-offer">
                                        <div class="offer-img img-full">
                                            <a href="#"><img src="assets/img/offer/3.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Offer Image End-->
		                </div>
		                <!--Desktop & Television Product End-->
		                <!--Electronics Product Start-->
		                <div class="electronics-product pt-100">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <!--Section Title1 Start-->
                                    <div class="section-title1-border">
                                        <div class="section-title1">
                                            <h3>Electronics</h3>
                                        </div>
                                    </div> 
                                    <!--Section Title1 End-->
		                        </div>
		                    </div>
		                    <div class="row">
                                <div class="col-md-12">
                                    <!--Product Tab Menu Start-->
                                    <div class="product-tab-menu-area">
                                        <div class="product-tab">
                                            <ul>
                                                <li class="active"><a data-toggle="tab" href="#accessories">Accessories</a></li>
                                                <li><a data-toggle="tab" href="#accessories1">Accessories</a></li>
                                                <li><a data-toggle="tab" href="#headphone">Headphone</a></li>
                                                <li><a data-toggle="tab" href="#mouse">Mouse</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Product Tab Menu End-->
                                </div>
                            </div>
                            <!--Product Tab Start-->
                            <div class="tab-content">
                              <div id="accessories" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="accessories1" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="headphone" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="mouse" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!--Product Tab End-->
                            <!--Offer Image Start-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-offer">
                                        <div class="offer-img img-full">
                                            <a href="#"><img src="assets/img/offer/5.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Offer Image End-->
		                </div>
		                <!--Electronics Product End-->
		                <!--Electronics Product Start-->
		                <div class="electronics-product pt-100">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <!--Section Title1 Start-->
                                    <div class="section-title1-border">
                                        <div class="section-title1">
                                            <h3>Electronics</h3>
                                        </div>
                                    </div> 
                                    <!--Section Title1 End-->
		                        </div>
		                    </div>
		                    <div class="row">
                                <div class="col-md-12">
                                    <!--Product Tab Menu Start-->
                                    <div class="product-tab-menu-area">
                                        <div class="product-tab">
                                            <ul>
                                                <li class="active"><a data-toggle="tab" href="#accessories">Accessories</a></li>
                                                <li><a data-toggle="tab" href="#accessories1">Accessories</a></li>
                                                <li><a data-toggle="tab" href="#headphone">Headphone</a></li>
                                                <li><a data-toggle="tab" href="#mouse">Mouse</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Product Tab Menu End-->
                                </div>
                            </div>
                            <!--Product Tab Start-->
                            <div class="tab-content">
                              <div id="accessories" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="accessories1" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="headphone" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                              <div id="mouse" class="tab-pane fade">
                                <div class="row">
                                    <div class="all-product mb-85  owl-carousel">
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/39.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/40.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Simply animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Specimen animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural professor</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/37.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/38.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Natural literature</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                        <!--Single Product Start-->
                                        <div class="col-md-12 item-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.php">
                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                    </a>
                                                    <span class="sicker">-7%</span>
                                                    <ul class="product-action">
                                                        <li><a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" title="Compare"><i class="ion-ios-shuffle-strong"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h2><a href="single-product.php">Standard animal</a></h2>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="old-price">$74.00</span>
                                                        <span class="new-price">$69.00</span>
                                                        <a class="button add-btn" href="#" data-toggle="tooltip" title="Add to Cart">add to cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!--Product Tab End-->
		                </div>
		                <!--Electronics Product End-->
		            </div>
		            <!--Left Side Product End-->
		            <!--Right Side Product Start-->
		            <div class="col-md-3 col-sm-3">
		                <!--New arrivals Product Start-->
		                <div class="new-arrivals-product mb-50">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="new-arrivals-product-title">
                                        <!--Section Title2 Start-->
                                        <div class="section-title2">
                                            <h3>New arrivals</h3>
                                        </div>
                                        <!--Section Title2 End-->
                                        <!--Hot Deal Single Product Start-->
                                        <div class="hot-del-single-product">
                                            <div class="row">
                                                <div class="slide-active2">
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/15.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/16.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Typesetting</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Simply</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Passages</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Literature</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Contary</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural animal</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Letraset Typesetting</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural animal</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--Hot Deal Single Product Start-->
                                    </div>
		                        </div>
		                    </div>
		                </div>
		                <!--New arrivals Product End-->
		                <!--Offer Image Start--> 
		                <div class="offer-img-area pb-50">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="single-offer mb-20">
		                                <div class="offer-img img-full">
		                                    <a href="#"><img src="assets/img/offer/8.jpg" alt=""></a>
		                                </div>
		                            </div>
		                            <div class="single-offer mb-20">
		                                <div class="offer-img img-full">
		                                    <a href="#"><img src="assets/img/offer/9.jpg" alt=""></a>
		                                </div>
		                            </div>
		                            <div class="single-offer">
		                                <div class="offer-img img-full">
		                                    <a href="#"><img src="assets/img/offer/10.jpg" alt=""></a>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <!--Offer Image End--> 
		                <!--New arrivals Product Start-->
		                <div class="new-arrivals-product mb-50">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="new-arrivals-product-title">
                                        <!--Section Title2 Start-->
                                        <div class="section-title2">
                                            <h3>New arrivals</h3>
                                        </div>
                                        <!--Section Title2 End-->
                                        <!--Hot Deal Single Product Start-->
                                        <div class="hot-del-single-product">
                                            <div class="row">
                                                <div class="slide-active2">
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/15.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/16.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Typesetting</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Simply</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/35.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/36.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Letraset animal</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/2.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Passages</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Literature</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural Contary</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/5.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/6.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural animal</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/3.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/4.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Letraset Typesetting</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                    <!--Single Product Start-->
                                                    <div class="col-md-12">
                                                        <div class="single-product style-2 list">
                                                            <div class="col-4">
                                                                <div class="product-img">
                                                                    <a href="single-product.php">
                                                                        <img class="first-img" src="assets/img/product/33.jpg" alt="">
                                                                        <img class="hover-img" src="assets/img/product/34.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="product-content">
                                                                    <h2><a href="single-product.php">Natural animal</a></h2>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <span class="old-price">$74.00</span>
                                                                        <span class="new-price">$69.00</span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Single Product End-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--Hot Deal Single Product Start-->
                                    </div>
		                        </div>
		                    </div>
		                </div>
		                <!--New arrivals Product End-->
		            </div>
		            <!--Right Side Product End-->
		        </div>
		    </div>
		</section>
		<!--All Product Area End-->
		<!--Offer Image Area Start-->
		<div class="offer-img-area">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-6 col-sm-6">
		                <div class="single-offer">
		                    <div class="offer-img img-full">
		                        <a href="#"><img src="assets/img/offer/6.jpg" alt=""></a>
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-6 col-sm-6">
		                <div class="single-offer">
		                    <div class="offer-img img-full">
		                        <a href="#"><img src="assets/img/offer/7.jpg" alt=""></a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Offer Image Area End-->
		<!--Hot Categories Area Start-->
		<Section class="hot-categories-area pt-100 pb-90">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <!--Section Title1 Start-->
                        <div class="section-title1-border">
                            <div class="section-title1">
                                <h3>HOT CATEGORIES</h3>
                            </div>
                        </div> 
                        <!--Section Title1 End-->
		            </div>
		        </div>
		        <!--Hot Categories Start-->
		        <div class="row">
		            <div class="hot-categories">
                        <!--Single Categories Start-->
                        <div class="col-md-3 col-sm-6">
                            <div class="single-categories">
                                <div class="categories-img img-full">
                                    <a href="#"><img src="assets/img/categories/1.jpg" alt=""></a>
                                </div>
                                <div class="categories-content">
                                    <h3><a href="#">Laptops & Tablets</a></h3>
                                    <ul class="catgories-list">
                                        <li><a href="#">laptop</a></li>
                                        <li><a href="#">Macbook</a></li>
                                        <li><a href="#">Smartphone</a></li>
                                        <li><a href="#">Tablets</a></li>
                                    </ul>
                                </div>
		                    </div>
                        </div> 
		                <!--Single Categories End-->
                        <!--Single Categories Start-->
                        <div class="col-md-3 col-sm-6">
                           <div class="single-categories">
                                <div class="categories-img img-full">
                                    <a href="#"><img src="assets/img/categories/2.jpg" alt=""></a>
                                </div>
                                <div class="categories-content">
                                    <h3><a href="#">Tvs & Audios</a></h3>
                                    <ul class="catgories-list">
                                        <li><a href="#">Amply</a></li>
                                        <li><a href="#">Smart TV</a></li>
                                        <li><a href="#">Speaker</a></li>
                                        <li><a href="#">TV</a></li>
                                    </ul>
                                </div>
		                    </div> 
                        </div> 
		                <!--Single Categories End-->
                        <!--Single Categories Start-->
                        <div class="col-md-3 col-sm-6">
                           <div class="single-categories">
                                <div class="categories-img img-full">
                                    <a href="#"><img src="assets/img/categories/3.jpg" alt=""></a>
                                </div>
                                <div class="categories-content">
                                    <h3><a href="#">Accessories</a></h3>
                                    <ul class="catgories-list">
                                        <li><a href="#">Headphone</a></li>
                                        <li><a href="#">Keyboard</a></li>
                                        <li><a href="#">Mouse</a></li>
                                        <li><a href="#">Watches</a></li>
                                    </ul>
                                </div>
		                    </div> 
                        </div>
		                <!--Single Categories End-->
                        <!--Single Categories Start-->
                        <div class="col-md-3 col-sm-6">
                            <div class="single-categories">
                                <div class="categories-img img-full">
                                    <a href="#"><img src="assets/img/categories/4.jpg" alt=""></a>
                                </div>
                                <div class="categories-content">
                                    <h3><a href="#">Accessories</a></h3>
                                    <ul class="catgories-list">
                                        <li><a href="#">Headphone</a></li>
                                        <li><a href="#">Keyboard</a></li>
                                        <li><a href="#">Mouse</a></li>
                                        <li><a href="#">Watches</a></li>
                                    </ul>
                                </div>
		                    </div>
                        </div>
		                <!--Single Categories End-->
		            </div>
		        </div>
		        <!--Hot Categories End-->
		    </div>
		</Section>
		<!--Hot Categories Area End-->
	
		<?php include("footer.php"); ?>
        <!--Modal Start-->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal Content Strat-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="modal-details">
                   <div class="row">
                       <!--Product Img Strat-->
                       <div class="col-md-5 col-sm-5">
                           <!--Product Tab Content Start-->
                            <div class="tab-content">
                                <div id="watch1" class="tab-pane fade in active">
                                    <div class="modal-img img-full">
                                        <img src="assets/img/single-product/large/1.jpg" alt="">
                                    </div>
                                </div>
                                <div id="watch2" class="tab-pane fade">
                                    <div class="modal-img img-full">
                                        <img src="assets/img/single-product/large/2.jpg" alt="">
                                    </div>
                                </div>
                                <div id="watch3" class="tab-pane fade">
                                    <div class="modal-img img-full">
                                        <img src="assets/img/single-product/large/3.jpg" alt="">
                                    </div>
                                </div> 
                                <div id="watch4" class="tab-pane fade">
                                    <div class="modal-img img-full">
                                        <img src="assets/img/single-product/large/4.jpg" alt="">
                                    </div>
                                </div>
                                <div id="watch5" class="tab-pane fade">
                                    <div class="modal-img img-full">
                                        <img src="assets/img/single-product/large/5.jpg" alt="">
                                    </div>
                                </div>
                                <div id="watch6" class="tab-pane fade">
                                    <div class="modal-img img-full">
                                        <img src="assets/img/single-product/large/6.jpg" alt="">
                                    </div>
                                </div> 
                            </div>
                            <!--Product Tab Content End-->
		                    <!--Single Product Tab Menu Start-->
		                    <div class="modal-product-tab">
		                        <ul class="modal-tab-menu-active">
		                            <li class="active"><a data-toggle="tab" href="#watch1"><img src="assets/img/product-thumb/1.jpg" alt=""></a></li>
		                            <li><a data-toggle="tab" href="#watch2"><img src="assets/img/product-thumb/3.jpg" alt=""></a></li>
		                            <li><a data-toggle="tab" href="#watch3"><img src="assets/img/product-thumb/2.jpg" alt=""></a></li>
		                            <li><a data-toggle="tab" href="#watch4"><img src="assets/img/product-thumb/4.jpg" alt=""></a></li>
		                            <li><a data-toggle="tab" href="#watch5"><img src="assets/img/product-thumb/5.jpg" alt=""></a></li>
		                            <li><a data-toggle="tab" href="#watch6"><img src="assets/img/product-thumb/6.jpg" alt=""></a></li>
		                        </ul>
		                    </div>
		                    <!--Single Product Tab Menu Start-->
                       </div> 
                       <!--Product Img End-->
                       <!-- Product Content Start-->
                       <div class="col-md-7 col-sm-7">
                           <div class="product-info">
                               <h2>Natural passages</h2>
                               <div class="product-price">
                                   <span class="old-price">$74.00</span>
                                   <span class="new-price">$69.00</span>
                               </div>
                               <a href="#" class="see-all">See all features</a>
                               <div class="add-to-cart quantity">
                                    <form class="add-quantity" action="#">
                                         <div class="quantity modal-quantity">
                                             <label>Quantity</label>
                                             <input type="number">
                                         </div>
                                        <div class="add-to-link">
                                            <button class="form-button" data-text="add to cart">add to cart</button>
                                        </div>
                                    </form>
                               </div>
                               <div class="cart-description">
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus.</p>
                               </div>
                               <div class="social-share">
                                   <h3>Share this product</h3>
                                   <ul class="socil-icon2">
                                       <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                       <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                       <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                                       <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                       <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!--Product Content End--> 
                   </div> 
                </div>
              </div>
            </div>
            <!--Modal Content Strat-->
          </div>
        </div>
        <!--Modal End-->
	</div>



    <!--All Js Here-->
    
	<!--Jquery 1.12.4-->
	<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
	<!--Imagesloaded-->
	<script src="assets/js/imagesloaded.pkgd.min.js"></script> 
	<!--Isotope-->
	<script src="assets/js/isotope.pkgd.min.js"></script>       
	<!--Ui js-->
	<script src="assets/js/jquery-ui.min.js"></script>       
	<!--Countdown-->
	<script src="assets/js/jquery.countdown.min.js"></script>        
	<!--Counterup-->
	<script src="assets/js/jquery.counterup.min.js"></script>       
	<!--ScrollUp-->
	<script src="assets/js/jquery.scrollUp.min.js"></script>
	<!--Chosen js-->
	<script src="assets/js/chosen.jquery.js"></script>
	<!--Meanmenu js-->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!--Instafeed-->
	<script src="assets/js/instafeed.min.js"></script> 
	<!--EasyZoom-->
	<script src="assets/js/easyzoom.min.js"></script> 
	<!--Fancybox-->
	<script src="assets/js/jquery.fancybox.pack.js"></script>       
	<!--Nivo Slider-->
	<script src="assets/js/jquery.nivo.slider.js"></script>
	<!--Waypoints-->
	<script src="assets/js/waypoints.min.js"></script>
	<!--Carousel-->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!--Slick-->
	<script src="assets/js/slick.min.js"></script>
	<!--Wow-->
	<script src="assets/js/wow.min.js"></script>
	<!--Bootstrap-->
	<script src="assets/js/bootstrap.min.js"></script>
	<!--Plugins-->
	<script src="assets/js/plugins.js"></script>
	<!--Main Js-->
	<script src="assets/js/main.js"></script>
</body>
</html>
