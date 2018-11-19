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

    //updpate details
    if (isset($_POST["UpdateDetails"])) {

        function sanitize($data)
        { 
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $FName = sanitize($_POST['FName']);
        $LName = sanitize($_POST['LName']);
        $Phone = sanitize($_POST['Phone']);
        $Email = sanitize($_POST['Email']);

        $sql    = "SELECT Email FROM customers";
        $result = $conn->query($sql);
        $Email_Count = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($Email == $row['Email']) {
                   $Email_Count++;
                }
            }
        }

        if ($Email_Count>1) {
            $ErrorMessage = "Email already associated with another account";
        }

        //process phone number
        //processing phone number
        if (!$Phone == "") {
            $Phone = str_replace(" ", "", $Phone);
            $Phone = str_replace("-", "", $Phone);
            if ($Phone[0] == '+' or $Phone[0] == '0') {
                $Phone = substr($Phone, 1);
                if (strlen($Phone) == 9) {
                    $Phone = '233' . $Phone;
                } else {
                    $Phone = $Phone;
                }
            } elseif ($Phone[0] == 2 and $Phone[1] == 3 and $Phone[2] == 3 and strlen($Phone) == 12) {
                $Phone = $Phone;
            } elseif (strlen($Phone) < 12 OR strlen($Phone) > 15) {
                $ErrorMessage = "Invalid phone number format";
            }
        } else {
            $ErrorMessage = "Phone number required";
        }
 
        //validate email
        //validate email
        if (trim($Email) == "") {
            $ErrorMessage = "Email is required";
        }
        if (trim($FName) == "") {
            $ErrorMessage = "First name is required";
        }
        if (trim($LName) == "") {
            $ErrorMessage = "Last name is required";
        }

        if(is_numeric($LName)) {
            $ErrorMessage = "Last name cannot be a number";
        }
        
        if(is_numeric($FName)) {
            $ErrorMessage = "First name cannot be a number";
        }

        if (!isset($ErrorMessage)) {
            //update details
            $sql = "UPDATE customers SET FName='$FName', LName='$LName', Phone='$Phone', Email='$Email' where Customer_ID='$Customer_ID'";
            if ($conn->query($sql)) {
                $SuccessMessage = "Updated Details successfully, $FName";
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

        <title>Personal Details</title>

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
                                        <a href="personal-details.php" class="active">Personal Details</a>
                                        <a href="orders.php" >Your Orders</a>
                                        <a href="login-and-security.php">Login &amp; Security</a>
                                        <a href="addresses.php">Manage Address Book</a>
                                        
                                    </div>
                                    <form action="personal-details.php" method="POST">
                                    <div style="width:75%; float:right" class="id-main">
                                    <h3>Personal Details</h3>
                                        <?php 
                                            //select user details
                                            $sql = "SELECT * FROM customers WHERE Customer_ID = '$Customer_ID'";

                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $Email = $row['Email'];
                                                    $FName = $row['FName'];
                                                    $LName = $row['LName'];
                                                    $Phone = $row['Phone'];
                                                }
                                            }else{
                                                $errorLogin = "Email or Password is invalid";
                                            }

                                            echo " 
                                            <p id=\"billing_first_name_field\" class=\"form-row form-row form-row-first validate-required\"><label class=\"\" for=\"billing_first_name\">First Name <abbr title=\"required\" class=\"required\">*</abbr></label><input type=\"text\" value=\"$FName\" placeholder=\"\" id=\"billing_first_name\" name=\"FName\" class=\"input-text\"></p>

                                            <p id=\"billing_last_name_field\" class=\"form-row form-row form-row-last validate-required\"><label class=\"\" for=\"billing_last_name\">Last Name <abbr title=\"required\" class=\"required\">*</abbr></label><input type=\"text\" value=\"$LName\" placeholder=\"\" id=\"billing_last_name\" name=\"LName\" class=\"input-text\"></p>
                                            

                                            <p class=\"form-row form-row-wide\">
                                                <label for=\"reg_email\">Email address<span class=\"required\">*</span></label>
                                                <input type=\"email\" class=\"input-text\" name=\"Email\" id=\"reg_email\" value=\"$Email\" />
                                            </p>

                                            <p class=\"form-row form-row-wide\">
                                                <label for=\"reg_email\">Phone Number<span class=\"required\">*</span></label>
                                                <input type=\"text\" class=\"input-text\" name=\"Phone\" id=\"\" value=\"$Phone\" />
                                            </p>";
                                        ?>

                                       
                                        <div style="text-align: center;">
                                        <p class="form-row"><input type="submit" class="button" name="UpdateDetails" value="Update Details" /></p>

                                        </div>
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
