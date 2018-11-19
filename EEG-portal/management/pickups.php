<?php include("session.php"); ?>
<?php include("databaseconnection.php") ?>
<?php

    if (isset($_POST["MarkedAsPickedUp"])) {
        //retrieving the Product ID and description
            $Order_Item_ID_String = explode("-", $_POST["Order_Item_ID"]);
            $Order_Item_ID = $Order_Item_ID_String[1];
            $Order_ID = $Order_Item_ID_String[0];

        //changing the order state.

        $sql = "UPDATE order_items SET State='2' where Order_ID='$Order_ID' and Product_ID='$Order_Item_ID'";
        if ($conn->query($sql)) {
            $SuccessMessage = "Order item $Order_Item_ID-$Order_ID marked as picked up and ready for delivery";
            //select ordr item details
            $sql = "SELECT *, order_items.Quantity as OrderItemQuantity from order_items, products where order_items.Product_ID = products.ID and Order_ID='$Order_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $DescriptionOfItem = $row["DisplayLine"];
                    $Quantity = $row["OrderItemQuantity"];

                 }
             }

            $sql = "SELECT * from orders, customers where orders.Customer_ID = customers.Customer_ID and Order_ID='$Order_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $OrderID = $row["Order_ID"];
                    $Customer_Name = $row["FName"]." ".$row["LName"];
                    $Fname = $row["FName"];
                    $Lname = $row["LName"];
                    $Phone = $row["Phone"];
                    $Email = $row["Email"];

                 }
             }



            //send phone number verification code
            $message = "Hi $Fname, your order item $Order_ID-$Order_Item_ID - $DescriptionOfItem ( x $Quantity ) has been picked up from the warehouse. Thanks.";
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
            $subject = "Solushop GH - Order Item Picked Up!";

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
                                                      <td width='120' align='right' valign='top'><img src='https://solushop.com.gh/email/PackagePickedUp.png' alt='Order Item Picked Up' width='120' height='120' class='CToWUd'></td>
                                                        <td width='30'></td>
                                                        <td align='left' valign='middle'>
                                                          <h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>Order Item Picked Up!</h3>
                                                            <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                            <div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>Your order item $Order_ID-$Order_Item_ID - $DescriptionOfItem ( x $Quantity ) has been picked up from the warehouse. Thank you.<br><br>Remember, if there's anything you need help with, be it deciding which products to buy, or troubles with your order, please feel free to contact customer care via call or whatsapp on 0559538887.<br><br> </div>
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



        }

        //check if all the items are ready then change the order state
        $ReadyForDeliveryFlag = 0;
        $sql = "SELECT * FROM order_items WHERE Order_ID='$Order_ID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["State"]!='2') {
                    $ReadyForDeliveryFlag = 1;
                }
            }
        }

        if ($ReadyForDeliveryFlag==0) {
           //update order state to ready for delivery
            $sql = "UPDATE orders SET Order_State='3' WHERE Order_ID='$Order_ID'";
            $conn->query($sql);
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

    if(date('w') == 3 OR date('w') == 6){
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
        if(date('w') == 0 OR date('w') == 1 OR date('w') == 2){

        // Create a new DateTime object
        $date = new DateTime();
        // Modify the date it contains
        $date->modify('next wednesday');
        // Output
        $NextPickUpDay = $date->format('l jS \of F Y');
        }elseif(date('w') == 4 OR date('w') == 5){

        // Create a new DateTime object
        $date = new DateTime();
        // Modify the date it contains
        $date->modify('next saturday');
        // Output
        $NextPickUpDay = $date->format('l jS \of F Y');
        }
    }

    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Pick-Ups</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- iCheck for checkboxes and radio inputs -->
        <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
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
                    <img src="img/solushopinv.png" style="width:100px; height:40px; " >
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
                        Pick-Ups
                        <small>Manage Pick-Ups</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Pick-Ups</li>
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
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Customer Order Items Due for Pick-Up</h3>
                                    </div><!-- /.box-header -->";
                                    //selecting customer addresses from the database
                                $sql = "SELECT * FROM orders, order_items, order_items_state, products, suppliers WHERE order_items.state = order_items_state.ID and orders.Order_ID = order_items.Order_ID and order_items.Product_ID = products.ID and products.Supplier_ID = suppliers.ID and order_items.State = '1' ORDER BY Supplier_ID";
                                $result = $conn->query($sql);
                                $ProductCount = 0;
                                $TotalDue = 0;
                                $SupplierIDCount = 0;
                                $PreviousSupplierID ='';
                                if ($result->num_rows > 0) {
                                    $ProductReleaseEminnent = 'Yes';
                                    echo "<div class=\"box-body table-responsive no-padding\">
                                        <table class=\"table table-hover\">
                                            <tbody><tr>
                                                <th width=\"25%\">Order Item ID</th>
                                                <th width=\"25%\">Order Item Description</th>
                                                <th width=\"25%\">Order Item State</th>
                                                <th width=\"25%\">Action</th>
                                            </tr>";
                                    while ($row = $result->fetch_assoc()) {
                                        $OrderItemID[$ProductCount] = $row["Order_ID"]."-".$row["Product_ID"];
                                        $OrderItemDescription[$ProductCount] = $row["DisplayLine"];
                                        $OrderItemRP[$ProductCount] = $row["RP"];
                                        $SupplierName[$ProductCount] = $row["Name"];
                                        $TotalDue += $OrderItemRP[$ProductCount];
                                         echo 
                                            "<tr>
                                                <td>".$OrderItemID[$ProductCount]."</td>    
                                                <td>".$OrderItemDescription[$ProductCount]."</td> 
                                                <td>".$row["Description"]."</td>    
                                                <td><input type='submit' style='background-color:#00c0ef; border-color:#00c0ef;' class='btn btn-warning btn-sm' name='MarkedAsPickedUp' value='Mark as picked up'/>
                                                <input type='hidden' name='Order_Item_ID' value='".$OrderItemID[$ProductCount] ."'/></td> 
                                            </tr>";
                                        if ($row["Supplier_ID"]!=$PreviousSupplierID) {
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
                                                        echo "<input type='submit' style='background-color:green; border-color:green;' class='btn btn-warning btn-sm' name='DownloadPickUpGuide' value='Download'/>";
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
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>
