<?php 
	include('config/db.php');
    include("session.php");
    include("mailinglistadd.php");
    if (isset($_SESSION['Solushop_Customer_ID'])) {
        header("Location: index.php");
        exit();
    }
    
    if (isset($_POST["register"])) {
        //validation
        
        function sanitize($data)
        { 
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Fname = sanitize($_POST['FName']);
        $Lname = sanitize($_POST['LName']);
        $phonenumber = sanitize($_POST['Phone']);
        $Email          = sanitize($_POST['Email']);
        $Password       = sanitize($_POST['Password']);
        $ReEnterPasword = sanitize($_POST['ConfirmPassword']);

        try{
            $db = new db();
            $db = $db->connect();
            $customers_login_query = "SELECT Email FROM customers";
            $stmt = $db->prepare($customers_login_query);
            $stmt->execute();
            $customers_login = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if(sizeof($customers_login) > 0){
                for($i = 0; $i < sizeof($customers_login); $i++){
                    if($Email == $customers_login[$i]->Email){
                        $ErrorMessage = "Email already exists";
                    }
                }
            }

        //process phone number
        //processing phone number
        if (!$phonenumber == "") {
            $phonenumber = str_replace(" ", "", $phonenumber);
            $phonenumber = str_replace("-", "", $phonenumber);
            if ($phonenumber[0] == '+' or $phonenumber[0] == '0') {
                $phonenumber = substr($phonenumber, 1);
                if (strlen($phonenumber) == 9) {
                    $phonenumber = '233' . $phonenumber;
                } else {
                    $phonenumber = $phonenumber;
                }
            } elseif ($phonenumber[0] == 2 and $phonenumber[1] == 3 and $phonenumber[2] == 3 and strlen($phonenumber) == 12) {
                $phonenumber = $phonenumber;
            } elseif (strlen($phonenumber) < 12 OR strlen($phonenumber) > 15) {
                $ErrorMessage = "Invalid phone number format";
            }
        } else {
            $ErrorMessage = "Phone number required";
        }
        
        //validate email
        if (trim($Email) == "") {
            $ErrorMessage = "Email is required";
        }
        if (trim($Fname) == "") {
            $ErrorMessage = "First name is required";
        }
        if (trim($Lname) == "") {
            $ErrorMessage = "Last name is required";
        }

        if(is_numeric($Lname)) {
            $ErrorMessage = "Last name cannot be a number";
        }
        
        if(is_numeric($Fname)) {
            $ErrorMessage = "First name cannot be a number";
        }

        if (trim($Password) == "") {
            $ErrorMessage = "Password Required";
        } elseif ($Password != $ReEnterPasword) {
            $ErrorMessage = "Passwords don't match";
        }

        if (!isset($_POST["termsAndConditions"])) {
            $ErrorMessage = "You need to agree to the Terms and Conditions";
        }
        
        if (!isset($ErrorMessage)) {
            //hash password
            $passwordhash = password_hash($Password, PASSWORD_DEFAULT);
            
            //generate customer ID
            $ActivationCode = mt_rand(1000, 9999);
            //generating customer ID part 1
            $Customer_ID    = "C".date('d') . date('m') . date('Y');
            //generating customer ID part 2
            try{
                $db = new db();
                $db = $db->connect();
                $sql_count_query = "SELECT CusIDCount FROM count";
                $stmt = $db->prepare($sql_count_query);
                $stmt->execute();
                $sql_count = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                for($i = 0; $i < sizeof($sql_count); $i++){
                    $CusIDCount = $customers = (string) ($sql_count[$i]->CusIDCount + 1);
                }

            if ($customers < 10) {
                $Customer_ID = $Customer_ID . "000" . (string) $customers;
            } else if ($customers < 100) {
                $Customer_ID = $Customer_ID . "00" . (string) $customers;
            } else if ($customers < 1000) {
                $Customer_ID = $Customer_ID . "0" . (string) $customers;
            } else {
                $Customer_ID = $Customer_ID . (string) $customers;
            }
            

            $Zero = 0;
            $none = "none";
            try{
                $db = new db();
                $db = $db->connect();
                $insert_customer_details = "INSERT INTO customers VALUES (:Customer_ID , :Fname , :Lname , :Email, :zero1 , :phonenumber , :zero2 , :ActivationCode, :passwordhash , :none)";
                $stmt = $db->prepare($insert_customer_details);
                $stmt->bindParam(':Customer_ID', $Customer_ID);
                $stmt->bindParam(':Fname', $Fname);
                $stmt->bindParam(':Lname', $Lname);
                $stmt->bindParam(':Email', $Email);
                $stmt->bindParam(':zero1', $Zero);
                $stmt->bindParam(':phonenumber', $phonenumber);
                $stmt->bindParam(':zero2', $Zero);
                $stmt->bindParam(':ActivationCode', $ActivationCode);
                $stmt->bindParam(':passwordhash', $passwordhash);
                $stmt->bindParam(':none', $none);

                $stmt->execute();
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if($stmt->execute()){
                    try{
                        $db = new db();
                        $db = $db->connect();
                        $update_count_query = "UPDATE count SET CusIDCount = :customers";
                        $stmt = $db->prepare($update_count_query);
                        $stmt->bindParam(':customers', $customers);
                    
                        $stmt->execute();
                        $db = null;
                        }catch(PDOException $e){
                            echo '{"error": {"text": '.$e->getMessage().'}';
                        }
            
                //send email verification email
                $to = $Email;
                $subject = "Solushop GH - Welcome, $Fname!";

                $htmlContent = "
                  <div style='font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#eeeeee'>
                  <table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
                    <tbody>
                        <tr>
                          <td>
                                <table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
                                <tbody>
                                  <tr>
                                      <td>
                                      <table width='690' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
                                            <tbody>
                                              <tr>
                                                    <td colspan='3' height='80' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='padding:0;margin:0;font-size:0;line-height:0'>
                                                        <table width='690' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                              <td width='30'></td>
                                                                <td align='left' valign='middle' style='padding:0;margin:0;font-size:0;line-height:0'><a href='https://solushop.com.gh' target='_blank'><img src='https://solushop.com.gh/email/SolushopEmailLogo.png' width='200px' height='80px' alt='Solushop' ></a></td>
                                                                <td width='30'></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </td>
                                          </tr>
                                               
                                            <tr bgcolor='#ffffff'>
                                                <td width='30' bgcolor='#eeeeee'></td>
                                                <td>
                                                    <table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                    <tbody>
                                                      <tr>
                                                          <td colspan='4' align='center'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan='4' align='center'><h2 style='font-size:24px'>Hey $Fname!</h2></td>
                                                        </tr>
                                                      
                                                          <td colspan='5' height='40' style='padding:0;margin:0;font-size:0;line-height:0'></td>
                                                        <tr>
                                                          <td width='120' align='right' valign='top'><img src='http://twa.photos/images/tick.png' alt='creditibility' width='120' height='120' class='CToWUd'></td>
                                                            <td width='30'></td>
                                                            <td align='left' valign='middle'>
                                                              <h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>Welcome to the family.</h3>
                                                                <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                                <div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>I'm more than happy to welcome you to the Solushop family. I hope you enjoy your experience shopping with us.<br><br>Remember, if there's anything you need help with, be it deciding which products to buy, or troubles with your order, please feel free to contact customer care via call or whatsapp on 0559538887.<br><br> </div>
                                                              <div style='line-height:10px;padding:0;margin:0'>&nbsp;</div>
                                                            </td>
                                                            <td width='30'></td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan='4'>&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                    <table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                    <tbody>
                                                      
                                                        <tr>
                                                          <td align='center'>
                                                                <div style='text-align:center;width:100%;padding:40px 0'>
                                                                    <table align='center' cellpadding='0' cellspacing='0' style='margin:0 auto;padding:0'>
                                                                    <tbody>
                                                                      <tr>
                                                                          <td align='center' style='margin:0;text-align:center'><a href='https://solushop.com.gh/shop' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#0787ea;;font-weight:bold;border-radius:2px;background-color:white;padding:14px 40px;display:block' target='_blank'>Happy Shopping!</a></td>
                                                                      </tr>
                                                                    </tbody>
                                                                  </table>
                                                                </div>
                                                          </td>
                                                      </tr>
                                                      <tr><td>&nbsp;</td>
                                                      </tr></tbody></table></td>
                                                <td width='30' bgcolor='#eeeeee'></td>

                                            </tr>
                                            </tbody>

                                                      <br><br><br><br>
                                            </table>

                                        <table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
                                            <tbody>
                                              <tr>
                                                  <td>
                                                        <table width='630' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
                                                        <tbody>
                                                          <tr><td colspan='2' height='30'></td></tr>
                                                            <tr>
                                                              <td width='360' valign='top'>
                                                                  <div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'>&copy; 2017 Solushop Ghana. All rights reserved.</div>
                                                                  <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                            </td>
                                                                <td align='right' valign='top'>
                                                                  <span style='line-height:20px;font-size:10px'><a href='facebook.com/SolushopGhana' target='_blank'><img src='http://i.imgbox.com/BggPYqAh.png' alt='fb'></a>&nbsp;</span>
                                                                    <span style='line-height:20px;font-size:10px'><a href='twitter.com.gh/SolushopGhana' target='_blank'><img src='http://i.imgbox.com/j3NsGLak.png' alt='twit'></a>&nbsp;</span>
                                                                </td>
                                                            </tr>
                                                            <tr><td colspan='2' height='5'></td></tr>
                                                           
                                                        </tbody>
                                                        </table>
                                                    </td>
                                          </tr>
                                            </tbody>
                                            </table>
                                      </td>
                                  </tr>
                                </tbody>
                                </table>
                            </td>
                    </tr>
                  </tbody>
                    </table>
                </div>
                ";


                // Set content-type for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // Additional headers
                $headers .= 'From: Solushop Ghana <support@solushop.com.gh>' . "\r\n";
                // Send email
                if(mail($to,$subject,$htmlContent,$headers)):
                    $successMsg = 'Email has sent successfully.';
                else:
                    $errorMsg = 'Some problem occurred, please try again.';
                endif;

                //send phone number verification code
                $message = "Hi $Fname, wishing you a warm welcome to the Solushop family. If you need any assistance, kindly call or whatsapp customer care on 0559538887. Happy Shopping!";
                 $URL = "http://api.mytxtbox.com/v3/messages/send?" . "From=Solushop-GH" . "&To=%2B" . urlencode("$phonenumber") . "&Content=" . urlencode($message) . "&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
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


                    try{
                        $db = new db();
                        $db = $db-connect();
                        $customer_count_query = "SELECT COUNT(*) as count FROM customers";
                        $stmt = $db->prepare($customer_count_query);
                        $stmt->execute();
                        $customer_count = $stmt->fetchAll(PDO::FETCH_OBJ);
                        $db = null;
                        }catch(PDOException $e){
                            echo '{"error": {"text": '.$e->getMessage().'}';
                        }
                        if(sizeof($customer_count) > 0){
                            for($i = 0; $i < sizeof($customer_count); $i++){
                                $CustomerCount = $customer_count[$i]->count;
                            }
                        }

                $Smessage = "Customer Sign-Up - $Fname $Lname. \nTotal signups now is $CustomerCount";
                 $URL = "http://api.mytxtbox.com/v3/messages/send?" . "From=Solushop-GH" . "&To=%2B233559538887&Content=" . urlencode($Smessage) . "&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
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

                //Initiaizing session variables.

                @session_start();
                $_SESSION['Solushop_Email'] = $Email;
                $_SESSION['Solushop_FullName'] = $Fname . " " . $Lname;
                $_SESSION['Solushop_Customer_ID'] = $Customer_ID;
				$_SESSION['Solushop_FName'] = $Fname;
				
				try{
					$db = new db();
					$db = $db->connect();
					$sql_product_query = "SELECT ID from products";
					$stmt = $db->prepare($sql_product_query);
					$stmt->execute();
					$sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
					$db = null; 
				}catch(PDOException $e){
					echo '{"error": {"text": '.$e->getMessage().'}';
				}
				$_SESSION["ProductIDs"]=null;
				for ($i=0; $i < sizeof($sql_product); $i++) { 
					$_SESSION["ProductIDs"][$i] = $sql_product[$i]->ID;
					shuffle($_SESSION["ProductIDs"]);
				}
                // Redirecting To Other Page
                header("Location: index.php"); 
                exit();
                
            }
        } 

        

    }elseif (isset($_POST['login'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $ErrorMessage = "Email or Password is invalid ";
        } else {
            // Define $EmpID and $password
            $Email     = $_POST['email'];
            $UserPassword = $_POST['password'];
            
            try{
                $db = new db();
                $db = $db->connect();
                $sql_customers_query = "SELECT * from customers where Email = :Email";
                $stmt = $db->prepare($sql_customers_query);
                $stmt->bindParam(':Email', $Email);
                $stmt->execute();
                $sql_customers = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_customers) > 0){
                    for($i = 0; $i < sizeof($sql_customers); $i++){
                        if($Email == $sql_customers[$i]->Email && password_verify($UserPassword, $sql_customers[$i]->Password)){
                            //Initia;izing session variables.
                            @session_start();
                            $_SESSION['Solushop_Email'] = $sql_customers[$i]->Email;
                            $_SESSION['Solushop_FullName'] = $sql_customers[$i]->FName . " " . $sql_customers[$i]->LName;
                            $_SESSION['Solushop_Customer_ID'] = $sql_customers[$i]->Customer_ID;
							$_SESSION['Solushop_FName'] = $sql_customers[$i]->FName;
							
							try{
								$db = new db();
								$db = $db->connect();
								$sql_product_query = "SELECT ID from products";
								$stmt = $db->prepare($sql_product_query);
								$stmt->execute();
								$sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
								$db = null; 
							}catch(PDOException $e){
								echo '{"error": {"text": '.$e->getMessage().'}';
							}
							$_SESSION["ProductIDs"]=null;
							for ($i=0; $i < sizeof($sql_product); $i++) { 
								$_SESSION["ProductIDs"][$i] = $sql_product[$i]->ID;
								shuffle($_SESSION["ProductIDs"]);
							}
							// Redirecting To Other Page
							header("location: index.php"); 
							exit();
               
                    } else {
                        $ErrorMessage = "Email or Password is invalid";
                    }
                }
            }else{
                $ErrorMessage = "Email or Password is invalid";
            }
        }
        
    }
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Login Or Register to Solushop Ghana</title>
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
		<style>
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
			line-height: 2.8;
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
		</style>
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
											<li><a href="index.php">Home</a></li>
											<li><a href="shop.php">Shop</a></li>
											<li><a href="about.php">About Us</a></li>
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
										<li>Login or Register</li>
									</ul>
								</div>
								<div class="heading-banner-title">
									<h1  style="text-align:center;">Login or Register</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--Heading Banner Area End-->
			<!--My Account Area Start-->
			<section class="my-account-area mt-20">
				<div class="container">
					<div class="row">
					<!--Register Form Start-->
					<div class="col-md-6 col-sm-6">
							<div class="customer-login-register register-pt-0">
								<div class="form-register-title">
									<h2 style="text-align:center;">Join our community of happy Shoppers</h2>
								</div>
								<div class="register-form">
									<form action="#" method="POST">
										<div class="form-fild">
											<p><label>Full Name<span class="required">*</span></label></p>
											<input type="text" name="name" value="" placeholder="e.g. Michael Selby">
										</div>
										<div class="form-fild">
											<p><label>Email<span class="required">*</span></label></p>
											<input type="text" name="email" value="" placeholder="e.g. michael.selby@solushop.com.gh">
										</div>
										<div class="form-fild">
											<p><label>Phone<span class="required">*</span></label></p>
											<input type="text" name="phone" value="" placeholder="e.g 0244000000">
										</div>
										<div class="form-fild">
											<p><label>Password <span class="required">*</span></label></p>
											<input type="password" name="password" value="" >
										</div>
										<div class="form-fild">
											<p><label>Confirm Password <span class="required">*</span></label></p>
											<input type="password" name="confirmpassword" value="" >
										</div>
										<div class="register-submit" style="text-align:center;">
											<button type="submit" name="register" class="form-button">Register</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--Register Form End-->
						<!--Login Form Start-->
						<div class="col-md-6 col-sm-6">
							<div class="customer-login-register">
								<div class="form-login-title">
									<h2 style="text-align:center;">Already have an account?</h2>
								</div>
								<div class="login-form">
									<form action="#" method="POST">
										<div class="form-fild">
											<p><label>Username or email address <span class="required">*</span></label></p>
											<input type="text" name="email" value="" >
										</div>
										<div class="form-fild">
											<p><label>Password <span class="required">*</span></label></p>
											<input type="password" name="password" value="" >
											<br><br>
										</div>
										<div class="login-submit" style="text-align:center;">
											<button type="submit" name="login" class="form-button">Login</button>
										</div>
										<div class="lost-password" style="text-align:center;">
											<a href="lost-password.php">Lost your password?</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--Login Form End-->
						
					</div> 
				</div>
			</section>
			<!--My Account Area End-->
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
		<?php 
			if (isset($SuccessMessage)) {
				echo "<div id=\"note\">
						$SuccessMessage
					</div>"; 
			}elseif (isset($ErrorMessage)) {
				echo "<div style='background-color:red' id=\"note\">
						$ErrorMessage
					</div>"; 
			}
		?>
	</body>

</html>
