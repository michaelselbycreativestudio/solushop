<?php 
    include("config/db.php");
    include("session.php");
    include("mailinglistadd.php");

     //select product categories
     if (isset($_GET["PID"])) {
        $PID = $_GET["PID"];
    }else{
        header("Location: shop.php");
    }    

     try{ 
        $db = new db();
        $db = $db->connect();
        $product_details_query = "SELECT *, products.ProductDescription as MainDescription, suppliers.ID as Supplier_ID, product_categories.Description as CategoryDescription FROM products, product_categories, product_pictures, suppliers WHERE products.Supplier_ID = suppliers.ID AND product_pictures.ProductID = products.ID and products.Category = product_categories.CC and PicturePath LIKE '%a%' and products.ID='$PID'";
        $stmt = $db->prepare($product_details_query);
        $stmt->execute();
        $product = $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
         
    if (sizeof($product) > 0) {
        for($i=0; $i<sizeof($product);$i++){
        $Category = $product[$i]->CC;
        $ParentCategory = $product[$i]->Parent;
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


     try{
        $db = new db();
        $db = $db->connect();
        $product_category_query = "SELECT * FROM product_categories WHERE CC = '$ParentCategory'";
        $stmt = $db->prepare($product_category_query);
        $stmt->execute();
        $product_category = $stmt->fetchAll(PDO::FETCH_OBJ);
        $ParentCategoryString = $product_category[0]->Description;
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

    if (isset($_GET["add_to_cart"])) {
        $Quantity = 1;
        $product_id= $_GET["add_to_cart"];
        if (!isset($_SESSION['Solushop_Customer_ID'])) {
            $ErrorMessage = "Sorry, you need to be logged in to add to your cart";
        }elseif($Quantity<1){
            $ErrorMessage = "You can't add $Quantity products to your cart. Add 1 or more";
        }else{
            try{
                $db = new db();
                $db = $db->connect();
                $sql_product_query = "SELECT * from products where ID = :product_id";
                $stmt = $db->prepare($sql_product_query);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null; 
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_product) > 0){
                    $DisplayLine = $sql_product[0]->DisplayLine;
            }else{
                $ErrorMessage = "Sorry, we can't seem to find that product";
            }
            $user_id = $_SESSION['Solushop_Customer_ID'];
            $quantity = 1;

            //Checking if item is already in cart.
            try{
                $db = new db();
                $db = $db->connect();
                $sql_count_cart_query = "SELECT count(*) as count from cart where User_ID= :Customer_ID and Product_ID = :product_id";
                $stmt = $db->prepare($sql_count_cart_query);
                $stmt->bindParam(':Customer_ID', $Customer_ID);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_count_cart = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_count_cart) > 0){
                    if(($sql_count_cart[0]->count) > 0){
                        $ErrorMessage = "$DisplayLine already found in cart";
                    }
                }
            if (!isset($ErrorMessage)) {
                try{
                    $db = new db();
                    $db = $db->connect();
                    $insert_cart_query = "INSERT INTO cart( User_ID, Product_ID, Quantity) VALUES ( :Customer_ID, :product_id, :quantity)";
                    $stmt = $db->prepare($insert_cart_query);
                    $stmt->bindParam(':Customer_ID', $Customer_ID);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $quantity);
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                
                if ($stmt->execute()) {
                    $SuccessMessage = "$quantity $DisplayLine have been added to your cart.";
                }
            }
        }
    }

    if (isset($_GET["add_to_wishlist"])) {
        if (!isset($_SESSION['Solushop_Customer_ID'])) {
            $ErrorMessage = "Sorry, you need to be logged in to add to your wishlist";
        }else{
            $product_id = $_GET["add_to_wishlist"];
            try{
                $db = new db();
                $db = $db->connect();
                $sql_product_query = "SELECT * from products where ID = :product_id";
                $stmt = $db->prepare($sql_product_query);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_product) > 0){
                    //product exits
                    for ($i=0; $i < sizeof($sql_product); $i++) { 
                        $DisplayLine = $sql_product[$i]->DisplayLine;
                    }
                }else{
                $ErrorMessage = "Sorry, we can't seem to find that product";
            }
            $user_id = $_SESSION['Solushop_Customer_ID'];
            //Checking if item is already in wishlist.
            try{
                $db = new db();
                $db = $db->connect();
                $sql_count_wishlist_query = "SELECT count(*) as count from wishlist where User_ID= :Customer_ID and Product_ID = :product_id";
                $stmt = $db->prepare($sql_count_wishlist_query);
                $stmt->bindParam(':Customer_ID', $Customer_ID);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_count_wishlist = $stmt->fetchAll(PDO::FETCH_OBJ);
                //$db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_count_wishlist) > 0){
                    for($i = 0; $i < sizeof($sql_count_wishlist); $i++){
                        if(($sql_count_wishlist[$i]->count) > 0){
                            $ErrorMessage = "$DisplayLine already found in Wishlist";
                        }
                    }
                }
            if (!isset($ErrorMessage)) {
                try{
                    $db = new db();
                    $db = $db->connect();
                    $insert_cart_query = "INSERT INTO wishlist( User_ID, Product_ID) VALUES ( :Customer_ID, :product_id)";
                    $stmt = $db->prepare($insert_cart_query);
                    $stmt->bindParam(':Customer_ID', $Customer_ID);
                    $stmt->bindParam(':product_id', $product_id);
                    
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
                
                if ($stmt->execute()) {
                        $SuccessMessage = " $DisplayLine has been added to your wishlist.";
                  
                }
                $db = null;
            }
        }
    }

    if (isset($_POST["add_to_cart"])) {
        $Quantity = $_POST["quantity"];
        $product_id= $PID;
        if (!isset($_SESSION['Solushop_Customer_ID'])) {
            $ErrorMessage = "Sorry, you need to be logged in to add to your cart";
        }elseif($Quantity<1){
            $ErrorMessage = "You can't add $Quantity products to your cart. Add 1 or more";
        }else{
            try{
                $db = new db();
                $db = $db->connect();
                $sql_product_query = "SELECT * from products where ID = :product_id";
                $stmt = $db->prepare($sql_product_query);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null; 
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if(sizeof($sql_product) > 0){
                $DisplayLine = $sql_product[0]->DisplayLine;
            }else{
                $ErrorMessage = "Sorry, we can't seem to find that product";
            }
            $user_id = $_SESSION['Solushop_Customer_ID'];
            $quantity = 1;

            //Checking if item is already in cart.
            try{
                $db = new db();
                $db = $db->connect();
                $sql_count_cart_query = "SELECT count(*) as count from cart where User_ID= :Customer_ID and Product_ID = :product_id";
                $stmt = $db->prepare($sql_count_cart_query);
                $stmt->bindParam(':Customer_ID', $Customer_ID);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_count_cart = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_count_cart) > 0){
                    if(($sql_count_cart[0]->count) > 0){
                        $ErrorMessage = "$DisplayLine already found in cart";
                    }
                }
            if (!isset($ErrorMessage)) {
                try{
                    $db = new db();
                    $db = $db->connect();
                    $insert_cart_query = "INSERT INTO cart( User_ID, Product_ID, Quantity) VALUES ( :Customer_ID, :product_id, :quantity)";
                    $stmt = $db->prepare($insert_cart_query);
                    $stmt->bindParam(':Customer_ID', $Customer_ID);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $quantity);
                    $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                
                if ($stmt->execute()) {
                    $SuccessMessage = "$quantity $DisplayLine have been added to your cart.";
                }
            }
        }
    }

    if (isset($_POST["add_to_wishlist"])) {
        if (!isset($_SESSION['Solushop_Customer_ID'])) {
            $ErrorMessage = "Sorry, you need to be logged in to add to your wishlist";
        }else{
            $product_id = $PID;
            try{
                $db = new db();
                $db = $db->connect();
                $sql_product_query = "SELECT * from products where ID = :product_id";
                $stmt = $db->prepare($sql_product_query);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_product) > 0){
                    //product exits
                    for ($i=0; $i < sizeof($sql_product); $i++) { 
                        $DisplayLine = $sql_product[$i]->DisplayLine;
                    }
                }else{
                $ErrorMessage = "Sorry, we can't seem to find that product";
            }
            $user_id = $_SESSION['Solushop_Customer_ID'];
            //Checking if item is already in wishlist.
            try{
                $db = new db();
                $db = $db->connect();
                $sql_count_wishlist_query = "SELECT count(*) as count from wishlist where User_ID= :Customer_ID and Product_ID = :product_id";
                $stmt = $db->prepare($sql_count_wishlist_query);
                $stmt->bindParam(':Customer_ID', $Customer_ID);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_count_wishlist = $stmt->fetchAll(PDO::FETCH_OBJ);
                //$db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_count_wishlist) > 0){
                    for($i = 0; $i < sizeof($sql_count_wishlist); $i++){
                        if(($sql_count_wishlist[$i]->count) > 0){
                            $ErrorMessage = "$DisplayLine already found in Wishlist";
                        }
                    }
                }
            if (!isset($ErrorMessage)) {
                try{
                    $db = new db();
                    $db = $db->connect();
                    $insert_cart_query = "INSERT INTO wishlist( User_ID, Product_ID) VALUES ( :Customer_ID, :product_id)";
                    $stmt = $db->prepare($insert_cart_query);
                    $stmt->bindParam(':Customer_ID', $Customer_ID);
                    $stmt->bindParam(':product_id', $product_id);
                    
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
                
                if ($stmt->execute()) {
                        $SuccessMessage = " $DisplayLine has been added to your wishlist.";
                  
                }
                $db = null;
            }
        }
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo "Buy ".$DisplayLine; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	
	<!-- Ionicons Font CSS-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
	<!-- font awesome CSS-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Animate CSS-->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- UI CSS-->
	<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
	<!-- Chosen CSS-->
	<link rel="stylesheet" href="assets/css/chosen.css">
	<!-- Meanmenu CSS-->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- Fancybox CSS-->
	<link rel="stylesheet" href="assets/css/jquery.fancybox.css">
	<!-- Normalize CSS-->
	<link rel="stylesheet" href="assets/css/normalize.css">
	<!-- Nivo Slider CSS-->
	<link rel="stylesheet" href="assets/css/nivo-slider.css">
	<!-- Owl Carousel CSS-->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<!-- EasyZoom CSS-->
	<link rel="stylesheet" href="assets/css/easyzoom.css">
	<!-- Slick CSS-->
	<link rel="stylesheet" href="assets/css/slick.css">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Default CSS -->
	<link rel="stylesheet" href="assets/css/default.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Modernizr Js -->
    <style>
        #note {
        position: absolute;
        z-index: 101;
        top: 0;
        left: 0;
        right: 0;
        font-size: 16px;
        color: white;
        background: green;
        text-align: center;
        line-height: 2.8;
        overflow: hidden; 
        -webkit-box-shadow: 0 0 5px black;
        -moz-box-shadow:    0 0 5px black;
        box-shadow:         0 0 5px black;
        }

        @-webkit-keyframes slideDown {
            0%, 100% { -webkit-transform: translateY(-50px); }
            10%, 90% { -webkit-transform: translateY(0px); }
        }

        @-moz-keyframes slideDown {
            0%, 100% { -moz-transform: translateY(-50px); }
            10%, 90% { -moz-transform: translateY(0px); }
        }

        .cssanimations.csstransforms #note {
            -webkit-transform: translateY(-50px);
            -webkit-animation: slideDown 5s 1.0s 1 ease forwards;
            -moz-transform:    translateY(-50px);
            -moz-animation:    slideDown 5s 1.0s 1 ease forwards;
        }

        .cssanimations.csstransforms #close {
            display: none;
        }
    </style>
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper">
		<!--Header Area Start-->
        <header>
		   <div class="header-container">
		       
               <?php include("header-top-area.php") ?>
               <?php include("header-middle-area.php") ?>
               <!--Header bottom Area Start-->
               <div class="header-bottom-area header-sticky">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-12">
                               <!--Logo Sticky Start-->
                               <div class="logo-sticky">
                                 <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                               </div>
                               <!--Logo Sticky End-->
                               <!--Main Menu Area Start-->
                               <div class="main-menu-area" style="text-align:center;">
                                   <nav>
                                       <ul class="main-menu">
                                           <li><a href="index.php">Home</a></li>
                                           <li class="active"><a href="shop.php">Shop</a></li>
                                           <li><a href="about.php">About Us</a></li>
                                           <li><a href="blog.php">Blog</a></li>
                                           <li><a href="contact.php">Contact Us</a></li>
                                       </ul>
                                   </nav>
                               </div>
                               <!--Main Menu Area End-->
                           </div>
                       </div>
                   </div>
               </div>
               <!--Header bottom Area End-->
               <!--Mobile Menu Area Start-->
               <div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
                   <div class="container">
                       <div class="row">
                           <div class="col-xs-12">
                               <div class="mobile-menu">
                                   <nav>
                                       <ul>
                                           <li><a href="index.php">Home</a></li>
                                           <li><a href="shop.php">Shop</a></li>
                                           <li><a href="about.php">About Us</a></li>
                                           <li><a href="blog.php">Blog</a></li>
                                           <li><a href="contact.php">Contact Us</a></li>
                                       </ul>
                                   </nav>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
               <!--Mobile Menu Area End--> 
               </div> 
		</header>
		<!--Header Area End-->
		<!--Heading Banner Area Start-->
		<div class="heading-banner-area pt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="heading-banner">
		                    <div class="breadcrumbs">
		                        <ul>
		                            <li><a href="index.php">Home</a><span class="breadcome-separator">></span></li>
                                    <li><a href="shop.php">Shop</a><span class="breadcome-separator">></span></li>
                                    <?php 
                                        echo "<li><a href=\"shop.php?category=$Category\">$ParentCategoryString <span class=\"breadcome-separator\">></span> $CategoryString</a></li>"
                                    ?>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Heading Banner Area End-->
		<!--Single Product Area Start-->
		<section class="single-product-area mt-20">
		    <div class="container">
		        <!--Single Product Info Start-->
		        <div class="row">
		            <div class="single-product-info mb-50">
		                <!--Single Product Image Start-->
		                <div class="col-md-6 col-sm-6">
                            <!--Product Tab Content Start-->
                            <div class="single-product-tab-content tab-content">
                               
                                <?php
                                    //select product images from product images table
                                    try{
                                        $db = new db();
                                        $db = $db->connect();
                                        $product_images_query = "SELECT * from product_pictures where ProductID = '$PID'";
                                        $stmt = $db->prepare($product_images_query);
                                        $stmt->execute();
                                        $product_image = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        $db = null; 
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';
                                    }

                                    for ($i=0; $i < sizeof($product_image); $i++) { 
                                        echo " <div id=\"w".($i+1)."\" class=\"tab-pane fade in active\">
                                            <div style='border-radius:20px;' >
                                                <img style='border-radius:20px;' src=\"assets/img/products/main/".$product_image[$i]->PicturePath.".jpg\" alt=\"\">
                                            </div>
                                        </div>";
                                    }

                                ?>
                            </div>
                            
                            <!--Product Tab Content End-->
		                </div>
		                <!--Single Product Image End-->
		                <!--Single Product Content Start-->
		                <div class="col-md-6 col-sm-6">
		                    <div class="single-product-content">
                                <div class="form-register-title">
									<h2><?php echo $DisplayLine; ?></h2>
                                    <?php 
                                        echo "<h4>by <a style='color:#f68b1e' href=\"vendor.php?VID=".$product[0]->Supplier_ID."\"><b>".$product[0]->Username."</b></a></h4><br>";
                                    ?>
								</div>
		                        <!--Product Price Start-->
		                        <div class="single-product-price">
                                    <?php
                                        if ($Discount > 0) {
                                            echo "<span class=\"old-price\">¢ $SP</span>
                                            <span class=\"new-price\">¢ ".($SP-$Discount)."</span>";
                                        }else{
                                            echo "<span class=\"new-price\">¢ ".($SP)."</span>";
                                        }
                                    ?>
		                            
		                        </div>
		                        <!--Product Price End-->
		                        <!--Product Description Start-->
		                        <div class="product-description">
                                    <p><?php echo $MainDescription; ?><br>
                                        <ul>
                                            <?php 
                                                for ($i=0; $i < sizeof($HighlightedFeatures); $i++) { 
                                                    echo "<li style='margin-left:20px;' > <i style='color:#f68b1e' class='ion-ios-checkmark'></i> ".$HighlightedFeatures[$i]."</li>";
                                                }
                                            ?>
                                        </ul>
                                </p>
		                        </div>
		                        <!--Product Description End-->
		                        <!--Product Quantity Start-->
		                        <div class="single-product-quantity">
		                            <form action="#" method="POST">
		                                <div class="quantity">
                                            <label>Quantity</label>
                                            <input class="input-text" style='padding-right:10px;' name='quantity' value="1" min='1' max='<?php echo $Stock; ?>' type="number"> <?php echo "<span style='padding-left:10px; font-size:16px;'>( $Stock left ) </span>";?>
                                        </div>
                                        <span>
                                        <button class="quantity-button" style='float:left; margin-right:20px;' type="submit" name='add_to_cart'><i style='padding-right:5px; font-size: 18px;' class='ion-android-cart'></i> Add to Cart</button>
                                        <button class="quantity-button" type="submit" name='add_to_wishlist' ><i style='padding-right:5px; font-size: 20px;' class="ion-android-star"></i> Add to Wishlist</button>
                                            </span>
		                            </form>
		                        </div>

                                <div class="single-product-tab">
                                    <div class="single-product-tab-menu owl-carousel">
                                        <a data-toggle="tab" href="#w1"><img src="assets/img/product-thumb/1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#w2"><img src="assets/img/product-thumb/3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#w1"><img src="assets/img/product-thumb/1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#w2"><img src="assets/img/product-thumb/3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#w1"><img src="assets/img/product-thumb/1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#w2"><img src="assets/img/product-thumb/3.jpg" alt=""></a>
                                    </div>
                                </div>
                                <!--Product Quantity End-->
		                    </div>
		                </div>
		                <!--Single Product Content End-->
		            </div>
		        </div>
		        <!--Single Product Info End-->
		    </div>
		</section>
		<!--Single Product Area End-->
        <!--Related Products Area Start-->
        <?php 
             try{ 
                $db = new db();
                $db = $db->connect();
                $product_details_query = "SELECT *, products.ProductDescription as MainDescription, suppliers.ID as Supplier_ID, product_categories.Description as CategoryDescription, products.ID as Product_ID FROM products, product_categories, product_pictures, suppliers WHERE products.Supplier_ID = suppliers.ID AND product_pictures.ProductID = products.ID and products.Category = product_categories.CC and PicturePath LIKE '%a%' and Category = '$Category' LIMIT 0, 8";
                $stmt = $db->prepare($product_details_query);
                $stmt->execute();
                $product = $stmt->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }

            if (!is_null($product) AND sizeof($product)>0) {
                echo "<section class=\"related-products-area\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <!--Section Title1 Start-->
                            <div class=\"section-title1-border\">
                                <div class=\"section-title1\">
                                    <h3>Related products</h3>
                                </div>
                            </div> 
                            <!--Section Title1 End-->
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"related-products owl-carousel\">
                            <!--Single Product Start-->";

                for ($i=0; $i < sizeof($product); $i++) { 
                    if ($product[$i]->Product_ID!=$PID) {
                        echo "
		
                        <div class=\"col-md-12\">
                            <div class=\"single-product\">
                                <div class=\"product-img\">
                                    <a href=\"product.php?PID=".$product[$i]->Product_ID."\">
                                        <img class=\"first-img\" src=\"assets/img/products/thumbnails/".$product[$i]->Product_ID."a.jpg\" alt=\"\">
                                    </a>
                                    <ul class=\"product-action\">
                                    <li><a href=\"product.php?PID=$PID&add_to_wishlist=".$product[$i]->Product_ID."\" data-toggle=\"tooltip\" title=\"Add to Wishlist\"><i class=\"ion-android-favorite-outline\"></i></a></li>
                                    <li><a href=\"product.php?PID=$PID&add_to_cart=".$product[$i]->Product_ID."\" data-toggle=\"tooltip\" title=\"Add to Cart\"><i class=\"ion-ios-cart\"></i></a></li>
                                </ul>
                                </div>
                                <div class=\"product-content\">
                                    <h2><a href=\"product.php?PID=".$product[$i]->Product_ID."\">".$product[$i]->DisplayLine."</a></h2>
                                    <div class=\"product-price\">
                                    <span class=\"new-price\">¢ ".($product[$i]->SP - $product[$i]->Discount)."</span>
                                    </div> 
                                </div>
                            </div>
                        </div>";
                    }
                   
                }

                echo "    <!--Single Product End-->
                                </div>
                            </div>
                        </div>
                    </section>";
                            }
        
        ?>

                    
		<!--Related Products Area End-->
		<?php include("footer.php"); ?>
	</div>



    <!--All Js Here-->
    
	<!--Jquery 1.12.4-->
	<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
	<!--Imagesloaded-->
	<script src="assets/js/imagesloaded.pkgd.min.js"></script> 
	<!--Isotope-->
	<script src="assets/js/isotope.pkgd.min.js"></script>       
	<!--Ui js-->
	<script src="assets/js/jquery-ui.min.js"></script>       
	<!--Countdown-->
	<script src="assets/js/jquery.countdown.min.js"></script>        
	<!--Counterup-->
	<script src="assets/js/jquery.counterup.min.js"></script>       
	<!--ScrollUp-->
	<script src="assets/js/jquery.scrollUp.min.js"></script>
	<!--Chosen js-->
	<script src="assets/js/chosen.jquery.js"></script>
	<!--Meanmenu js-->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!--Instafeed-->
	<script src="assets/js/instafeed.min.js"></script> 
	<!--EasyZoom-->
	<script src="assets/js/easyzoom.min.js"></script> 
	<!--Fancybox-->
	<script src="assets/js/jquery.fancybox.pack.js"></script>       
	<!--Nivo Slider-->
	<script src="assets/js/jquery.nivo.slider.js"></script>
	<!--Waypoints-->
	<script src="assets/js/waypoints.min.js"></script>
	<!--Carousel-->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!--Slick-->
	<script src="assets/js/slick.min.js"></script>
	<!--Wow-->
	<script src="assets/js/wow.min.js"></script>
	<!--Bootstrap-->
	<script src="assets/js/bootstrap.min.js"></script>
	<!--Plugins-->
	<script src="assets/js/plugins.js"></script>
	<!--Main Js-->
    <script src="assets/js/main.js"></script>
    <?php 
        if (isset($SuccessMessage)) {
            echo "<div id=\"note\">
                    $SuccessMessage
                </div>"; 
        }elseif (isset($ErrorMessage)) {
            echo "<div style='background-color:red' id=\"note\">
                    $ErrorMessage
                </div>"; 
        }
    ?>
</body>
</html>
