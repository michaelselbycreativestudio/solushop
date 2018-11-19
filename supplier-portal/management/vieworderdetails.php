<?php include("session.php"); ?>
<?php include("databaseconnection.php") ?>
<?php 

    if (isset($_GET["id"])) {
        $OID = $_GET["id"];
    }else{
        header("Location: orders.php");
        exit();
    }

    if (isset($_POST["DeliveryComplete"])) {
        //change order state to complete
        //first check if the state before was 3 if it is then update
        $sql = "SELECT * from orders WHERE Order_ID='$OID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row["Order_State"]==4){
                    //update new record
                    $UpdateQuery = "UPDATE orders SET Order_State='5' where Order_ID='$OID'";
                    if ($conn->query($UpdateQuery)) {
                        $SuccessMessage = "Order <b>$OID</b>'s' state has been changed to <b>Completed</b>";

                        //update the order items too to Delivered
                        $UpdateOrderItemsQuery = "UPDATE order_items SET State='3' where Order_ID='$OID'";
                        $conn->query($UpdateOrderItemsQuery);

                    }else{
                        $ErrorMessage = "Something went wrong. Please try again.";
                    }
                }else{
                    $ErrorMessage = "Something went wrong. Please try again.";
                }
            }
        }
    }

    if (isset($_POST["PickedUpProductID"])) {
        //retrieving the Product ID and description
            $PickedUpProductID = $_POST["PickedUpProductID"];
            $PickedUpProductDescription = $_POST["PickedUpProductDescription"];

        //changing the order state.

        $sql = "UPDATE order_items SET State='2' where Order_ID='$OID' and Product_ID='$PickedUpProductID'";
        if ($conn->query($sql)) {
            $SuccessMessage = "$PickedUpProductDescription marked as picked up and ready for delivery";
        }

        //check if all the items are ready then change the order state
        $ReadyForDeliveryFlag = 0;
        $sql = "SELECT * FROM order_items WHERE Order_ID='$OID'";
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
            $sql = "UPDATE orders SET Order_State='3' WHERE Order_ID='$OID'";
            $conn->query($sql);
        }


        
    }
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
                            <form method="POST" action="#">
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

                                $sql = "SELECT *, orders.Order_ID as OID FROM orders, order_state, order_items where orders.Order_ID=order_items.Order_ID and order_state.ID = orders.Order_State and orders.Order_ID='$OID'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $Order_ID = $row["OID"];
                                            $Order_Date = $row["Order_Date"];
                                            $Order_State = $row["NEGLDescription"];
                                            $Order_State_ID = $row["Order_State"];
                                        }
                                    }
                                    echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Process Order</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            <tr>";
                                            if ($Order_State_ID=='4') {
                                                echo "<td width=\"100%\" style='text-align: center;'><input name='DeliveryComplete' type='submit' class=\"btn btn-success btn-lg\" value='Delivery Complete' /></td>";
                                            }else{
                                                echo "<td width=\"100%\" style='text-align: center;'><input name='DeliveryComplete' type='submit' class=\"btn btn-success btn-lg\" value='Delivery Complete' disabled/></td>";
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
                                $sql = "SELECT * FROM order_items, order_items_state, products where products.ID=order_items.Product_ID and order_items_state.ID = order_items.State and order_items.Order_ID='$OID'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                           echo "
                                           <form method='POST' action='#'>
                                           <div class=\"box-body no-padding\">
                                        
                                                    <table class=\"table table-condensed\">
                                                     <tr>
                                                            <th>ID</th>
                                                            <th>Description</th>
                                                            <th>Preview</th>
                                                            <th>Quantity</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>";
                                            while ($row = $result->fetch_assoc()) {
                                                $imageURL ="images/products/Thumbnails/".$row['ID']."a.jpg";
                                                echo "<tr>
                                                            <td>".$row['ID']."</td>
                                                            <td>".$row['DisplayLine']."</td>
                                                            <td><div class='img' style=\"background-image:url($imageURL); margin-right: 20px;\"></div></td>
                                                            <td>".$row['Quantity']."</td>
                                                            <td>".$row['Description']."</td>
                                                            
                                                            <td>";
                                                            if ($row["State"]=='1') {
                                                                echo "
                                                                <input type='hidden' name='PickedUpProductDescription' value='".$row["DisplayLine"]."' />
                                                                <input type='hidden' name='PickedUpProductID' value='".$row["ID"]."' />
                                                                <input type='submit' style='background-color:#00c0ef; border-color:#00c0ef;' class='btn btn-warning btn-sm' name='MarkedAsPickedUp' value='Mark as picked up'/>";
                                                            }else{
                                                                echo "None";
                                                            }

                                                            
                                                            
                                                            echo "</td>
                                                        </tr>";
                                            }
                                            echo "
                                                    </table>

                                            </div><!-- /.box-body -->";
                                        }else{
                                            echo "<br> <h5 style='text-align:center;'>No products.</h5><br>";
                                        }

                                        echo " </table>
                                        </div><!-- /.box -->
                                        </form>";  
                                
                               
                                ?>
                           
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">
                            <?php 

                                $sql = "SELECT *, orders.Order_ID as OID FROM orders, order_state, order_items where orders.Order_ID=order_items.Order_ID and order_state.ID = orders.Order_State and orders.Order_ID='$OID'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $Order_ID = $row["OID"];
                                            $Order_Date = $row["Order_Date"];
                                            $Order_State = $row["NEGLDescription"];
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
