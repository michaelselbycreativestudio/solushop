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
        str_replace('"', " inch", $String);
        if (trim($String) == "") {
            return "<b>$Name</b> cannot be empty";
        }else{
            return "good";
        }

    }

    //checking if submit button is hit
    if (isset($_POST["AddPhone"])) {
        //testing if file is actually uploaded
            /*
            var_dump($_FILES["image"]);
            exit();
            */

        //photo validation
        //validate format, size, and dimensions
        $Category = $_POST["Category"];
        $DisplayLine = $_POST["DisplayLine"];
        $SupplierPrice = $_POST["SupplierPrice"];
        $SellingPrice = $_POST["SellingPrice"];
        $Discount =  $_POST["Discount"];
        $Stock = $_POST["Stock"];
        $IntroductoryLine = $_POST["IntroductoryLine"];
        $HighlightedFeatures = $_POST["HighlightedFeatures"];
        $Description = $_POST["Description"];
        $SupplierID = $_POST["SupplierID"];
        $BrandID = $_POST["BrandID"];
        $Tags = $_POST["Tags"];



        $Technology = $_POST["Technology"];
        $Announced = $_POST["Announced"];
        $Status = $_POST["Status"];
        $Dimensions = $_POST["Dimensions"];
        $Weight = $_POST["Weight"];
        $SIM = $_POST["SIM"];
        $Type = $_POST["Type"];
        $Size = $_POST["Size"];
        $Resolution = $_POST["Resolution"];
        $Multitouch = $_POST["Multitouch"];
        $Protection = $_POST["Protection"];
        $OS = $_POST["OS"];
        $Chipset = $_POST["Chipset"];
        $CPU = $_POST["CPU"];
        $GPU = $_POST["GPU"];
        $CardSlot = $_POST["CardSlot"];
        $Internal = $_POST["Internal"];
        $Primary =$_POST["Primary"];
        $Features = str_replace('"', "inch", $_POST["Features"]);
        $Video = $_POST["Video"];
        $Secondary = $_POST["Secondary"];
        $AlertTypes = $_POST["AlertTypes"];
        $LoudSpeaker = $_POST["LoudSpeaker"];
        $Jack = $_POST["Jack"];
        $WLAN = $_POST["WLAN"];
        $Bluetooth = $_POST["Bluetooth"];
        $GPS = $_POST["GPS"];
        $NFS =$_POST["NFS"];
        $Radio =$_POST["Radio"];
        $USB =$_POST["USB"];
        $Sensors =$_POST["Sensors"];
        $Messaging =$_POST["Messaging"];
        $Browser =$_POST["Browser"];
        $Java =$_POST["Java"];
        $Battery =$_POST["Battery"];
        $Accessories = $_POST["Accessories"];
        
        if ($_FILES['image']['error'][0]==4) {
            $UploadProductError= "You need to upload at least one picture of the product";
        }

        if (!isset($UploadProductError)) {
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
        
        }
        
        
        if ($Accessories[0]=="0") {
                 $UpdateProductError = "No Accessories selected for adding";
             }
             try{
                $db = new db(); //inititate db object
                $db = $db->connect();
                $insert_prod_accessories = "INSERT INTO `product_accessories` (`Product_ID`, `Accessory_ID`) VALUES ('$ID', '$CA')";
                $stmt = $db->prepare($insert_prod_accessories);
               
                if (!isset($UpdateProductError)) {
                    for ($i=0; $i < sizeof($Accessories); $i++) { 
                        $CA = $Accessories[$i]; 
                        $stmt->execute();
                    }
                    $UpdateProductSuccess = "Accessory added successfully";
                }
            }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';}
            
        if (!isset($UploadProductError)) {
             //other form data validation
            if (StringValidation($DisplayLine, "Display line") != "good") {
                $UploadProductError = StringValidation($DisplayLine, "Display Line");
            }
            elseif(NumberValidation($SupplierPrice, "Supplier price") != "good"){
                $UploadProductError = NumberValidation($SupplierPrice, "Supplier price");
            }
            elseif(NumberValidation($SellingPrice, "Selling price") != "good"){
                $UploadProductError = NumberValidation($SellingPrice, "Selling price");
            }
            elseif(NumberValidation($Stock, "Initial Stock") != "good"){
                $UploadProductError = NumberValidation($Stock, "Initial Stock");
            }
            elseif(StringValidation($HighlightedFeatures, "Product Highlighted Features") != "good"){
                $UploadProductError = StringValidation($HighlightedFeatures, "Product Highlighted Features");
            }
            elseif(StringValidation($Discount, "Discount") != "good"){
                $UploadProductError = StringValidation($Discount, "Discount");
            }
            elseif(StringValidation($IntroductoryLine, "Product Introductory Line") != "good"){
                $UploadProductError = StringValidation($IntroductoryLine, "Product Introductory Line");
            }
            elseif(StringValidation($Description, "Description") != "good"){
                $UploadProductError = StringValidation($Description, "Description");
            }
            elseif(StringValidation($Tags, "Product tags") != "good"){
                $UploadProductError = StringValidation($Tags, "Product description");
            }
            elseif (StringValidation($Technology, "Technology") != "good") {
                $UploadProductError = StringValidation($Technology, "Technology");
            }
            elseif (StringValidation($Announced, "Announced") != "good") {
                $UploadProductError = StringValidation($Announced, "Announced");
            }
            elseif (StringValidation($Status, "Status") != "good") {
                $UploadProductError = StringValidation($Status, "Status");
            }
            elseif (StringValidation($Dimensions, "Dimensions") != "good") {
                $UploadProductError = StringValidation($Dimensions, "Dimensions");
            }
            elseif (StringValidation($Weight, "Weight") != "good") {
                $UploadProductError = StringValidation($Weight, "Weight");
            }
            elseif (StringValidation($SIM, "SIM") != "good") {
                $UploadProductError = StringValidation($SIM, "SIM");
            }
            elseif (StringValidation($Type, "Type") != "good") {
                $UploadProductError = StringValidation($Type, "Type");
            }
            elseif (StringValidation($Size, "Size") != "good") {
                $UploadProductError = StringValidation($Size, "Size");
            }
            elseif (StringValidation($Resolution, "Resolution") != "good") {
                $UploadProductError = StringValidation($Resolution, "Resolution");
            }
            elseif (StringValidation($Multitouch, "Multitouch") != "good") {
                $UploadProductError = StringValidation($Multitouch, "Multitouch");
            }
            elseif (StringValidation($Protection, "Protection") != "good") {
                $UploadProductError = StringValidation($Protection, "Protection");
            }elseif (StringValidation($OS, "OS") != "good") {
                $UploadProductError = StringValidation($OS, "OS");
            }
            elseif (StringValidation($Chipset, "Chipset") != "good") {
                $UploadProductError = StringValidation($Chipset, "Chipset");
            }
            elseif (StringValidation($CPU, "CPU") != "good") {
                $UploadProductError = StringValidation($CPU, "CPU");
            }
            elseif (StringValidation($GPU, "GPU") != "good") {
                $UploadProductError = StringValidation($GPU, "GPU");
            }
            elseif (StringValidation($CardSlot, "CardSlot") != "good") {
                $UploadProductError = StringValidation($CardSlot, "CardSlot");
            }
            elseif (StringValidation($Internal, "Internal") != "good") {
                $UploadProductError = StringValidation($Internal, "Internal");
            }
            elseif (StringValidation($Primary, "Primary") != "good") {
                $UploadProductError = StringValidation($Primary, "Primary");
            }
            elseif (StringValidation($Features, "Features") != "good") {
                $UploadProductError = StringValidation($Features, "Features");
            }
            elseif (StringValidation($Video, "Video") != "good") {
                $UploadProductError = StringValidation($Video, "Video");
            }
            elseif (StringValidation($Secondary, "Secondary") != "good") {
                $UploadProductError = StringValidation($Secondary, "Secondary");
            }
            elseif (StringValidation($AlertTypes, "AlertTypes") != "good") {
                $UploadProductError = StringValidation($AlertTypes, "AlertTypes");
            }
            elseif (StringValidation($LoudSpeaker, "LoudSpeaker") != "good") {
                $UploadProductError = StringValidation($LoudSpeaker, "LoudSpeaker");
            }
            elseif (StringValidation($Jack, "Jack") != "good") {
                $UploadProductError = StringValidation($Jack, "Jack");
            }
            elseif (StringValidation($WLAN, "WLAN") != "good") {
                $UploadProductError = StringValidation($WLAN, "WLAN");
            }
            elseif (StringValidation($Bluetooth, "Bluetooth") != "good") {
               $UploadProductError = StringValidation($Bluetooth, "Bluetooth");
            }
            elseif (StringValidation($GPS, "GPS") != "good") {
                $UploadProductError = StringValidation($GPS, "GPS");
            }
            elseif (StringValidation($NFS, "NFS") != "good") {
                $UploadProductError = StringValidation($NFS, "NFS");
            }
            elseif (StringValidation($Radio, "Radio") != "good") {
                $UploadProductError = StringValidation($Radio, "Radio");
            }
            elseif (StringValidation($USB, "USB") != "good") {
                $UploadProductError = StringValidation($USB, "USB");
            }
            elseif (StringValidation($Sensors, "Sensors") != "good") {
                $UploadProductError = StringValidation($Sensors, "Sensors");
            }
            elseif (StringValidation($Messaging, "Messaging") != "good") {
                $UploadProductError = StringValidation($Messaging, "Messaging");
            }
            elseif (StringValidation($Browser, "Browser") != "good") {
                $UploadProductError = StringValidation($Browser, "Browser");
            }
            elseif (StringValidation($Java, "Java") != "good") {
                $UploadProductError = StringValidation($Java, "Java");
            }
            elseif (StringValidation($Battery, "Battery") != "good") {
                $UploadProductError = StringValidation($Battery, "Battery");
            }

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
            $insert_product = "INSERT INTO `products` (`ID`, `Category`, `DisplayLine`, `HighlightedFeatures`, `RP`, `SP`, `DisplayPicture`, `Discount`, `Stock`, `Supplier_ID`, `Rating`, `Brand`, `Views`, `Tags`, `ProductIntroductoryLine`, `ProductDescription`, `ProductSpecification`) VALUES (:ProductID, :Category, :DisplayLine, :HighlightedFeatures, :SupplierPrice, :SellingPrice, :ProductID, :Discount, :Stock, :SupplierID, '0', :BrandID, '0', :Tags, :IntroductoryLine, :Description, '2')";
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
                //inserting into phone specifications table
            try{
            $insert_fon_spec = "INSERT INTO `phone_specifications` (`Product_ID`, `Technology`, `Announced`, `Status`, `Dimensions`, `Weight`, `SIM`, `Type`, `Size`, `Resolution`, `Multitouch`, `Protection`, `OS`, `Chipset`, `CPU`, `GPU`, `CardSlot`, `Internal`, `PrimaryCamera`, `Features`, `Video`, `Secondary`, `AlertTypes`, `LoudSpeaker`, `Jack`, `WLAN`, `Bluetooth`, `GPS`, `NFS`, `Radio`, `USB`, `Sensors`, `Messaging`, `Browser`, `Java`, `Battery`) VALUES (:ProductID, :Technology, :Announced, :Status, :Dimensions, :Weight, :SIM, :Type, :Size, :Resolution, :Multitouch, :Protection, :OS, :Chipset, :CPU, :GPU, :CardSlot, :Internal, :Primary, :Features, :Video, :Secondary, :AlertTypes, :LoudSpeaker, :Jack, :WLAN, :Bluetooth, :GPS, :NFS, :Radio, :USB, :Sensors, :Messaging, :Browser, :Java, :Battery)";
            $stmt = $db->prepare($insert_pc_spec);
            $stmt->bindParam(':ProductID', $ProductID);
            $stmt->bindParam(':Technology', $Technology);
            $stmt->bindParam(':Announced', $Announced);
            $stmt->bindParam(':Status', $Status);
            $stmt->bindParam(':Dimensions', $Dimensions);
            $stmt->bindParam(':Weight', $Weight);
            $stmt->bindParam(':SIM', $SIM);
            $stmt->bindParam(':Type', $Type);
            $stmt->bindParam(':Size', $Size);
            $stmt->bindParam(':Resolution', $Resolution);
            $stmt->bindParam(':Multitouch', $Multitouch);
            $stmt->bindParam(':Protection', $Protection);
            $stmt->bindParam(':OS', $OS);
            $stmt->bindParam(':Chipset', $Chipset);
            $stmt->bindParam(':CPU', $CPU);
            $stmt->bindParam(':GPU', $GPU);
            $stmt->bindParam(':CardSlot', $CardSlot);
            $stmt->bindParam(':Internal', $Internal);
            $stmt->bindParam(':Primary', $Primary);
            $stmt->bindParam(':Features', $Features);
            $stmt->bindParam(':Video', $Video);
            $stmt->bindParam(':Secondary', $Secondary);
            $stmt->bindParam(':AlertTypes', $AlertTypes);
            $stmt->bindParam(':LoudSpeaker', $LoudSpeaker);
            $stmt->bindParam(':Jack', $Jack);
            $stmt->bindParam(':WLAN', $WLAN);
            $stmt->bindParam(':Bluetooth', $Bluetooth);
            $stmt->bindParam(':GPS', $GPS);
            $stmt->bindParam(':NFS', $NFS);
            $stmt->bindParam(':Radio', $Radio);
            $stmt->bindParam(':USB', $USB);
            $stmt->bindParam(':Sensors', $Sensors);
            $stmt->bindParam(':Messaging', $Messaging);
            $stmt->bindParam(':Browser', $Browser);
            $stmt->bindParam(':Java', $Java);
            $stmt->bindParam(':Battery', $Battery);

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
        <title>Manager | Add Phone or Tablet</title>
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
                        Add Phone or Tablet
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Phone or Tablet</li>
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
                            if (!isset($Technology)) {
                                $Technology = "";
                            }
                            if (!isset($Announced)) {
                                $Announced = "";
                            }
                            if (!isset($Status)) {
                               $Status = "";
                            }
                            if (!isset($Dimensions)) {
                                $Dimensions = "";
                            }
                            if (!isset($Weight)) {
                                $Weight = "";
                            }
                            if (!isset($SIM )) {
                                $SIM = "";
                            }
                            if (!isset($Type)) {
                                $Type = "";
                            }
                            if (!isset($Size)) {
                                $Size = "";
                            }
                            if (!isset($Resolution)) {
                                $Resolution = "";
                            }
                            if (!isset($Multitouch )) {
                                $Multitouch = "";
                            }
                            if (!isset($Protection)) {
                                $Protection = "";
                            }
                            if (!isset($OS)) {
                                $OS = "";
                            }
                            if (!isset($Chipset)) {
                                $Chipset = "";
                            }
                            if (!isset($CPU)) {
                                $CPU = "";
                            }
                            if (!isset($GPU)) {
                                $GPU = "";
                            }
                            if (!isset($CardSlot)) {
                                $CardSlot = "";
                            }
                            if (!isset($Internal)) {
                                $Internal = "";
                            }
                            if (!isset($Primary)) {
                                $Primary = "";
                            }
                            if (!isset($Features)) {
                                $Features = "";
                            }
                            if (!isset($Video)) {
                                $Video = "";
                            }
                            if (!isset($Secondary)) {
                                $Secondary = "";
                            }
                            if (!isset($AlertTypes)) {
                                $AlertTypes = "";
                            }
                            if (!isset($LoudSpeaker)) {
                                $LoudSpeaker = "";
                            }
                            if (!isset($Jack)) {
                                $Jack = "";
                            }
                            if (!isset($WLAN)) {
                                $WLAN = "";
                            }
                            if (!isset($Bluetooth)) {
                                $Bluetooth = "";
                            }
                            if (!isset($GPS)) {
                                $GPS = "";
                            }
                            if (!isset($NFS)) {
                                $NFS = "";
                            }
                            if (!isset($Radio)) {
                                $Radio = "";
                            }
                            if (!isset($USB)) {
                                $USB = "";
                            }
                            if (!isset($Sensors)) {
                                $Sensors = "";
                            }
                            if (!isset($Messaging)) {
                                $Messaging = "";
                            }
                            if (!isset($Browser)) {
                                $Browser = "";
                            }
                            if (!isset($Java)) {
                                $Java = "";                          
                            }
                            if (!isset($Battery)) {
                                $Battery = "";
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
                                                <td><input class=\"form-control input-sm\" name = 'DisplayLine' type=\"text\" placeholder='OnePlus 5' value=\"$DisplayLine\"></td>
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
                                                <td><input placeholder='Powerful, smooth and fast. Never Settle!' name = 'IntroductoryLine' class=\"form-control input-sm\" type=\"text\" value=\"$IntroductoryLine\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Highlighted Features</td>
                                                <td><input placeholder='Dual Camera, 8GB RAM, Slim with stamina' name = 'HighlightedFeatures' class=\"form-control input-sm\" type=\"text\" value=\"$HighlightedFeatures\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Description</td>
                                                <td><input placeholder='The OnePlus 5 is powered by 1.9GHz octa-core Qualcomm Snapdragon 835 processor and it comes with 6GB of RAM. The phone packs 64GB of internal storage cannot be expanded.' name = 'Description' class=\"form-control input-sm\" type=\"text\" value=\"$Description\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Tags</td>
                                                <td><input placeholder='Fast, Slim, Sleek, Power' name = 'Tags' class=\"form-control input-sm\" type=\"text\" value=\"$Tags\"></td>
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
                                                <td><select name='SupplierID' class=\"form-control\">";
                                                try{
                                                    $db = new db(); //inititate db object
                                                    $db = $db->connect();
                                                $select_suppliers = "SELECT * from suppliers";
                                                $stmt =  $db->prepare($select_suppliers);
                                                $stmt->execute();
                                                $sup_resutlt =   $stmt->fetchAll(PDO::FETCH_OBJ);
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';}
                                                if (sizeof($sup_resutlt) > 0) {
                                                    for($i=0; $i<sizeof($sup_resutlt); $i++) {
                                                        $SupplierID = $sup_resutlt[$i]->ID;
                                                        $SupplierDescription = $sup_resutlt[$i]->Name;
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
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Product Type</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">Select Product Type</td>
                                                <td><select name='Category' class=\"form-control\">
                                                        <option value='3.1'>Mobile Phone</option>
                                                        <option value='3.2'>Tablet or iPad</option>
                                                    </select></td>
                                            </tr>
                                            
                                            
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box --><br>";
                           //Technical specifications     
                             echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\">Product Technical Specifications</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            <tr>
                                                <td width=\"30%\">Brand</td>
                                                <td><select name='BrandID' class=\"form-control\">";
                                                try{
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
                                                <td width=\"30%\">SIM Technology</td>
                                                <td><input placeholder='GSM / CDMA / HSPA/ LTE' name='Technology' class=\"form-control input-sm\" type=\"text\" value=\"$Technology\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Announced</td>
                                                <td><input placeholder='2017, June' name='Announced' class=\"form-control input-sm\" type=\"text\" value=\"$Announced\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Status</td>
                                                <td><input placeholder='Available, Released 2017 June' name='Status' class=\"form-control input-sm\" type=\"text\" value=\"$Status\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Dimensions</td>
                                                <td><input placeholder='154.2 x 74.1 x 7.3 mm (6.07 x 2.92 x 0.29 in)' name='Dimensions' class=\"form-control input-sm\" type=\"text\" value=\"$Dimensions\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Weight</td>
                                                <td><input placeholder='153 g (5.40 oz)' name='Weight' class=\"form-control input-sm\" type=\"text\" value=\"$Weight\"></td>
                                            </tr><tr>
                                                <td width=\"30%\">SIM Size / Type</td>
                                                <td><input placeholder='Dual SIM (Nano-SIM, dual stand-by)' name='SIM' class=\"form-control input-sm\" type=\"text\" value=\"$SIM\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Type</td>
                                                <td><input placeholder='Optic AMOLED capacitive touchscreen, 16M colors' name='Type' class=\"form-control input-sm\" type=\"text\" value=\"$Type\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Screen Size</td>
                                                <td><input placeholder='5.5 inches (~73.0% screen-to-body ratio)' name='Size' class=\"form-control input-sm\" type=\"text\" value=\"$Size\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Resolution</td>
                                                <td><input placeholder='1080 x 1920 pixels (~401 ppi pixel density)' name='Resolution' class=\"form-control input-sm\" type=\"text\" value=\"$Resolution\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Multitouch</td>
                                                <td><input placeholder='Yes' name='Multitouch' class=\"form-control input-sm\" type=\"text\" value=\"$Multitouch\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Protection</td>
                                                <td><input placeholder='Corning Gorilla Glass 5' name='Protection' class=\"form-control input-sm\" type=\"text\" value=\"$Protection\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">OS</td>
                                                <td><input placeholder='Android 7.1.1 (Nougat)' name='OS' class=\"form-control input-sm\" type=\"text\" value=\"$OS\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Chipset</td>
                                                <td><input placeholder='Qualcomm MSM8998 Snapdragon 835' name='Chipset' class=\"form-control input-sm\" type=\"text\" value=\"$Chipset\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">CPU</td>
                                                <td><input placeholder='Octa-core (4x2.45 GHz Kryo & 4x1.9 GHz Kryo)' name='CPU' class=\"form-control input-sm\" type=\"text\" value=\"$CPU\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">GPU</td>
                                                <td><input placeholder='Adreno 540' name='GPU' class=\"form-control input-sm\" type=\"text\" value=\"$GPU\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Memory Card Slot</td>
                                                <td><input placeholder='No' name='CardSlot' class=\"form-control input-sm\" type=\"text\" value=\"$CardSlot\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Internal Memory</td>
                                                <td><input placeholder='128GB, 8GB RAM' name='Internal' class=\"form-control input-sm\" type=\"text\" value=\"$Internal\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Primary Camera</td>
                                                <td><input placeholder='Dual 16 MP, f/1.7, 24mm, EIS (gyro) + 20 MP, f/2.6, 36mm, phase detection autofocus, 1.6x optical zoom, dual-LED flash' name='Primary' class=\"form-control input-sm\" type=\"text\" value=\"$Primary\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Features</td>
                                                <td><input placeholder='1/2.8inch sensor size, 1.12 µm @ 16MP & 1/2.8inch sensor size, 1.0 µm @ 20MP, geo-tagging, touch focus, face detection, HDR, panorama' name='Features' class=\"form-control input-sm\" type=\"text\" value=\"$Features\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Video </td>
                                                <td><input placeholder='2160p@30fps, 1080p@30/60fps, 720p@30/120fps' name='Video' class=\"form-control input-sm\" type=\"text\" value=\"$Video\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Secondary Camera</td>
                                                <td><input placeholder='16 MP, f/2.0, 20mm, EIS (gyro), 1.0 µm pixel size, 1080p, Auto HDR' name='Secondary' class=\"form-control input-sm\" type=\"text\" value=\"$Secondary\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Alert Types </td>
                                                <td><input placeholder='Vibration; MP3, WAV ringtones' name='AlertTypes' class=\"form-control input-sm\" type=\"text\" value=\"$AlertTypes\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">LoudSpeaker </td>
                                                <td><input placeholder='Yes' name='LoudSpeaker' class=\"form-control input-sm\" type=\"text\" value=\"$LoudSpeaker\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Jack</td>
                                                <td><input placeholder='Yes' name='Jack' class=\"form-control input-sm\" type=\"text\" value=\"$Jack\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">WLAN</td>
                                                <td><input placeholder='Wi-Fi 802.11 a/b/g/n/ac, Wi-Fi Direct, DLNA, hotspot' name='WLAN' class=\"form-control input-sm\" type=\"text\" value=\"$WLAN\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Bluetooth </td>
                                                <td><input placeholder='5.0, A2DP, LE, aptX HD' name='Bluetooth' class=\"form-control input-sm\" type=\"text\" value=\"$Bluetooth\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">GPS</td>
                                                <td><input placeholder='Yes, with A-GPS, GLONASS, BDS' name='GPS' class=\"form-control input-sm\" type=\"text\" value=\"$GPS\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">NFC </td>
                                                <td><input placeholder='Yes' name='NFS' class=\"form-control input-sm\" type=\"text\" value=\"$NFS\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Radio</td>
                                                <td><input placeholder='No' name='Radio' class=\"form-control input-sm\" type=\"text\" value=\"$Radio\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">USB</td>
                                                <td><input placeholder='2.0, Type-C 1.0 reversible connector' name='USB' class=\"form-control input-sm\" type=\"text\" value=\"$USB\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Sensors </td>
                                                <td><input placeholder='Fingerprint (front-mounted), accelerometer, gyro, proximity, compass' name='Sensors' class=\"form-control input-sm\" type=\"text\" value=\"$Sensors\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Messaging </td>
                                                <td><input placeholder='SMS (threaded view), MMS, Email, IM, Push Email' name='Messaging' class=\"form-control input-sm\" type=\"text\" value=\"$Messaging\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Browser </td>
                                                <td><input placeholder='HTML5' name='Browser' class=\"form-control input-sm\" type=\"text\" value=\"$Browser\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Java</td>
                                                <td><input placeholder='No' name='Java' class=\"form-control input-sm\" type=\"text\" value=\"$Java\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Battery</td>
                                                <td><input placeholder='Non-removable Li-Po 3300 mAh battery' name='Battery' class=\"form-control input-sm\" type=\"text\" value=\"$Battery\"></td>
                                            </tr>
                                            </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->";
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
                                            <span style='color:red;'> Images must be PNG files with dimensions 600 x 600 and sizes less than 1 MB.<br>You may resize using photoshop and shrink with Compress JPEG</span>
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
                                                            $select_products = "SELECT * FROM `products` WHERE (Category = '3.3' OR Category = '3.4' OR Category = '6.1' OR Category = '6.2' OR Category = '6.3') AND  Stock > 0"; 
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
                            <input class='btn btn-success btn-lg' type="submit" name="AddPhone" value="Add Phone or Tablet">
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
