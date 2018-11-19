<?php 
    include("../databaseconnection.php");
    include("../session.php");
    include("../mailinglistadd.php");

    if (isset($_SESSION['Solushop_Customer_ID'])) {
        //do something.
    }else{
        header("Location: ../login.php");
        exit();
    }

    if (isset($_POST["PayOrder"])) {
        $PayOrderID = $_POST["PayOrderID"];

        echo $sql = "SELECT * FROM orders WHERE Customer_ID='$Customer_ID' and Order_ID='$PayOrderID'"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            header("Location: ../SlydepayCheckout.php?OID=$PayOrderID");
           exit();
        }else{
            $ErrorMessage = "Something went wrong. Order not found or not made by you";
        }
    }

    if (isset($_POST["ViewDetails"])) {
            $Verify = rand(99999,999999);
            $ViewDetailsID = $_POST["ViewDetailsID"];
            header("Location: view-order-details.php?OD-ID=$ViewDetailsID&Verify=$Verify");
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

        <title>My Orders</title>

        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/colors/blue.css" media="all" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

        <link rel="stylesheet" href="../table/css/style.css">

        <link rel="shortcut icon" href="../assets/images/fav-icon.png">
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
                padding: 10px 10px 10px 30px;
                
            }
            .accTitle{
                padding:0px 0px 0px 255px;
            }
        </style>
    </head>
    <script src="../assets/js/modernizr.custom.80028.js"></script>
    <body class="about full-width page page-template-default">

        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php include("accounts-top-bar.php"); ?>
            <?php include("accounts-header-menu-bar.php"); ?>
            <?php include("accounts-nav-bar.php"); ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article class="has-post-thumbnail hentry">
                               

                                <div class="entry-content">
                                    <br><br>
                                    <div style="width:25%; float:left" class="vertical-menu">
                                        <a href="index.php" >Dashboard</a>
                                        <a href="personal-details.php">Personal Details</a>
                                        <a href="orders.php" class="active">Your Orders</a>
                                        <a href="login-and-security.php">Login &amp; Security</a>
                                        <a href="addresses.php">Manage Address Book</a>
                                        
                                    </div>
                                    <form method="POST" action="#">
                                    <div style="width:75%; float:right" class="id-main">
                                    <h3>Orders</h3>
                                    <?php 
                                      //select user details
                                      $sql = "SELECT * FROM orders, order_state  where orders.Order_State = order_state.ID and Customer_ID = '$Customer_ID'";
                                      $result = $conn->query($sql);
                                      if ($result->num_rows > 0) {
                                        echo "<div class=\"rowtable header\">
                                                <div class=\"cell\" style=\"width: 200px; text-align:center;\">
                                                    Order ID
                                                </div>
                                                <div class=\"cell\" style=\"width: 200px; text-align:center;\">
                                                    Order State
                                                </div>
                                                <div class=\"cell\" style=\"width: 150px; text-align:center;\">
                                                    Date of Order
                                                </div>
                                                <div class=\"cell\" style=\"width: 250px; text-align:center;\">
                                                    Action
                                                </div>
                                            </div>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo 
                                                   "
                                                        <div class=\"rowtable\">
                                                            <div class=\"cell\" style=\"width: 200px; text-align:center;\">".$row["Order_ID"]."
                                                            </div>
                                                            <div class=\"cell\" style=\"width: 150px; text-align:center;\">".$row["UserRawDescription"]."
                                                            </div>
                                                            <div class=\"cell\" style=\"width: 150px; text-align:center;\">".$row["Order_Date"]."
                                                            </div>
                                                            <div class=\"cell\" style=\"width: 300px; text-align:center;\">";
                                                            //deciding on what actions are available
                                                            if($row["Order_State"]==0){
                                                                //pay, cancel, or view details
                                                                echo "<input type='submit' value='Pay' name='PayOrder' style=' background-color: green; color:white; padding:0px; width:60px; height:32px;'/> 
                                                                <input type='hidden' value='".$row["Order_ID"]."' name='PayOrderID' />

                                                                

                                                                 <input type='submit' value='View Details' name='ViewDetails' style='background-color: #f68b1e; color:white; padding:0px; width:90px; height:32px;'/>
                                                                 <input type='hidden' value='".$row["Order_ID"]."' name='ViewDetailsID' />" ;
                                                            }else{
                                                                echo "<input type='submit' value='View Details' name='ViewDetails' style='background-color: #f68b1e; color:white; padding:0px; width:90px; height:32px;'/>
                                                                <input type='hidden' value='".$row["Order_ID"]."' name='ViewDetailsID' />";
                                                            }
                                                                
                                                            echo "</div>
                                                        </div>
                                                      "
                                                    ;
                                        }
                                      }else{
                                        echo "Sorry mate! You have no orders yet.";
                                      }
                                      ?>
                                    </div>
                                    </form>
                                </div>
                                    
                                    <div class="vc_row-full-width vc_clearfix"></div>
                                    
                                </div><!-- .entry-content -->

                            </article><!-- #post-## -->
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .col-full -->
            </div><!-- #content -->

            <?php include("accounts-footer.php"); ?>
        </div><!-- #page -->

        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/tether.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="../assets/js/echo.min.js"></script>
        <script type="text/javascript" src="../assets/js/wow.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="../assets/js/electro.js"></script>

    </body>
</html>
