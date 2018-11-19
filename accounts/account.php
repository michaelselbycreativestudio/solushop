<?php 
    include("../databaseconnection.php");
    include("../session.php");

    //check if user is logged in else go to login page
    if (isset($_SESSION['Solushop_Customer_ID'])) {
        //do something.
    }else{
        header("Location: ../login.php");
        exit();
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

        <title>My Account</title>

        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/colors/blue.css" media="all" />

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
              background: url(../assets/images/loader.gif) center no-repeat white;
        }
		
		.vertical-menu {
						width: 200px;
						}

.vertical-menu a {
    background-color: #eee;
    color: black;
    display: block;
    padding: 12px;
    text-decoration: none;
}

.vertical-menu a:hover {
    background-color: #ccc;
}

.vertical-menu a.active {
    background-color: #f68b1e;
    color: white;
}
.id-main{
	padding: 10px 10px 10px 30px
	
}
.accTitle{
	padding:0px 0px 0px 255px

        </style>
    </head>
    <script src="assets/js/modernizr.custom.80028.js"></script>
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

			<?php include("../top-bar.php"); ?>
            <?php include("../header-menu-bar.php"); ?>            
            <?php include("../nav-bar.php"); ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    <nav class="woocommerce-breadcrumb" ><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>My Account</nav><!-- .woocommerce-breadcrumb -->

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article id="post-8" class="hentry">
								<h3 class="accTitle"><a name="dash"></a>Your Account</h3>
                                <div class="entry-content">
									<div style="width:25%; float:left" class="vertical-menu">
										<a href="account.php#dash" class="active">Dashboard</a>
										<a href="accOrders.php#ord">Your Orders</a>
										<a href="accSec.php#sec">Login & Security</a>
										<a href="accAddress.php#add">Manage Address Book</a>
										<a href="logout.php">Log Out</a>
									</div>
									<div style="width:75%; float:right" class="id-main">
									Hello $username(not $username? <a name="dash"href="logout.php">Log out</a>)
									<br/>
									From your dashboard you can view your <a href="accOrders.php">orders</a>, manage your delivering <a href="accAddress.php">addresses</a> and add your <a href="accDetails.php">password and account details</a>. 

									</div>
								</div><!-- #content --><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                            </article>
                        </main>
                    </div>
            
            <?php include("../footer.php"); ?>
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
