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
    
    if (isset($_POST["UpdateDefaultAddress"])) {

    	$sql = "SELECT * FROM customers WHERE Customer_ID='$Customer_ID'";
    	$result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            	$CurrentDefaultAddress = $row["Default_Address"];
            }
        }
        $NewDefaultAddress = $_POST["DefaultAddress"];

        if($NewDefaultAddress == $CurrentDefaultAddress){
        	$ErrorMessage = "Same address selected. Please select another one of your addresses to update.";
        }

        if (!isset($ErrorMessage)) {
        	$sql = "UPDATE customers SET Default_Address='$NewDefaultAddress' where Customer_ID='$Customer_ID'";
        	 if ($conn->query($sql)) {
        	 	$SuccessMessage = "Default address updated successfully, $Customer_FName";
        	 }
        }
    	
    }

    if (isset($_POST["DeleteAddress"])) {
    	$DeleteAddressID = $_POST["DeleteAddressID"];
        if (!isset($ErrorMessage)) {
        	$sql = "UPDATE customer_address SET Customer_ID='-' where Customer_ID='$Customer_ID' and ID = '$DeleteAddressID'";
        	 if ($conn->query($sql)) {
        	 	$SuccessMessage = "Address deleted successfully, $Customer_FName";
        	 }
        }
    	
    }

	if (isset($_POST["EditAddress"])) {
			$Verify = rand(99999,999999);
	    	$EditAddressID = $_POST["EditAddressID"];
	    	header("Location: edit-address.php?AD-ID=$EditAddressID&Verify=$Verify");
	    	exit();
	    }

    $sql = "SELECT * FROM customers WHERE Customer_ID='$Customer_ID'";
    	$result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            	$Customer_Default_Address = $row["Default_Address"];
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
                                    <form action="addresses.php" method="POST">
                                    <div style="width:75%; float:right" class="id-main">
                                    <h3>Address Book</h3>
                                    <?php 
                                    	$AddressCount=0;
                                      //select user details
                                      $sql = "SELECT * FROM customer_address  where Customer_ID = '$Customer_ID'";
                                      $result = $conn->query($sql);
                                      if ($result->num_rows > 0) {
                                        echo "<div class=\"rowtable header\">
                                                <div class=\"cell\" style=\"width: 100px; text-align:center;\">
                                                    Address ID
                                                </div>
                                                <div class=\"cell\" style=\"width: 200px; text-align:center;\">
                                                    Region
                                                </div>
                                                <div class=\"cell\" style=\"width: 150px; text-align:center;\">
                                                    Town / City
                                                </div>
                                                <div class=\"cell\" style=\"width: 250px; text-align:center;\">
                                                    Address
                                                </div>
                                                <div class=\"cell\" style=\"width: 250px; text-align:center;\">
                                                    Default
                                                </div>
                                                <div class=\"cell\" style=\"width: 250px; text-align:center;\">
                                                    Action
                                                </div>
                                            </div>";
                                        while ($row = $result->fetch_assoc()) {
                                        	$AddressCount++;
                                            echo 
                                                   "
                                                        <div class=\"rowtable\">
                                                            <div class=\"cell\" style=\"width: 90px; text-align:center;\">AD-".$row["ID"]."
                                                            </div>
                                                            <div class=\"cell\" style=\"width: 150px; text-align:center;\">".$row["Region"]."
                                                            </div>
                                                            <div class=\"cell\" style=\"width: 90px; text-align:center;\">".$row["Town"]."
                                                            </div>
                                                            <div class=\"cell\" style=\"width:160px; text-align:center;\">".$row["Address"]."
                                                            </div>";
                                                            //checking if address is the default
                                                            if ($row['ID']==$Customer_Default_Address) {
                                                            	echo "<div class=\"cell\" style=\"width: 200px; text-align:center;\"><input type='radio' value='".$row["ID"]."' name='DefaultAddress' checked/>
                                                            	</div>";
                                                            }else{
                                                            	echo "<div class=\"cell\" style=\"width: 200px; text-align:center;\"><input type='radio' value='".$row["ID"]."' name='DefaultAddress'/>
                                                            	</div>";
                                                            }
                                                            echo "<div class=\"cell\" style=\"width: 150px; text-align:center;\">";
                                                            if ($row['ID']==$Customer_Default_Address) {
                                                            	 echo "

                                                                 <input type='submit' name='EditAddress' value='Edit' style='background-color: #f68b1e; color:white; padding:0px; width:60px; height:32px;'/>
                                                                 <input type='hidden' name='EditAddressID' value='".$row["ID"]."'>";
                                                            }else{
                                                            	echo "<input type='submit' name='EditAddress' value='Edit' style='background-color: #f68b1e; color:white; padding:0px; width:60px; height:32px;'/>
                                                                 <input type='hidden' name='EditAddressID' value='".$row["ID"]."'>

                                                            	<input type='submit' name='DeleteAddress' value='Delete' style='background-color: red; color:white; padding:0px; width:60px; height:32px;'/>
                                                            	<input type='hidden' name='DeleteAddressID' value='".$row["ID"]."'>

                                                                 ";
                                                            }
                                                            echo "</div>";

                                                            
                                                        echo "</div>
                                                      "
                                                    ;
                                        }
                                      }else{
                                        echo "<p style='text-align:center;'>Sorry mate! You have no addresses yet. Add one by hitting the button below</p>";
                                      }

                                      echo "<br><br>";

                                      if ($AddressCount==0) {
                                      	echo "
	                                      	<div style=\"text-align: center;\">
	                                        <p class=\"form-row\"><a href='add-address.php'> <button type=\"button\" href='add-address.php' class=\"button\" name=\"AddAddress\" value=\"Add Address\">Add Address</button></a></p>

	                                        </div>";
                                      }elseif($AddressCount > 0){
                                      	echo "
	                                      	<div style=\"text-align: center;\">
	                                        <p class=\"form-row\">
	                                        <input type=\"submit\" class=\"button\" name=\"UpdateDefaultAddress\" value=\"Update Default Address\" />
	                                        <a href='add-address.php'> <button type=\"button\" href='add-address.php' class=\"button\" name=\"AddAddress\" value=\"Add Address\">Add Address</button></a></p>

	                                        </div>";
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
