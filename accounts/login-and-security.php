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

    //processing input
    if (isset($_POST["UpdatePassword"])) {
        $CurrentPassword = $_POST["CurrentPassword"];
        $NewPassword = $_POST["NewPassword"];
        $ConfimNewPassword = $_POST["ConfimNewPassword"];

        if (trim($NewPassword) == "") {
            $ErrorMessage = "New Password cannot be empty";
        }elseif (trim($ConfimNewPassword) == "") {
            $ErrorMessage = "Please don't forget to Confirm your new password";
        }elseif($NewPassword!=$ConfimNewPassword){
            $ErrorMessage = "Passwords don't match";
        }

        if (!isset($ErrorMessage)) {
            $sql    = "SELECT * from customers where Customer_ID='$Customer_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($Customer_ID == $row['Customer_ID'] && password_verify($CurrentPassword, $row["Password"])) {
                        $Phone = $row["Phone"];
                        //Update password
                        $passwordhash = password_hash($NewPassword, PASSWORD_DEFAULT);
                        $sql = "UPDATE customers SET Password = '$passwordhash' WHERE Customer_ID='$Customer_ID' ";
                        if ($conn->query($sql)) {
                            $SuccessMessage = "Updated password successfully, $Customer_FName";
                            $message = "Your password has just been reset, if you didn't request this change. Kindly call or whatsapp customer care immediately on 0559538887.";
                             $URL = "http://api.mytxtbox.com/v3/messages/send?" . "From=Solushop-GH" . "&To=%2B" . urlencode("$Phone") . "&Content=" . urlencode($message) . "&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
                            //if (isset($_GET["site"])) { $URL = $_GET["site"]; }
                             $ch     = curl_init();
                                //echo "URL = $URL <br>\n";
                                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                                curl_setopt($ch, CURLOPT_URL, $URL);
                                //curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
                                curl_exec($ch);
                        }
                    } 
                }
                if (!isset($SuccessMessage)) {
                    $ErrorMessage = "Invalid current password";
                }
            }else{
                $ErrorMessage = "Something went wrong. Please try again";
            }
        }
        
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

        <title>Login &amp; Security</title>


        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../assets/css/colors/blue.css" media="all" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

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
             #note {
                    position: absolute;
                    z-index: 101;
                    top: 0;
                    left: 0;
                    right: 0;
                    font-size: 16px;
                    color: white;
                    background: green;
                    text-align: center;
                    line-height: 3;
                    overflow: hidden; 
                    -webkit-box-shadow: 0 0 5px black;
                    -moz-box-shadow:    0 0 5px black;
                    box-shadow:         0 0 5px black;
                }

            @-webkit-keyframes slideDown {
                0%, 100% { -webkit-transform: translateY(-50px); }
                10%, 90% { -webkit-transform: translateY(0px); }
            }

            @-moz-keyframes slideDown {
                0%, 100% { -moz-transform: translateY(-50px); }
                10%, 90% { -moz-transform: translateY(0px); }
            }

            .cssanimations.csstransforms #note {
                -webkit-transform: translateY(-50px);
                -webkit-animation: slideDown 5s 1.0s 1 ease forwards;
                -moz-transform:    translateY(-50px);
                -moz-animation:    slideDown 5s 1.0s 1 ease forwards;
            }

            .cssanimations.csstransforms #close {
              display: none;
            }
            .cssanimations.csstransforms #close {
              display: none;
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
                <?php
                   include("../errorandsuccessmessages.php");;                    
                ?>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article class="has-post-thumbnail hentry">
                               

                                <div class="entry-content">
                                    <br><br>
                                    <div style="width:25%; float:left" class="vertical-menu">
                                        <a href="index.php" >Dashboard</a>
                                        <a href="personal-details.php">Personal Details</a>
                                        <a href="orders.php" >Your Orders</a>
                                        <a href="login-and-security.php" class="active">Login &amp; Security</a>
                                        <a href="addresses.php" >Manage Address Book</a>
                                        
                                    </div>
                                    <form method="POST" action="login-and-security.php">
                                    <div style="width:75%; float:right" class="id-main">
                                    <h3>Login &amp; Security</h3>
                                    To change your password, fill the fields below and hit update password.<br><br>
                                    <?php 
                                        echo " 
                                            <p class=\"form-row form-row-wide\">
                                                <label for=\"reg_email\">Current Password<span class=\"required\">*</span></label>
                                                <input type=\"password\" class=\"input-text\" name=\"CurrentPassword\" id=\"\" value=\"\" />
                                            </p>

                                            <p id=\"billing_first_name_field\" class=\"form-row form-row form-row-first validate-required\"><label class=\"\" for=\"\">New Password<abbr title=\"required\" class=\"required\">*</abbr></label><input type=\"password\" value=\"\" placeholder=\"\" id=\"\" name=\"NewPassword\" class=\"input-text\"></p>

                                            <p id=\"billing_last_name_field\" class=\"form-row form-row form-row-last validate-required\"><label class=\"\" for=\"\">Confirm New Password<abbr title=\"required\" class=\"required\">*</abbr></label><input type=\"password\" value=\"\" placeholder=\"\" id=\"\" name=\"ConfimNewPassword\" class=\"input-text\"></p>";

                                    ?>
                                        <div style="text-align: center;">
                                            <p class="form-row"><input type="submit" class="button" name="UpdatePassword" value="Update Password" /></p>

                                            </div>
                                        </form>
                                    </div>
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
