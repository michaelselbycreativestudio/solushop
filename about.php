<?php 
    include("config/db.php");
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>About Solushop</title>
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
                                           <li class="active"><a href="about.php">About Us</a></li>
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
                                           <li class="active"><a href="about.php">About Us</a></li>
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
		<!--Heading Banner Area Start-->
		<section class="heading-banner-area pt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="heading-banner">
		                    <div class="breadcrumbs">
		                        <ul>
		                            <li><a href="index.php">Home</a><span class="breadcome-separator">></span></li>
		                            <li>About Solushop</li>
		                        </ul>
		                    </div>
		                    <div class="heading-banner-title">
		                        <h1 style="text-align:center;">Solushop Ghana</h1>
                                <p style="text-align:center;"><i>"Ghana's Most Trusted Online Shop"</i></p>
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
                    <div class="col-md-6 col-sm-6">
                        <img src="assets/img/about/2.jpg" style="border-radius:20px;" />
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-register-title">
                            <h2 style="text-align:center; margin-top:40px;">We are more than a marketplace</h2><br>
                            <p style="color:#363f4d; font-size:15px; text-align:center;">Solushop is a community of driven and focused vendors and expectant and saisfied customers. One thing that we do not compromise on is the quality of our service. We ensure that vendors and products are properly screened, customers as well are up to par with the procedures and rules and hence ensuring that customers and vendors are satisfied with our service.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-register-title">
                            <h2 style="text-align:center; margin-top:40px;">Our vision here at Solushop is<br><br><i style="font-size:16px; padding:10px;">"To be the No. 1 Online Store in Ghana, and Africa<br> with happy and satisfied buyers and vendors."</i></h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="assets/img/about/1.jpg" style="border-radius:20px;" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <img src="assets/img/about/3.jpg" style="border-radius:20px;" />
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-register-title">
                            <h2 style="text-align:center; margin-top:40px;">Buying on Solushop</h2><br>
                            <p style="color:#363f4d; font-size:15px; text-align:center;">Buying on Solushop is extremely easy. Simply sign up, add products to your cart and pay to initiate your order. Confirmation will be made via phone and your order will be processed and delivered within a week! Amazing right? Start shopping now.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-register-title">
                            <h2 style="text-align:center; margin-top:40px;">Selling on Solushop</h2><br>
                            <p style="color:#363f4d; font-size:15px; text-align:center;">To become a vendor on Solushop, you need to have an authentic and verified product source, and a pickup point in Accra. If you do, apply by calling or whatsapping Michael on 0503788515 to begin the verification and onboarding process.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="assets/img/about/4.jpg" style="border-radius:20px;" />
                    </div>
                    
                </div>
                <br><br>
		    </div>
		</section>
		
        <?php include("footer.php"); ?>
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
