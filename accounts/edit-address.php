<?php 
    include("../databaseconnection.php");
    include("../session.php");
    include("../mailinglistadd.php");
    //check if user is logged in else go to login page
    if (isset($_SESSION['Solushop_Customer_ID'])) {
        //do something.
    }else{
        header("Location: ../login.php");
        exit();
    }
    
    if (isset($_GET["AD-ID"])) {
        $AddressID = $_GET["AD-ID"];
    }else{
        header("Location: addresses.php");
        exit();
    }

    //processing address details
    if (isset($_POST["AddAddress"])) {
        function sanitize($data)
        { 
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        $Region = $_POST["Region"];
        $City = $_POST["City"];
        $StreetAddress = sanitize($_POST["StreetAddress"]);
        $AppartmentOrHouseNumber = sanitize($_POST["AppartmentOrHouseNumber"]);
        if (trim($AppartmentOrHouseNumber)=="") {
            $FinalAddress = $StreetAddress;
        }else{
            $FinalAddress = $StreetAddress || $AppartmentOrHouseNumber;
        }

        //validate input
        if (!($Region == "Greater Accra Region" OR $Region == "Ashanti Region" OR $Region == "Brong-Ahafo Region" OR $Region == "Western Region" OR $Region == "Central Region")) {
            $ErrorMessage = "Invalid region input detected. Please do not attempt to edit the region.";
        }elseif(!($City == "Accra" OR $City == "Tema" OR $City == "Kumasi" OR $City == "Sunyani" OR $City == "Takoradi" OR $City == "Cape Coast")) {
            $ErrorMessage = "Invalid city input detected. Please do not attempt to alter the available cities.";
        }elseif(trim($StreetAddress)==""){
            $ErrorMessage = "Please enter you address.";
        }

        if(!isset($ErrorMessage)){
            $sql = "UPDATE customer_address SET Region='$Region', Town='$City', Address='$FinalAddress' WHERE ID='$AddressID'";
            if ($conn->query($sql)) {
                $SuccessMessage = "Address updated successfully, $Customer_FName";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Addresses</title>

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
                                        <a href="personal-details.php">Personal Details</a>
                                        <a href="orders.php" >Your Orders</a>
                                        <a href="login-and-security.php">Login &amp; Security</a>
                                        <a href="addresses.php" class="active">Manage Address Book</a>
                                        
                                    </div>
                                    <form method="POST" action="#">
                                    <div style="width:75%; float:right" class="id-main">
                                       <h3>Edit Address</h3>
                                       <?php 
                                            $sql = "SELECT * FROM customer_address where ID = '$AddressID' and Customer_ID='$Customer_ID'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $Region = $row["Region"];
                                                    $City = $row["Town"];
                                                    $AddressString = explode("||", $row["Address"]);
                                                    $StreetAddress = $AddressString[0];
                                                    if (sizeof($AddressString)>1) {
                                                        $AppartmentOrHouseNumber = $AddressString[1];
                                                    }else{
                                                        $AppartmentOrHouseNumber = "";
                                                    }
                                                    
                                                }
                                            }else{
                                                header("Location: addresses.php");
                                                exit();
                                            }

                                            echo "
                                                <p id=\"billing_city_field\" class=\"form-row form-row form-row-wide address-field validate-required\" data-o_class=\"form-row form-row form-row-wide address-field validate-required\"><label class=\"\" for=\"billing_city\">Region <abbr title=\"required\" class=\"required\">*</abbr></label>
                                                     <input type=\"text\" value=\"$Region\"  placeholder=\"\" id=\"Region\" name=\"Region\" class=\"input-text \" readonly/>
                                                          </p>

                                                    <p id=\"billing_city_field\" class=\"form-row form-row form-row-wide address-field validate-required\" data-o_class=\"form-row form-row form-row-wide address-field validate-required\"><label class=\"\" for=\"billing_city\">Town / City <abbr title=\"required\" class=\"required\">*</abbr></label>
                                                    <select type=\"text\" value=\"\"  placeholder=\"\" id=\"City\" name=\"City\" class=\"input-text
                                                    \" onchange=\"update_Region()\">
                                                         <option value=\"Accra\"";
                                                         if ($City=="Accra") {
                                                            echo "selected=\"selected\"";
                                                         }
                                                         echo ">Accra</option>
                                                         <option value=\"Tema\"";
                                                          if ($City=="Tema") {
                                                            echo "selected=\"selected\"";
                                                         }
                                                         echo ">Tema</option>
                                                         <option value=\"Kumasi\"";
                                                          if ($City=="Kumasi") {
                                                            echo "selected=\"selected\"";
                                                         }
                                                         echo ">Kumasi</option>
                                                         <option value=\"Sunyani\"";
                                                          if ($City=="Sunyani") {
                                                            echo "selected=\"selected\"";
                                                         }
                                                         echo ">Sunyani</option>
                                                         <option value=\"Takoradi\"";
                                                          if ($City=="Takoradi") {
                                                            echo "selected=\"selected\"";
                                                         }
                                                         echo ">Takoradi</option>
                                                         <option value=\"Cape Coast\"";
                                                          if ($City=="Cape Coast") {
                                                            echo "selected=\"selected\"";
                                                         }
                                                         echo ">Cape Coast</option>
                                                     </select> </p></p>

                                                    <p id=\"billing_address_1_field\" class=\"form-row form-row form-row-wide address-field validate-required\"><label class=\"\" for=\"billing_address_1\">Address <abbr title=\"required\" class=\"required\">*</abbr></label><input type=\"text\" value=\"$StreetAddress\" placeholder=\"Street address\" id=\"StreetAddress\" name=\"StreetAddress\" class=\"input-text\"></p>

                                                    <p id=\"billing_address_2_field\" class=\"form-row form-row form-row-wide address-field\"><input type=\"text\" value=\"$AppartmentOrHouseNumber\"  placeholder=\"Apartment, suite, unit etc. (optional)\" id=\"AppartmentOrHouseNumber\" name=\"AppartmentOrHouseNumber\" class=\"input-text\"></p>

                                            ";
                                       ?>

                                       
                                                     
                                                    <div style="text-align: center;">
                                                    <input type="submit" class="button" name="AddAddress" value="Update Address" />
                                                    </div>

                                        </div>
                                    </div>
                                    </form>
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
<script type="text/javascript">
                
               
                
    
    function update_Region(){
        Region =document.getElementById('Region');
        City = document.getElementById('City');
        selectedCity= City.options[City.selectedIndex].value;

        if(selectedCity == "Accra"){
            RegionalValue = "Greater Accra Region";
        }else if( selectedCity== "Tema"){
            RegionalValue = "Greater Accra Region";
        }else if(selectedCity == "Kumasi"){
            RegionalValue = "Ashanti Region";
        }else if(selectedCity == "Sunyani"){
            RegionalValue = "Brong-Ahafo Region";
        }else if(selectedCity == "Takoradi"){
            RegionalValue = "Western Region";
        }else if(selectedCity == "Cape Coast"){
            RegionalValue = "Central Region";
        }
    
       Region.value = RegionalValue;
    }
    
    
    
</script>