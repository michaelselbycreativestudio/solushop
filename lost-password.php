<?php 
	include('config/db.php');
    include("session.php");
    include("mailinglistadd.php");
    if (isset($_SESSION['Solushop_Customer_ID'])) {
        header("Location: index.php");
        exit();
    }
  
    if (isset($_POST["recover"])) {
        //validation
        $Legit = "No";
        function sanitize($data)
        { 
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $phonenumber = sanitize($_POST['phone']);
        $Email = sanitize($_POST['email']);
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
                $RegisterError = "Invalid phone number format";
            }
        } else {
            $RegisterError = "Phone number required";
        }


        try{
            $db = new db();
            $db = $db->connect();
            $select_customers_query = "SELECT * FROM customers WHERE Email=:Email and Phone=:Phone";
            $stmt = $db->prepare($select_customers_query);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Phone', $phonenumber);
            $stmt->execute();
            $select_customers = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
        }

        if(sizeof($select_customers) > 0){
            function random_password( $length = 6 ) {
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $password = substr( str_shuffle( $chars ), 0, $length );
                return $password;
            }

            //generate random password
            $TempPass = random_password(6);

            //hash it
            $TempPassHashed = password_hash($TempPass, PASSWORD_DEFAULT);

            //reset password here
            try{
                $db = new db();
                $db = $db->connect();
                $update_customer_details_query = "UPDATE customers SET Password= :TempPassHashed WHERE Phone= :phonenumber and Email= :Email";
                $stmt = $db->prepare($update_customer_details_query);
                $stmt->bindParam(':TempPassHashed', $TempPassHashed);
                $stmt->bindParam(':phonenumber', $phonenumber);
                $stmt->bindParam(':Email', $Email);
                $stmt->execute();
                $db = null;
            
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if($stmt->execute()){

                //send email verification email
                $to = $Email;
                $subject = "Solushop GH - Password Reset!";

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
                                                            <td colspan='4' align='center'><h2 style='font-size:24px'>Password Reset</h2></td>
                                                        </tr>
                                                        
                                                            <td colspan='5' height='40' style='padding:0;margin:0;font-size:0;line-height:0'></td>
                                                        <tr>
                                                            <td width='120' align='right' valign='top'><img src='http://twa.photos/images/tick.png' alt='creditibility' width='120' height='120' class='CToWUd'></td>
                                                            <td width='30'></td>
                                                            <td align='left' valign='middle'>
                                                                <h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>Password Reset Successful</h3>
                                                                <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                                <div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>Your password has been reset. Your temporary password is {$TempPass}. Please use it with your registered email to login. change your password immediately you login.<br><br>Remember, if there's anything you need help with, be it deciding which products to buy, or troubles with your order, please feel free to contact customer care via call or whatsapp on 0559538887.<br><br> </div>
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
                $message = "Hi, Your password has been reset. Your temporary password is { $TempPass }. Remember to change it immediately you login. Happy Shopping!";
                    $URL = "http://api.mytxtbox.com/v3/messages/send?" . "From=Solushop-GH" . "&To=%2B" . urlencode($phonenumber) . "&Content=" . urlencode($message) . "&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
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

                $SuccessMessage = "Password reset successfully.";
            }
        }else{
            $ErrorMessage = "Invalid email and phone number combination";
        }      
    }  
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Recover your password</title>
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
										<li>Recover Password</li>
									</ul>
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
						<!--Register Form End-->
                        <h2 style="text-align:center;">Lost your password?</h2>
						<!--Login Form Start-->
						<div class="col-md-6 col-sm-6">
							<div class="customer-login-register" >
								<div class="login-form">
									<form action="#" method="POST">
										<div class="form-fild">
											<p><label>Email address <span class="required">*</span></label></p>
											<input type="text" name="email" value="" required>
										</div>
                                        <div class="form-fild">
											<p><label>Phone Number <span class="required">*</span></label></p>
											<input type="text" name="phone" value="" required>
										</div>
										<div class="login-submit" >
											<button type="submit" name="recover" class="form-button">Recover Password</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--Login Form End-->

                        <!--Login Form Start-->
						<div class="col-md-6 col-sm-6">
							<p style="padding-top:50px;"> 
                                If you have lost or forgotten your password,<br>
                                let's help you recover it.<br><br>
                                Enter your email and phone number.<br>
                                If they are associated to with an account, an sms will be sent you<br>
                                with instructions on what to do.
                            </p>
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
