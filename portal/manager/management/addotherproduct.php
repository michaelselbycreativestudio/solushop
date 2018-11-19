<?php include("session.php"); ?>
<?php 
    function NumberValidation($Number, $Name){
        if (trim($Number) == "0") {
            return "<b>$Name</b> cannot be 0";
        }elseif (!is_numeric($Number)) {
            return "<b>$Name</b> must be a number";
        }else{
            return "good";
        }

    }

    function StringValidation($String, $Name){
        if (trim($String) == "") {
            return "<b>$Name</b> cannot be empty";
        }else{
            return "good";
        }

    }

    //checking if submit button is hit
    if (isset($_POST["AddComputer"])) {
        //testing if file is actually uploaded
        /*
            var_dump($_FILES["image"]);
            exit();
        */
        //photo validation
        //validate format, size, and dimensions
        
        for ($i=0; $i < count($_FILES["image"]["name"]); $i++) {
            //validating format
            if ($_FILES["image"]["type"][$i]!="image/png") {
                $UploadProductError = "<b>".$_FILES["image"]["name"][$i]."</b> is not a PNG file. Please check and retry the upload.";
                break;
            }
            //validating size
            elseif ($_FILES["image"]["size"][$i]>500000) {
                $UploadProductError = "<b>".$_FILES["image"]["name"][$i]."</b> is too big for the upload. Please check and retry the upload.";
                break;
            }
            //validating the dimensions
            list($width, $height) = getimagesize($_FILES["image"]["tmp_name"][$i]);
            if ($width != $height or $height!= 600) {
                $UploadProductError = "<b>".$_FILES["image"]["name"][$i]."</b> has dimensions <b>$width x $height</b>. Correct dimensions for upload is <b>600 x 600</b>";
                break;
            }
        }
        
        $DisplayLine =$_POST["DisplayLine"];
        $SupplierPrice =$_POST["SupplierPrice"];
        $SellingPrice =$_POST["SellingPrice"];
        $Discount =$_POST["Discount"];
        $Stock =$_POST["Stock"];
        $IntroductoryLine =$_POST["IntroductoryLine"];
        $HighlightedFeatures =$_POST["HighlightedFeatures"];
        $Description =$_POST["Description"];
        $Tags =$_POST["Tags"];
        $Category =$_POST["Category"];
        $SupplierID =$_POST["SupplierID"];
        $BrandID =$_POST["BrandID"];
        $Accessories = $_POST["Accessories"];

        
        //validating accessories
        if ($Accessories[0]=="0") {
                 $UpdateProductError = "No Accessories selected for adding";
             }
             try{
                $db = new db(); //inititate db object
                $db = $db->connect();
                $insert_prod_accessories = "INSERT INTO `product_accessories` (`Product_ID`, `Accessory_ID`) VALUES (:ID, :CA)";
                $stmt = $db->prepare($insert_prod_accessories);
                $stmt->bindParam(':ID', $ID);
                $stmt->bindParam(':CA', $CA);
                if (!isset($UpdateProductError)) {
                    for ($i=0; $i < sizeof($Accessories); $i++) { 
                       $CA = $Accessories[$i]; 
                       $stmt->execute();
                   }
                   $UpdateProductSuccess = "Accessory added successfully";
                }
               }catch(PDOException $e){
                   echo '{"error": {"text": '.$e->getMessage().'}';}

        //other form data validation
        if (StringValidation($DisplayLine, "Display line") != "good") {
            $UploadProductError = StringValidation($DisplayLine, "Display Line");
        }elseif(NumberValidation($SupplierPrice, "Supplier price") != "good"){
            $UploadProductError = NumberValidation($SupplierPrice, "Supplier price");
        }elseif(NumberValidation($SellingPrice, "Selling price") != "good"){
            $UploadProductError = NumberValidation($SellingPrice, "Selling price");
        }elseif(NumberValidation($Stock, "Initial Stock") != "good"){
            $UploadProductError = NumberValidation($Stock, "Initial Stock");
        }elseif(StringValidation($HighlightedFeatures, "Product Highlighted Features") != "good"){
            $UploadProductError = StringValidation($HighlightedFeatures, "Product Highlighted Features");
        }elseif(StringValidation($Discount, "Discount") != "good"){
            $UploadProductError = StringValidation($Discount, "Discount");
        }elseif(StringValidation($IntroductoryLine, "Product Introductory Line") != "good"){
            $UploadProductError = StringValidation($IntroductoryLine, "Product Introductory Line");
        }elseif(StringValidation($Description, "Product description") != "good"){
            $UploadProductError = StringValidation($Description, "Product description");
        }elseif(StringValidation($Tags, "Product tags") != "good"){
            $UploadProductError = StringValidation($Tags, "Product tags");
        }

        //validate for user adding phone or computer
        if ($Category == '1.1'){
            $UploadProductError = "You cannot add a phone from here. Please use the <a href='addphone.php'>Add Phone or Tablet</a> page to do this.";
        }elseif ($Category == '1.2') {
            $UploadProductError = "You cannot add a tablet from here. Please use the <a href='addphone.php'>Add Phone or Tablet</a> page to do this.";
        }elseif ($Category == '3.1') {
            $UploadProductError = "You cannot add a desktop from here. Please use the <a href='addcomputer.php'>Add Computer</a> page to do this.";
        }elseif ($Category == '3.2') {
            $UploadProductError = "You cannot add a laptop from here. Please use the <a href='addcomputer.php'>Add Computer</a> page to do this.";
        }

        //if error is not set, process output starting with the image
        if (!isset($UploadProductError)) {
            //generating product ID
            //selecting current product count
            try{
                $product_id_count = "SELECT ProdIDCount from count";
                $stmt = $db->prepare($product_id_count);
                $stmt->execute();
                $product_id_result = $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
                       echo '{"error": {"text": '.$e->getMessage().'}';}
         
        if (sizeof($product_id_result)>0) {
        for($i=0; $i<sizeof($product_id_result); $i++) {
            $ProductID = $product_id_result[$i]->ProdIDCount + 1;
            }
        }

            //letter and images
            $letter[0] = 'a';
            $letter[1] = 'b';
            $letter[2] = 'c';
            $letter[3] = 'd';
            $letter[4] = 'e';
            $letter[5] = 'f';
            $letter[6] = 'g';
            $letter[7] = 'h';
            $letter[8] = 'i';
            $letter[9] = 'j';

            
            //processing images
            $i = 0;
            while($i<count($_FILES["image"]["name"])) {
                //moving file to a visible folder
                $UploadPath = "../../assets/images/products/";
                $MainImagePath = $UploadPath."main/".$ProductID.$letter[$i].".png";
                $ThumbnailImagePath = $UploadPath."thumbnails/".$ProductID.$letter[$i].".png";

                move_uploaded_file($_FILES["image"]["tmp_name"][$i], $MainImagePath);
                
                //creating an object from the image for manipulation purposes.
                $srcimg = imagecreatefrompng($MainImagePath);
                list($width, $height) = getimagesize($MainImagePath);

                //creating thumbnail
                $newWidth = 150;
                $newHeight = ($height/$width) * $newWidth;

                $tmp = imagecreatetruecolor($newWidth, $newHeight);
                imagefilledrectangle($tmp, 0, 0, $newWidth, $newHeight, imagecolorallocate($tmp, 255, 255, 255));
                imagecopyresampled($tmp, $srcimg, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

               imagepng($tmp, $ThumbnailImagePath, 9);

               //inserting images into product_images table
               try{
                $insert_product_picture = "INSERT INTO `product_pictures` (`ProductID`, `PicturePath`) VALUES (:ProductID, '".$ProductID.$letter[$i]."')";
                $stmt = $db->prepare($insert_product_picture);
                $stmt->bindParam(':ProductID', $ProductID);
                $stmt->execute();
           }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';}
       

                //destroying in memory files
                imagedestroy($tmp);
                imagedestroy($srcimg);
                $i++;
            }

            
            //processing other form data
                //inserting into products table
                try{
                    $insert_product = "INSERT INTO `products` (`ID`, `Category`, `DisplayLine`, `HighlightedFeatures`, `RP`, `SP`, `DisplayPicture`, `Discount`, `Stock`, `Supplier_ID`, `Rating`, `Brand`, `Views`, `Tags`, `ProductIntroductoryLine`, `ProductDescription`, `ProductSpecification`) VALUES (:ProductID, :Category, :DisplayLine, :HighlightedFeatures, :SupplierPrice, :SellingPrice, :ProductID, :Discount, :Stock, :SupplierID, '0', :BrandID, '0', :Tags', :IntroductoryLine, :Description, '1')";
                    $stmt = $db->prepare($insert_product);
                    $stmt->bindParam(':ProductID', $ProductID);
                    $stmt->bindParam(':Category', $Category);
                    $stmt->bindParam(':DisplayLine', $DisplayLine);
                    $stmt->bindParam(':HighlightedFeatures', $HighlightedFeatures);
                    $stmt->bindParam(':SupplierPrice', $SupplierPrice);
                    $stmt->bindParam(':SellingPrice', $SellingPrice);
                    $stmt->bindParam(':Discount', $Discount);
                    $stmt->bindParam(':Stock', $Stock);
                    $stmt->bindParam(':SupplierID', $SupplierID);
                    $stmt->bindParam(':BrandID', $BrandID);
                    $stmt->bindParam(':Tags', $Tags);
                    $stmt->bindParam(':IntroductoryLine', $IntroductoryLine);
                    $stmt->bindParam(':Description', $Description);

                    $stmt->execute();

            }catch(PDOException $e){
                            echo '{"error": {"text": '.$e->getMessage().'}';}
                //inserting into product accessories
                for ($i=0; $i < sizeof($Accessories); $i++) { 
                    $CA = $Accessories[$i]; 
                    try{
                        $insert_prod_accessories = "INSERT INTO `product_accessories` (`Product_ID`, `Accessory_ID`) VALUES (:ProductID, :CA)";
                        $stmt = $db->prepare($insert_prod_accessories);
                        $stmt->bindParam(':ProductID', $ProductID);
                        $stmt->bindParam(':CA', $CA);
                        $stmt->execute();
                                         
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';}
                }
            
            //updating current product count
            try{
                $update = "UPDATE count SET ProdIDCount= :ProductID";
                $stmt = $db->prepare($update);
                $stmt->bindParam(':ProductID', $ProductID);
                 $stmt->execute();
                                 
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';}
            
            $UploadProductSuccess = "Product Added Successfully";
        $db = null;
        }
        
        

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Add Other Product</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../../assets/management/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href=../../assets/management/"css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
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
                        Add Other Product
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Other Product</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                        <form method="POST" action="#" enctype="multipart/form-data" >
                        
                        <?php 
                        if (isset($UploadProductError)) {
                             echo 
                            "<div class=\"alert alert-danger alert-dismissable\">
                                <i class=\"fa fa-ban\"></i>
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                $UploadProductError
                            </div>";
                        }
                        elseif (isset($UploadProductSuccess)) {
                            echo 
                            "<div class='alert alert-success alert-dismissable'>
                                <i class='fa fa-check'></i>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                $UploadProductSuccess
                            </div>";
                        }

                        
                        
                            if (!isset($DisplayLine)) {
                                $DisplayLine = "";
                            }
                            if (!isset($SupplierPrice)) {
                                $SupplierPrice = "0";
                            }
                            if (!isset($SellingPrice)) {
                                $SellingPrice = "0";
                            }
                            if (!isset($Discount)) {
                                $Discount = "0";
                            }
                            if (!isset($Stock)) {
                                $Stock = "0";
                            }
                            if (!isset($IntroductoryLine)) {
                                $IntroductoryLine = "";
                            }
                            if (!isset($HighlightedFeatures)) {
                                $HighlightedFeatures = "";
                            }
                            if (!isset($Description)) {
                                $Description = "";
                            }
                            if (!isset($Tags)) {
                                $Tags = "";
                            }
                            //General Product Details

                            echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> General Product Details</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">Display Line</td>
                                                <td><input placeholder='32 GB Pen-drive' class=\"form-control input-sm\" name = 'DisplayLine' type=\"text\" value=\"$DisplayLine\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Brand</td>
                                                <td><select name = 'BrandID' class=\"form-control\">";
                                                try{
                                                    $db = new db(); //inititate db object
                                                    $db = $db->connect();
                                                    $select_brands =  $SQL = "SELECT * from brands";
                                                    $stmt = $db->prepare($select_brands);
                                                    $stmt->execute();
                                                    $brands_resutlt =   $stmt->fetchAll(PDO::FETCH_OBJ);               
                                                 }catch(PDOException $e){
                                                    echo '{"error": {"text": '.$e->getMessage().'}';}
                                                                   
                                                if (sizeof($brands_resutlt) > 0) {
                                                    for($i=0; $i<sizeof($brands_resutlt); $i++) {
                                                        $BrandID = $brands_resutlt[$i]->ID;
                                                        $BrandDescription = $brands_resutlt[$i]->Description;
                                                             echo "<option value=\"$BrandID\">$BrandDescription</option>";
                                                        
                                                               
                                                    }
                                                }
                                                echo "</select></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Supplier Price</td>
                                                <td><div class=\"input-group\">
                                                    <span class=\"input-group-addon\">&#8373;</span>
                                                    <input name = 'SupplierPrice' value='$SupplierPrice' type=\"text\" class=\"form-control\">
                                                    <span class=\"input-group-addon\">.00</span>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Selling Price</td>
                                                <td><div class=\"input-group\">
                                                    <span class=\"input-group-addon\">&#8373;</span>
                                                    <input name = 'SellingPrice' value='$SellingPrice' type=\"text\" class=\"form-control\">
                                                    <span class=\"input-group-addon\">.00</span>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Discount (in percentage)</td>
                                                <td><input name = 'Discount' class=\"form-control input-sm\" type=\"number\" value=\"$Discount\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Stock (Initial Stock Count)</td>
                                                <td><input name = 'Stock' class=\"form-control input-sm\" type=\"number\" value=\"$Stock\"></td>
                                            </tr>

                                            <tr>
                                                <td width=\"30%\">Introductory Line</td>
                                                <td><input placeholder='The new Cruzr Blade' name = 'IntroductoryLine' class=\"form-control input-sm\" type=\"text\" value=\"$IntroductoryLine\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Highlighted Features</td>
                                                <td><input placeholder='Portable, Fast, Vault included, Robust' name = 'HighlightedFeatures' class=\"form-control input-sm\" type=\"text\" value=\"$HighlightedFeatures\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Description</td>
                                                <td><input placeholder='This is robust and strong pendrive from Sandisk. It comes with a preinstalled file vault and a ready to use filesystem' name = 'Description' class=\"form-control input-sm\" type=\"text\" value=\"$Description\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Tags</td>
                                                <td><input placeholder='Fast, Sleek' name = 'Tags' class=\"form-control input-sm\" type=\"text\" value=\"$Tags\"></td>
                                            </tr>
                                            
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box --><br>";

                                echo "<div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Supplier Details</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">Select Supplier</td>
                                                <td><select name = 'SupplierID' class=\"form-control\">";
                                                try{
                                                    $db = new db(); //inititate db object
                                                    $db = $db->connect();
                                                    $select_sup = "SELECT * from suppliers";
                                                    $stmt = $db->prepare($select_sup);
                                                    $stmt->execute();
                                                    $sup_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                                     
                                                }catch(PDOException $e){
                                                    echo '{"error": {"text": '.$e->getMessage().'}';}

                                                    if (sizeof($sup_result)>0) {
                                                        for($i=0; $i<sizeof($sup_result); $i++) {
                                                            $SupplierID = $sup_result[$i]->ID;
                                                            $SupplierDescription = $sup_result[$i]->Name;
                                                                                                               
                                                             echo "<option value=\"$SupplierID\">$SupplierDescription</option>"; 
                                                    }
                                                }
                                                echo "</select></td>
                                            </tr>
                                            
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->";
                            echo "</br>";

                                echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Product Category</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">Select Product Type</td>
                                                <td><select name='Category' class=\"form-control\">";
                                                try{

                                                $prod_category = "SELECT * from product_categories";
                                                $stmt = $db->prepare($prod_category);
                                                $stmt->execute();
                                                $product_result = $stmt->fetchAll(PDO::FETCH_OBJ);                      
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';}

                                                if (sizeof($product_result) > 0) {
                                                    for($i=0; $i<sizeof($product_result); $i++) {
                                                        $CategoryCode = $product_result[$i]->CategoryCode;
                                                        $CategoryDescription = $product_result[$i]->CategoryDescription;
                                                             echo "<option value=\"$CategoryCode\">$CategoryDescription</option>";  
                                                    }
                                                }
                                                        
                                                 echo   "</select></td>
                                            </tr>
                                            
                                            
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box --><br>";

                                 
                           
                                echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Product Images</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">Add Product Image</td>
                                                <td><input class=\"\" type=\"file\" name=\"image[]\" multiple></td>
                                            </tr>
                                            
                                            
                                        </table>
                                        <br>
                                        <div style=\"text-align: center;\">
                                            <span style='color:red;'> Images must be PNG files with dimensions 600 x 600 and sizes less than 500KB.<br>You may resize using photoshop and shrink with Compress JPEG</span>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box --><br>";

                                echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Product Accessories</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">Add Product Accessory</td>
                                                <td><select multiple=\"multiple\" name='Accessories[]' class=\"form-control\">
                                                        <option value='0' selected>None</option>";
                                            try{
                                                $select_products = "SELECT * FROM `products` WHERE (Category = '1.3' OR Category = '1.4' OR Category = '2.2' OR Category = '3.3' OR Category = '3.4' OR Category = '4.3' OR Category = '6.1' OR Category = '6.2' OR Category = '6.3') AND  Stock > 0 ORDER BY DisplayLine ASC"; 
                                                $stmt = $db->prepare($select_products);
                                                $stmt->execute();
                                                $products_result = $stmt->fetchAll(PDO::FETCH_OBJ);                      
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';}

                                        if (sizeof($products_result)>0) {
                                            for($i=0; $i<sizeof($products_result); $i++) {
                                                            echo "<option value=\"".$products_result[$i]->ID."\">".$products_result[$i]->DisplayLine."</option>";   
                                                }
                                            }
                                            $db = null;
                                                echo "</select></td>
                                            </tr>
                                            
                                            
                                        </table>
                                        <br>
                                        <div style=\"text-align: center;\">
                                            <span style='color:#00c0ef;'> You can select multiple accessories</span>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box --><br><br>";
                        ?>
                            
                        <div style="text-align: center;" >
                            <input class='btn btn-success btn-lg' type="submit" name="AddComputer" value="Add Product">
                        </div>

                        </form>
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">

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
