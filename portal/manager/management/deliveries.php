<?php include("session.php"); ?>
<?php $DateTime = date("Y-m-d H:i:s"); 

    if (isset($_POST["MarkedAsDelivered"])) {
        //retrieving the Product ID and description
            $Order_Item_ID_String = explode("-", $_POST["Order_Item_ID"]);
            $Order_Item_ID = $Order_Item_ID_String[1];
            $Order_ID = $Order_Item_ID_String[0];

            try{
                $db = new db(); //inititate db object
                $db = $db->connect();
                //selecting order details
                $select_order = "SELECT *, order_items.Quantity as OrderItemQuantity from order_items, products, suppliers where products.Supplier_ID = suppliers.ID and order_items.Product_ID = products.ID and Order_ID= :Order_ID and Product_ID= :Order_Item_ID";
                $stmt = $db->prepare($select_order);
                $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
                $stmt->bindParam(':Order_ID', $Order_ID);
                $stmt->execute();
                $order_result = $stmt->fetchAll(PDO::FETCH_OBJ);

            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';}
            
                if (sizeof($order_result)>0) {
                    for($i=0; $i<sizeof($order_result); $i++) {
                    $DescriptionOfItem = $order_result[$i]->DisplayLine;
                    $OrderItemQuantity = $order_result[$i]->OrderItemQuantity;
                    $OrderItemRP = $order_result[$i]->RP;
                    $OrderItemSP = $order_result[$i]->SP;
                    $Supplier_ID = $order_result[$i]->Supplier_ID;
                    $SupplierName = $order_result[$i]->Name;

                 }
             }
            

        //changing the order state.
        try{     
            $update_query = "UPDATE order_items SET State='3' where Order_ID= :Order_ID and Product_ID= :Order_Item_ID";
            $stmt = $db->prepare($update_query);
            $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
            $stmt->bindParam(':Order_ID', $Order_ID);
        
            if ($stmt->execute()) {
                $SuccessMessage = "Order item $Order_Item_ID-$Order_ID marked as delivered";
            }
        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
        }
        
        $AmountCharged = $OrderItemQuantity * $OrderItemSP;
        $AmountToDebitSupplier = $OrderItemQuantity * $OrderItemRP;
        $AmountRoDebitRevenue = $AmountCharged - $AmountToDebitSupplier;

        //debit supplier
        //cr cash
        //credit cash
        try{
        $insert_ac_trans = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Cr', '1', :AmountToDebitSupplier, 'Payment for :Order_Item_ID-:Order_ID to Supplier, :Supplier_ID (:SupplierName), :DateTime);";
        $stmt = $db->prepare($insert_ac_trans);
        $stmt->bindParam(':AmountToDebitSupplier',$AmountToDebitSupplier);
        $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
        $stmt->bindParam(':Order_ID',$Order_ID);
        $stmt->bindParam(':Supplier_ID',$Supplier_ID);
        $stmt->bindParam(':SupplierName',$SupplierName);
        $stmt->bindParam(':DateTime',$DateTime);
        $stmt->execute();
        }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
        

        //debit supplier
        try{
            
        $insert2  = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Dr', '3', :AmountToDebitSupplier, 'Payment for :Order_Item_ID-:Order_ID to Supplier, :Supplier_ID (:SupplierName) from Cash', :DateTime);";
        $stmt = $db->prepare($insert2);
        $stmt->bindParam(':AmountToDebitSupplier',$AmountToDebitSupplier);
        $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
        $stmt->bindParam(':Order_ID',$Order_ID);
        $stmt->bindParam(':Supplier_ID',$Supplier_ID);
        $stmt->bindParam(':SupplierName',$SupplierName);
        $stmt->bindParam(':DateTime',$DateTime);
        $stmt->execute();

        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}
            
        //debit revenue
        //cr cash
        //credit cash
     try{
        $insert3 = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Cr', '1', :AmountRoDebitRevenue, 'Payment to Revenue :Order_Item_ID-:Order_ID delivered successfully', :DateTime);";
        $stmt = $db->prepare($insert3);
        $stmt->bindParam(':AmountRoDebitRevenue',$AmountRoDebitRevenue);
        $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
        $stmt->bindParam(':Order_ID',$Order_ID);
        $stmt->bindParam(':DateTime',$DateTime);
        $stmt->execute();

        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}
     
        //debit revebue
        try{
             $insert4 = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Dr', '5', :AmountRoDebitRevenue, 'Payment received from Cash for :Order_Item_ID-:Order_ID delivered successfully', :DateTime);";
            $stmt = $db->prepare($insert4);
            $stmt->bindParam(':AmountRoDebitRevenue',$AmountRoDebitRevenue);
            $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
            $stmt->bindParam(':Order_ID',$Order_ID);
            $stmt->bindParam(':DateTime',$DateTime);
            $stmt->execute();

        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}
     
        //select ordr item details
        try{    
            $select_items = "SELECT *, order_items.Quantity as OrderItemQuantity from order_items, products where order_items.Product_ID = products.ID and Order_ID=:Order_ID and Product_ID=:Order_Item_ID";
            $stmt = $db->prepare($select_items);
            $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
            $stmt->bindParam(':Order_ID',$Order_ID);
            $stmt->execute();
            $items_results = $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}

            if (sizeof($items_results) > 0) {
                for($i=0; i<sizeof($items_results);$i++){
                    $DescriptionOfItem = $items_results[$i]->DisplayLine;
                    $Quantity = $items_results[$i]->OrderItemQuantity;
                 }
             }

             try{
                    $select_order_cus = "SELECT * from orders, customers where orders.Customer_ID = customers.Customer_ID and Order_ID=:Order_ID";
                    $stmt = $db->prepare($select_order_cus);
                    $stmt->bindParam(':Order_ID',$Order_ID);
                    $stmt->execute();
                    $order_results = $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}

            if (sizeof($order_results) > 0) {
                for($i=0; i<sizeof($order_results);$i++){
                    $OrderID = $order_results[$i]->Order_ID;
                    $Customer_Name = $order_results[$i]->FName." ".$order_results[$i]->LName;
                    $Fname = $order_results[$i]->FName;
                    $Lname = $order_results[$i]->LName;
                    $Phone = $order_results[$i]->Phone;
                    $Email = $order_results[$i]->Email;
                 }
             }



            //send phone number verification code
            $message = "Hi $Fname, your order item $Order_ID-$Order_Item_ID - $DescriptionOfItem ( x $Quantity ) has been delivered successfully. Thanks. Come again soon!";
             $URL = "http://api.mytxtbox.com/v3/messages/send?" . "From=Solushop-GH" . "&To=%2B" . urlencode($Phone) . "&Content=" . urlencode($message) . "&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
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
            $subject = "Solushop GH - Order Item Delivered!";

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
                                                      <td width='120' align='right' valign='top'><img src='https://solushop.com.gh/email/PackagePickedUp.png' alt='Delivery Confirmed' width='120' height='120' class='CToWUd'></td>
                                                        <td width='30'></td>
                                                        <td align='left' valign='middle'>
                                                          <h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>Order Item Delivered!</h3>
                                                            <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                            <div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>Your order item $Order_ID-$Order_Item_ID - $DescriptionOfItem ( x $Quantity ) has been delivered successfully. Thanks for choosing Solushop! <br><br>Remember, if there's anything you need help with, be it deciding which products to buy, or troubles with your order, please feel free to contact customer care via call or whatsapp on 0559538887.<br><br> </div>
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




        //check if all the items are ready then change the order state
        $OrderCompleteFlag = 0;
        try{
            $select_order_items = "SELECT * FROM order_items WHERE Order_ID=:Order_ID";
            $stmt = $db->prepare($select_order_items);
            $stmt->bindParam(':Order_ID', $Order_ID);
            $stmt->execute();
            $order_items_results = $stmt->fetchAll(PDO::FETCH_OBJ); 
        }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}

        if (sizeof($order_items_results) > 0) {
            for($i=0; i<sizeof($order_items_results);$i++){
                if ($order_items_results[$i]->State != '3') {
                    $OrderCompleteFlag = 1;
                }
            }
        }

        if ($OrderCompleteFlag==0) {
           //update order state to ready for delivery
           try{
            $update = "UPDATE orders SET Order_State='5' WHERE Order_ID='$Order_ID'";
            $stmt = $db->prepare($update);
            $stmt->bindParam(':Order_ID', $Order_ID);
            $stmt->execute();
           }catch(PDOException $e){
               echo '{"error": {"text": '.$e->getMessage().'}';}
        }
        
    }

    $TodaysDate = "2017-11-15";
    $monthAndYear = date('m-d');
    // First and last days of the previous month.
    $FirstDayOfPreviousMonthDate = date("j-n-Y", strtotime("first day of previous month"));
    $LastDayOfPreviousMonthDate = date("j-n-Y", strtotime("last day of previous month"));
    $PreviousMonthAndYear =  date("F Y", strtotime("last day of previous month"));

    // First and last days of the current month.
    $FirstDayOfCurrentMonthDate = date("j-n-Y", strtotime("first day of current month"));
    $LastDayOfCurrentMonthDate = date("j-n-Y", strtotime("last day of current month"));
    $CurrentMonthAndYear =  date("F Y");

    $CurrentMonthAndYearSQL =  date("n/Y");
    $TodaysDateObject = new DateTime($TodaysDate);
    $TodaysDateWords = $TodaysDateObject->format("F j, Y");
    $TodaysDateObject->modify('-3 days');
    $SaturdaysDate = $TodaysDateObject->format('Y-m-d');

    if(date('w') == 1 OR date('w') == 4){
        //means its a delivery day
        //Now check time

        $NextPickUpDay = "Today";
        if (date("i")>8) {
            $PickUpGuide = "Available";

            
        }else{
            $PickUpGuide = "Unavailable";
        }
    }else{
        $PickUpGuide = "Unavailable";
       //Calculate next pickup day
        if(date('w') == 5 OR date('w') == 6 OR date('w') == 0){

        // Create a new DateTime object
        $date = new DateTime();
        // Modify the date it contains
        $date->modify('next monday');
        // Output
        $NextPickUpDay = $date->format('l jS \of F Y');
        }elseif(date('w') == 2 OR date('w') == 3){

        // Create a new DateTime object
        $date = new DateTime();
        // Modify the date it contains
        $date->modify('next thursday');
        // Output
        $NextPickUpDay = $date->format('l jS \of F Y');
        }
    }

    
    $db = null;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Deliveries</title>
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
                        Deliveries
                        <small>Manage Deliveries</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Deliveries</li>
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
                            <form method="POST" action="#" enctype="multipart/form-data" >
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

                                   
                                    
                                    
                              

                                //customer orders
                                echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Customer Order Items Due for Delivery</h3>
                                    </div><!-- /.box-header -->";
                                    //selecting customer addresses from the database
                                    try{
                                        $db = new db(); //inititate db object
                                        $db = $db->connect();
                                        $select_details = "SELECT *, order_items.Quantity AS OrderItemQuantity, products.RP as RP FROM orders, order_items, order_items_state, products, suppliers WHERE order_items.state = order_items_state.ID and orders.Order_ID = order_items.Order_ID and order_items.Product_ID = products.ID and products.Supplier_ID = suppliers.ID and order_items.State = '2' ORDER BY Supplier_ID";
                                        $stmt = $db->prepare($select_details);
                                        $stmt->execute();
                                        $details_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';
                                    }
                                $ProductCount = 0;
                                $TotalDue = 0;
                                $SupplierIDCount = 0;
                                $PreviousSupplierID ='';
                                if (sizeof($details_result) > 0) {
                                    $ProductReleaseEminnent = 'Yes';
                                    echo "<div class=\"box-body table-responsive no-padding\">
                                        <table class=\"table table-hover\">
                                            <tbody><tr>
                                                <th width=\"25%\">Order Item ID</th>
                                                <th width=\"25%\">Order Item Description</th>
                                                <th width=\"25%\">Order Item State</th>
                                                <th width=\"25%\">Action</th>
                                            </tr>";
                                    for($i=0; i<sizeof($details_result);$i++){
                                        $OrderItemID[$ProductCount] = $details_result[$i]->Order_ID."-".$details_result[$i]->Product_ID;
                                        $OrderItemDescription[$ProductCount] = $details_result[$i]->DisplayLine;
                                        $OrderItemRP[$ProductCount] = $details_result[$i]->RP;
                                        $OrderItemSP[$ProductCount] = $details_result[$i]->SP;
                                        $OrderItemQuantity[$ProductCount] = $details_result[$i]->OrderItemQuantity;
                                        $SupplierName[$ProductCount] = $details_result[$i]->Name;
                                        $Supplier_ID[$ProductCount] = $details_result[$i]->Supplier_ID;
                                        $TotalDue += $OrderItemRP[$ProductCount];
                                         echo 
                                            "<tr>
                                            <form method='POST' action='#'>
                                                <td>".$OrderItemID[$ProductCount]."</td>    
                                                <td>".$OrderItemDescription[$ProductCount]."</td> 
                                                <td>".$details_result[$i]->Description."</td>    
                                                <td><input type='submit' style='background-color:green; border-color:green;' class='btn btn-warning btn-sm' name='MarkedAsDelivered' value='Mark as Delivered'/>
                                                <input type='hidden' name='Order_Item_ID' value='".$OrderItemID[$ProductCount] ."'/>
                                                </form>
                                            </tr>";
                                        if ($details_result[$i]->Supplier_ID!=$PreviousSupplierID) {
                                            $SupplierIDCount++;
                                        }
                                        $ProductCount++;
                                    }
                                }else{
                                    echo "<div class=\"box-body table-responsive no-padding\">
                                        <table class=\"table table-hover\">
                                            <tbody>
                                        <br><br><h4 style='text-align:center;'> No orders placed.</h4><br><br>";
                                }
                                        echo "</tbody></table>";
                                    echo "</div><!-- /.box-body -->
                                </div><!-- /.box -->";
                                $db = null;
                                ?>
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
                           
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">

                            <?php 
                                 //customer orders
                                //calculating service required
                                if ($SupplierIDCount > 3) {
                                    $ServiceRequired = "All-Day";
                                }else{
                                    $ServiceRequired = "On-Demand";
                                }


                                echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Pick Up Guide</h3>
                                    </div><!-- /.box-header -->";
                                    echo "<div class=\"box-body table-responsive no-padding\">
                                        <table class=\"table table-hover\">
                                            <tbody>
                                            <tr>
                                                <th width=\"25%\">Next Pick-Up Day</th>
                                                <td width=\"50%\">$NextPickUpDay</td>
                                            </tr>
                                            <tr>
                                                <th width=\"25%\">Service Required</th>
                                                <td width=\"50%\">$ServiceRequired</td>
                                            </tr>
                                            <tr>
                                                <th width=\"25%\">Download Pick-Up Guide</th>
                                                <td width=\"50%\">";
                                                    if ($PickUpGuide == "Available") {
                                                       $FileName = date("l-Y-m-d");
                                                        echo "<a href=\"../../Reports-And-Summaries/Deliveries/$FileName.pdf\" download=\"$FileName.pdf\"> <input type='submit' style='background-color:green; border-color:green;' class='btn btn-warning btn-sm' name='DownloadPickUpGuide' value='Download'/></a>";
                                                    }else{
                                                        echo "<input type='submit' style='background-color:red; border-color:red;' class='btn btn-warning btn-sm' name='DownloadPickUpGuide' value='Unavailable' disabled/>&nbsp; &nbsp; (Will be abailable next pick-up day at 8am.)";
                                                    }

                                                echo"</td>
                                            </tr>";
                                        echo "</tbody></table>";
                                    echo "</div><!-- /.box-body -->
                                </div><!-- /.box -->";
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
