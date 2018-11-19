<?php 
	include("config/db.php");
	include("session.php");

    if (isset($_POST[""])) {
        # code...
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Let's get talking!</title>
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
                                           <li><a href="shop.php">Shop</a></li>
                                           <li><a href="about.php">About Us</a></li>
                                           <li><a href="blog.php">Blog</a></li>
                                           <li class="active"><a href="contact.php">Contact Us</a></li>
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
                                           <li class="active"><a href="contact.php">Contact Us</a></li>
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
		                            <li>Contact Us</li>
		                        </ul>
		                    </div>
		                    <div class="heading-banner-title">
		                        <h1 style="text-align:center;">Let's get talking</h1>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
		<!--Heading Banner Area End-->
		<!--Contact Form Area Start-->
		<section class="contact-form-area mt-20">
		    <div class="container">
		        <div class="row">
                    <!--Contact Form Start-->
		            <div class="col-md-7">
		                <div class="contact-form">
		                    <form id="" action="#" method="post">
		                        <div class="contact-input">
		                            <div class="first-name">
		                                <input type="text" name="first_name" placeholder="First Name *">
		                            </div>
		                            <div class="last-name">
		                                <input type="text" name="last_name" placeholder="Last Name *">
		                            </div>
		                            <div class="email">
		                                <input type="email" name="email" placeholder="Email *">
		                            </div>
		                            <div class="subject">
		                                <input type="text" name="subject" placeholder="Subject *">
		                            </div>
		                        </div>
		                        <div class="contact-message mb-20">
		                            <div class="message">
		                                <textarea name="message" cols="40" rows="10" placeholder="Message *" style="border-radius:20px;"></textarea>
		                            </div>
		                        </div>
		                        <div class="contact-submit" style="text-align:center;">
		                            <button type="submit" class="form-button">Send Email</button>
		                        </div>
		                    </form>
		                    <p class="form-messege"></p>
		                </div>
		            </div>
		            <!--Contact Form End-->
		            <!--Contact Address Start-->
		            <div class="col-md-5">
		                <div class="contact-address-info">
		                    <div class="contact-description mb-35">
		                        <p>Our Team of ever ready and able personnel are always here to attented to your needs. Fill the form below and let us know what is on your mind. Your suggestions are most welcome. You can also ask a question if it's not already addressed in <a href="faqs.php"> frequently asked questions.</a></p>
		                    </div>
		                    <div class="contact-address mb-35">
		                        <ul>
		                            <li><i class="fa fa-fax"></i> Accra, Ghana</li>
		                            <li><i class="fa fa-phone"></i> 050 378 8515</li>
		                            <li><i class="fa fa-envelope-o"></i> info@solushop.com.gh</li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		            <!--Contact Address End-->
		        </div>
		    </div>
		</section>
		<!--Contact Form Area End-->
		
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
