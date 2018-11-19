<?php include("../../config/db.php"); ?>
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
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Solushop - Manage Orders</title>
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

  
</head>
<body class="horizontal-layout vertical-content-menu vertical-content-menu-padding 2-columns   menu-expanded"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
  <!-- fixed-top-->
  <?php include("header-top.php"); ?>
  <?php 
     //selecting counts from orders.
    //New Orders
    try{
        $db = new db(); //inititate db object
        $db = $db->connect();

        //selecting orders
        $orders1_query = "SELECT count(*) as count FROM orders where Order_State='1'";
        $stmt = $db->prepare($orders1_query);
        //Execute
        $stmt->execute();
        $order1_result = $stmt->fetchAll(PDO::FETCH_OBJ);
        

    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }   

    if (sizeof($order1_result)>0) {
    for($i=0; $i<sizeof($order1_result); $i++) {
        $NewOrders = $order1_result[$i]->count;
        }
    }

    //Ongoing Orders
    try{
        $orders_2_3_4 = "SELECT count(*) as count FROM orders where Order_State='2' OR Order_State='3' OR Order_State='4' ";
        $stmt = $db->prepare($orders_2_3_4);
        $stmt->execute();
        $orders_2_3_4_result= $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
                    
                            
    if (sizeof($orders_2_3_4_result)>0) {
        for($i=0; $i<sizeof($orders_2_3_4_result); $i++) {
        $OngoingOrders = $orders_2_3_4_result[$i]->count;
        }
    }

    //Completed Orders
    try{
        $orders_5 = "SELECT count(*) as count FROM orders where Order_State='5'";
        $stmt = $db->prepare($orders_5);
        $stmt->execute();
        $orders_5_result= $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
    
                            
    if (sizeof($orders_5_result)>0) {
        for($i=0; $i<sizeof($orders_5_result); $i++) {
        $CompletedOrders = $orders_5_result[$i]->count;
        }
    }


    //Cancelled Orders
    try{
        $orders_6 ="SELECT count(*) as count FROM orders where Order_State='6'"; 
        $stmt = $db->prepare($orders_6);
        $stmt->execute();
        $orders_6_result= $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
    }
    
                
                        
    if (sizeof($orders_6_result)>0) {
        for($i=0; $i<sizeof($orders_6_result); $i++) {
        $CancelledOrders = $orders_6_result[$i]->count;
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
        <section id="configuration">
        <h3 class="card-title">Manage Orders</h3>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up bg-info">
                    <a href="orders.php?SelectedGrouping=NewOrders">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                <div class="media-body text-white text-left">
                                    <h3 class="text-white"><?php echo $NewOrders; ?></h3>
                                    <span>New Orders</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-plus text-white font-large-2 float-right"></i>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up bg-warning">
                    <a href="orders.php?SelectedGrouping=OngoingOrders">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                <div class="media-body text-white text-left">
                                    <h3 class="text-white"><?php echo $OngoingOrders; ?></h3>
                                    <span>Ongoing Orders</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-loop text-white font-large-2 float-right"></i>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up bg-success">
                    <a href="orders.php?SelectedGrouping=CompletedOrders">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                <div class="media-body text-white text-left">
                                    <h3 class="text-white"><?php echo $CompletedOrders; ?></h3>
                                    <span>Completed Orders</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-check text-white font-large-2 float-right"></i>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up bg-danger">
                    <a href="orders.php?SelectedGrouping=CancelledOrders">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                <div class="media-body text-white text-left">
                                    <h3 class="text-white"><?php echo $CancelledOrders; ?></h3>
                                    <span>Cancelled Orders</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-close text-white font-large-2 float-right"></i>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
            </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <?php 
                    try{
                        $db = new db(); //inititate db object
                        $db = $db->connect();

                        if($SelectedGrouping == 'New Orders'){
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
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
                ?>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Order State</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            for($i=0; $i<sizeof($order_result); $i++) {
                                echo "
                                    <tr>
                                        <td>".$order_result[$i]->Order_ID."</td>
                                        <td>".$order_result[$i]->FName." ".$order_result[$i]->LName."</td>
                                        <td>".$order_result[$i]->Email."</td>
                                        <td>".$order_result[$i]->Phone."</td>
                                        <td>".$order_result[$i]->UserDescription."</td>
                                        <td><a href='vieworder.php?id=".$order_result[$i]->Order_ID."'><button class='btn btn-info btn-sm round '>View Details</button></a></td>
                                    </tr>
                                    ";
                            }
                        ?>
                        
                      </tbody>
                      <tfoot>
                       
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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