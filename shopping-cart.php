<?php 
    include("config/db.php");
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shopping Cart-Javenist</title>
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
                                           <li><a href="index.php">Home</a></li>
                                           <li class="active"><a href="shop.php">Shop</a></li>
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
		<section class="heading-banner-area pt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="heading-banner">
		                    <div class="breadcrumbs">
		                        <ul>
		                            <li><a href="index.php">Home</a><span class="breadcome-separator">></span></li>
		                            <li>Shopping Cart</li>
		                        </ul>
		                    </div>
		                    <div class="heading-banner-title">
		                        <h1>Shopping Cart</h1>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
		<!--Heading Banner Area End-->c
		<!--Shopping Cart Area Start-->
		<div class="shopping-cart-area mt-20">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		               <form class="shop-form" action="#">
                            <div class="wishlist-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-remove"></th>
                                            <th class="product-cart-img">
                                                <span class="nobr">Product Image</span>
                                            </th>
                                            <th class="product-name">
                                                <span class="nobr">Product Name</span>
                                            </th>
                                            <th class="product-quantity">
                                                <span class="nobr">quantity</span>
                                            </th>
                                            <th class="product-price">
                                                <span class="nobr"> Unit Price </span>
                                            </th>
                                            <th class="product-total-price">
                                                <span class="nobr"> Total Price </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-remove">
                                                <a href="#">×</a>
                                            </td>
                                            <td class="product-cart-img">
                                                <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">natural typesetting</a>
                                            </td>
                                            <td class="product-quantity">
                                                <select>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </td>
                                            <td class="product-price">
                                                <span><del>$74.00</del> <ins>$69.00</ins></span>
                                            </td>
                                            <td class="product-total-price">
                                                <span>$69.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="product-remove">
                                                <a href="#">×</a>
                                            </td>
                                            <td class="product-cart-img">
                                                <a href="#"><img src="assets/img/cart/2.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">Natural simply random</a>
                                            </td>
                                            <td class="product-quantity">
                                                <select>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </td>
                                            <td class="product-price">
                                                <span><del>$74.00</del> <ins>$69.00</ins></span>
                                            </td>
                                            <td class="product-total-price">
                                                <span>$69.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="product-remove">
                                                <a href="#">×</a>
                                            </td>
                                            <td class="product-cart-img">
                                                <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">Natural simply random</a>
                                            </td>
                                            <td class="product-quantity">
                                                <select>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </td>
                                            <td class="product-price">
                                                <span><del>$74.00</del> <ins>$69.00</ins></span>
                                            </td>
                                            <td class="product-total-price">
                                                <span>$69.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
		               </form>
		            </div>
		        </div>
		    </div>
		    <div class="container">
		        <div class="row">
		            <div class="col-md-6 col-sm-6">
		                <form action="#">
                           <div class="cart-collaterals">
                               <div class="cart-cuppon">
                                   <div class="coupon">
                                       <input name="coupon_code" class="input-copun" value="" placeholder="Coupon code" type="text">
                                       <button type="submit" class="wishlist-btn shopping-btn">Apply coupon</button>
                                   </div>
                                   <button class="update-btn" type="submit">Update cart</button>
                               </div>
                           </div>
		                </form>
		            </div>
		            <div class="col-md-6 col-sm-6">
                       <div class="shopping-cart-total">
                           <h2>Cart totals</h2>
                           <div class="shop-table table-responsive">
                               <table>
                                   <tbody>
                                       <tr class="cart-subtotal">
                                           <td data-title="Subtotal"><span>$207.00</span></td>
                                       </tr>
                                       <tr class="shipping">
                                           <td data-title="Shipping">Flat Rate: <Span>$5.00</Span> <a href="#">Calculate shipping</a></td>
                                       </tr>
                                       <tr class="order-total">
                                           <td data-title="Total"><span><strong>$212.00</strong></span></td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                           <div class="proceed-to-checkout">
                               <a class="checkout-button " href="#">Proceed to checkout</a>
                           </div>
                       </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Shopping Cart Area End-->
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
