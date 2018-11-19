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
    $db = new db(); //inititate db object
    $db = $db->connect();
    if (isset($_GET['id'])) {
          $ID = $_GET['id'];
          if (isset($_POST["AddAccessory"])) {
             $Accessories = $_POST["Accessories"];
             if ($Accessories[0]=="0") {
                 $UpdateProductError = "No Accessories selected for adding";
             }

             if (!isset($UpdateProductError)) {
                 for ($i=0; $i < sizeof($Accessories); $i++) { 
                    $CA = $Accessories[$i]; 
                    try{
                        $insert_prod_accessories = "INSERT INTO `product_accessories` (`Product_ID`, `Accessory_ID`) VALUES (:ID, :CA)";
                        $stmt = $db->prepare($insert_prod_accessories);
                        $stmt->bindParam(':ID',$ID);
                        $stmt->bindParam(':CA',$CA);
                        $stmt->execute();
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';}
                    
                }
                $UpdateProductSuccess = "Accessory added successfully";
             }
              //inserting into product accessories
                
          }

          if (isset($_POST["UpdateComputerSpecification"])) {
            $ScreenSize = $_POST["ScreenSize"];
            $OS = $_POST["OS"];
            $RAM = $_POST["RAM"];
            $ProcessorType = $_POST["ProcessorType"];
            $ProcessorSpeed = $_POST["ProcessorSpeed"];
            $DisplayPort = $_POST["DisplayPort"];
            $Generation = $_POST["Generation"];
            $HardDiskType = $_POST["HardDiskType"];
            $HardDiskSize = $_POST["HardDiskSize"];
            $BatteryLifeSpan = $_POST["BatteryLifeSpan"];

            if(StringValidation($OS, "Pre-Installed Operating System") != "good"){
            $UpdateProductError = StringValidation($OS, "Pre-Installed Operating System");
            }elseif(StringValidation($RAM, "RAM Value") != "good"){
                $UpdateProductError =StringValidation($RAM, "RAM Value");
            }elseif(StringValidation($ProcessorType, "Processor Type") != "good"){
                $UpdateProductError = StringValidation($ProcessorType, "Processor Type");
            }elseif(StringValidation($ProcessorSpeed, "Processor Speed") != "good"){
                $UpdateProductError = StringValidation($ProcessorSpeed, "Processor Speed");
            }elseif(StringValidation($DisplayPort, "Display Port") != "good"){
                $UpdateProductError = StringValidation($DisplayPort, "Display Port");
            }elseif(StringValidation($Generation, "Processor Generation") != "good"){
                $UpdateProductError = StringValidation($Generation, "Processor Generation");
            }elseif(StringValidation($HardDiskType, "Hard Disk Type") != "good"){
                $UpdateProductError = StringValidation($HardDiskType, "Hard Disk Type");
            }elseif(StringValidation($HardDiskSize, "Hard Disk Size") != "good"){
                $UpdateProductError = StringValidation($HardDiskSize, "Hard Disk Size");
            }elseif(StringValidation($BatteryLifeSpan, "Battery Life Span") != "good"){
                $UpdateProductError = StringValidation($BatteryLifeSpan, "Battery Life Span");
            }

            if (!isset($UpdateProductError)) {
                //update
                //check
                try{
                    $select_pc_specs = "SELECT * FROM computer_specifications Where Product_ID=:ID";
                    $stmt = $db->prepare($select_pc_specs);
                    $stmt->bindParam(':ID',$ID);
                    $stmt->execute();
                    $pc_specs_results = $stmt->fetchAll(PDO::FETCH_OBJ);
                    }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';}
                    if (sizeof($pc_specs_results) > 0) {
                    //record found, update
                    try{
                        $update_pc_spec = "UPDATE `computer_specifications` SET ScreenSize=:ScreenSize, OS=:OS, RAM=:RAM, ProcessorType=:ProcessorType, ProcessorSpeed=:ProcessorSpeed, DisplayPort=:DisplayPort, Generation=:Generation, HardDiskType=:HardDiskType, HardDiskSize=:HardDiskSize, BatteryLifeSpan=:BatteryLifeSpan WHERE Product_ID=:ID";
                        $stmt = $db->prepare($update_pc_spec);
                        $stmt->bindParam(':ScreenSize',$ScreenSize);
                        $stmt->bindParam(':OS',$OS);
                        $stmt->bindParam(':RAM',$RAM);
                        $stmt->bindParam(':ProcessorType',$ProcessorType);
                        $stmt->bindParam(':ProcessorSpeed',$ProcessorSpeed);
                        $stmt->bindParam(':DisplayPort',$DisplayPort);
                        $stmt->bindParam(':Generation',$Generation);
                        $stmt->bindParam(':HardDiskType',$HardDiskType);
                        $stmt->bindParam(':HardDiskSize',$HardDiskSize);
                        $stmt->bindParam(':BatteryLifeSpan',$BatteryLifeSpan);
                        $stmt->bindParam(':ID',$ID);
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';}
                    
                        if ($stmt->execute()) {
                        $UpdateProductSuccess = "Computer Technical Details Updated Successfully";
                    }
                }else{
                    //no record found insert
                    try{

                   
                     echo $insert_pc_spec = "INSERT INTO `computer_specifications` (`Product_ID`, `ScreenSize`, `OS`, `RAM`, `ProcessorType`, `ProcessorSpeed`, `DisplayPort`, `Generation`, `HardDiskType`, `HardDiskSize`, `BatteryLifeSpan`) VALUES (:ID, :ScreenSize, :OS, :RAM, :ProcessorType, :ProcessorSpeed, :DisplayPort, :Generation, :HardDiskType, :HardDiskSize, :BatteryLifeSpan)";
                     $stmt = $db->prepare($insert_pc_spec);
                     $stmt->bindParam(':ID',$ID);
                     $stmt->bindParam(':ScreenSize',$ScreenSize);
                     $stmt->bindParam(':OS',$OS);
                     $stmt->bindParam(':RAM',$RAM);
                     $stmt->bindParam(':ProcessorType',$ProcessorType);
                     $stmt->bindParam(':ProcessorSpeed',$ProcessorSpeed);
                     $stmt->bindParam(':DisplayPort',$DisplayPort);
                     $stmt->bindParam(':Generation',$Generation);
                     $stmt->bindParam(':HardDiskType',$HardDiskType);
                     $stmt->bindParam(':HardDiskSize',$HardDiskSize);
                     $stmt->bindParam(':BatteryLifeSpan',$BatteryLifeSpan);
                     
                     if ($stmt->execute()) {
                      $UpdateProductSuccess = "Computer Technical Details Updated Successfully";
                    }
                 }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';}
                }

            }
        }

        if (isset($_POST["UpdatePhoneSpecifications"])) {
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
            $Primary = $_POST["Primary"];
            $Features = str_replace('"', "inch", $_POST["Features"]);
            $Features = Encoding::fixUTF8($Features);
            $Features = str_replace('?m', "micrometre", $Features);
            $Features = $Features;

            $Video = $_POST["Video"];
            $Secondary = $_POST["Secondary"];
            $AlertTypes = $_POST["AlertTypes"];
            $LoudSpeaker = $_POST["LoudSpeaker"];
            $Jack = $_POST["Jack"];
            $WLAN = $_POST["WLAN"];
            $Bluetooth = $_POST["Bluetooth"];
            $GPS = $_POST["GPS"];
            $NFS = $_POST["NFS"];
            $Radio = $_POST["Radio"];
            $USB = $_POST["USB"];
            $Sensors = $_POST["Sensors"];
            $Messaging = $_POST["Messaging"];
            $Browser = $_POST["Browser"];
            $Java = $_POST["Java"];
            $Battery = $_POST["Battery"];

            if (StringValidation($Technology, "Technology") != "good") {
                $UpdateProductError = StringValidation($Technology, "Technology");
            }
            elseif (StringValidation($Announced, "Announced") != "good") {
                $UpdateProductError = StringValidation($Announced, "Announced");
            }
            elseif (StringValidation($Status, "Status") != "good") {
                $UpdateProductError = StringValidation($Status, "Status");
            }
            elseif (StringValidation($Dimensions, "Dimensions") != "good") {
                $UpdateProductError = StringValidation($Dimensions, "Dimensions");
            }
            elseif (StringValidation($Weight, "Weight") != "good") {
                $UpdateProductError = StringValidation($Weight, "Weight");
            }
            elseif (StringValidation($SIM, "SIM") != "good") {
                $UpdateProductError = StringValidation($SIM, "SIM");
            }
            elseif (StringValidation($Type, "Type") != "good") {
                $UpdateProductError = StringValidation($Type, "Type");
            }
            elseif (StringValidation($Size, "Size") != "good") {
                $UpdateProductError = StringValidation($Size, "Size");
            }
            elseif (StringValidation($Resolution, "Resolution") != "good") {
                $UpdateProductError = StringValidation($Resolution, "Resolution");
            }
            elseif (StringValidation($Multitouch, "Multitouch") != "good") {
                $UpdateProductError = StringValidation($Multitouch, "Multitouch");
            }
            elseif (StringValidation($Protection, "Protection") != "good") {
                $UpdateProductError = StringValidation($Protection, "Protection");
            }elseif (StringValidation($OS, "OS") != "good") {
                $UpdateProductError = StringValidation($OS, "OS");
            }
            elseif (StringValidation($Chipset, "Chipset") != "good") {
                $UpdateProductError = StringValidation($Chipset, "Chipset");
            }
            elseif (StringValidation($CPU, "CPU") != "good") {
                $UpdateProductError = StringValidation($CPU, "CPU");
            }
            elseif (StringValidation($GPU, "GPU") != "good") {
                $UpdateProductError = StringValidation($GPU, "GPU");
            }
            elseif (StringValidation($CardSlot, "CardSlot") != "good") {
                $UpdateProductError = StringValidation($CardSlot, "CardSlot");
            }
            elseif (StringValidation($Internal, "Internal") != "good") {
                $UpdateProductError = StringValidation($Internal, "Internal");
            }
            elseif (StringValidation($Primary, "Primary") != "good") {
                $UpdateProductError = StringValidation($Primary, "Primary");
            }
            elseif (StringValidation($Features, "Features") != "good") {
                $UpdateProductError = StringValidation($Features, "Features");
            }
            elseif (StringValidation($Video, "Video") != "good") {
                $UpdateProductError = StringValidation($Video, "Video");
            }
            elseif (StringValidation($Secondary, "Secondary") != "good") {
                $UpdateProductError = StringValidation($Secondary, "Secondary");
            }
            elseif (StringValidation($AlertTypes, "AlertTypes") != "good") {
                $UpdateProductError = StringValidation($AlertTypes, "AlertTypes");
            }
            elseif (StringValidation($LoudSpeaker, "LoudSpeaker") != "good") {
                $UpdateProductError = StringValidation($LoudSpeaker, "LoudSpeaker");
            }
            elseif (StringValidation($Jack, "Jack") != "good") {
                $UpdateProductError = StringValidation($Jack, "Jack");
            }
            elseif (StringValidation($WLAN, "WLAN") != "good") {
                $UpdateProductError = StringValidation($WLAN, "WLAN");
            }
            elseif (StringValidation($Bluetooth, "Bluetooth") != "good") {
               $UpdateProductError = StringValidation($Bluetooth, "Bluetooth");
            }
            elseif (StringValidation($GPS, "GPS") != "good") {
                $UpdateProductError = StringValidation($GPS, "GPS");
            }
            elseif (StringValidation($NFS, "NFS") != "good") {
                $UpdateProductError = StringValidation($NFS, "NFS");
            }
            elseif (StringValidation($Radio, "Radio") != "good") {
                $UpdateProductError = StringValidation($Radio, "Radio");
            }
            elseif (StringValidation($USB, "USB") != "good") {
                $UpdateProductError = StringValidation($USB, "USB");
            }
            elseif (StringValidation($Sensors, "Sensors") != "good") {
                $UpdateProductError = StringValidation($Sensors, "Sensors");
            }
            elseif (StringValidation($Messaging, "Messaging") != "good") {
                $UpdateProductError = StringValidation($Messaging, "Messaging");
            }
            elseif (StringValidation($Browser, "Browser") != "good") {
                $UpdateProductError = StringValidation($Browser, "Browser");
            }
            elseif (StringValidation($Java, "Java") != "good") {
                $UpdateProductError = StringValidation($Java, "Java");
            }
            elseif (StringValidation($Battery, "Battery") != "good") {
                $UpdateProductError = StringValidation($Battery, "Battery");
            }

            if (!isset($UpdateProductError)) {
                //update
                //check
                try{
                    $select_pc_specs = "SELECT * FROM phone_specifications Where Product_ID='$ID'";
                    $stmt = $db->prepare($select_pc_specs);
                    $stmt->bindParam(':ID',$ID);
                    $stmt->execute();
                    $specs_results = $stmt->fetchAll(PDO::FETCH_OBJ);
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';}
                
                if (sizeof($specs_results) > 0) {
                    //record found, update
                    try{
                        $update_fon_specs = "UPDATE `phone_specifications` SET Technology=:Technology, Announced=:Announced, Status=:Status, Dimensions=:Dimensions, Weight=:Weight, SIM=:SIM, Type=:Type, Size=:Size, Resolution=:Resolution, Multitouch=:Multitouch, Protection=:Protection, OS=:OS, Chipset=:Chipset, CPU=:CPU, GPU=:GPU, CardSlot=:CardSlot, Internal=:Internal, PrimaryCamera=:Primary, Features=:Features, Video=:Video, Secondary=:Secondary, AlertTypes=:AlertTypes, LoudSpeaker=:LoudSpeaker, Jack=:Jack, WLAN=:WLAN, Bluetooth=:Bluetooth, GPS=:GPS, NFS=:NFS, Radio=:Radio, USB=:USB, Sensors=:Sensors, Messaging=:Messaging, Browser=:Browser, Java=:Java', Battery=:Battery WHERE Product_ID=:ID";
                        $stmt = $db->prepare($update_fon_specs);
                        $stmt->bindParam(':Technology',$Technology);
                        $stmt->bindParam(':Announced',$Announced);
                        $stmt->bindParam(':Status',$Status);
                        $stmt->bindParam(':Dimensions',$Dimensions);
                        $stmt->bindParam(':Weight',$Weight);
                        $stmt->bindParam(':SIM',$SIM);
                        $stmt->bindParam(':Type',$Type);
                        $stmt->bindParam(':Size',$Size);
                        $stmt->bindParam(':Resolution',$Resolution);
                        $stmt->bindParam(':Multitouch',$Multitouch);
                        $stmt->bindParam(':Protection',$Protection);
                        $stmt->bindParam(':OS',$OS);
                        $stmt->bindParam(':Chipset',$Chipset);
                        $stmt->bindParam(':CPU',$CPU);
                        $stmt->bindParam(':GPU',$GPU);
                        $stmt->bindParam(':CardSlot',$CardSlot);
                        $stmt->bindParam(':Internal',$Internal);
                        $stmt->bindParam(':Primary',$Primary);
                        $stmt->bindParam(':Features',$Features);
                        $stmt->bindParam(':Video',$Video);
                        $stmt->bindParam(':Secondary',$Secondary);
                        $stmt->bindParam(':AlertTypes',$AlertTypes);
                        $stmt->bindParam(':LoudSpeaker',$LoudSpeaker);
                        $stmt->bindParam(':Jack',$Jack);
                        $stmt->bindParam(':WLAN',$WLAN);
                        $stmt->bindParam(':Bluetooth',$Bluetooth);
                        $stmt->bindParam(':GPS',$GPS);
                        $stmt->bindParam(':NFS',$NFS);
                        $stmt->bindParam(':Radio',$Radio);
                        $stmt->bindParam(':USB',$USB);
                        $stmt->bindParam(':Sensors',$Sensors);
                        $stmt->bindParam(':Messaging',$Messaging);
                        $stmt->bindParam(':Browser',$Browser);
                        $stmt->bindParam(':Java',$Java);
                        $stmt->bindParam(':Battery',$Battery);
                        $stmt->bindParam(':ID',$ID);
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';}
                    
                    if ($stmt->execute()) {
                      $UpdateProductSuccess = "Phone Technical Details Updated Successfully";
                    }
                }else{
                    //no record found insert
                    try{
                        echo $insert_fon_specs = "INSERT INTO `phone_specifications` (`Product_ID`, `Technology`, `Announced`, `Status`, `Dimensions`, `Weight`, `SIM`, `Type`, `Size`, `Resolution`, `Multitouch`, `Protection`, `OS`, `Chipset`, `CPU`, `GPU`, `CardSlot`, `Internal`, `PrimaryCamera`, `Features`, `Video`, `Secondary`, `AlertTypes`, `LoudSpeaker`, `Jack`, `WLAN`, `Bluetooth`, `GPS`, `NFS`, `Radio`, `USB`, `Sensors`, `Messaging`, `Browser`, `Java`, `Battery`) VALUES (:ID, :Technology, :Announced, :Status, :Dimensions, :Weight, :SIM, :Type, :Size, :Resolution, :Multitouch, :Protection, :OS, :Chipset, :CPU, :GPU, :CardSlot, :Internal, :Primary, :Features, :Video, :Secondary, :AlertTypes, :LoudSpeaker, :Jack, :WLAN, :Bluetooth, :GPS, :NFS, :Radio, :USB, :Sensors, :Messaging, :Browser, :Java, :Battery)";
                        $stmt = $db->prepare($insert_fon_specs);
                        $stmt->bindParam(':ID',$ID);
                        $stmt->bindParam(':Technology',$Technology);
                        $stmt->bindParam(':Announced',$Announced);
                        $stmt->bindParam(':Status',$Status);
                        $stmt->bindParam(':Dimensions',$Dimensions);
                        $stmt->bindParam(':Weight',$Weight);
                        $stmt->bindParam(':SIM',$SIM);
                        $stmt->bindParam(':Type',$Type);
                        $stmt->bindParam(':Size',$Size);
                        $stmt->bindParam(':Resolution',$Resolution);
                        $stmt->bindParam(':Multitouch',$Multitouch);
                        $stmt->bindParam(':Protection',$Protection);
                        $stmt->bindParam(':OS',$OS);
                        $stmt->bindParam(':Chipset',$Chipset);
                        $stmt->bindParam(':CPU',$CPU);
                        $stmt->bindParam(':GPU',$GPU);
                        $stmt->bindParam(':CardSlot',$CardSlot);
                        $stmt->bindParam(':Internal',$Internal);
                        $stmt->bindParam(':Primary',$Primary);
                        $stmt->bindParam(':Features',$Features);
                        $stmt->bindParam(':Video',$Video);
                        $stmt->bindParam(':Secondary',$Secondary);
                        $stmt->bindParam(':AlertTypes',$AlertTypes);
                        $stmt->bindParam(':LoudSpeaker',$LoudSpeaker);
                        $stmt->bindParam(':Jack',$Jack);
                        $stmt->bindParam(':WLAN',$WLAN);
                        $stmt->bindParam(':Bluetooth',$Bluetooth);
                        $stmt->bindParam(':GPS',$GPS);
                        $stmt->bindParam(':NFS',$NFS);
                        $stmt->bindParam(':Radio',$Radio);
                        $stmt->bindParam(':USB',$USB);
                        $stmt->bindParam(':Sensors',$Sensors);
                        $stmt->bindParam(':Messaging',$Messaging);
                        $stmt->bindParam(':Browser',$Browser);
                        $stmt->bindParam(':Java',$Java);
                        $stmt->bindParam(':Battery',$Battery);
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';}
                     if ($stmt->execute()) {
                      $UpdateProductSuccess = "Phone Technical Details Updated Successfully";
                    }
                }

            }
        }


          if (isset($_POST["UpdateIntroductoryDetails"])) {
              $Brand = $_POST["Brand"];
              $HighlightedFeaturesString = $HighlightedFeatures = $_POST["HighlightedFeatures"];
              $HighlightedFeaturesArray = explode(",", $HighlightedFeaturesString);
              $IntroductoryDescription = $_POST["IntroductoryDescription"];
              $MainDescription = $_POST["MainDescription"];

              //validation
              if (StringValidation($HighlightedFeaturesString, "HighlightedFeatures")!="good") {
                  $UpdateProductError = StringValidation($HighlightedFeaturesString, "HighlightedFeatures");
              }elseif (StringValidation($IntroductoryDescription, "IntroductoryDescription")!="good") {
                  $UpdateProductError = StringValidation($IntroductoryDescription, "IntroductoryDescription");
              }elseif (StringValidation($MainDescription,"Main Description")!="good") {
                  $UpdateProductError = StringValidation($MainDescription,"Main Description");
              }elseif (sizeof($HighlightedFeaturesArray)<4) {
                  $UpdateProductError = "At least 4 highlighted features must be entered.";
              }
            if (!isset($UpdateProductError)) {
                try{
                    $update_products = "UPDATE products SET Brand=:Brand, HighlightedFeatures=:HighlightedFeaturesString, ProductIntroductoryLine=:IntroductoryDescription, ProductDescription=:MainDescription WHERE ID=:ID ";
                    $stmt = $db->prepare($update_products);
                    $stmt->bindParam(':HighlightedFeaturesString',$HighlightedFeaturesString);
                    $stmt->bindParam(':IntroductoryDescription',$IntroductoryDescription);
                    $stmt->bindParam(':MainDescription',$MainDescription);
                    $stmt->bindParam(':ID',$ID);
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';}
                  if ($stmt->execute()) {
                      $UpdateProductSuccess = "Product Introductory Details Updated Successfully";
                  }
            }
              
              
          }
          try{ 
              $select_brands = "SELECT *, brands.Description as BrandDescription, products.ProductDescription as MainDescription FROM products, product_categories, product_pictures, brands where products.Brand = brands.ID and product_pictures.ProductID = products.ID and products.Category = product_categories.CategoryCode and PicturePath LIKE '%a%' and products.ID='$ID'";
              $stmt = $db->prepare($select_brands);
              $stmt->bindParam(':ID',$ID);
              $stmt->execute();
              $brand_result = $stmt->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';}
         
            if (sizeof($brand_result) > 0) {
                for($i=0; $i<sizeof($brand_result);$i++){
                $CategoryCode = $brand_result[$i]->CategoryCode;
                $CategoryString = $brand_result[$i]->CategoryDescription;
                $Category = explode(">", $CategoryString);
                $DisplayLine = $brand_result[$i]->DisplayLine;
                $Supplier_ID = $brand_result[$i]->Supplier_ID;
                $RP = $brand_result[$i]->RP;
                $SP = $brand_result[$i]->SP;
                $DisplayPicture = $brand_result[$i]->DisplayPicture;
                $Discount = $brand_result[$i]->Discount;
                $DiscountPrice = $Discount/100 * $SP;
                $SalePrice = $SP - $Discount/100 * $SP;
                $Brand = $brand_result[$i]->Brand;
                $Views = $brand_result[$i]->Views;
                $IntroductoryDescription =$brand_result[$i]->ProductIntroductoryLine;
                $MainDescription =$brand_result[$i]->MainDescription;
                $BrandDescription = $brand_result[$i]->BrandDescription;
                $HighlightedFeaturesString = $brand_result[$i]->HighlightedFeatures;
                $HighlightedFeatures = explode(",", $HighlightedFeaturesString);

                /*
                    Selecting product display layout
                    1 for Computers (Laptops and Desktops)
                    2 for Mobile Phones and Tablets
                    0 for Other Products
                */

                $ProductDisplayLayout = $brand_result[$i]->ProductSpecification;
              
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
            echo '{"error": {"text": '.$e->getMessage().'}';}
        
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
                $Name = $sup_details_result[$i]->Name;
            }
        }
    }else{
        header("Location: 404.php");
        exit();
    }
    $db = null;
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
                                    echo "<img src='../../../assets/images/products/main/".$ID."a.png' />";
                                  ?>
                            </div>
                            <?php echo "
                            <form action='#' method='POST'>
                            <div class=\"box box-solid box-info\" >
                                <div class=\"box-header\">
                                    <h3 class=\"box-title\" style=\"text-align: center;\">Product Introductory Details</h3>
                                </div><!-- /.box-header -->
                                <div class=\"box-body no-padding\">
                                    <table class=\"table table-condensed\">
                                     <tr>
                                                <td width=\"30%\">Brand</td>
                                                <td><select name='Brand' class=\"form-control\">
                                                <option value=\"$Brand\">$BrandDescription</option>";
                                                try{
                                                    $db = new db(); //inititate db object
                                                    $db = $db->connect();
                                                    $select_brands = "SELECT * from brands";
                                                    $stmt = $db->prepare($select_brands);
                                                    $stmt->execute();
                                                    $brand_results = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                }catch(PDOException $e){
                                                   echo '{"error": {"text": '.$e->getMessage().'}';}
                                                
                                                if (sizeof($brand_results) > 0) {
                                                for($i=0; $i<sizeof($brand_results);$i++){
                                                        $BrandID = $brand_results[$i]->ID;
                                                        $BrandDescription = $brand_results[$i]->Description;
                                                        if ($BrandID!=$Brand) {
                                                             echo "<option value=\"$Brand\">$BrandDescription</option>";  
                                                         } 
                                                               
                                                    }
                                                }
                                                echo "</select></td>
                                            </tr>
                                        <tr>
                                            <td width=\"30%\">Highlighted Features</td>
                                            <td><input class=\"form-control input-sm\" name='HighlightedFeatures' type=\"text\" value=\"$HighlightedFeaturesString\"></td>
                                        </tr>
                                        <tr>
                                            <td width=\"30%\">Introductory Description</td>
                                            <td><input class=\"form-control input-sm\" name='IntroductoryDescription' type=\"text\" value=\"$IntroductoryDescription\"></td>
                                        </tr>
                                        <tr>
                                            <td width=\"30%\">Main Description</td>
                                            <td><input name='MainDescription' class=\"form-control input-sm\" type=\"text\" value=\"$MainDescription\"></td>
                                        </tr>
                                        <tr>
                                            <td width=\"30%\"></td>
                                            <td>&nbsp;<input type='submit' name='UpdateIntroductoryDetails' value='Update Introductory Details' class='btn btn-success btn-sm'/></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                                <br>

                            </div>
                            </form>
                            <!-- /.box -->"; 

                            //Product Technical Specifications
                            if ($ProductDisplayLayout == 1) {
                                //Product is a computer (Laptop or Desktop)
                                try{
                                    $select_pc_spec = "SELECT * from computer_specifications WHERE Product_ID=:ID";
                                    $stmt = $db->prepare($select_pc_spec);
                                    $stmt->bindParam(':ID', $ID);
                                    $stmt->execute();
                                    $pc_spec_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                }catch(PDOException $e){
                                    echo '{"error": {"text": '.$e->getMessage().'}';}
                                
                                if (sizeof($pc_spec_result) > 0) {
                                    for($i=0; $i<sizeof($pc_spec_result);$i++){
                                        $ScreenSize = $pc_spec_result[$i]->ScreenSize;
                                        $OS = $pc_spec_result[$i]->OS;
                                        $RAM = $pc_spec_result[$i]->RAM;
                                        $ProcessorType = $pc_spec_result[$i]->ProcessorType;
                                        $ProcessorSpeed = $pc_spec_result[$i]->ProcessorSpeed;
                                        $DisplayPort = $pc_spec_result[$i]->DisplayPort;
                                        $Generation = $pc_spec_result[$i]->Generation;
                                        $HardDiskType = $pc_spec_result[$i]->HardDiskType;
                                        $HardDiskSize = $pc_spec_result[$i]->HardDiskSize;
                                        $BatteryLifeSpan = $pc_spec_result[$i]->BatteryLifeSpan;
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
                                                <td><input name='ScreenSize' class=\"form-control input-sm\" type=\"text\" value=\"$ScreenSize\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Pre-Installed Operating System</td>
                                                <td><input name='OS' class=\"form-control input-sm\" type=\"text\" value=\"$OS\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">RAM</td>
                                                <td><input name='RAM' class=\"form-control input-sm\" type=\"text\" value=\"$RAM\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Processor Type</td>
                                                <td><input name='ProcessorType' class=\"form-control input-sm\" type=\"text\" value=\"$ProcessorType\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Processor Speed</td>
                                                <td><input name='ProcessorSpeed' class=\"form-control input-sm\" type=\"text\" value=\"$ProcessorSpeed\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Port</td>
                                                <td><input name='DisplayPort' class=\"form-control input-sm\" type=\"text\" value=\"$DisplayPort\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Generation</td>
                                                <td><input name='Generation' class=\"form-control input-sm\" type=\"text\" value=\"$Generation\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Hard Disk Type</td>
                                                <td><input name='HardDiskType' class=\"form-control input-sm\" type=\"text\" value=\"$HardDiskType\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Hard Disk Size</td>
                                                <td><input name='HardDiskSize' class=\"form-control input-sm\" type=\"text\" value=\"$HardDiskSize\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Battery LifeSpan</td>
                                                <td><input name='BatteryLifeSpan' class=\"form-control input-sm\" type=\"text\" value=\"$BatteryLifeSpan\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\"></td>
                                                <td>&nbsp;<input type='submit' value='Update Technical Specification' name='UpdateComputerSpecification' class='btn btn-success btn-sm'/></td>
                                            </tr>
                                        </table>
                                        </form>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->";
                            }elseif ($ProductDisplayLayout == 2) {
                                try{
                                    $select_fon_spec = "SELECT * from phone_specifications WHERE Product_ID=:ID";
                                    $stmt = $db->prepare($select_fon_spec);
                                    $stmt->bindParam(':ID',$ID);
                                    $stmt->execute();
                                    $fon_spec_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                }catch(PDOException $e){
                                    echo '{"error": {"text": '.$e->getMessage().'}';}
                            
                             if (sizeof($fon_spec_result) > 0) {
                                 for($i=0; $i<sizeof($fon_spec_result);$i++){
                                        $Technology = $fon_spec_result[$i]->Technology;
                                        $Announced = $fon_spec_result[$i]->Announced;
                                        $Status = $fon_spec_result[$i]->Status;
                                        $Dimensions = $fon_spec_result[$i]->Dimensions;
                                        $Weight = $fon_spec_result[$i]->Weight;
                                        $SIM = $fon_spec_result[$i]->SIM;
                                        $Type = $fon_spec_result[$i]->Type;
                                        $Size = $fon_spec_result[$i]->Size;
                                        $Resolution = $fon_spec_result[$i]->Resolution;
                                        $Multitouch = $fon_spec_result[$i]->Multitouch;
                                        $Protection = $fon_spec_result[$i]->Protection;
                                        $OS = $fon_spec_result[$i]->OS;
                                        $Chipset = $fon_spec_result[$i]->Chipset;
                                        $CPU = $fon_spec_result[$i]->CPU;
                                        $GPU = $fon_spec_result[$i]->GPU;
                                        $CardSlot = $fon_spec_result[$i]->CardSlot;
                                        $Internal = $fon_spec_result[$i]->Internal;
                                        $Primary = $fon_spec_result[$i]->PrimaryCamera;
                                        $Features = str_replace("\"", "", $fon_spec_result[$i]->Features);
                                        $Video = $fon_spec_result[$i]->Video;
                                        $Secondary = $fon_spec_result[$i]->Secondary;
                                        $AlertTypes = $fon_spec_result[$i]->AlertTypes;
                                        $LoudSpeaker = $fon_spec_result[$i]->LoudSpeaker;
                                        $Jack = $fon_spec_result[$i]->Jack;
                                        $WLAN = $fon_spec_result[$i]->WLAN;
                                        $Bluetooth = $fon_spec_result[$i]->Bluetooth;
                                        $GPS = $fon_spec_result[$i]->GPS;
                                        $NFS = $fon_spec_result[$i]->NFS;
                                        $Radio = $fon_spec_result[$i]->Radio;
                                        $USB = $fon_spec_result[$i]->USB;
                                        $Sensors = $fon_spec_result[$i]->Sensors;
                                        $Messaging = $fon_spec_result[$i]->Messaging;
                                        $Browser = $fon_spec_result[$i]->Browser;
                                        $Java = $fon_spec_result[$i]->Java;
                                        $Battery = $fon_spec_result[$i]->Battery;
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
                                                <td><input name='Technology' class=\"form-control input-sm\" type=\"text\" value=\"$Technology\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Announced</td>
                                                <td><input name='Announced' class=\"form-control input-sm\" type=\"text\" value=\"$Announced\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Status</td>
                                                <td><input name='Status' class=\"form-control input-sm\" type=\"text\" value=\"$Status\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Dimensions</td>
                                                <td><input name='Dimensions' class=\"form-control input-sm\" type=\"text\" value=\"$Dimensions\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Weight</td>
                                                <td><input name='Weight' class=\"form-control input-sm\" type=\"text\" value=\"$Weight\"></td>
                                            </tr><tr>
                                                <td width=\"30%\">SIM Size</td>
                                                <td><input name='SIM' class=\"form-control input-sm\" type=\"text\" value=\"$SIM\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Type</td>
                                                <td><input name='Type' class=\"form-control input-sm\" type=\"text\" value=\"$Type\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Screen Size</td>
                                                <td><input name='Size' class=\"form-control input-sm\" type=\"text\" value=\"$Size\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Display Resolution</td>
                                                <td><input name='Resolution' class=\"form-control input-sm\" type=\"text\" value=\"$Resolution\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Multitouch</td>
                                                <td><input name='Multitouch' class=\"form-control input-sm\" type=\"text\" value=\"$Multitouch\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Protection</td>
                                                <td><input name='Protection' class=\"form-control input-sm\" type=\"text\" value=\"$Protection\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">OS</td>
                                                <td><input name='OS' class=\"form-control input-sm\" type=\"text\" value=\"$OS\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Protection</td>
                                                <td><input name='Chipset' class=\"form-control input-sm\" type=\"text\" value=\"$Protection\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">CPU</td>
                                                <td><input name='CPU' class=\"form-control input-sm\" type=\"text\" value=\"$CPU\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">GPU</td>
                                                <td><input name='GPU' class=\"form-control input-sm\" type=\"text\" value=\"$GPU\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Memory Card Slot</td>
                                                <td><input name='CardSlot' class=\"form-control input-sm\" type=\"text\" value=\"$CardSlot\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Internal Memory</td>
                                                <td><input name='Internal' class=\"form-control input-sm\" type=\"text\" value=\"$Internal\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Primary Camera</td>
                                                <td><input name='Primary' class=\"form-control input-sm\" type=\"text\" value=\"$Primary\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Features</td>
                                                <td><input name='Features' class=\"form-control input-sm\" type=\"text\" value=\"$Features\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Video </td>
                                                <td><input name='Video' class=\"form-control input-sm\" type=\"text\" value=\"$Video \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Secondary Camera</td>
                                                <td><input name='Secondary' class=\"form-control input-sm\" type=\"text\" value=\"$Secondary \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Alert Types </td>
                                                <td><input name='AlertTypes' class=\"form-control input-sm\" type=\"text\" value=\"$AlertTypes \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">LoudSpeaker </td>
                                                <td><input name='LoudSpeaker' class=\"form-control input-sm\" type=\"text\" value=\"$LoudSpeaker \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Jack</td>
                                                <td><input name='Jack' class=\"form-control input-sm\" type=\"text\" value=\"$Jack\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">WLAN</td>
                                                <td><input name='WLAN' class=\"form-control input-sm\" type=\"text\" value=\"$WLAN\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Bluetooth </td>
                                                <td><input name='Bluetooth' class=\"form-control input-sm\" type=\"text\" value=\"$Bluetooth \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">GPS</td>
                                                <td><input name='GPS' class=\"form-control input-sm\" type=\"text\" value=\"$GPS\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">NFS </td>
                                                <td><input name='NFS' class=\"form-control input-sm\" type=\"text\" value=\"$NFS \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Radio</td>
                                                <td><input name='Radio' class=\"form-control input-sm\" type=\"text\" value=\"$Radio\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">USB</td>
                                                <td><input name='USB' class=\"form-control input-sm\" type=\"text\" value=\"$USB\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Sensors </td>
                                                <td><input name='Sensors' class=\"form-control input-sm\" type=\"text\" value=\"$Sensors \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Messaging </td>
                                                <td><input name='Messaging' class=\"form-control input-sm\" type=\"text\" value=\"$Messaging \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Browser </td>
                                                <td><input name='Browser' class=\"form-control input-sm\" type=\"text\" value=\"$Browser \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Java e</td>
                                                <td><input name='Java' class=\"form-control input-sm\" type=\"text\" value=\"$Java \"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Battery</td>
                                                <td><input name='Battery' class=\"form-control input-sm\" type=\"text\" value=\"$Battery\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\"></td>
                                                <td>&nbsp;<input value='Update Technical Specifications' type='submit' name='UpdatePhoneSpecifications' class='btn btn-success btn-sm'\></td>
                                            </tr>
                                            </form>
                                            </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->";
                            }


                            //there is also a check here
                            //check if product has any accessories
                             echo " <div class=\"box box-solid box-info\" >
                                                    <div class=\"box-header\">
                                                        <h3 class=\"box-title\" style=\"text-align: center;\">Product Accessories</h3>
                                                    </div><!-- /.box-header -->";
                            try{
                                $select_accessories = "SELECT * FROM product_accessories, products, product_categories  where products.Category = product_categories.CategoryCode and product_accessories.Accessory_ID = products.ID and Product_ID = '$ID'";
                                $stmt = $db->prepare($select_accessories);
                                $stmt->bindParam(':ID',$ID);
                                $stmt->execute();
                                $accessories_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                            }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';}
                        
                         if (sizeof($accessories_result) > 0) {
                                           echo "<div class=\"box-body no-padding\">
                                        
                                                    <table class=\"table table-condensed\">";
                                            for($i=0; $i<sizeof($accessories_result);$i++){
                                                $imageURL ="images/products/Thumbnails/".$accessories_result[$i]->ID."a.jpg";
                                                echo "<tr>
                                                                <td>".$accessories_result[$i]->ID."</td>
                                                                <td>".$accessories_result[$i]->DisplayLine."</td>
                                                                <td><div class='img' style=\"background-image:url($imageURL); margin-right: 20px;\"></div></td>
                                                                <td><a target=\"_blank\"href='viewproduct.php?id=".$accessories_result[$i]->ID."'><button class='btn btn-warning btn-sm'>Details</button></a>&nbsp;&nbsp;<button class='btn btn-danger btn-sm'>Delete</button>
                                                                
                                                                </td>
                                                        </tr>";
                                            }
                                            echo "
                                                    </table>

                                            </div><!-- /.box-body -->";
                                        }else{
                                            echo "<br> <h5 style='text-align:center;'>No accessories for this product.</h5><br>";
                                        }

                                        //adding an accessory

                                    echo "
                                    <form action='#' method='POST'>
                                    <table class=\"table table-condensed\">
                                            
                                            <tr>
                                                <td width=\"30%\">&nbsp; Add Product Accessory</td>
                                                <td><select multiple=\"multiple\" name='Accessories[]' class=\"form-control\">
                                                        <option value='0' selected>None</option>";
                                            try{
                                                echo $products = "SELECT * FROM `products` WHERE (Category = '1.3' OR Category = '1.4' OR Category = '2.2' OR Category = '3.3' OR Category = '3.4' OR Category = '4.3' OR Category = '6.1' OR Category = '6.2' OR Category = '6.3') AND  Stock > 0 ORDER BY DisplayLine ASC";
                                                $stmt = $db->prepare($products);
                                                $stmt->execute();
                                                $product_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';}
                                        
                                         if (sizeof($product_result) > 0) {
                                             for($i=0; $i<sizeof($product_result);$i++){
                                                echo "<option value=\"".$product_result[$i]->ID."\">".$product_result[$i]->DisplayLine."</option>";   
                                                    }
                                                }

                                                echo "</select></td>
                                            </tr>
                                            
                                            <tr>
                                                <td width=\"30%\"></td>
                                                <td>&nbsp;<input type='submit' name='AddAccessory' class='btn btn-success btn-sm' value='Add Accessory'/></td>
                                            </tr>
                                        </table>
                                        </form>
                                        </div><!-- /.box -->";    
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
                                        $select_reviews = "SELECT * from product_reviews, customers where product_reviews.User_ID = customers.Customer_ID and Product_ID=':ID'";
                                        $stmt = $db->prepare($select_reviews);
                                        $stmt->bindParam(':ID',$ID);
                                        $stmt->execute();
                                        $review_result = $stmt->fetchAll(PDO::FETCH_OBJ);
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
                                            $db = null;
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
                                                    $prod_reviews = "SELECT * from product_reviews where Product_ID=:ID";
                                                    $stmt = $db->prepare($prod_reviews);
                                                    $stmt->bindParam(':ID',$ID);
                                                    $stmt->execute();
                                                    $reviews_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                    $db = null;
                                                }catch(PDOException $e){
                                                    echo '{"error": {"text": '.$e->getMessage().'}';}
                                                    
                                                   if (sizeof($reviews_result) > 0) {
                                                        $Rating1 = 0;
                                                        $Rating2 = 0;
                                                        $Rating3 = 0;
                                                        $Rating4 = 0;
                                                        $Rating5 = 0;
                                                        $RatingCumulative = 0;
                                                        $TotalCount = 0;
                                         for($i=0; $i<sizeof($reviews_result);$i++){        
                                                        switch ($reviews_result[$i]->Review) {
                                                        case '1':
                                                        $Rating1++;
                                                        $RatingCumulative += $reviews_result[$i]->Review;
                                                        $TotalCount++;
                                                        break;
                                                        case '2':
                                                        $Rating2++;
                                                        $RatingCumulative += $reviews_result[$i]->Review;
                                                        $TotalCount++;
                                                        break;
                                                        case '3':
                                                        $Rating3++;
                                                        $RatingCumulative += $reviews_result[$i]->Review;
                                                        $TotalCount++;
                                                        break;
                                                        case '4':
                                                        $Rating4++;
                                                        $RatingCumulative += $reviews_result[$i]->Review;
                                                        $TotalCount++;
                                                        break;
                                                        case '5':
                                                        $Rating5++;
                                                        $RatingCumulative += $reviews_result[$i]->Review;
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
                                        <tr>
                                            <td width="30%">Action</td>
                                            <td>&nbsp;<button class='btn btn-danger btn-sm'>Delete</button></td>
                                        </tr>
                                    </table>
                                    </p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="box box-primary box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Supplier Details</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <td width="30%">Supplier ID</td>
                                            <td><?php echo $ID; ?></td>
                                    
                                        </tr>
                                        <tr>
                                            <td width="30%">Name</td>
                                            <td><?php echo $Name; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Username</td>
                                            <td><?php echo $Username; ?></td>
                                        </tr>
                                        <tr> 
                                            <td width="30%">Main Phone</td>
                                            <td><?php echo $Phone; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Alt. Phone</td>
                                            <td><?php echo $AltPhone; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Email</td>
                                            <td><?php echo $Email; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Address</td>
                                            <td><?php echo $RP; ?></td>
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
