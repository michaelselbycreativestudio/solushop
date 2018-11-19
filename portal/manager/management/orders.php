<?php include("session.php"); ?>
<?php 
    //checking which category of orders are selected
    $SelectedGrouping = "None";
    if (isset($_POST["NewOrders"])  OR (isset($_GET['SelectedGrouping']) AND $_GET['SelectedGrouping'] == 'NewOrders')) {
        $SelectedGrouping = "New Orders";
    }elseif (isset($_POST["OngoingOrders"]) OR (isset($_GET['SelectedGrouping']) AND $_GET['SelectedGrouping'] == 'OngoingOrders')) {
        $SelectedGrouping = "Ongoing Orders";
    }elseif (isset($_POST["CompletedOrders"]) OR (isset($_GET['SelectedGrouping']) AND $_GET['SelectedGrouping'] == 'CompletedOrders')) {
        $SelectedGrouping = "Completed Orders";
    }elseif (isset($_POST["CancelledOrders"]) OR (isset($_GET['SelectedGrouping']) AND $_GET['SelectedGrouping'] == 'CancelledOrders')) {
        $SelectedGrouping = "Cancelled Orders";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Orders</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../../assets/management/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../../assets/management/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../../assets/management/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
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
                        <small>Search &amp; Manage all Orders</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Orders</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                                    <?php 
                                    //
                                        echo "<form method='POST' action='#'>    
                                <div class=\"box box box-info\" >
                                    <div class=\"box-header\" >
                                        <h3 class=\"box-title\" style=\"text-align: center;\">Refine Orders by State</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            <tr>";

                                            if ($SelectedGrouping == 'New Orders') {
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='NewOrders' class=\"btn btn-info btn-lg\" value='New Orders' disabled/></td>";
                                            }else{
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='NewOrders' class=\"btn btn-info btn-lg\"  value='New Orders' /></td>";
                                            }
                                            if ($SelectedGrouping == 'Ongoing Orders') {
                                                echo "<td width=\"20%\" style='text-align: center;'><input type='Submit' name='OngoingOrders' class=\"btn btn-warning btn-lg\" value='Ongoing Orders' disabled/></td>";
                                            }else{
                                                echo "<td width=\"20%\" style='text-align: center;'><input type='Submit' name='OngoingOrders' class=\"btn btn-warning btn-lg\" value='Ongoing Orders' /></td>";
                                            }
                                            if ($SelectedGrouping == 'Completed Orders') {
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='CompletedOrders' class=\"btn btn-warning btn-lg\" style='background-color:#32CD32; border-color:#32CD32;' value='Completed Orders' disabled/></td>";
                                            }else{
                                                echo "<td width=\"30%\" style='text-align: center;'><input type='submit' name='CompletedOrders' class=\"btn btn-warning btn-lg\" style='background-color:#32CD32; border-color:#32CD32;' value='Completed Orders' /></td>";
                                            }
                                            if ($SelectedGrouping == 'Cancelled Orders') {
                                                echo "<td width=\"20%\" style='text-align: center;'><input type='submit' name='CancelledOrders' class=\"btn btn-danger btn-lg\" value='Cancelled Orders' disabled/></td>";
                                            }else{
                                                echo "<td width=\"20%\" style='text-align: center;'><input type='submit' name='CancelledOrders' class=\"btn btn-danger btn-lg\" value='Cancelled Orders' /></td>";
                                            }
                                                
                                                echo "
                                                
                                                
                                            </tr>

                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                </form>";


                                    ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                   
                                   <div class="box-tools">
                                        <div class="input-group" style="text-align: right;">
                                            <form action="#" method="POST" >
                                                <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                                <div class="input-group-btn">
                                                    <button type="submit" name="submit_table_search" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php 
                                        if (isset($_POST['submit_table_search'])) {
                                                 $TableSearch = $SearchValue =  $_POST['table_search'];
                                                echo "<div style=\"text-align:center;\">
                                            <h3 style=\"text-align:center; float:none;\" class=\"box-title\">Search Results with '$TableSearch'</h3>
                                        </div>";
                                        }

                                    ?>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    
                                            <?php

                                              $rec_limit = 10;
                                              //get number of records
                                              try{
                                                $db = new db(); //inititate db object
                                                $db = $db->connect();
                    
                                                $rec_limit = 10;
                                                //get number of records
                                                $num_orders =  "SELECT count(*) as count FROM orders, customers where customers.Customer_ID = orders.Order_ID";
                                                $stmt = $db->prepare($num_orders);
                                                //Execute
                                                $stmt->execute();
                                                $num_order_Result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            }catch(PDOException $e){
                                                    echo '{"error": {"text": '.$e->getMessage().'}';}

                                        if (sizeof($num_order_Result)>0) {
                                            for($i=0; $i<sizeof($num_order_Result); $i++) {
                                                $rec_count = $num_order_Result[$i]->count;
                                                }
                                            }


                                             if( isset($_GET{'page'} ) ) {
                                                $page = $_GET{'page'} - 1;
                                                $offset = $rec_limit * $page;
                                             }else {
                                                $page = 0;
                                                $offset = 0;
                                             }
                                            $left_rec = $rec_count - ($page * $rec_limit);
                                            try{
                                                if (isset($_POST['submit_table_search'])) {
                                                    $order_select = "SELECT * FROM orders, order_state, customers where orders.Order_State = Order_state.ID and customers.Customer_ID = orders.Customer_ID and (FName LIKE '%$SearchValue%' OR LName LIKE '%$SearchValue%' OR Email LIKE '%$SearchValue%' OR EmailVerified LIKE '%$SearchValue%' OR Phone LIKE '%$SearchValue%' OR PhoneVerified LIKE '%$SearchValue%' OR ActivationCode LIKE '%$SearchValue%' OR Order_ID LIKE '%$SearchValue%' OR Order_Date LIKE '%$SearchValue%' OR UserDescription LIKE '%$SearchValue%' OR NEGLDescription LIKE '%$SearchValue%')";
                                                }elseif($SelectedGrouping == 'New Orders'){
                                                    $order_select = "SELECT * FROM orders, order_state, customers where orders.Order_state = order_state.ID  and customers.Customer_ID = orders.Customer_ID and (orders.Order_state = '1')";
                                                }elseif($SelectedGrouping == 'Ongoing Orders'){
                                                    $order_select = "SELECT * FROM orders, order_state, customers where orders.Order_state = order_state.ID  and customers.Customer_ID = orders.Customer_ID and (orders.Order_state = '2' OR orders.Order_state = '3' OR orders.Order_state = '3')";
                                                }elseif($SelectedGrouping == 'Completed Orders'){
                                                    $order_select = "SELECT * FROM orders, order_state, customers where orders.Order_state = order_state.ID  and customers.Customer_ID = orders.Customer_ID and (orders.Order_state = '5')";
                                                }elseif($SelectedGrouping == 'Cancelled Orders'){
                                                    $order_select = "SELECT * FROM orders, order_state, customers where orders.Order_state = order_state.ID  and customers.Customer_ID = orders.Customer_ID and (orders.Order_state = '6')";
                                                }
                                                else{
                                                 $order_select = "SELECT * FROM orders, order_state, customers where orders.Order_state = order_state.ID  and customers.Customer_ID = orders.Customer_ID";
                                                }
                                                $stmt = $db->prepare($order_select);
                                                $stmt->execute();
                                                $order_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';}
                                            
                                              
                                              

                                              if ($order_result > 0) {
                                              $Count=0;
                                              echo "<table class=\"table table-hover\">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Order State</th>
                                                        <th>Action</th>

                                                    </tr>";
                                              echo "<div class='row'>";
                                              for($i=0; $i<sizeof($order_result); $i++) {
                                                echo 
                                                    "<tr>
                                                                <td>".$order_result[$i]->Order_ID."</td>
                                                                <td>".$order_result[$i]->FName." ".$order_result[$i]->LName."</td>
                                                                <td>".$order_result[$i]->Email."</td>
                                                                <td>".$order_result[$i]->Phone."</td>
                                                                <td>".$order_result[$i]->UserDescription."</td>
                                                                <td><a href='vieworderdetails.php?id=".$order_result[$i]->Order_ID."'><button class='btn btn-success btn-sm'>View Details</button></a></td>
                                                            </tr>";
                                          
                                            }
                                        } else {
                                            echo "<br><br><br><h4 style='text-align:center;'> No orders found.</h4><br><br><br><br><br><br>";
                                        }
                                        $db = null;
                                        ?>
                                    </table>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                    <?php 

                                        if (!isset($_POST['submit_table_search'])) {

                                         if( $left_rec <= $rec_limit and isset($_GET['page'])) {
                                            $last = $page;
                                                echo "<li><a href = \"products.php?page=$last\">&laquo;</a></li>";
                                             }else if( $page == 0 and $left_rec>$rec_limit) {
                                                $page += 2;
                                                echo "<li><a href = \"products.php?page=$page\">&raquo;</a></li>";
                                             }else if( $page > 0 ) {
                                                $page += 2;
                                                $last = $page - 2;
                                                echo "<li><a href = \"products.php?page=$last\">&laquo;</a></li>";
                                                echo "<li><a href = \"products.php?page=$page\">&raquo;</a></li>";
                                             }
                                         }
                                    ?>
                                    </ul>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">


                            
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
