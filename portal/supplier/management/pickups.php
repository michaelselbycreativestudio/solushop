<?php include("session.php"); ?>
<?php

    if (isset($_POST["MarkedAsPickedUp"])) {
        //retrieving the Product ID and description
            $Order_Item_ID_String = explode("-", $_POST["Order_Item_ID"]);
            $Order_Item_ID = $Order_Item_ID_String[1];
            $Order_ID = $Order_Item_ID_String[0];

        //changing the order state.

        try{
            $db = new db(); //inititate db object
            $db = $db->connect();
            $update = "UPDATE order_items SET State='2' where Order_ID='$Order_ID' and Product_ID='$Order_Item_ID'";
            $stmt = $db->prepare($update);
            $stmt->bindParam(':Order_ID',$Order_ID);
            $stmt->bindParam(':Order_Item_ID',$Order_Item_ID);
        if ($stmt->execute()) {
            $SuccessMessage = "Order item $Order_Item_ID-$Order_ID marked as picked up and ready for delivery";
        }
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}

        //check if all the items are ready then change the order state
        $ReadyForDeliveryFlag = 0;
        try{
            $select_order_items = "SELECT * FROM order_items WHERE Order_ID=:Order_ID";
            $stmt = $db->prepare($select_order_items);
            $stmt->bindParam(':Order_ID',$Order_ID);
            $stmt->execute();
            $order_items_result = $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}
            if (sizeof($order_items_result) > 0) {
                for($i=0; $i<sizeof($order_items_result);$i++){
                    if ($order_items_resultState!='2') {
                        $ReadyForDeliveryFlag = 1;
                    }
                }
            }

        if ($ReadyForDeliveryFlag==0) {
           //update order state to ready for delivery
           try{
                $update_order = "UPDATE orders SET Order_State='3' WHERE Order_ID=:Order_ID";
                $stmt = $db->prepare($update_order);
                $stmt->bindParam(':Order_ID',$Order_ID);
                $stmt->execute();

           }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}
        }
        $db = null;
        
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
                            try{
                                $db = new db(); //inititate db object
                                $db = $db->connect();                                
                                $select_order_items_quantity = "SELECT *, order_items.Quantity AS OrderItemQuantity FROM orders, order_items, order_items_state, products, suppliers WHERE order_items.state = order_items_state.ID and orders.Order_ID = order_items.Order_ID and order_items.Product_ID = products.ID and products.Supplier_ID = suppliers.ID and order_items.State = '1' and Supplier_ID = :SupplierID ORDER BY Supplier_ID";
                                $stmt = $db->prepare($select_order_items_quantity);
                                $stmt->bindParam(':SupplierID',$SupplierID);
                                $stmt->execute();
                                $order_quantity = $stmt->fetchAll(PDO::FETCH_OBJ);
                                $db = null;  
                            }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';}
                                $ProductCount = 0;
                                $TotalDue = 0;
                                $SupplierIDCount = 0;
                                $PreviousSupplierID ='';
                                if (sizeof($order_quantity) > 0) {
                                    $ProductReleaseEminnent = 'Yes';
                                    echo "<div class=\"box-body table-responsive no-padding\">
                                        <table class=\"table table-hover\">
                                            <tbody><tr>
                                                <th width=\"25%\">Order Item ID</th>
                                                <th width=\"25%\">Order Item Description</th>
                                                <th width=\"25%\">Order Item State</th>
                                            </tr>";
                                    for($i=0; $i<sizeof($order_quantity);$i++){
                                        $OrderItemID[$ProductCount] = $order_quantity[$i]->Order_ID."-".$order_quantity[$i]->Product_ID;
                                        $OrderItemDescription[$ProductCount] = $order_quantity[$i]->DisplayLine;
                                        $OrderItemRP[$ProductCount] = $order_quantity[$i]->RP;
                                        $OrderItemQuantity[$ProductCount] = $order_quantity[$i]->OrderItemQuantity;
                                        $SupplierName[$ProductCount] = $order_quantity[$i]->Name;
                                        $TotalDue += $OrderItemRP[$ProductCount];
                                         echo 
                                            "<tr>
                                                <td>".$OrderItemID[$ProductCount]."</td>    
                                                <td>".$OrderItemDescription[$ProductCount]." ( x ".$OrderItemQuantity[$ProductCount]. " )</td> 
                                                <td>".$order_quantity[$i]->Description."</td>    
                                            </tr>";
                                        if ($order_quantity[$i]->Supplier_ID!=$PreviousSupplierID) {
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
