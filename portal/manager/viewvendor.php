<?php include("../../config/db.php"); ?>
<?php include("session.php"); ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Solushop - View Vendor</title>
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
if (isset($_GET["id"])) {
    $SID = $_GET["id"];
}

//writing some functions
//phone number verify
//string verity
function StringVerify($String, $NameOfString){
    //check if string  is empty
    if (trim($String)=="") {
        return "<b>$NameOfString</b> cannot be empty. Please ensure it is filled.";
    }elseif (is_numeric($String)) {
        return "<b>$NameOfString</b> cannot be numeric";
    }else{
        return "good";
    }
}
function PhoneVerify($String, $NameOfString){
    //check if string  is empty
    if (trim($String)=="") {
        return "<b>$NameOfString</b> cannot be empty. Please ensure it is filled.";
    }elseif (!is_numeric($String)) {
        return "<b>$NameOfString</b> must be numeric";
    }elseif(!preg_match("/^[0-9]{12}$/", $String)) {
        return "<b>$NameOfString</b> has an unrecognized format";
    }else{
        return "good";
    }
}
    //updating Supplier details
    if (isset($_POST["UpdateSupplierGeneralDetails"])) {
        //receive and sanitixe strings or post values
        if (StringVerify($_POST["Supplier_Name"], "Supplier Name")!="good") {
             $ErrorMessage = StringVerify($_POST["Supplier_Name"], "Supplier Name");
        }elseif (StringVerify($_POST["Supplier_Email"], "Supplier Email")!="good") {
             $ErrorMessage = StringVerify($_POST["Supplier_Email"], "Supplier Email");
        }elseif (PhoneVerify($_POST["Supplier_Phone"], "Supplier Phone")!="good") {
             $ErrorMessage = PhoneVerify($_POST["Supplier_Phone"], "Supplier Phone");
        }

        if (!isset($ErrorMessage)) {
            //valid inputs confirmed //Receiving Inputs.
            $Supplier_Name = $_POST["Supplier_Name"];
            $Supplier_Email = $_POST["Supplier_Email"];
            $Supplier_Phone = $_POST["Supplier_Phone"];
            $Supplier_Alt_Phone = $_POST["Supplier_Alt_Phone"];
            $Supplier_Username = $_POST["Supplier_Username"];
            $Supplier_Address = $_POST["Supplier_Address"];

            //Process name
            $Supplier_Name_Array = explode(" ", $Supplier_Name);
            $Supplier_Last_Name = $Supplier_Name_Array[sizeof($Supplier_Name_Array)-1];
            $Supplier_First_Name = $Supplier_Name_Array[0];

            //update Supplier details
            try{
                $db = new db(); //inititate db object
                $db = $db->connect();            
                $update_supplier = "UPDATE suppliers SET Name=:Supplier_Name, Username=:Supplier_Username, Email=:Supplier_Email,  Phone=:Supplier_Phone, AltPhone=:Supplier_Alt_Phone, Address=:Supplier_Address where ID=:SID";
                $stmt = $db->prepare($update_supplier);
                $stmt->bindParam(':Supplier_Name',$Supplier_Name);
                $stmt->bindParam(':Supplier_Alt_Phone',$Supplier_Alt_Phone);
                $stmt->bindParam(':Supplier_Email',$Supplier_Email);
                $stmt->bindParam(':Supplier_Phone',$Supplier_Phone);
                $stmt->bindParam(':Supplier_Address',$Supplier_Address);
                $stmt->bindParam(':Supplier_Username',$Supplier_Username);
                $stmt->bindParam(':SID',$SID);
                if ($stmt->execute()) {
                $SuccessMessage = "$Supplier_First_Name's details updated successfully.";
            $db = null;
            }
        }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';}


        }
        

    }
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
            <li class=" nav-item "><a href="customers.php"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">Customers</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="la la-shopping-cart"></i><span class="menu-title" data-i18n="nav.dash.main">Orders</span></a>
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
            <li class=" nav-item active"><a href="index.html"><i class="la la-link"></i><span class="menu-title" data-i18n="nav.dash.main">Vendors</span></a>
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
      <?php 
        try{
            $db = new db(); //inititate db object
            $db = $db->connect();
            $select_suppliers = "SELECT * FROM Suppliers where ID=:SID";
            $stmt = $db->prepare($select_suppliers);
            $stmt->bindParam(':SID',$SID);
            $stmt->execute();
            $sup_result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
        }

        if (sizeof($sup_result) > 0) {
            for($i=0; $i<sizeof($sup_result);$i++){
                $Supplier_ID = $sup_result[$i]->ID;
                $Supplier_Username = $sup_result[$i]->Username;
                $Supplier_Name = $sup_result[$i]->Name;
                $Supplier_Email = $sup_result[$i]->Email;
                $Supplier_Phone = $sup_result[$i]->Phone;
                $Supplier_Alt_Phone = $sup_result[$i]->AltPhone;
                $Supplier_Address = $sup_result[$i]->Address;
                $Supplier_Account_Balance = $sup_result[$i]->AccBal;
            }
        }
            ?>
        <!-- Zero configuration table -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-title" id="basic-layout-round-controls">View and Edit <?php echo $Supplier_Name; ?>'s Account Details</h3>
            </div>
        </div>
        <div class="row">
           
            <div class="col-md-6">
                <div class="card" style="">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" method="POST" action="#">
                                <div class="form-body">
                                    <div class="form-group">
                                    <label for="CustomerIDInput">Vendor Identification Number</label>
                                    <input id="CustomerIDInput" class="form-control round" placeholder="company name" value="<?php echo $Supplier_ID; ?>" name="CustomerID" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                    <label for="CustomerNameInput">Vendor Name</label>
                                    <input id="CustomerNameInput" name="Supplier_Name" class="form-control round" placeholder="company name" value="<?php echo $Supplier_Name; ?>" name="companyname" type="text">
                                    </div>
                                    <div class="form-group">
                                    <label for="CustomerEmailInput">Vendor Username</label>
                                    <input id="CustomerEmailInput" name="Supplier_Username"  class="form-control round" placeholder="company name" value="<?php echo $Supplier_Username; ?>" name="companyname" type="text"> 
                                    </div>
                                    <div class="form-group">
                                    <label for="CustomerEmailInput">Vendor Email</label>
                                    <input id="CustomerEmailInput" name="Supplier_Email"  class="form-control round" placeholder="company name" value="<?php echo $Supplier_Email; ?>" name="companyname" type="text">
                                    </div>
                                    <div class="form-group">
                                    <label for="CustomerPhoneInput">Vendor Phone Number</label>
                                    <input id="CustomerPhoneInput" name="Supplier_Phone"  class="form-control round" placeholder="company name" value="<?php echo $Supplier_Phone; ?>" name="companyname" type="text">
                                    </div>
                                    <div class="form-group">
                                    <label for="CustomerPhoneInput">Vendor Alt. Phone Number</label>
                                    <input id="CustomerPhoneInput" name="Supplier_Alt_Phone"  class="form-control round" placeholder="company name" value="<?php echo $Supplier_Alt_Phone; ?>" name="companyname" type="text">
                                    </div>
                                    <div class="form-group">
                                    <label for="CustomerNameInput">Vendor Address</label>
                                    <input id="CustomerNameInput" name="Supplier_Address" class="form-control round" placeholder="company name" value="<?php echo $Supplier_Address; ?>" name="companyname" type="text">
                                    </div>
                                </div>
                                <div class="form-actions" style="text-align:center;">
                                    <a href="vendors.php">
                                        <button type="button" class="btn btn-danger mr-1">
                                        <i class="ft-x"></i> Cancel
                                        </button>
                                    </a>
                                    <button type="submit" name="UpdateSupplierGeneralDetails" class="btn btn-success">
                                    <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="text-align:center">Account Balance</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <h2 style="text-align:center;">Cash Due : GH¢ <?php echo $Supplier_Account_Balance;?></h2>
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