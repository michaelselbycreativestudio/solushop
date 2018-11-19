<?php 
    include("config/db.php");
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Single Product-Javenist</title>
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

	<div class="wrapper">
		<!--Header Area Start-->
		<header>
		   <div class="header-container">
		       <!--Header Top Area Start--> 
               <div class="header-top-area">
                   <div class="container">
                       <div class="row">
                           <!--Header Top Left Area Start-->
                           <div class="col-md-4 col-sm-4 col-xs-12">
                               <div class="header-top-menu">
                                   <ul>
                                       <li><span>Language:</span><a href="#">English <i class="fa fa-angle-down"></i></a>
                                           <ul class="ht-dropdown">
                                               <li><a href="#">Deutsch</a></li>
                                               <li><a href="#">Français</a></li>
                                               <li><a href="#">Português</a></li>
                                           </ul>
                                       </li>
                                       <li><span>Currency:</span><a href="#" class="text-uppercase">Usd<i class="fa fa-angle-down"></i></a>
                                           <ul class="ht-dropdown">
                                               <li><a href="#">EUR</a></li>
                                               <li><a href="#">BRL</a></li>
                                           </ul>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           <!--Header Top Left Area End-->
                           <!--Header Top Right Area Start-->
                           <div class="col-md-8 col-sm-8 hidden-xs text-right">
                               <div class="header-top-menu">
                                   <ul>
                                       <li class="support"><span>Ordered before 17:30, shipped today  - Support: (012) 800 456 789</span></li>
                                       <li class="account"><a href="#">My Account <i class="fa fa-angle-down"></i></a>
                                           <ul class="ht-dropdown">
                                               <li><a href="checkout.php">Checkout</a></li>
                                               <li><a href="my-account.php">My Account</a></li>
                                               <li><a href="shopping-cart.php">Shopping Cart</a></li>
                                               <li><a href="wishlist.php">Wishlist</a></li>
                                           </ul>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           <!--Header Top Right Area End-->
                       </div>
                   </div>
               </div>
               <!--Header Top Area End-->
               <!--Header Middel Area Start-->
               <div class="header-middel-area">
                   <div class="container">
                       <div class="row">
                           <!--Logo Start-->
                           <div class="col-md-3 col-sm-3 col-xs-12">
                               <div class="logo">
                                   <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                               </div>
                           </div>
                           <!--Logo End-->
                           <!--Search Box Start-->
                           <div class="col-md-6 col-sm-5 col-xs-12">
                               <div class="search-box-area">
                                   <form action="#">
                                       <div class="select-area">
                                            <select data-placeholder="Choose a Country..." class="select" tabindex="1">
                                                <option value="">All Categories</option>
                                                <optgroup label="NFC EAST">
                                                  <option>Dallas Cowboys</option>
                                                  <option>New York Giants</option>
                                                  <option>Philadelphia Eagles</option>
                                                  <option>Washington Redskins</option>
                                                </optgroup>
                                                <optgroup label="NFC NORTH">
                                                  <option>Chicago Bears</option>
                                                  <option>Detroit Lions</option>
                                                  <option>Green Bay Packers</option>
                                                  <option>Minnesota Vikings</option>
                                                </optgroup>
                                                <optgroup label="NFC SOUTH">
                                                  <option>Atlanta Falcons</option>
                                                  <option>Carolina Panthers</option>
                                                  <option>New Orleans Saints</option>
                                                  <option>Tampa Bay Buccaneers</option>
                                                </optgroup>
                                                <optgroup label="NFC WEST">
                                                  <option>Arizona Cardinals</option>
                                                  <option>St. Louis Rams</option>
                                                  <option>San Francisco 49ers</option>
                                                  <option>Seattle Seahawks</option>
                                                </optgroup>
                                                <optgroup label="AFC EAST">
                                                  <option>Buffalo Bills</option>
                                                  <option>Miami Dolphins</option>
                                                  <option>New England Patriots</option>
                                                  <option>New York Jets</option>
                                                </optgroup>
                                                <optgroup label="AFC NORTH">
                                                  <option>Baltimore Ravens</option>
                                                  <option>Cincinnati Bengals</option>
                                                  <option>Cleveland Browns</option>
                                                  <option>Pittsburgh Steelers</option>
                                                </optgroup>
                                                <optgroup label="AFC SOUTH">
                                                  <option>Houston Texans</option>
                                                  <option>Indianapolis Colts</option>
                                                  <option>Jacksonville Jaguars</option>
                                                  <option>Tennessee Titans</option>
                                                </optgroup>
                                                <optgroup label="AFC WEST">
                                                  <option>Denver Broncos</option>
                                                  <option>Kansas City Chiefs</option>
                                                  <option>Oakland Raiders</option>
                                                  <option>San Diego Chargers</option>
                                                </optgroup>
                                           </select>
                                       </div>
                                       <div class="search-box">
                                           <input type="text" name="search" id="search" placeholder="" value='Search product...' onblur="if(this.value==''){this.value='Search product...'}" onfocus="if(this.value=='Search product...'){this.value=''}">
                                           <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                       </div>
                                   </form> 
                               </div>
                           </div>
                           <!--Search Box End-->
                           <!--Mini Cart Start-->
                           <div class="col-md-3 col-sm-4 col-xs-12">
                               <div class="mini-cart-area">
                                   <ul>
                                       <li><a href="#"><i class="ion-android-star"></i></a></li>
                                       <li><a href="#"><i class="ion-android-cart"></i><span class="cart-add">2</span><span class="cart-total">$215.00 <i class="fa fa-angle-down"></i></span></a>
                                           <ul class="cart-dropdown">
                                               <!--Single Cart Item Start-->
                                               <li class="cart-item">
                                                   <div class="cart-img">
                                                       <a href="shopping-cart.php"><img src="assets/img/cart/1.jpg" alt=""></a>
                                                   </div>
                                                   <div class="cart-content">
                                                       <h4><a href="shopping-cart.php">natural typesetting</a></h4>
                                                       <p class="cart-quantity">Qty:1</p>
                                                       <p class="cart-price">$160.00</p>
                                                   </div>
                                                   <div class="cart-close">
                                                       <a href="#" title="Remove"><i class="ion-android-close"></i></a>
                                                   </div>
                                               </li>
                                               <!--Single Cart Item Start-->
                                               <!--Single Cart Item Start-->
                                               <li class="cart-item">
                                                   <div class="cart-img">
                                                       <a href="shopping-cart.php"><img src="assets/img/cart/2.jpg" alt=""></a>
                                                   </div>
                                                   <div class="cart-content">
                                                       <h4><a href="shopping-cart.php">Natural simply random</a></h4>
                                                       <p class="cart-quantity">Qty:2</p>
                                                       <p class="cart-price">$180.00</p>
                                                   </div>
                                                   <div class="cart-close">
                                                       <a href="shopping-cart.php" title="Remove"><i class="ion-android-close"></i></a>
                                                   </div>
                                               </li>
                                               <!--Single Cart Item Start-->
                                               <!--Cart Total Start-->
                                               <li class="cart-total-amount mtb-20">
                                                   <h4>SubTotal : <span class="pull-right">$215.00</span></h4>
                                               </li>
                                               <!--Cart Total End-->
                                               <!--Cart Button Start-->
                                               <li class="cart-button">
                                                   <a href="shopping-cart.php" class="button2">View cart</a>
                                                   <a href="checkout.php" class="button2">Check out</a>
                                               </li>
                                               <!--Cart Button End-->
                                           </ul>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           <!--Mini Cart End-->
                       </div>
                   </div>
               </div>
               <!--Header Middel Area End-->
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
                               <div class="main-menu-area">
                                   <nav>
                                       <ul class="main-menu">
                                           <li class="active"><a href="index.php">Home</a>
                                               <!--Dropdown Menu Start-->
                                               <ul class="dropdown">
                                                   <li><a href="index.php">Home Shop 1</a></li>
                                                   <li><a href="index-2.php">Home Shop 2</a></li>
                                                   <li><a href="index-3.php">Home Shop 3</a></li>
                                                   <li><a href="index-4.php">Home Shop 4</a></li>
                                                   <li><a href="index-5.php">Home Shop 5</a></li>
                                                   <li><a href="index-6.php">Home Shop 6</a></li>
                                                   <li><a href="index-7.php">Home Shop 7</a></li>
                                               </ul>
                                               <!--Dropdown Menu End-->
                                           </li>
                                           <li class="new"><a href="#">Features</a>
                                               <!--Mega Menu Start-->
                                               <ul class="mega-menu">
                                                   <li>
                                                       <ul>
                                                           <li class="mega-title"><a href="#">pages</a></li>
                                                           <li><a href="about.php">About Us</a></li>
                                                           <li><a href="services.php">Services</a></li>
                                                           <li><a href="frequently-questions.php">Frequently Questions</a></li>
                                                           <li><a href="404.php">Error 404</a></li>
                                                           <li><a href="portfolio.php">Portfolio</a></li>
                                                       </ul>
                                                   </li>
                                                   <li>
                                                       <ul>
                                                           <li class="mega-title"><a href="#">blog</a></li>
                                                           <li><a href="blog-nosidebar.php">None Sidebar</a></li>
                                                           <li><a href="blog-left-sidebar.php">Sidebar Left</a></li>
                                                           <li><a href="blog-post-gallery.php">Gallery Format</a></li>
                                                           <li><a href="blog-post-audio.php">Audio Format</a></li>
                                                           <li><a href="blog-post-video.php">Video Format</a></li>
                                                       </ul>
                                                   </li>
                                                   <li>
                                                       <ul>
                                                           <li class="mega-title"><a href="#">shop</a></li>
                                                           <li><a href="shop-full-width.php">Full Width</a></li>
                                                           <li><a href="shop-right-sidebar.php">Sidebar Right</a></li>
                                                           <li><a href="shop-list-view.php">List View</a></li>
                                                       </ul>
                                                   </li>
                                                   <li class="menu-img">
                                                       <ul>
                                                           <li><a href="#"><img src="assets/img/menu/1.jpg" alt=""></a></li>
                                                       </ul>
                                                   </li>
                                               </ul>
                                               <!--Mega Menu End-->
                                           </li>
                                           <li class="hot"><a href="shop.php">Shop</a></li>
                                           <li><a href="blog.php">Blog</a></li>
                                           <li><a href="contact.php">Contact Us</a></li>
                                           <li><a href="wishlist.php">My Wishlist</a></li>
                                           <li><a href="#">Pages</a>
                                               <ul class="dropdown">
                                                   <li><a href="shopping-cart.php">Shopping Cart</a></li>
                                                   <li><a href="wishlist.php">Wishlist</a></li>
                                                   <li><a href="checkout.php">Checkout</a></li>
                                                   <li><a href="my-account.php">My Account</a></li>
                                                   <li><a href="single-product.php">Product Details</a></li>
                                                   <li><a href="shop.php">Shop</a></li>
                                                   <li><a href="shop-full-width.php">Shop Full Width</a></li>
                                                   <li><a href="shop-list-view.php">Shop List View</a></li>
                                                   <li><a href="shop-right-sidebar.php">Shop Right Sidebar</a></li>
                                                   <li><a href="blog-post-img.php">Blog Image Post</a></li>
                                                   <li><a href="blog-post-video.php">Blog Video Post</a></li>
                                                   <li><a href="blog-nosidebar.php">Blog no Sidebar</a></li>
                                               </ul>
                                           </li>
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
                                           <li><a href="index.php">home</a>
                                               <ul>
                                                   <li><a href="index.php">Home Shop 1</a></li>
                                                   <li><a href="index-2.php">Home Shop 2</a></li>
                                                   <li><a href="index-3.php">Home Shop 3</a></li>
                                                   <li><a href="index-4.php">Home Shop 4</a></li>
                                                   <li><a href="index-5.php">Home Shop 5</a></li>
                                                   <li><a href="index-6.php">Home Shop 6</a></li>
                                                   <li><a href="index-7.php">Home Shop 7</a></li>
                                               </ul>
                                           </li>
                                           <li><a href="#">Features</a>
                                               <ul>
                                                   <li><a href="#">pages</a>
                                                       <ul>
                                                          <li><a href="about.php">About Us</a></li>
                                                          <li><a href="services.php">Services</a></li>
                                                          <li><a href="frequently-questions.php">Frequently Questions</a></li>
                                                          <li><a href="404.php">Error 404</a></li>
                                                          <li><a href="portfolio.php">Portfolio</a></li>
                                                       </ul>
                                                   </li>
                                                   <li><a href="#">blog</a>
                                                       <ul>
                                                          <li><a href="blog-nosidebar.php">None Sidebar</a></li>
                                                          <li><a href="blog-left-sidebar.php">Sidebar Left</a></li>
                                                          <li><a href="blog-post-gallery.php">Gallery Format</a></li>
                                                          <li><a href="blog-post-audio.php">Audio Format</a></li>
                                                          <li><a href="blog-post-video.php">Video Format</a></li>
                                                       </ul>
                                                   </li>
                                                   <li><a href="#">shop</a>
                                                       <ul>
                                                          <li><a href="shop-full-width.php">Full Width</a></li>
                                                          <li><a href="shop-right-sidebar.php">Sidebar Right</a></li>
                                                          <li><a href="shop-list-view.php">List View</a></li>
                                                       </ul>
                                                   </li>
                                               </ul>
                                           </li>
                                           <li><a href="shop.php">Shop</a></li>
                                           <li><a href="blog.php">Blog</a></li>
                                           <li><a href="contact.php">Contact Us</a></li>
                                           <li><a href="wishlist.php">My Wishlist</a></li>
                                           <li><a href="#">Pages</a>
                                               <ul>
                                                   <li><a href="shopping-cart.php">Shopping Cart</a></li>
                                                   <li><a href="wishlist.php">Wishlist</a></li>
                                                   <li><a href="checkout.php">Checkout</a></li>
                                                   <li><a href="my-account.php">My Account</a></li>
                                                   <li><a href="single-product.php">Product Details</a></li>
                                                   <li><a href="shop.php">Shop</a></li>
                                                   <li><a href="shop-full-width.php">Shop Full Width</a></li>
                                                   <li><a href="shop-list-view.php">Shop List View</a></li>
                                                   <li><a href="shop-right-sidebar.php">Shop Right Sidebar</a></li>
                                                   <li><a href="blog-post-img.php">Blog Image Post</a></li>
                                                   <li><a href="blog-post-video.php">Blog Video Post</a></li>
                                                   <li><a href="blog-nosidebar.php">Blog no Sidebar</a></li>
                                               </ul>
                                           </li>
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
		<!--Heading Banner Area Start-->
		<div class="heading-banner-area pt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="heading-banner">
		                    <div class="breadcrumbs">
		                        <ul>
		                            <li><a href="index.php">Home</a><span class="breadcome-separator">></span></li>
		                            <li><a href="index.php">Shop</a><span class="breadcome-separator">></span></li>
		                            <li><a href="index.php">Electronics</a><span class="breadcome-separator">></span></li>
		                            <li><a href="index.php">Accessories</a><span class="breadcome-separator">></span></li>
		                            <li><a href="index.php">Watches</a><span class="breadcome-separator">></span></li>
		                            <li>typesetting animal</li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Heading Banner Area End-->
		<!--Single Product Area Start-->
		<section class="single-product-area mt-20">
		    <div class="container">
		        <!--Single Product Info Start-->
		        <div class="row">
		            <div class="single-product-info mb-50">
		                <!--Single Product Image Start-->
		                <div class="col-md-6 col-sm-6">
                            <!--Product Tab Content Start-->
                            <div class="single-product-tab-content tab-content">
                                <div id="w1" class="tab-pane fade in active">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="assets/img/single-product/large/1.jpg">
                                            <img src="assets/img/single-product/large/1.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div id="w2" class="tab-pane fade">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="assets/img/single-product/large/2.jpg">
                                            <img src="assets/img/single-product/large/2.jpg" alt="">
                                        </a>
                                    </div>
                                </div> 
                            </div>
                            <!--Product Tab Content End-->
		                    <!--Single Product Tab Menu Start-->
		                    <div class="single-product-tab">
		                        <div class="single-product-tab-menu owl-carousel">
		                            <a data-toggle="tab" href="#w1"><img src="assets/img/product-thumb/1.jpg" alt=""></a>
		                            <a data-toggle="tab" href="#w2"><img src="assets/img/product-thumb/3.jpg" alt=""></a>
		                        </div>
		                    </div>
		                    <!--Single Product Tab Menu Start-->
		                </div>
		                <!--Single Product Image End-->
		                <!--Single Product Content Start-->
		                <div class="col-md-6 col-sm-6">
		                    <div class="single-product-content">
                                <!--Product Nav Start-->
		                        <div class="product-nav">
		                            <a href="#"><i class="fa fa-angle-left"></i></a>
		                            <a href="#"><i class="fa fa-angle-right"></i></a>
		                        </div>
		                        <!--Product Nav End-->
		                        <h1 class="product-title">typesetting animal</h1>
		                        <!--Product Rating Start-->
		                        <div class="product-rating">
		                            <i class="fa fa-star"></i>
		                            <i class="fa fa-star"></i>
		                            <i class="fa fa-star"></i>
		                            <i class="fa fa-star on-color"></i>
		                            <i class="fa fa-star on-color"></i>
		                            <a class="review-link" href="#">(1 customer review)</a>
		                        </div>
		                        <!--Product Rating End-->
		                        <!--Product Price Start-->
		                        <div class="single-product-price">
		                            <span class="old-price">$74.00</span>
		                            <span class="new-price">$69.00</span>
		                        </div>
		                        <!--Product Price End-->
		                        <!--Product Description Start-->
		                        <div class="product-description">
		                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>
		                        </div>
		                        <!--Product Description End-->
		                        <!--Product Quantity Start-->
		                        <div class="single-product-quantity">
		                            <form action="#">
		                                <div class="quantity">
                                            <label>Quantity</label>
                                            <input class="input-text" value="1" type="number">
		                                </div>
                                        <button class="quantity-button" type="submit">Add to cart</button>
		                            </form>
		                        </div>
		                        <!--Product Quantity End-->
		                        <!--Wislist Compare Button Start-->
		                        <div class="wislist-compare-btn">
		                            <ul>
		                                <li><a class="wishlist" href="#">Add To Wishlist</a></li>
		                                <li><a class="compare" href="#">Compare</a></li>
		                            </ul>
		                        </div>
		                        <!--Wislist Compare Button End-->
		                        <!--Product Meta Start-->
		                        <div class="product-meta">
		                            <span class="posted-in">
                                        Categories: 
		                                <a href="#">Accessories</a>,
		                                <a href="#">Electronics</a>,
		                                <a href="#">Tvs & Audios</a>,
		                                <a href="#">Watches</a>
		                            </span>
		                        </div>
		                        <!--Product Meta End-->
		                        <!--Product Sharing Start-->
		                        <div class="single-product-sharing">
		                            <ul>
		                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		                            </ul>
		                        </div>
		                        <!--Product Sharing End-->
		                    </div>
		                </div>
		                <!--Single Product Content End-->
		            </div>
		        </div>
		        <!--Single Product Info End-->
		        <!--Discription Tab Start-->
		        <div class="row">
		            <div class="discription-tab">
		                <div class="col-md-12">
		                    <div class="discription-review-contnet mb-40">
                                <!--Discription Tab Menu Start-->
		                        <div class="discription-tab-menu">
                                    <ul>
                                        <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                                        <li><a data-toggle="tab" href="#review">Reviews (1)</a></li>
                                    </ul>
                                </div>
                                <!--Discription Tab Menu End-->
                                <!--Discription Tab Content Start-->
                                <div class="discription-tab-content tab-content">
                                  <div id="description" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="description-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                                <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div id="review" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="review-page-comment">
                                                <div class="review-comment">
                                                    <h2>1 review for typesetting animal</h2>
                                                    <ul>
                                                        <li>
                                                            <div class="product-comment">
                                                                <img src="assets/img/comment-author/2.png" alt="">
                                                                <div class="product-comment-content">
                                                                    <p><strong>admin</strong>
                                                                        -
                                                                        <span>March 7, 2016:</span>
                                                                        <span class="pro-comments-rating">
                                                                            <i class="fa fa-star"></i>								
                                                                            <i class="fa fa-star"></i>								
                                                                            <i class="fa fa-star"></i>								
                                                                            <i class="fa fa-star"></i>								
                                                                        </span>
                                                                    </p>
                                                                    <div class="description">
                                                                        <p>roadthemes</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="review-form-wrapper">
                                                        <div class="review-form">
                                                            <span class="comment-reply-title">Add a review </span>
                                                            <form action="#">
                                                                <p class="comment-notes">
                                                                    <span id="email-notes">Your email address will not be published.</span>
                                                                     Required fields are marked
                                                                     <span class="required">*</span>
                                                                </p>
                                                                <div class="comment-form-rating">
                                                                    <label>Your rating</label>
                                                                    <div class="rating">
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="input-element">
                                                                    <div class="comment-form-comment">
                                                                        <label>Comment</label>
                                                                        <textarea name="message" cols="40" rows="8"></textarea>
                                                                    </div>
                                                                    <div class="review-comment-form-author">
                                                                        <label>Name </label>
                                                                        <input required="required" type="text">
                                                                    </div>
                                                                    <div class="review-comment-form-email">
                                                                        <label>Email </label>
                                                                        <input required="required" type="text">
                                                                    </div>
                                                                    <div class="comment-submit">
                                                                        <button type="submit" class="form-button">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <!--Discription Tab Content End-->
		                    </div>
		                </div>
		            </div>
		        </div>
		        <!--Discription Tab End-->
		    </div>
		</section>
		<!--Single Product Area End-->
		<!--Related Products Area Start-->
		<section class="related-products-area">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <!--Section Title1 Start-->
                        <div class="section-title1-border">
                            <div class="section-title1">
                                <h3>Related products</h3>
                            </div>
                        </div> 
                        <!--Section Title1 End-->
		            </div>
		        </div>
		        <div class="row">
		            <div class="related-products owl-carousel">
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/9.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/10.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/21.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/22.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h2><a href="single-product.php">Natural popularised</a></h2>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/19.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/20.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h2><a href="single-product.php">Natural simply</a></h2>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/17.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/18.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/11.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/12.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h2><a href="single-product.php">Natural Contrary</a></h2>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/25.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/26.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h2><a href="single-product.php">Dummy animal</a></h2>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/31.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/32.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                        <!--Single Product Start-->
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php">
                                        <img class="first-img" src="assets/img/product/27.jpg" alt="">
                                        <img class="hover-img" src="assets/img/product/28.jpg" alt="">
                                    </a>
                                    <span class="sicker">-7%</span>
                                    <ul class="product-action">
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        <li><a href="#" data-toggle="modal" title="Quick View" data-target="#myModal"><i class="ion-android-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h2><a href="single-product.php">Natural standard</a></h2>
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
                                        <a class="button add-btn" href="#">add to cart</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--Single Product End-->
                    </div>
		        </div>
		    </div>
		</section>
		<!--Related Products Area End-->
		<!--Brand Area Start-->
		<div class="brand-area ptb-30 white-bg">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="brand-active owl-carousel">
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                        <a href="#"><img src="assets/img/brand/1.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                        <a href="#"><img src="assets/img/brand/2.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                        <a href="#"><img src="assets/img/brand/3.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                        <a href="#"><img src="assets/img/brand/4.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                    <!--Single Brand Start-->
		                    <div class="single-brand img-full">
		                        <a href="#"><img src="assets/img/brand/5.png" alt=""></a>
		                    </div>
		                    <!--Single Brand End-->
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Brand Area End-->
		<!--Footer Area Start-->
		<footer>
		    <div class="footer-container white-bg">
		        <!--Footer Top Area Start-->
                <div class="footer-top-area ptb-50">
                    <div class="container">
                        <div class="row">
                            <!--Single Footer Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-footer">
                                    <!--Footer Logo Start-->
                                    <div class="footer-logo">
                                        <a href="index.php"><img src="assets/img/logo/logo2.png" alt=""></a>
                                    </div>
                                    <!--Footer Logo End-->
                                    <!--Footer Content Start-->
                                    <div class="footer-content">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majorited have suffered alteration.</p>
                                        <div class="contact">
                                            <p><label>Address:</label>123 Main Street, Anytown, CA 12345 - USA.</p>
                                            <p><label>Phone:</label><a href="tel:+800123456789"></a>(+800) 123 456 789)</p>
                                            <p><label>Email:</label><a href="mailto:Support@demo.com">Support@demo.com</a></p>
                                        </div>
                                    </div>
                                    <!--Footer Content End-->
                                </div>
                            </div>
                            <!--Single Footer End-->
                            <!--Single Footer Start-->
                            <div class="col-md-2 col-sm-6">
                                <div class="single-footer mt-30">
                                    <div class="footer-title">
                                        <h3>information</h3>
                                    </div>
                                    <ul class="footer-info">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Shop</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Single Footer End-->
                            <!--Single Footer Start-->
                            <div class="col-md-2 col-sm-6">
                                <div class="single-footer mt-30">
                                    <div class="footer-title">
                                        <h3>My Account</h3>
                                    </div>
                                    <ul class="footer-info">
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Shopping cart</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Portfolio</a></li>
                                        <li><a href="#">Frequently Questions</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Single Footer End-->
                            <!--Single Footer Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-footer mt-30">
                                    <div class="footer-title">
                                        <h3>follow us</h3>
                                    </div>
                                    <ul class="socil-icon mb-40">
                                        <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Google Plus"><i class="ion-social-googleplus"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Youtube"><i class="ion-social-youtube"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Pinterest"><i class="ion-social-pinterest"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Rss"><i class="ion-social-rss"></i></a></li>
                                    </ul>
                                    <div class="footer-title">
                                        <h3>Download Apps</h3>
                                    </div>
                                    <div class="footer-content">
                                        <a href="#"><img src="assets/img/apps/1.jpg" alt=""></a>
                                        <a href="#"><img src="assets/img/apps/2.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!--Single Footer End-->
                        </div>
                    </div>
                </div>
                <!--Footer Top Area End-->
                <!--Footer Middel Area Start-->
                <div class="footer-middel-area">
                    <div class="container">
                        <!--News Latter Area Start-->
                        <div class="news-latter-area">
                            <div class="row">
                                <!--News Latter Content Start-->
                                <div class="col-md-6 text-center">
                                    <div class="news-lettar-content">
                                        <div class="icon">
                                            <img src="assets/img/icon/5.png" alt="">
                                        </div>
                                        <p><label>Sign Up For Newsletters</label><br>Get E-mail updates about our latest shop and special offers.</p>
                                    </div>
                                </div>
                                <!--News Latter Content Start-->
                                <!--News Latter Subscribe Box Start-->
                                <div class="col-md-6">
                                    <!-- Newsletter Form -->
                                    <div class="news-latter-subscribe-box text-right">
                                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="popup-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                                <label class="d-none hidden">Subscribe to our mailing list</label>
                                                <input class="style2" type="email" name="email" placeholder="Enter your email" required="">
                                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                                <button type="submit" name="subscribe" id="mc-embedded-subscribe"><i class="ion-ios-paperplane"></i></button> 
                                           </div> 
                                        </form>
                                    </div>
                                    <!-- Newsletter Form -->
                                </div>
                                <!--News Latter Subscribe Box End-->
                            </div>
                        </div>
                        <!--News Latter Area End-->
                        <!--Wdget Area Start-->
                        <div class="wdget-area ptb-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Wdget Menu Start-->
                                    <div class="wdget-menu">
                                        <div class="wdget-title">
                                            <h4>Camera:</h4>
                                        </div>
                                        <ul class="wdget-nav">
                                            <li><a href="#">Brand1</a></li>
                                            <li><a href="#">Brand2</a></li>
                                            <li><a href="#">Brand3</a></li>
                                            <li><a href="#">Brand4</a></li>
                                            <li><a href="#">Brand4</a></li>
                                        </ul>
                                    </div>
                                    <!--Wdget Menu End-->
                                    <!--Wdget Menu Start-->
                                    <div class="wdget-menu">
                                        <div class="wdget-title">
                                            <h4>Laptop:</h4>
                                        </div>
                                        <ul class="wdget-nav">
                                            <li><a href="#">Brand1</a></li>
                                            <li><a href="#">Brand2</a></li>
                                            <li><a href="#">Brand3</a></li>
                                            <li><a href="#">Brand4</a></li>
                                            <li><a href="#">Brand5</a></li>
                                            <li><a href="#">Brand6</a></li>
                                            <li><a href="#">Brand7</a></li>
                                        </ul>
                                    </div>
                                    <!--Wdget Menu End-->
                                    <!--Wdget Menu Start-->
                                    <div class="wdget-menu">
                                        <div class="wdget-title">
                                            <h4>Smartphone:</h4>
                                        </div>
                                        <ul class="wdget-nav">
                                            <li><a href="#">Brand1</a></li>
                                            <li><a href="#">Brand2</a></li>
                                            <li><a href="#">Brand3</a></li>
                                            <li><a href="#">Brand4</a></li>
                                            <li><a href="#">Brand5</a></li>
                                            <li><a href="#">Brand6</a></li>
                                            <li><a href="#">Brand7</a></li>
                                            <li><a href="#">Brand8</a></li>
                                            <li><a href="#">Brand9</a></li>
                                            <li><a href="#">Brand10</a></li>
                                            <li><a href="#">Brand11</a></li>
                                        </ul>
                                    </div>
                                    <!--Wdget Menu End-->
                                </div>
                                <div class="col-md-6">
                                    <!--Wdget Menu Start-->
                                    <div class="wdget-menu">
                                        <div class="wdget-title">
                                            <h4>Televisions:</h4>
                                        </div>
                                        <ul class="wdget-nav">
                                            <li><a href="#">Brand1</a></li>
                                            <li><a href="#">Brand2</a></li>
                                            <li><a href="#">Brand3</a></li>
                                            <li><a href="#">Brand4</a></li>
                                            <li><a href="#">Brand5</a></li>
                                            <li><a href="#">Brand6</a></li>
                                            <li><a href="#">Bravia</a></li>
                                        </ul>
                                    </div>
                                    <!--Wdget Menu End-->
                                    <!--Wdget Menu Start-->
                                    <div class="wdget-menu">
                                        <div class="wdget-title">
                                            <h4>Watches:</h4>
                                        </div>
                                        <ul class="wdget-nav">
                                            <li><a href="#">Brand1</a></li>
                                            <li><a href="shop.php">Brand7</a></li>
                                            <li><a href="#">Brand3</a></li>
                                            <li><a href="#">Brand4</a></li>
                                            <li><a href="#">Brand5</a></li>
                                            <li><a href="#">Brand6</a></li>
                                            <li><a href="#">Brand7</a></li>
                                            <li><a href="#">Brand8</a></li>
                                            <li><a href="#">Brand9</a></li>
                                        </ul>
                                    </div>
                                    <!--Wdget Menu End-->
                                    <!--Wdget Menu Start-->
                                    <div class="wdget-menu">
                                        <div class="wdget-title">
                                            <h4>Furniture:</h4>
                                        </div>
                                        <ul class="wdget-nav">
                                            <li><a href="#">Brand1</a></li>
                                            <li><a href="#">Livingroom</a></li>
                                            <li><a href="#">badroom</a></li>
                                            <li><a href="#">Sofa</a></li>
                                            <li><a href="#">Chair</a></li>
                                            <li><a href="#">Bed</a></li>
                                            <li><a href="#">Desk</a></li>
                                        </ul>
                                    </div>
                                    <!--Wdget Menu End-->
                                </div>
                            </div>
                        </div>
                        <!--Wdget Area End-->
                    </div>
                </div>
                <!--Footer Middel Area End-->
                <!--Footer Bottom Area Start-->
                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="row">
                            <!--Footer Left Content Start-->
                            <div class="col-md-6 col-sm-6">
                                <div class="copyright-text">
                                    <p>Copyright © 2018 <a href="http://hastech.company/" target="_blank">Hastech</a>, All Rights Reserved.</p>
                                </div>
                            </div>
                            <!--Footer Left Content End-->
                            <!--Footer Right Content Start-->
                            <div class="col-md-6 col-sm-6">
                                <div class="payment-img text-right">
                                    <a href="#"><img src="assets/img/payment/payment.png" alt=""></a>
                                </div>
                            </div>
                            <!--Footer Right Content End-->
                        </div>
                    </div>
                </div>
                <!--Footer Bottom Area End-->
		    </div>
		</footer>
		<!--Footer Area End-->
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
