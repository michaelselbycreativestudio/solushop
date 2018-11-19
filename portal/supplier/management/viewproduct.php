<?php 

include("session.php"); 
    @session_start();
    use \ForceUTF8\Encoding;  // It's namespaced now

    require_once('Encoding.php');  
    function StringValidation($String, $Name){
        preg_replace('/[^A-Za-z0-9\-()<>= "\/]/', '', $String);
        if (trim($String) == "") {
            return "<b>$Name</b> cannot be empty";
        }else{
            return "good";
        }

    }
    if (isset($_GET['id'])) {
          $ID = $_GET['id'];
          
    try{
         $db = new db(); //inititate db object
         $db = $db->connect();
          $select_brands = "SELECT *, brands.Description as BrandDescription, products.ProductDescription as MainDescription FROM products, product_categories, product_pictures, brands where products.Brand = brands.ID and product_pictures.ProductID = products.ID and products.Category = product_categories.CategoryCode and PicturePath LIKE '%a%' and products.ID=:ID";
          $stmt = $db->prepare($select_brands);
          $stmt->bindParam(':ID',$ID);
          $stmt->execute();
          $brands_result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
        if (sizeof($brands_result) > 0) {
            for($i=0; $i<sizeof($brands_result);$i++){
                $CategoryCode = $brands_result[$i]->CategoryCode;
                $CategoryString = $brands_result[$i]->CategoryDescription;
                $Category = explode(">", $CategoryString);
                $DisplayLine = $brands_result[$i]->DisplayLine;
                $Supplier_ID = $brands_result[$i]->Supplier_ID;
                $RP = $brands_result[$i]->RP;
                $SP = $brands_result[$i]->SP;
                $DisplayPicture = $brands_result[$i]->DisplayPicture;
                $Discount = $brands_result[$i]->Discount;
                $DiscountPrice = $Discount/100 * $SP;
                $SalePrice = $SP - $Discount/100 * $SP;
                $Brand = $brands_result[$i]->Brand;
                $Views = $brands_result[$i]->Views;
                $IntroductoryDescription =$brands_result[$i]->ProductIntroductoryLine;
                $MainDescription =$brands_result[$i]->MainDescription;
                $BrandDescription = $brands_result[$i]->BrandDescription;
                $HighlightedFeaturesString = $brands_result[$i]->HighlightedFeatures;
                $HighlightedFeatures = explode(",", $HighlightedFeaturesString);

                /*
                    Selecting product display layout
                    1 for Computers (Laptops and Desktops)
                    2 for Mobile Phones and Tablets
                    0 for Other Products
                */

                $ProductDisplayLayout = $brands_result[$i]->ProductSpecification;
              
            }
        }else{
            header("Location: 404.php");
            exit();
        }



        //Selection Count or Favorites
        try{
        $select_fav = "SELECT count(*) as count FROM cart WHERE Product_ID=:ID";
        $stmt = $db->prepare($select_fav);
        $stmt->bindParam(':ID',$ID);
        $stmt->execute();
        $fav_result = $stmt->fetchAll(PDO::FETCH_OBJ);    
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}

        if (sizeof($fav_result) > 0) {
            for($i=0; $i<sizeof($fav_result);$i++){
                $CartCount = $fav_result[$i]->count;
            }
        }

        //Selecting count favorites
        try{
                $select_wishlist = "SELECT count(*) as count FROM wishlist WHERE Product_ID=:ID";
                $stmt = $db->prepare($select_wishlist);
                $stmt->bindParam(':ID',$ID);
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
            $select_suppliers = "SELECT * FROM suppliers WHERE ID=:Supplier_ID";
            $stmt = $db->prepare($select_suppliers);
            $stmt->bindParam(':Supplier_ID',$Supplier_ID);
            $stmt->execute();
            $suppliers_result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
             }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';}
                      
            if (sizeof($suppliers_result) > 0) {
                for($i=0; $i<sizeof($suppliers_result);$i++){
                $Name = $suppliers_result[$i]->Name;
                $Username = $suppliers_result[$i]->Username;
                $Phone = $suppliers_result[$i]->Phone;
                $AltPhone = $suppliers_result[$i]->AltPhone;
                $Email = $suppliers_result[$i]->Email;
                $Name = $suppliers_result[$i]->Name;
            }
        }
    }else{
        header("Location: 404.php");
        exit();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Product Details</title>
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
                        Product Details
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <?php 
                                 if (isset($UpdateProductError)) {
                             echo 
                            "<div class=\"alert alert-danger alert-dismissable\">
                                <i class=\"fa fa-ban\"></i>
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                $UpdateProductError
                            </div>";
                        }
                        elseif (isset($UpdateProductSuccess)) {
                            echo 
                            "<div class='alert alert-success alert-dismissable'>
                                <i class='fa fa-check'></i>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                $UpdateProductSuccess
                            </div>";
                        }
                            ?>
                            <!-- Info box -->
                            <div style="text-align: center;">
                                <?php 
                                    echo "<img src='../../assets/images/products/Main/".$ID."a.png' />";
                                  ?>
                            </div>
                            <?php
                            
                        
                            $db = new db(); //inititate db object
                            $db = $db->connect();
                            //Product Technical Specifications
                            if ($ProductDisplayLayout == 1) {
                                //Product is a computer (Laptop or Desktop)
                              try{  
                                     $select_pc = "SELECT * from computer_specifications WHERE Product_ID=:ID";
                                     $stmt = $db->prepare($select_pc);
                                     $stmt->bindParam(':ID',$ID);
                                     $stmt->execute();
                                     $pc_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                }catch(PDOException $e){
                                    echo '{"error": {"text": '.$e->getMessage().'}';}
                               
                                    if (sizeof($pc_result) > 0) {
                                        for($i=0; $i<sizeof($pc_result);$i++){
                                        $ScreenSize = $pc_result[$i]->ScreenSize;
                                        $OS = $pc_result[$i]->OS;
                                        $RAM = $pc_result[$i]->RAM;
                                        $ProcessorType = $pc_result[$i]->ProcessorType;
                                        $ProcessorSpeed = $pc_result[$i]->ProcessorSpeed;
                                        $DisplayPort = $pc_result[$i]->DisplayPort;
                                        $Generation = $pc_result[$i]->Generation;
                                        $HardDiskType = $pc_result[$i]->HardDiskType;
                                        $HardDiskSize = $pc_result[$i]->HardDiskSize;
                                        $BatteryLifeSpan = $pc_result[$i]->BatteryLifeSpan;

                                    }
                                }else{
                                    $ScreenSize = "";
                                    $OS = "";
                                    $RAM = "";
                                    $ProcessorType = "";
                                    $ProcessorSpeed = "";
                                    $DisplayPort = "";
                                    $Generation = "";
                                    $HardDiskType = "";
                                    $HardDiskSize = "";
                                    $BatteryLifeSpan = "";
                                }
                                echo "
                                <form action='#' method='POST'>
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\">Product Technical Specifications</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">Screen Size</td>
                                                <td><input name='ScreenSize' class=\"form-control input-sm\" type=\"text\" value=\"$ScreenSize\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Pre-Installed Operating System</td>
                                                <td><input name='OS' class=\"form-control input-sm\" type=\"text\" value=\"$OS\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">RAM</td>
                                                <td><input name='RAM' class=\"form-control input-sm\" type=\"text\" value=\"$RAM\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Processor Type</td>
                                                <td><input name='ProcessorType' class=\"form-control input-sm\" type=\"text\" value=\"$ProcessorType\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Port</td>
                                                <td><input name='ProcessorSpeed' class=\"form-control input-sm\" type=\"text\" value=\"$ProcessorSpeed\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Generation</td>
                                                <td><input name='DisplayPort' class=\"form-control input-sm\" type=\"text\" value=\"$DisplayPort\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Hard Disk Type</td>
                                                <td><input name='Generation' class=\"form-control input-sm\" type=\"text\" value=\"$Generation\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Hard Disk Size</td>
                                                <td><input name='HardDiskType' class=\"form-control input-sm\" type=\"text\" value=\"$HardDiskType\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Battery LifeSpan</td>
                                                <td><input name='HardDiskSize' class=\"form-control input-sm\" type=\"text\" value=\"$HardDiskSize\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Screen Size</td>
                                                <td><input name='BatteryLifeSpan' class=\"form-control input-sm\" type=\"text\" value=\"$BatteryLifeSpan\" disabled></td>
                                            </tr>
                                        </table>
                                        </form>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->";
                            }elseif ($ProductDisplayLayout == 2) {
                            try{
                                $select_fon = "SELECT * from phone_specifications WHERE Product_ID=:ID";
                                $stmt = $db->prepare($select_fon);
                                $stmt->bindParam(':ID',$ID);
                                $stmt->execute();
                                $fon_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                            }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';}

                                if (sizeof($fon_result) > 0) {
                                    for($i=0; $i<sizeof($fon_result);$i++){
                                        $Technology = $fon_result[$i]->Technology;
                                        $Announced = $fon_result[$i]->Announced;
                                        $Status = $fon_result[$i]->Status;
                                        $Dimensions = $fon_result[$i]->Dimensions;
                                        $Weight = $fon_result[$i]->Weight;
                                        $SIM = $fon_result[$i]->SIM;
                                        $Type = $fon_result[$i]->Type;
                                        $Size = $fon_result[$i]->Size;
                                        $Resolution = $fon_result[$i]->Resolution;
                                        $Multitouch = $fon_result[$i]->Multitouch;
                                        $Protection = $fon_result[$i]->Protection;
                                        $OS = $fon_result[$i]->OS;
                                        $Chipset = $fon_result[$i]->Chipset;
                                        $CPU = $fon_result[$i]->CPU;
                                        $GPU = $fon_result[$i]->GPU;
                                        $CardSlot = $fon_result[$i]->CardSlot;
                                        $Internal = $fon_result[$i]->Internal;
                                        $Primary = $fon_result[$i]->PrimaryCamera;
                                        $Features = str_replace("\"", "", $fon_result[$i]->Features);
                                        $Video = $fon_result[$i]->Video;
                                        $Secondary = $fon_result[$i]->Secondary;
                                        $AlertTypes = $fon_result[$i]->AlertTypes;
                                        $LoudSpeaker = $fon_result[$i]->LoudSpeaker;
                                        $Jack = $fon_result[$i]->Jack;
                                        $WLAN = $fon_result[$i]->WLAN;
                                        $Bluetooth = $fon_result[$i]->Bluetooth;
                                        $GPS = $fon_result[$i]->GPS;
                                        $NFS = $fon_result[$i]->NFS;
                                        $Radio = $fon_result[$i]->Radio;
                                        $USB = $fon_result[$i]->USB;
                                        $Sensors = $fon_result[$i]->Sensors;
                                        $Messaging = $fon_result[$i]->Messaging;
                                        $Browser = $fon_result[$i]->Browser;
                                        $Java = $fon_result[$i]->Java;
                                        $Battery = $fon_result[$i]->Battery;
                                    }
                                }else{
                                    //means the specifications have not yet been set
                                        $Technology = "";
                                        $Announced = "";
                                        $Status = "";
                                        $Dimensions = "";
                                        $Weight = "";
                                        $SIM = "";
                                        $Type = "";
                                        $Size = "";
                                        $Resolution = "";
                                        $Multitouch = "";
                                        $Protection = "";
                                        $OS = "";
                                        $Chipset = "";
                                        $CPU = "";
                                        $GPU = "";
                                        $CardSlot = "";
                                        $Internal = "";
                                        $Primary = "";
                                        $Features = "";
                                        $Video = "";
                                        $Secondary = "";
                                        $AlertTypes = "";
                                        $LoudSpeaker = "";
                                        $Jack = "";
                                        $WLAN = "";
                                        $Bluetooth = "";
                                        $GPS = "";
                                        $NFS = "";
                                        $Radio = "";
                                        $USB = "";
                                        $Sensors = "";
                                        $Messaging = "";
                                        $Browser = "";
                                        $Java = "";
                                        $Battery = "";
                                }
                                echo "
                                <form action='#' method='POST'>
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\">Product Technical Specifications</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                           
                                            <tr>
                                                <td width=\"30%\">SIM Technology</td>
                                                <td><input name='Technology' class=\"form-control input-sm\" type=\"text\" value=\"$Technology\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Announced</td>
                                                <td><input name='Announced' class=\"form-control input-sm\" type=\"text\" value=\"$Announced\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Status</td>
                                                <td><input name='Status' class=\"form-control input-sm\" type=\"text\" value=\"$Status\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Dimensions</td>
                                                <td><input name='Dimensions' class=\"form-control input-sm\" type=\"text\" value=\"$Dimensions\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Weight</td>
                                                <td><input name='Weight' class=\"form-control input-sm\" type=\"text\" value=\"$Weight\" disabled></td>
                                            </tr><tr>
                                                <td width=\"30%\">SIM Size</td>
                                                <td><input name='SIM' class=\"form-control input-sm\" type=\"text\" value=\"$SIM\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Type</td>
                                                <td><input name='Type' class=\"form-control input-sm\" type=\"text\" value=\"$Type\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Screen Size</td>
                                                <td><input name='Size' class=\"form-control input-sm\" type=\"text\" value=\"$Size\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Resolution</td>
                                                <td><input name='Resolution' class=\"form-control input-sm\" type=\"text\" value=\"$Resolution\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Multitouch</td>
                                                <td><input name='Multitouch' class=\"form-control input-sm\" type=\"text\" value=\"$Multitouch\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Protection</td>
                                                <td><input name='Protection' class=\"form-control input-sm\" type=\"text\" value=\"$Protection\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">OS</td>
                                                <td><input name='OS' class=\"form-control input-sm\" type=\"text\" value=\"$OS\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Protection</td>
                                                <td><input name='Chipset' class=\"form-control input-sm\" type=\"text\" value=\"$Protection\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">CPU</td>
                                                <td><input name='CPU' class=\"form-control input-sm\" type=\"text\" value=\"$CPU\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">GPU</td>
                                                <td><input name='GPU' class=\"form-control input-sm\" type=\"text\" value=\"$GPU\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Memory Card Slot</td>
                                                <td><input name='CardSlot' class=\"form-control input-sm\" type=\"text\" value=\"$CardSlot\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Internal Memory</td>
                                                <td><input name='Internal' class=\"form-control input-sm\" type=\"text\" value=\"$Internal\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Primary Camera</td>
                                                <td><input name='Primary' class=\"form-control input-sm\" type=\"text\" value=\"$Primary\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Features</td>
                                                <td><input name='Features' class=\"form-control input-sm\" type=\"text\" value=\"$Features\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Video </td>
                                                <td><input name='Video' class=\"form-control input-sm\" type=\"text\" value=\"$Video \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Secondary Camera</td>
                                                <td><input name='Secondary' class=\"form-control input-sm\" type=\"text\" value=\"$Secondary \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Alert Types </td>
                                                <td><input name='AlertTypes' class=\"form-control input-sm\" type=\"text\" value=\"$AlertTypes \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">LoudSpeaker </td>
                                                <td><input name='LoudSpeaker' class=\"form-control input-sm\" type=\"text\" value=\"$LoudSpeaker \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Jack</td>
                                                <td><input name='Jack' class=\"form-control input-sm\" type=\"text\" value=\"$Jack\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">WLAN</td>
                                                <td><input name='WLAN' class=\"form-control input-sm\" type=\"text\" value=\"$WLAN\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Bluetooth </td>
                                                <td><input name='Bluetooth' class=\"form-control input-sm\" type=\"text\" value=\"$Bluetooth \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">GPS</td>
                                                <td><input name='GPS' class=\"form-control input-sm\" type=\"text\" value=\"$GPS\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">NFS </td>
                                                <td><input name='NFS' class=\"form-control input-sm\" type=\"text\" value=\"$NFS \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Radio</td>
                                                <td><input name='Radio' class=\"form-control input-sm\" type=\"text\" value=\"$Radio\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">USB</td>
                                                <td><input name='USB' class=\"form-control input-sm\" type=\"text\" value=\"$USB\" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Sensors </td>
                                                <td><input name='Sensors' class=\"form-control input-sm\" type=\"text\" value=\"$Sensors \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Messaging </td>
                                                <td><input name='Messaging' class=\"form-control input-sm\" type=\"text\" value=\"$Messaging \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Browser </td>
                                                <td><input name='Browser' class=\"form-control input-sm\" type=\"text\" value=\"$Browser \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Java e</td>
                                                <td><input name='Java' class=\"form-control input-sm\" type=\"text\" value=\"$Java \" disabled></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Battery</td>
                                                <td><input name='Battery' class=\"form-control input-sm\" type=\"text\" value=\"$Battery\" disabled></td>
                                            </tr>
                                            </form>
                                            </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->";
                            }

                                   $db = null;
                            ?>
                             
                             
                            
                               
                            
                             <div id="" class="box box-solid box-info" >
                                <div class="box-header">
                                    <h3 class="box-title" style="text-align: center;">Product Reviews</h3>
                                </div><!-- /.box-header -->
                                <?php 
                                try{
                                    $db = new db(); //inititate db object
                                    $db = $db->connect();                                    
                                    $select_reviews = "SELECT * from product_reviews, customers where product_reviews.User_ID = customers.Customer_ID and Product_ID=:ID";
                                    $stmt = $db->prepare($select_reviews);
                                    $stmt->bindParam(':ID',$ID);
                                    $stmt->execute();
                                    $review_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    $db = null;
                                }catch(PDOException $e){
                                    echo '{"error": {"text": '.$e->getMessage().'}';} 
                                        
                                    if (sizeof($review_result) > 0) {
                                                echo "
                                                    <div class=\"box-body table-responsive no-padding\">
                                                        <table class=\"table \">
                                                            <tr>
                                                                <th width=\"20%\">Customer</th>
                                                                <th width=\"15%\">Product Rating</th>
                                                                <th>Comment</th>
                                                            </tr>";
                                            for($i=0; $i<sizeof($review_result);$i++){
                                                    echo "<tr>
                                                            <td width=\"20%\">".$review_result[$i]->FName." ".$review_result[$i]->LName."</td>
                                                            <td width=\"15%\">".$review_result[$i]->Review." Star</td>
                                                            <td>".$review_result[$i]->Comments."</td>
                                                        </tr>";
                                                }
                                            echo "</table></div>";
                                            }else{
                                               echo "<br><h5 style='text-align:center;'>No product reviews for this product yet.</h5><br>";
                                            }
                                            
                                    ?>
                            </div><!-- /.box -->
                            

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">
                        <div class="box box-solid box-info" >
                                <div class="box-header">
                                    <h3 class="box-title" style="text-align: center;">Product Statistics</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th width="25%">Views</th>
                                            <th width="25%">Favorites</th>
                                            <th width="25%">In-Carts</th>
                                            <th width="25%">Purchases</th>
                                        </tr>
                                        <tr>
                                            <td width="25%"><?php echo $Views; ?></td>
                                            <td width="25%"><?php echo $WishlistCount; ?></td>
                                            <td width="25%"><?php echo $CartCount; ?></td>
                                            <td width="25%">0</td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                            <div class="box box-primary box-info">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $DisplayLine; ?></h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <td width="30%">Product ID</td>
                                            <td><?php echo $ID; ?></td>
                                    
                                        </tr>
                                        <tr>
                                            <td width="30%">Main Category</td>
                                            <td><?php echo $Category[0]; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Sub Categories</td>
                                            <td><?php echo $Category[1]; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Retail Price</td>
                                            <td><?php echo "&#8373; ".$RP; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Selling Price</td>
                                            <td><?php echo "&#8373; ".$SP; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Discount</td>
                                            <td><?php echo "&#8373; ".($SP*$Discount/100)."  (".$Discount."% of "."&#8373; ".$SP.")"; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Discounted Price</td>
                                            <td><?php echo "&#8373; ".($SP-($SP*$Discount/100)); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Product Rating</td>
                                            <td>
                                                <?php 
                                                try{
                                                    $db = new db(); //inititate db object
                                                    $db = $db->connect();
                                                    $select_product_reviews = "SELECT * from product_reviews where Product_ID=:ID";
                                                    $stmt = $db->prepare($select_product_reviews);
                                                    $stmt->bindParam(':ID',$ID);
                                                    $stmt->execute();
                                                    $pro_reviews_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                    $db = null;
                                                }catch(PDOException $e){
                                                    echo '{"error": {"text": '.$e->getMessage().'}';}
                                                    if (sizeof($pro_reviews_result) > 0) {
                                                        $Rating1 = 0;
                                                        $Rating2 = 0;
                                                        $Rating3 = 0;
                                                        $Rating4 = 0;
                                                        $Rating5 = 0;
                                                        $RatingCumulative = 0;
                                                        $TotalCount = 0;
                                                        for($i=0; $i<sizeof($pro_reviews_result);$i++){
                                                                switch ($pro_reviews_result[$i]->Review) {
                                                                    case '1':
                                                                        $Rating1++;
                                                                        $RatingCumulative += $pro_reviews_result[$i]->Review;
                                                                        $TotalCount++;
                                                                        break;
                                                                    case '2':
                                                                        $Rating2++;
                                                                        $RatingCumulative += $pro_reviews_result[$i]->Review;
                                                                        $TotalCount++;
                                                                        break;
                                                                    case '3':
                                                                        $Rating3++;
                                                                        $RatingCumulative += $pro_reviews_result[$i]->Review;
                                                                        $TotalCount++;
                                                                        break;
                                                                    case '4':
                                                                        $Rating4++;
                                                                        $RatingCumulative += $pro_reviews_result[$i]->Review;
                                                                        $TotalCount++;
                                                                        break;
                                                                    case '5':
                                                                        $Rating5++;
                                                                        $RatingCumulative += $pro_reviews_result[$i]->Review;
                                                                        $TotalCount++;
                                                                        break;
                                                                    
                                                                    default:
                                                                        # code...
                                                                        break;
                                                                }
                                                            }
                                                        }else{
                                                            $Rating1 = 0;
                                                            $Rating2 = 0;
                                                            $Rating3 = 0;
                                                            $Rating4 = 0;
                                                            $Rating5 = 0;
                                                            $RatingCumulative = 0;
                                                            $TotalCount = 0;
                                                        }

                                                        if ($TotalCount > 0) {
                                                            echo "<div class=\"woocommerce-product-rating\" itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\">
                                                                <div class=\"star-rating\" title=\"Rated ".$RatingCumulative/$TotalCount." out of 5\">
                                                                    <span style=\"width:".($RatingCumulative*20)/$TotalCount."%\"><strong itemprop=\"ratingValue\" class=\"rating\">".$RatingCumulative/$TotalCount."</strong> out of<span itemprop=\"bestRating\"> 5</span>
                                                                </div>
                                                                <a href=\"#reviews\" class=\"woocommerce-review-link\" rel=\"nofollow\">(<span itemprop=\"reviewCount\" class=\"count\">".$TotalCount."</span> customer review";
                                                                if ($TotalCount > 1) {
                                                                    echo "s";
                                                                }
                                                                echo ")</a>
                                                            </div>";
                                                        }
                                                        else{
                                                            echo "No ratings yet";
                                                        }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                    </p>
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
