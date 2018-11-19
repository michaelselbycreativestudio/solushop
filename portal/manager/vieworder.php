<?php include("session.php"); ?>
<?php 
  include("../../config/db.php");
  if (isset($_GET["id"])) {
    $OID = $_GET["id"];
  }

  try{
    $db = new db();
    $db = $db->connect();
  
    $select_items = "SELECT *, orders.Order_ID as OID FROM orders, order_state, order_items where orders.Order_ID=order_items.Order_ID and order_state.ID = orders.Order_State and orders.Order_ID=:OID";
    $stmt = $db->prepare($select_items);
    $stmt->bindParam(':OID',$OID);
    $stmt->execute();
    $item_result = $stmt->fetchAll(PDO::FETCH_OBJ);
  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';}
  
  if (sizeof($item_result) > 0) {
    for($i=0; $i<sizeof($item_result);$i++){
            $Order_ID = $item_result[$i]->OID;
            $Order_Date = $item_result[$i]->Order_Date;
            $Order_State = $item_result[$i]->UserDescription;
            $Order_State_ID = $item_result[$i]->Order_State;
        }
    }else{
      header("Location: orders.php");
      exit;
    }
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Solushop - Manage Order</title>
  <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/datatables.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-content-menu.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/timeline.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard-ecommerce.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
  <!-- END Custom CSS-->
  <style>
     .img{
        position: relative;
        float: left;
        width:  50px;
        height: 50px;
        background-position: 50% 50%;
        background-repeat:   no-repeat;
        background-size:     cover;
      }  

     #note {
        position: absolute;
        z-index: 10000000;
        top: 0;
        left: 0;
        right: 0;
        font-size: 16px;
        color: white;
        background: green;
        text-align: center;
        line-height: 4.2;
        overflow: hidden; 
        -webkit-box-shadow: 0 0 5px black;
        -moz-box-shadow:    0 0 5px black;
        box-shadow:         0 0 5px black;
    }

    @-webkit-keyframes slideDown {
        0%, 100% { -webkit-transform: translateY(-70px); }
        10%, 90% { -webkit-transform: translateY(0px); }
    }

    @-moz-keyframes slideDown {
        0%, 100% { -moz-transform: translateY(-70px); }
        10%, 90% { -moz-transform: translateY(0px); }
    }

    .cssanimations.csstransforms #note {
        -webkit-transform: translateY(-70px);
        -webkit-animation: slideDown 5s 1.0s 1 ease forwards;
        -moz-transform:    translateY(-70px);
        -moz-animation:    slideDown 5s 1.0s 1 ease forwards;
    }

    .cssanimations.csstransforms #close {
        display: none;
    }
  </style>
  <script src="../app-assets/js/modernizr.custom.80028.js"></script>

</head>
<body class="horizontal-layout vertical-content-menu vertical-content-menu-padding 2-columns   menu-expanded"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
  <!-- fixed-top-->
  <?php include("header-top.php"); ?>
  <?php
  
  $db = new db();
  $db = $db->connect();
  if (isset($_POST['ConfirmOrderButton'])) {
    //first check if the state before was 3 if it is then update
    try{
        $select_orders = "SELECT * from orders WHERE Order_ID='$OID'";
        $stmt = $db->prepare($select_orders);
        $stmt-bindParam(':OID',$OID);
        $stmt->execute();
        $order_result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
  
        if (sizeof($order_result) > 0) {
            for($i=0; $i<sizeof($order_result);$i++){
            if($order_result[$i]->Order_State ==1){
                //update new record
            try{
                $UpdateQuery = "UPDATE orders SET Order_State='2' where Order_ID=:OID";
                $stmt = $db->prepare($UpdateQuery);
                $stmt-bindParam(':OID',$OID);
                $stmt->execute();
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
                if ($stmt->execute()) {
                    //update order items state
                    try{
                    $UpdateQuery2 = "UPDATE order_items SET State='1' where Order_ID=:OID";
                    $stmt = $db->prepare($UpdateQuery2);
                    $stmt-bindParam(':OID',$OID);
                    $stmt->execute();
                    $SuccessMessage = "Order <b>$OID</b>'s' state has been changed to <b>Confirmed, being processed</b>";
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
  
                    try{
                        $select_orders_cus = "SELECT * from orders, customers where orders.Customer_ID = customers.Customer_ID and Order_ID='$OID'";
                        $stmt = $db->prepare($select_orders_cus);
                        $stmt-bindParam(':OID',$OID);
                        $stmt->execute();
                        $order_cus_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';}
                    if (sizeof($order_cus_result) > 0) {
                        for($i=0; $i<sizeof($order_cus_result);$i++){
                            $OrderID = $order_cus_result[$i]->Order_ID;
                            $Customer_Name = $order_cus_result[$i]->FName." ".$order_cus_result[$i]->LName;
                            $TotalAmount = $order_cus_result[$i]->TotalAmount;
                            $Fname = $order_cus_result[$i]->FName;
                            $Lname = $order_cus_result[$i]->LName;
                            $Phone = $order_cus_result[$i]->Phone;
                            $Email = $order_cus_result[$i]->Email;
  
                         }
                     }
  
  
  
                    //send phone number verification code
                    $message = "Hi $Fname, your order $OrderID has been confirmed and is being processed. Thanks for choosing Solushop!";
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
  
  
                    //send email verification email
                    $to = $Email;
                    $subject = "Solushop GH - Order Confirmed!";
  
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
                                                              <td width='120' align='right' valign='top'><img src='https://solushop.com.gh/email/OrderConfirmed.png' alt='Order Confirmed' width='120' height='120' class='CToWUd'></td>
                                                                <td width='30'></td>
                                                                <td align='left' valign='middle'>
                                                                  <h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>Order Confirmed!</h3>
                                                                    <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                                    <div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>Your order $OrderID has been confirmed. We will begin processing the order immediately.<br><br>Remember, if there's anything you need help with, be it deciding which products to buy, or troubles with your order, please feel free to contact customer care via call or whatsapp on 0559538887.<br><br> </div>
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
                                                                              <td align='center' style='margin:0;text-align:center'><a href='https://solushop.com.gh/shop' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#f68b1e;;font-weight:bold;border-radius:2px;background-color:white;padding:14px 40px;display:block' target='_blank'>Happy Shopping!</a></td>
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
  
                }else{
                    $ErrorMessage = "Something went wrong. Please try again.";
                }
            }else{
                $ErrorMessage = "Something went wrong. Please try again.";
            }
            
        }
    }
  }elseif (isset($_POST['ConfirmReadyForDeliveryButton'])) {
    $SuccessMessage = "Confirm Ready For Delivery Button was hit";
  }elseif (isset($_POST['ConfirmDeliveryInitiationButton'])) {
    //change state to delivering
    //first check if the state before was 3 if it is then update
    try{
        $select_more_orders = "SELECT * from orders WHERE Order_ID='$OID'";
        $stmt = $db->prepare($select_more_orders);
        $stmt->bindParam(':OID', $OID);
        $stmt->execute();
        $more_orders_result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
  
  try{  
     if (sizeof($more_orders_result) > 0) {
         for($i=0; $i<sizeof($more_orders_result);$i++){
            if($more_orders_result[$i]->Order_State ==3){
                //update new record
                
                    $UpdateQuery = "UPDATE orders SET Order_State='4' where Order_ID=:OID";
                    $stmt = $db->prepare($UpdateQuery);
                    $stmt->bindParam(':OID', $OID);
                    if ($stmt->execute()) {
                    $SuccessMessage = "Order <b>$OID</b>'s' state has been changed to <b>Delivering</b>";  
                }else{
                    $ErrorMessage = "Something went wrong. Please try again.";
                }
            }else{
                $ErrorMessage = "Something went wrong. Please try again.";
            }
        }
    }
  }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';}
  }elseif (isset($_POST['CancelOrderButton'])) {
    //first check if the state before was 3 if it is then update
    try{
        $orders = "SELECT * from orders WHERE Order_ID=:OID";  
        $stmt = $db->prepare($orders);
        $stmt->bindParam(':OID', $OID);
        $stmt->execute();
        $order_result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
    
    
    if (sizeof($order_result) > 0) {
        for($i=0; $i<sizeof($order_result);$i++){
            if($order_result[$i]->Order_State ==1){
                //update new record
                try{
                    $UpdateQuery = "UPDATE orders SET Order_State='6' where Order_ID=:OID";
                    $stmt = $db->prepare($UpdateQuery);
                    $stmt->bindParam(':OID', $OID);
                   // $stmt->execute();
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';}
                
                if ($stmt->execute()) {
                    //update order items state
                    try{
                        $UpdateQuery2 = "UPDATE order_items SET State='4' where Order_ID=:OID";
                        $stmt = $db->prepare($orders);
                        $stmt->bindParam(':OID', $OID);
                        $stmt->execute();
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';}
                    
                    $SuccessMessage = "Order <b>$OID</b>'s' state has been changed to <b>Cancelled</b>";
                }else{
                    $ErrorMessage = "Something went wrong. Please try again.";
                }
            }else{
                $ErrorMessage = "Something went wrong. Please try again.";
            }
        }
    }
  }
  $db = null;

  ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="main-menu menu-static menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item "><a href="index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="customers.php"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">Customers</span></a>
            </li>
            <li class=" nav-item active"><a href=""><i class="la la-shopping-cart"></i><span class="menu-title" data-i18n="nav.dash.main">Orders</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="orders.php">Manage</a>
                </li>
                <li><a class="menu-item" href="addorder.php" >Add</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="la la-archive"></i><span class="menu-title" data-i18n="nav.dash.main">Products</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="products.php" >Manage</a>
                </li>
                <li><a class="menu-item" href="addproduct.php" >Add</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="la la-link"></i><span class="menu-title" data-i18n="nav.dash.main">Vendors</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="vendors.php" >Manage</a>
                </li>
                <li><a class="menu-item" href="addvendor.php" >Add</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="la la-truck"></i><span class="menu-title" data-i18n="nav.dash.main">Logistics</span></a>
              <ul class="menu-content">
                <li><a class="menu-item" href="pickups.php" >Pick-ups</a>
                </li>
                <li><a class="menu-item" href="deliveries.php" >Deliveries</a>
                </li>
              </ul>
            </li>
            <li class=" nav-item"><a href="accounts.php"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">Accounts</span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-title" id="basic-layout-round-controls">View / Manage order <b>#<?php echo $Order_ID; ?></b></h3>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-8">
            
            <div class="card" style="">
              <div class="card-content collapse show">
                  <div class="card-header">
                    <h4 class="card-title" style="text-align:center">Process Order</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  </div>
                <div class="card-body" style="padding-top:0px;">
                  <form method="POST" action="#">              
                    <div class="row">
                    
                      <div class="col-md-3" style="text-align:center;">
                        <?php 
                          if ($Order_State_ID=='1') {
                            echo "<button type=\"submit\" name=\"ConfirmOrderButton\" class=\"btn btn-warning box-shadow-2 round btn-min-width center\">Confirm Order</button>";
                          }else{
                            echo "<button type=\"submit\" name=\"ConfirmOrderButton\" class=\"btn btn-warning box-shadow-2 round btn-min-width center\" disabled>Confirm Order</button>";
                          }
                        ?>
                      </div>
                      <div class="col-md-3" style="text-align:center;">
                        <?php 
                            if ($Order_State_ID=='2') {
                              echo "<button type=\"submit\" name=\"ConfirmReadyForDeliveryButton\" class=\"btn  btn-info box-shadow-2 round btn-min-width center\">Confirm Ready For Delivery</button>";
                            }else{
                              echo "<button type=\"submit\" name=\"ConfirmReadyForDeliveryButton\" class=\"btn  btn-info box-shadow-2 round btn-min-width center\" disabled>Confirm Ready For Delivery</button>";
                            }  
                        ?>
                      </div>
                      <div class="col-md-3" style="text-align:center;">
                        <?php 
                          if ($Order_State_ID=='3') {
                            echo "<button type=\"submit\" name=\"ConfirmDeliveryInitiationButton\" class=\"btn btn-success box-shadow-2 round btn-min-width center\">Complete Order</button>";
                          }else{
                            echo "<button type=\"submit\" name=\"ConfirmDeliveryInitiationButton\" class=\"btn btn-success box-shadow-2 round btn-min-width center\" disabled>Complete Order</button>";
                          }
                        ?>
                      </div>
                      <div class="col-md-3" style="text-align:center;">
                        <?php 
                          if ($Order_State_ID=='1') {
                            echo "<button type=\"submit\" name=\"CancelOrderButton\" class=\"btn btn-danger box-shadow-2 round btn-min-width center\">Cancel Order</button>";
                          }else{
                            echo "<button type=\"submit\" name=\"CancelOrderButton\" class=\"btn btn-danger box-shadow-2 round btn-min-width center\" disabled>Cancel Order</button>";
                          }
                        ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="text-align:center">Order Items</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        
                    </div>
                    <div class="card-content collapse show">
                        <?php 
                          try{
                            $db = new db(); //inititate db object
                            $db = $db->connect();
                            $select_items_quantity = "SELECT *, order_items.Quantity as OrderQuantity FROM order_items, order_items_state, products where products.ID=order_items.Product_ID and order_items_state.ID = order_items.State and order_items.Order_ID=:OID";
                            $stmt = $db->prepare($select_items_quantity);
                            $stmt->bindParam(':OID', $OID);
                            $stmt->execute();
                            $db = null;
                            $item_quan_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                          }  catch(PDOException $e){
                              echo '{"error": {"text": '.$e->getMessage().'}';
                          }     


                        ?>
                        <div class="card-body" style="padding-top:0px;">
                            <?php 
                                if (sizeof($item_quan_result) > 0) {    
                                    echo "<div class=\"table-responsive\">
                                    <table class=\"table table-hover mb-0\">
                                        <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Preview</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>";

                                    for($i=0; $i<sizeof($item_quan_result);$i++){ 
                                        $imageURL ="../../assets/images/products/thumbnails/".$item_quan_result[$i]->ID."a.png";
                                        echo "<tr>
                                                    <td>".$item_quan_result[$i]->ID."</td>
                                                    <td>".$item_quan_result[$i]->DisplayLine."</td>
                                                    <td><div class='img' style=\"background-image:url($imageURL); margin-right: 20px;\"></div></td>
                                                    <td> x ".$item_quan_result[$i]->OrderQuantity."</td>
                                                    <td>".$item_quan_result[$i]->Description."</td>
                                                    <td><a target=\"new\" href='viewproduct.php?id=".$item_quan_result[$i]->ID."'><button style='background-color:black; border-color:black;' class='btn btn-warning round'>View Product</button></a>
                                                    
                                                    </td>
                                                </tr>";
                                    
                                    }

                                    echo " </tbody>
                                        </table>
                                    </div>";
                                }else{
                                    echo "<br><h3 style='text-align:center;'>No items found</h3><br><br><br>";
                                }
                            ?>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="text-align:center">General Order Details</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        
                    </div>
                    <div class="card-content collapse show">
                        <?php 
                            try{
                              $db = new db(); //inititate db object
                              $db = $db->connect();
                              $select_order_ID = "SELECT *, orders.Order_ID as OID FROM customers, orders, order_state, order_items where orders.Order_ID=order_items.Order_ID and customers.Customer_ID = orders.Customer_ID and order_state.ID = orders.Order_State and orders.Order_ID=:OID";
                              $stmt = $db->prepare($select_order_ID);
                              $stmt->bindParam(':OID', $OID);
                              $stmt->execute();
                              $order_id_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                            }catch(PDOException $e){
                              echo '{"error": {"text": '.$e->getMessage().'}';
                            }
                              
                              
                            if (sizeof($order_id_result) > 0) {
                              for($i=0; $i<sizeof($order_id_result);$i++){
                                    $Customer_Name = $order_id_result[$i]->FName." ".$order_id_result[$i]->LName;;
                                    $Customer_Phone = $order_id_result[$i]->Phone;
                                    $Order_ID = $order_id_result[$i]->OID;
                                    $Order_Date = $order_id_result[$i]->Order_Date;
                                    $Order_State = $order_id_result[$i]->UserDescription;
                                }
                            }
                        ?>
                        <div class="card-body" style="padding-top:0px;">
                            <?php   
                                    echo "<div class=\"table-responsive\">
                                    <table class=\"table table-hover mb-0\">
                                        <tbody>
                                          <tr>
                                            <th>Order ID</th>
                                            <td>$Order_ID</td>
                                          </tr>
                                          <tr>
                                            <th>Customer</th>
                                            <td>$Customer_Name</td>
                                          </tr>
                                          <tr>
                                            <th>Phone</th>
                                            <td>$Customer_Phone</td>
                                          </tr>
                                          <tr>
                                            <th>Order Date</th>
                                            <td>$Order_Date</td>
                                          </tr>
                                          <tr>
                                            <th>Order State</th>
                                            <td>$Order_State</td>
                                          </tr>
                                        </tbody>
                                        </table>
                                    </div>";
                            ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--/ Zero configuration table -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php include("footer.php"); ?>
  <!-- BEGIN VENDOR JS-->
  <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="../app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
  type="text/javascript"></script>
  
  <script src="../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="../app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
<?php 
    include("errorandsuccessmessages.php"); 
?>