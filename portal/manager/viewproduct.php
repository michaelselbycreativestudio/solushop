<?php include("../../config/db.php"); ?>
<?php include("session.php"); ?>
<?php 
    if (isset($_GET["ID"])) {
        $PID = $_GET["ID"];
    }else{
        header("Location: products.php");
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

    $db = new db(); //inititate db object
    $db = $db->connect();


    if (isset($_POST["UpdateProductDetails"])) {
        $DisplayLine = $_POST["DisplayLine"];
        $HighlightedFeatures = $_POST["HighlightedFeatures"];
        $MainDescription = $_POST["MainDescription"];
        $Tags = $_POST["Tags"];
        $RP = $_POST["RP"];
        $SP = $_POST["SP"];
        $Stock = $_POST["Stock"];
        $Category = $_POST["Category"];
        $Discount = $_POST["Discount"];


        if (!isset($UpdateProductError)) {
            try{
                $update_products = "UPDATE products SET DisplayLine=:DisplayLine, HighlightedFeatures=:HighlightedFeatures, Tags=:Tags, ProductDescription=:MainDescription, Category=:Category, RP=:RP, SP=:SP, Discount=:Discount, Stock=:Stock WHERE ID=:ID ";
                $stmt = $db->prepare($update_products);
                $stmt->bindParam(':HighlightedFeatures',$HighlightedFeatures);
                $stmt->bindParam(':MainDescription',$MainDescription);
                $stmt->bindParam(':DisplayLine',$DisplayLine);
                $stmt->bindParam(':Tags',$Tags);
                $stmt->bindParam(':RP',$RP);
                $stmt->bindParam(':Category',$Category);
                $stmt->bindParam(':Stock',$Stock);
                $stmt->bindParam(':SP',$SP);
                $stmt->bindParam(':Discount',$Discount);
                $stmt->bindParam(':ID',$PID);
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if ($stmt->execute()) {
                $SuccessMessage = "Product Details Updated Successfully";
            }
        }
    }

    try{ 
        $product_details_query = "SELECT *, products.ProductDescription as MainDescription, product_categories.Description as CategoryDescription FROM products, product_categories, product_pictures WHERE product_pictures.ProductID = products.ID and products.Category = product_categories.CC and PicturePath LIKE '%a%' and products.ID='$PID'";
        $stmt = $db->prepare($product_details_query);
        $stmt->bindParam(':ID',$ID);
        $stmt->execute();
        $product = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
         
    if (sizeof($product) > 0) {
        for($i=0; $i<sizeof($product);$i++){
        $Category = $product[$i]->CC;
        $CategoryString = $product[$i]->CategoryDescription;
        $DisplayLine = $product[$i]->DisplayLine;
        $Supplier_ID = $product[$i]->Supplier_ID;
        $RP = $product[$i]->RP;
        $SP = $product[$i]->SP;
        $Discount = $product[$i]->Discount;
        $Tags = $product[$i]->Tags;
        $Stock = $product[$i]->Stock;
        $SalePrice = $SP - $Discount;
        $Views = $product[$i]->Views;
        $MainDescription =$product[$i]->MainDescription;
        $HighlightedFeaturesString = $product[$i]->HighlightedFeatures;
        $HighlightedFeatures = explode(",", $HighlightedFeaturesString);
        }       
    }else{
        header("Location: 404.php");
        exit();
    }



    //Selection Count or Favorites
    try{
        $select_count_cart = "SELECT count(*) as count FROM cart WHERE Product_ID=:ID";
        $stmt = $db->prepare($select_count_cart); 
        $stmt->bindParam(':ID',$ID);
        $stmt->execute();
        $cart_result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
    
    if (sizeof($cart_result) > 0) {
        for($i=0; $i<sizeof($cart_result);$i++){
            $CartCount = $cart_result[$i]->count;
        }
    }

    //Selecting count favorites
    try{
        $wishlist_count = "SELECT count(*) as count FROM wishlist WHERE Product_ID=:ID";
        $stmt = $db->prepare($wishlist_count);
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();
        $wishlist_result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
    
    if (sizeof($wishlist_result) > 0) {
        for($i=0; $i<sizeof($wishlist_result);$i++){
            $WishlistCount = $wishlist_result[$i]->count;
        }
    }

    //Selecting supplier details
    try{
        $supplier_details = "SELECT * FROM suppliers WHERE ID=:Supplier_ID";
        $stmt = $db->prepare($supplier_details);
        $stmt->bindParam(':Supplier_ID',$Supplier_ID);
        $stmt->execute();
        $sup_details_result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
    
    if (sizeof($sup_details_result) > 0) {
        for($i=0; $i<sizeof($sup_details_result);$i++){
            $Name = $sup_details_result[$i]->Name;
            $Username = $sup_details_result[$i]->Username;
            $Phone = $sup_details_result[$i]->Phone;
            $AltPhone = $sup_details_result[$i]->AltPhone;
            $Email = $sup_details_result[$i]->Email;
        }
    }

    //selecting number of purchases
    //Selecting supplier details
    try{
        $product_purchase_count_query = "SELECT SUM(Quantity) As Purchases FROM order_items WHERE Product_ID='$PID' and (State = '1' OR State = '2' OR State = '3')";
        $stmt = $db->prepare($product_purchase_count_query);
        $stmt->execute();
        $product_purchase_count = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

    

    if (sizeof($product_purchase_count) > 0) {
        $Purchases = $product_purchase_count[0]->Purchases;
    }

    if ($Purchases == NULL) {
        $Purchases = 0;
    }

    //select product categories
    try{
        $product_category_query = "SELECT * FROM product_categories";
        $stmt = $db->prepare($product_category_query);
        $stmt->execute();
        $product_category = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

    
    //process into category strings
    $CategoryCount = 0;
    $ParentCategoryCount = 0;
    for ($i=0; $i < sizeof($product_category); $i++) { 
        if (!($product_category[$i]->Parent == 0)) {
            $Product_Category_String[$CategoryCount] = $product_category[$i]->Description;
            $Product_Category_ID[$CategoryCount] = $product_category[$i]->CC;
            $Product_Category_ParentCC[$CategoryCount] = $product_category[$i]->Parent;
            $CategoryCount++;
        }else{
            $Parent_Category_String[$ParentCategoryCount] = $product_category[$i]->Description;
            $Parent_Category_ID[$ParentCategoryCount] = $product_category[$i]->CC;
            $ParentCategoryCount++;
        }
    }


    for ($i=0; $i < $CategoryCount; $i++) { 
        for ($j=0; $j < $ParentCategoryCount; $j++) { 
           if ($Product_Category_ParentCC[$i] == $Parent_Category_ID[$j]) {
               $Product_Category_String[$i] = $Parent_Category_String[$j] . " > " . $Product_Category_String[$i];
               break;
           }
        }
    }

   



    $db = null;

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
  <title>Solushop - View Product</title>
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
            <li class=" nav-item active"><a href="index.html"><i class="la la-archive"></i><span class="menu-title" data-i18n="nav.dash.main">Products</span></a>
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
                <h3 class="card-title" id="basic-layout-round-controls">View and Edit <?php echo $product[0]->DisplayLine; ?>'s Account Details</h3>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-5">
                <img src='../../assets/img/products/main/<?php echo $PID; ?>a.png' width="100%" height="auto" /><br><br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style='text-align:center; font-size:18px;'>Vendor Details</h3>
                    </div>
                    <div class="card-content">
                        <div id="new-orders" class="media-list position-relative">
                            <div class="table-responsive">
                                <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                    <th style="width:30%" class="border-top-0"></th>
                                    <th style="width:70%" class="border-top-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-truncate"><b>Vendor ID</b></td>
                                        <td class="text-truncate"><?php echo $Supplier_ID; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Username</b></td>
                                        <td class="text-truncate"><?php echo $Username; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Name</b></td>
                                        <td class="text-truncate"><?php echo $Name; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Phone</b></td>
                                        <td class="text-truncate"><?php echo $Phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Alt. Phone</b></td>
                                        <td class="text-truncate"><?php echo $AltPhone; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Email</b></td>
                                        <td class="text-truncate"><?php echo $Email; ?></td>
                                    </tr>

                                    
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title" style='text-align:center; font-size:18px;'>Product Statistics</h3>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                            <tr>
                                <th style='text-align: center;' class="border-top-0">Views</th>
                                <th style='text-align: center;' class="border-top-0">Favorites</th>
                                <th style='text-align: center;' class="border-top-0">In-Carts</th>
                                <th style='text-align: center;' class="border-top-0">Purchases</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style='text-align: center;' class="text-truncate"><?php echo $Views; ?></td>
                                <td style='text-align: center;' class="text-truncate"><?php echo $WishlistCount; ?></td>
                                <td style='text-align: center;' class="text-truncate"><?php echo $CartCount; ?></td>
                                <td style='text-align: center;' class="text-truncate"><?php echo $Purchases; ?></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style='text-align:center; font-size:18px;'>Product Details</h3>
                    </div>
                    <form action="#" method="POST" >
                    <div class="card-content">
                        <div id="new-orders" class="media-list position-relative">
                            <div class="table-responsive">
                                <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                    <th style="width:30%" class="border-top-0"></th>
                                    <th style="width:70%" class="border-top-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-truncate"><b>Product ID</b></td>
                                        <td class="text-truncate"><input id="CustomerIDInput" class="form-control round" placeholder="company name" value="<?php echo $PID; ?>" name="CustomerID" type="text" disabled></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Display Line</b></td>
                                        <td class="text-truncate"><input id="CustomerIDInput" class="form-control round" placeholder="company name" value="<?php echo $DisplayLine; ?>" name="DisplayLine" type="text" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Description</b></td>
                                        <td><textarea style="border-radius: 1.5rem;" name="MainDescription" class="form-control" id="placeTextarea" rows="3" placeholder="Simple Textarea"><?php echo $MainDescription; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Tags</b></td>
                                        <td class="text-truncate"><input id="CustomerIDInput" class="form-control round" placeholder="company name" value="<?php echo $Tags; ?>" name="Tags" type="text" ></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"> <b>Category</b></td>
                                        <td class="text-truncate">
                                            <fieldset class="form-group" >
                                                <select class="form-control" name='Category' id="basicSelect" style='border-radius:20px;' required>
                                                    <?php 
                                                        for ($i=0; $i < $CategoryCount; $i++) { 
                                                            if ($Category != $Product_Category_ID[$i]) {
                                                                echo "<option value='".$Product_Category_ID[$i]."'>".$Product_Category_String[$i]."</option>";
                                                            }else{
                                                                echo "<option value='".$Product_Category_ID[$i]."' selected>".$Product_Category_String[$i]."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </fieldset>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-truncate"><b>Highlighted Features</b></td>
                                        <td><textarea style="border-radius: 1.5rem;" name="HighlightedFeatures" class="form-control" id="placeTextarea" rows="3" placeholder="Simple Textarea" required><?php echo $HighlightedFeaturesString; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Vendor Price</b></td>
                                        <td class="text-truncate"><input id="CustomerIDInput" class="form-control round" placeholder="company name" value="<?php echo $RP; ?>" name="RP" type="text" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Retail Price</b></td>
                                        <td class="text-truncate"><input id="CustomerIDInput" class="form-control round" placeholder="company name" value="<?php echo $SP; ?>" name="SP" type="text" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Discount</b></td>
                                        <td class="text-truncate"><input id="CustomerIDInput" class="form-control round" placeholder="Put 0 for no discount" value="<?php echo $Discount; ?>" name="Discount" type="text" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><b>Stock</b></td>
                                        <td class="text-truncate"><input id="Stock" class="form-control round" placeholder="company name" value="<?php echo $Stock; ?>" name="Stock" type="text" min='0' required></td>
                                    </tr>
                                    
                                </tbody>
                                </table>
                                    <br>
                                    <div class="form-actions" style="text-align:center;">
                                        <button type="button" class="btn btn-danger mr-1">
                                        <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="submit" name="UpdateProductDetails" class="btn btn-success">
                                        <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </br>
                            </div>
                        </div>
                    </div>
                    <form>
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