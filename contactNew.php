<?php 
    include("session.php");
    include("mailinglistadd.php");
    
	if(isset($_POST["submit"])){
		$recipient = "info@solushop.com.gh";
		$subject = $_POST["subject"];
	$lname = $_POST["last-name"];
	$fname = $_POST["first-name"];
	$senderEmail =$_POST["s-email"];
	$message = $_POST["your-message"];
	
	$mailBody = "Name: $lname  $fname\nEmail:$senderEmail\n\n$message";
		mail($recipient, $subject, $mailBody, "From: $fname<$senderEmail>");
		
	$thankYou="<p> Thank you! Your message has been sent.</p>";
	}
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71743571-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-71743571-3');
</script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Let's Talk</title>

        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/colors/blue.css" media="all" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="assets/images/fav-icon.png">
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <style type="text/css">
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
              position: fixed;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              z-index: 9999;
              background: url(assets/images/loader.gif) center no-repeat white;
        }
        </style>
    </head>
    <script src="assets/js/modernizr.custom.80028.js"></script>
    <body class="page-template-default contact-v1">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php include("top-bar.php"); ?>
            <?php include("header-menu-bar.php"); ?>       
            <?php include("nav-bar.php"); ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    <nav class="woocommerce-breadcrumb"><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Contact Us</nav>

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article class="post-2508 page type-page status-publish hentry" id="post-2508">
                                <div itemprop="mainContentOfPage" class="entry-content">
                                    <div class="map" style="width: 100vw; position: relative; margin-left: -50vw; left: 50%; margin-bottom: 3em;">
                                        <!iframe height="514" allowfullscreen="" style="border: 0px none; pointer-events: none;" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDex_lM7IVrbfRTeEJvSYs0awjsBkjrxd0 &q=KNUST,Ghana+Kumasi" allowfullscreen>"></iframe>
										<iframe src="https://www.google.com/maps/d/u/0/embed?mid=137fO_zSxiwElPumfTua9E2CZna8" width="640" height="480"></iframe>
									</div>
                                    <div class="vc_row-full-width vc_clearfix"></div>
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="contact-form wpb_column vc_column_container vc_col-sm-9 col-sm-9">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h2 class="contact-page-title">Leave us a Message</h2>
                                                            <p>Maecenas dolor elit, semper a sem sed, pulvinar molestie lacus. Aliquam dignissim, elit non mattis ultrices,<br>neque odio ultricies tellus, eu porttitor nisl ipsum eu massa.</p>
                                                        </div>
                                                    </div>
                                                    <div lang="en-US" dir="ltr" id="wpcf7-f2507-p2508-o1" class="wpcf7" role="form">
                                                        <div class="screen-reader-response"></div>
                                   
									  <form class="wpcf7-form" method="post" action="contactNew.php">

                                                            <div style="display: none;">
                                                                <input type="hidden" value="2507" name="_wpcf7">
                                                                <input type="hidden" value="4.4.1" name="_wpcf7_version">
                                                                <input type="hidden" value="en_US" name="_wpcf7_locale">
                                                                <input type="hidden" value="wpcf7-f2507-p2508-o1" name="_wpcf7_unit_tag">
                                                                <input type="hidden" value="47d6f1c9ce" name="_wpnonce">
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>First name*</label><br>
                                                                    <span class="wpcf7-form-control-wrap first-name"><input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="first-name"></span>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>Last name*</label><br>
                                                                    <span class="wpcf7-form-control-wrap last-name"><input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="last-name"></span>
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label>Email</label><br>
                                                                <span class="wpcf7-form-control-wrap subject"><input type="text" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" name="s-email"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Subject</label><br>
                                                                <span class="wpcf7-form-control-wrap subject"><input type="text" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" name="subject"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Your Message</label><br>
                                                                <span class="wpcf7-form-control-wrap your-message"><textarea aria-invalid="false" class="wpcf7-form-control wpcf7-textarea" rows="10" cols="40" name="your-message"></textarea></span>
                                                            </div>
                                                            <div class="form-group clearfix">

                                                                <p><input type="submit" name="submit" value="Send Message"></p>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="store-info wpb_column vc_column_container vc_col-sm-3 col-sm-3">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h2 class="contact-page-title">Our E-Store</h2>
                                                            <h3>Hours of Operation</h3>
                                                            <ul class="list-unstyled operation-hours inner-right-md">
                                                                <li class="clearfix"><span class="day">Monday:</span><span class="pull-right flip hours">9am - 5pm</span></li>
                                                                <li class="clearfix"><span class="day">Tuesday:</span><span class="pull-right flip hours">9am - 5pm</span></li>
                                                                <li class="clearfix"><span class="day">Wednesday:</span><span class="pull-right flip hours">9am - 5pm</span></li>
                                                                <li class="clearfix"><span class="day">Thursday:</span><span class="pull-right flip hours">9am - 5pm</span></li>
                                                                <li class="clearfix"><span class="day">Friday:</span><span class="pull-right flip hours">9am - 5pm</span></li>
                                                                <li class="clearfix"><span class="day">Saturday:</span><span class="pull-right flip hours">9am - 5pm</span></li>
                                                                <li class="clearfix"><span class="day">Sunday</span><span class="pull-right flip hours">Closed</span></li>
                                                            </ul>
                                                            <h3>Careers</h3>
                                                            <p class="inner-right-md">If you’re interested in employment opportunities at Solushop, please email us: <a href="mailto:contact@yourstore.com">careers@solushop.com.gh</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .container -->
            </div><!-- #content -->

            <?php include("footer.php"); ?>
        </div><!-- #page -->

        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/tether.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="assets/js/echo.min.js"></script>
        <script type="text/javascript" src="assets/js/wow.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="assets/js/electro.js"></script>

    </body>
</html>
