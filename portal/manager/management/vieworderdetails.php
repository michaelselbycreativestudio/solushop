<?php include("session.php"); ?>
<?php 
    if (isset($_GET["id"])) {
        $OID = $_GET["id"];
    }

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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Order Details</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../../assets/management/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../../assets/management/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../../assets/management/css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../../assets/management/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="../../assets/management/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/
        <!-- Daterange picker -->
        <link href="../../assets/management/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../../assets/management/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../assets/management/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            .no-print{
                display: none;
            }

            .img{
            position: relative;
            float: left;
            width:  50px;
            height: 50px;
            background-position: 50% 50%;
            background-repeat:   no-repeat;
            background-size:     cover;
            }   

            .images{

            height: 80px;
            }


            .images:hover{
              background-color: #f3f6f9;
              border-radius: 10px;
            }
        </style>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <div class="logo">
                    <img src="../../assets/management/img/solushopinv.png" style="width:100px; height:40px; " >
                </div>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <?php 
                            include("messages-menu-bar.php");
                            include("notifications-menu-bar.php");
                            include("tasks-menu-bar.php");
                            include("user-account-menu-bar.php");
                        ?>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php include "side-bar-menu.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Orders
                        <small>View Order details</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Orders</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        
                    </div>
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <?php 
                                if (isset($ErrorMessage)) {
                                         echo 
                                        "<div class=\"alert alert-danger alert-dismissable\">
                                            <i class=\"fa fa-ban\"></i>
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                            $ErrorMessage
                                        </div>";
                                    }
                                    elseif (isset($SuccessMessage)) {
                                        echo 
                                        "<div class='alert alert-success alert-dismissable'>
                                            <i class='fa fa-check'></i>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                            $SuccessMessage
                                        </div>";
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
                                    }
                                    echo "
                                <form method='POST' action='#'>    
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Process Order</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            <tr>";
                                            if ($Order_State_ID=='1') {
                                                echo "<td width=\"20%\" style=''><input type='Submit' name='ConfirmOrderButton' class=\"btn btn-warning btn-lg\" value='Confirm Order'/></td>";
                                            }else{
                                                echo "<td width=\"20%\" style=''><input type='Submit' name='ConfirmOrderButton' class=\"btn btn-warning btn-lg\" value='Confirm Order' disabled/></td>";
                                            }
                                            if ($Order_State_ID=='2') {
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='ConfirmReadyForDeliveryButton' class=\"btn btn-warning btn-lg\" style='background-color:#0275d8; border-color:#0275d8;' value='Confirm ready for delivery' /></td>";
                                            }else{
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='ConfirmReadyForDeliveryButton' class=\"btn btn-warning btn-lg\" style='background-color:#0275d8; border-color:#0275d8;' value='Confirm ready for delivery' disabled/></td>";
                                            }
                                            if ($Order_State_ID=='3') {
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='ConfirmDeliveryInitiationButton' class=\"btn btn-warning btn-lg\" style='background-color:#32CD32; border-color:#32CD32;' value='Confirm Delivery Initiation' /></td>";
                                            }else{
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='ConfirmDeliveryInitiationButton' class=\"btn btn-warning btn-lg\" style='background-color:#32CD32; border-color:#32CD32;' value='Confirm Delivery Initiation' disabled/></td>";
                                            }
                                            if ($Order_State_ID=='1') {
                                                echo "<td width=\"20%\" style='text-align: right;'><input type='submit' name='CancelOrderButton' class=\"btn btn-danger btn-lg\" value='Cancel Order' /></td>";
                                            }else{
                                                echo "<td width=\"20%\" style='text-align: right;'><input type='submit' name='CancelOrderButton' class=\"btn btn-danger btn-lg\" value='Cancel Order' disabled/></td>";
                                            }
                                                
                                                echo "
                                                
                                                
                                            </tr>

                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                </form>";

                                
                            
                                echo " <div class=\"box box-solid box-info\" >
                                                    <div class=\"box-header\">
                                                        <h3 class=\"box-title\" style=\"text-align: center;\">Order Items</h3>
                                                    </div><!-- /.box-header -->";
                                try{
                                    $select_items_quantity = "SELECT *, order_items.Quantity as OrderQuantity FROM order_items, order_items_state, products where products.ID=order_items.Product_ID and order_items_state.ID = order_items.State and order_items.Order_ID=:OID";
                                    $stmt = $db->prepare($select_items_quantity);
                                    $stmt->bindParam(':OID', $OID);
                                    $stmt->execute();
                                    $item_quan_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                }  catch(PDOException $e){
                                    echo '{"error": {"text": '.$e->getMessage().'}';
                                }                  
                                    if (sizeof($item_quan_result) > 0) {
                                           echo "<div class=\"box-body no-padding\">
                                        
                                                    <table class=\"table table-condensed\">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Description</th>
                                                            <th>Preview</th>
                                                            <th>Quantity</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>";
                                        for($i=0; $i<sizeof($item_quan_result);$i++){
                                                $imageURL ="https://test.solushop.com.gh/assets/images/products/thumbnails/".$item_quan_result[$i]->ID."a.jpg";
                                                echo "<tr>
                                                            <td>".$item_quan_result[$i]->ID."</td>
                                                            <td>".$item_quan_result[$i]->DisplayLine."</td>
                                                            <td><div class='img' style=\"background-image:url($imageURL); margin-right: 20px;\"></div></td>
                                                            <td> x ".$item_quan_result[$i]->OrderQuantity."</td>
                                                            <td>".$item_quan_result[$i]->Description."</td>
                                                            <td><a target=\"new\" href='viewproduct.php?id=".$item_quan_result[$i]->ID."'><button style='background-color:black; border-color:black;' class='btn btn-warning btn-sm'>View Product</button></a>
                                                            
                                                            </td>
                                                        </tr>";
                                            }
                                            echo "
                                                    </table>

                                            </div><!-- /.box-body -->";
                                        }else{
                                            echo "<br> <h5 style='text-align:center;'>No products.</h5><br>";
                                        }

                                        echo " </table>
                                        </div><!-- /.box -->";  
                                
                               $db = null;  
                                ?>
                           
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">
                            <?php 
                            try{
                                $db = new db(); //inititate db object
                                $db = $db->connect();
                                $select_order_ID = "SELECT *, orders.Order_ID as OID FROM orders, order_state, order_items where orders.Order_ID=order_items.Order_ID and order_state.ID = orders.Order_State and orders.Order_ID=:OID";
                                $stmt = $db->prepare($select_order_ID);
                                $stmt->bindParam(':OID', $OID);
                                $stmt->execute();
                                $order_id_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                            }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';}
                                
                                
                                if (sizeof($order_id_result) > 0) {
                                    for($i=0; $i<sizeof($order_id_result);$i++){
                                            $Order_ID = $order_id_result[$i]->OID;
                                            $Order_Date = $order_id_result[$i]->Order_Date;
                                            $Order_State = $order_id_result[$i]->UserDescription;
                                        }
                                    }
                                    echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> General Order Details</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            <tr>
                                                <th width=\"30%\">Order ID</th>
                                                <th>Order Date</th>
                                                <th>Order State</th>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">$Order_ID</td>
                                                <td>$Order_Date</td>
                                                <td>$Order_State</td>
                                            </tr>

                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->";

                                $db = null;
                            ?>
                            <!-- Calendar -->
                            <div class="box box-solid bg-yellow-gradient">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>
                                    <h3 class="box-title">Calendar</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        
                                        <button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <!--The calendar -->
                                    <div id="calendar" style="width: 100%"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- quick email widget -->
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Quick Email</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Remove"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->
                                </div>
                                <div class="box-body">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                                        </div>
                                        <div>
                                            <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer clearfix">
                                    <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../../assets/management/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../../assets/management/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../../assets/management/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../../assets/management/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../../assets/management/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../../assets/management/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../../assets/management/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../../assets/management/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../../assets/management/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../../assets/management/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../../assets/management/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../../assets/management/js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>
