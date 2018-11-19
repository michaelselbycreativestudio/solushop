<?php 
    include("databaseconnection.php");
    include("session.php");
    if (isset($_GET["add_to_cart"])) {
        $Quantity = 1;
        $product_id= $_GET["add_to_cart"];
        if (!isset($_SESSION['Solushop_Customer_ID'])) {
            $CartError = "Sorry, you need to be logged in to add to your cart";
        }elseif($Quantity<1){
            $CartError = "You can't add $Quantity products to your cart. Add 1 or more";
        }else{
            try{
                $db = new db();
                $db = $db->connect();
                $sql_product_query = "SELECT * from products where ID = :product_id";
                $stmt = $db->prepare($sql_product);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null; 
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_product) > 0){
                    for($i = 0; $i < sizeof($sql_product); $i++){
                        $DisplayLine = $sql_product[$i]->DisplayLine;
                    }
            }else{
                $ReviewError = "Sorry, we can't seem to find that product";
            }
            $user_id = $_SESSION['Solushop_Customer_ID'];
            $quantity = 1;

            //Checking if item is already in cart.
            try{
                $db = new db();
                $db = $db->connect();
                $sql_count_cart_query = "SELECT count(*) as count from cart where User_ID= :user_id and Product_ID = :product_id";
                $stmt = $db->prepare($sql_count_cart);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_count_cart = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_count_cart) > 0){
                    for($i = 0; $i < sizeof($sql_count_cart); $i++){
                        if(($sql_count_cart[$i]->count) > 0){
                            $CartError = "$DisplayLine already found in cart";
                        }
                    }
                }
            if (!isset($CartError)) {
                try{
                    $db = new db();
                    $db = $db->connect();
                    $insert_cart_query = "INSERT INTO cart( User_ID, Product_ID, Quantity) VALUES ( :user_id, :product_id, :quantity)";
                    $stmt = $db->prepare($insert_cart);
                    $stmt->bindParam(':user_id', $user_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $quantity);
                    $stmt->execute();
                    $db = null;
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
                
                if ($stmt->execute()) {
                    if ($quantity>1) {
                        $CartSuccess = "$quantity $DisplayLine have been added to your cart.";
                    }elseif ($quantity==1) {
                        $CartSuccess = "$quantity $DisplayLine has been added to your cart.";
                    }
                    
                }
            }
        }
    }

    if (isset($_GET["add_to_wishlist"])) {
        if (!isset($_SESSION['Solushop_Customer_ID'])) {
            $WishlistError = "Sorry, you need to be logged in to add to your wishlist";
        }else{
            $product_id = $_GET["add_to_wishlist"];
            try{
                $db = new db();
                $db = $db->connect();
                $sql_product_query = "SELECT * from products where ID = :product_id";
                $stmt = $db->prepare($sql_product);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null; 
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_product) > 0){
                    for($i = 0; $i < sizeof($sql_product); $i++){
                        $DisplayLine = $sql_product[$i]->DisplayLine;
                    }
            }else{
                $ReviewError = "Sorry, we can't seem to find that product";
            }
            $user_id = $_SESSION['Solushop_Customer_ID'];
            //Checking if item is already in wishlist.
            try{
                $db = new db();
                $db = $db->connect();
                $sql_count_wishlist_query = "SELECT count(*) as count from cart where User_ID= :user_id and Product_ID = :product_id";
                $stmt = $db->prepare($sql_count_wishlist);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                $sql_count_wishlist = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_count_wishlist) > 0){
                    for($i = 0; $i < sizeof($sql_count_wishlist); $i++){
                        if(($sql_count_wishlist[$i]->count) > 0){
                            $WishlistError = "$DisplayLine already found in Wishlist";
                        }
                    }
                }
            if (!isset($WishlistError)) {
                try{
                    $db = new db();
                    $db = $db->connect();
                    $insert_cart_query = "INSERT INTO wishlist( User_ID, Product_ID) VALUES ( :user_id, :product_id)";
                    $stmt = $db->prepare($insert_cart);
                    $stmt->bindParam(':user_id', $user_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->execute();
                    $db = null;
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
                
                if ($stmt->execute()) {
                        $WishlistSuccess = " $DisplayLine has been added to your wishlist.";
                    
                    
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71743571-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-71743571-3');
</script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Camera, Video &amp; Audio</title>

        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/colors/blue.css" media="all" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

        <link rel="shortcut icon" href="assets/images/fav-icon.png">
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <style type="text/css">
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
              position: fixed;
              left: 0px;
              top: 0px;
              width: 100%;
              height: 100%;
              z-index: 9999;
              background: url(assets/images/loader.gif) center no-repeat white;
          }
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
                line-height: 3;
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
        .cssanimations.csstransforms #close {
          display: none;
        }
        }
        </style>
    </head>
    <script src="assets/js/modernizr.custom.80028.js"></script>
    <body class="left-sidebar">
        <?php
           include("errorandsuccessmessages.php");;                    
        ?>
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php include("top-bar.php"); ?>
            <?php include("header-menu-bar.php"); ?>
            <?php include("nav-bar.php"); ?>

            <div id="content" class="site-content" tabindex="-1">
            	<div class="container">
                    
            		<nav class="woocommerce-breadcrumb" ><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Camera, Video &amp; Audio</nav>

            		<div id="primary" class="content-area">
            			<main id="main" class="site-main">
                			<section>
                                <header>
                                    <h2 class="h1">Camera, Video &amp; Audio</h2>
                                </header>
                                <div class="woocommerce columns-4">
                                    <ul class="product-loop-categories">
                                        <li class="product-category product first"><a href="product-category-redirect.php?cat=sub||2.1"><img src="assets/images/product-category/e.png" alt="Cameras" width="250" height="232" /><h3>Cameras <mark class="count">(2)</mark></h3></a></li>
                                        <li class="product-category product"><a href="product-category-redirect.php?cat=sub||2.2"><img src="assets/images/product-category/g.png" alt="Accessories" width="250" height="232" /><h3>Accessories <mark class="count">(1)</mark></h3></a></li>
                                    </ul>
                                </div>
                            </section>
                            <?php 
                                //selecting best sellers from main category 2
                                $main_cat = '2';
                                try{
                                    $db = new db();
                                    $db = $db->connect();
                                    $bestsellers_products_query = "SELECT Products from bestsellers_and_categories WHERE Main_Category = :main_cat";
                                    $stmt = $db->prepare($bestsellers_products_query);
                                    $stmt->bindParam(':main_cat', $main_cat);
                                    $stmt->execute();
                                    $bestsellers_products = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    $db = null;
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';
                                    }

                                  if (sizeof($bestsellers_products) > 0) {
                                    echo "<section class=\"section-product-cards-carousel\" >
                                            <header><h2 class=\"h1\">Best Sellers</h2></header>
                                            <div id=\"home-v-product-cards-careousel\">
                                                <div class=\"woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel\">

                                                    <ul class=\"products columns-2\">";

                                      for($i = 0; $i < sizeof($bestsellers_products); $i++) {
                                        $ProductIDs = explode(",", $bestsellers_products[$i]->Products);
                                        $product_one = $ProductIDs[0];
                                        try{
                                            $db = new db();
                                            $db = $db->connect();
                                            $sql_product_query = "SELECT * FROM products, product_categories where products.Category = product_categories.CategoryCode and (products.ID = :product_one";
                                            for ($i=1; $i < sizeof($ProductIDs); $i++) { 
                                                $sql_product_query = $sql_product_query." OR Products.ID='".$ProductIDs[$i]."'";
                                            }
                                            $sql_product_query = $sql_product_query.")";
                                            $stmt = $db->prepare($sql_product_query);
                                            $stmt->bindParam(':product_one', $product_one);
                                            $stmt->execute();
                                            $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            $db = null;
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';
                                            }
                                            for($i = 0; $i < sizeof($sql_product); $i++){
                                                $ID = $sql_product[$i]->ID;
                                                $CategoryCode = $sql_product[$i]->CategoryCode;
                                                $CategoryString = $sql_product[$i]->CategoryDescription;
                                                $Category = explode(">", $CategoryString);
                                                $DisplayLine = $sql_product[$i]->DisplayLine;
                                                $ProductDescription = $sql_product[$i]->ProductDescription;
                                                $ProductSpecification = $sql_product[$i]->ProductSpecification;
                                                $TagsString = $sql_product[$i]->Tags;
                                                $Tags = explode(",", $TagsString);
                                                $SP = $sql_product[$i]->SP;
                                                $DisplayPicture = $sql_product[$i]->DisplayPicture;
                                                $Discount = $sql_product[$i]->Discount;
                                                $DiscountPrice = $Discount/100 * $SP;
                                                $SalePrice = $SP - $Discount/100 * $SP;
                                                $Brand = $sql_product[$i]->Brand;
                                                $HighlightedFeaturesString = $sql_product[$i]->HighlightedFeatures;
                                                $HighlightedFeatures = explode(",", $HighlightedFeaturesString);
                                                $ProductIntroductoryLine = $sql_product[$i]->ProductIntroductoryLine;
    
                                            echo "<li class=\"product product-card \">

                                                <div class=\"product-outer\">
                                                    <div class=\"media product-inner\">

                                                        <a class=\"media-left\" href=\"product.php?ID=$ID\" title=\"$ProductIntroductoryLine\">
                                                            <img class=\"media-object wp-post-image img-responsive\" src=\"assets/images/blank.gif\" data-echo=\"assets/images/products/Main/$ID"."a.png\" alt=\"\">

                                                        </a>

                                                        <div class=\"media-body\">
                                                            <span class=\"loop-product-categories\">
                                                                <a href=\"product.php?ID=$ID\" rel=\"tag\">".$Category[1]."</a>
                                                            </span>

                                                            <a href=\"product.php?ID=$ID\">
                                                                <h3>$DisplayLine</h3>
                                                            </a>

                                                            <div class=\"price-add-to-cart\">
                                                                <span class=\"price\">
                                                                    <span class=\"electro-price\">
                                                                        <ins><span class=\"amount\">&#8373; $SalePrice </span></ins>";
                                                                        if ($DiscountPrice > 0) {
                                                                            echo "<del><span class=\"amount\"> &#8373; $SP</span></del>";
                                                                        }
                                                                    echo "</span>
                                                                </span>

                                                                <a href=\"p-camera-video-and-audio.php?add_to_cart=$ID\" class=\"button add_to_cart_button\">Add to cart</a>
                                                            </div><!-- /.price-add-to-cart -->

                                                            <div class=\"hover-area\">
                                                                <div class=\"action-buttons\">

                                                                    <a href=\"p-camera-video-and-audio.php?add_to_wishlist=$ID\" class=\"add_to_wishlist\">
                                                                        Wishlist</a>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- /.product-inner -->
                                                </div><!-- /.product-outer -->

                                            </li><!-- /.products -->";
                                        }
                                        
                                      }
                                      echo "</ul>
                                       </div>
                                </div><!-- #home-v1-product-cards-careousel -->
                                </section>";
                                  }
                            ?>
                            
                                            
                                   
                            

                            <?php 
                                //selecting best sellers from main category 2
                                $top_cat = '2';
                                try{
                                    $db = new db();
                                    $db = $db->connect();
                                    $sql_products_toprated_query = "SELECT Products from toprated_and_categories WHERE Main_Category= :top_cat";
                                    $stmt = $db->prepare($sql_products_toprated_query);
                                    $stmt->bindParam(':top_cat', $top_cat);
                                    $stmt->execute();
                                    $sql_products_toprated = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    $db = null;
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';
                                    }

                                  if (sizeof($sql_products_toprated) > 0) {
                                    echo "<section class=\"section-product-cards-carousel\" >
                                            <header><h2 class=\"h1\">Top Rated</h2></header>
                                            <div id=\"home-v-product-cards-careousel\">
                                                <div class=\"woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel\">

                                                    <ul class=\"products columns-2\">";

                                        for ($i = 0; $i < sizeof($sql_products_toprated); $i++){
                                        $ProductIDs = explode(",", $sql_products_toprated[$i]->Products);
                                        $product_one = $ProductIDs[0];
                                        try{
                                            $db = new db();
                                            $db = $db->connect();
                                            $sql_product_query = "SELECT * FROM products, product_categories where products.Category = product_categories.CategoryCode and (products.ID = :product_one";
                                            for ($i=1; $i < sizeof($ProductIDs); $i++) { 
                                                $sql_product_query = $sql_product_query." OR Products.ID='".$ProductIDs[$i]."'";
                                            }
                                            $sql_product_query = $sql_product_query.")";

                                            $stmt = $db->prepare($sql_product_query);
                                            $stmt->bindParam(':product_one', $product_one);
                                            $stmt->execute();
                                            $sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            $db = null;
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';
                                            }
                                            for($i = 0; $i < sizeof($sql_product); $i++){
                                                $ID = $sql_product[$i]->ID;
                                                $CategoryCode = $sql_product[$i]->CategoryCode;
                                                $CategoryString = $sql_product[$i]->CategoryDescription;
                                                $Category = explode(">", $CategoryString);
                                                $DisplayLine = $sql_product[$i]->DisplayLine;
                                                $ProductDescription = $sql_product[$i]->ProductDescription;
                                                $ProductSpecification = $sql_product[$i]->ProductSpecification;
                                                $TagsString = $sql_product[$i]->Tags;
                                                $Tags = explode(",", $TagsString);
                                                $SP = $sql_product[$i]->SP;
                                                $DisplayPicture = $sql_product[$i]->DisplayPicture;
                                                $Discount = $sql_product[$i]->Discount;
                                                $DiscountPrice = $Discount/100 * $SP;
                                                $SalePrice = $SP - $Discount/100 * $SP;
                                                $Brand = $sql_product[$i]->Brand;
                                                $HighlightedFeaturesString = $sql_product[$i]->HighlightedFeatures;
                                                $HighlightedFeatures = explode(",", $HighlightedFeaturesString);
                                                $ProductIntroductoryLine = $sql_product[$i]->ProductIntroductoryLine;
    
                                            echo "<li class=\"product product-card \">

                                                <div class=\"product-outer\">
                                                    <div class=\"media product-inner\">

                                                        <a class=\"media-left\" href=\"product.php?ID=$ID\" title=\"$ProductIntroductoryLine\">
                                                            <img class=\"media-object wp-post-image img-responsive\" src=\"assets/images/blank.gif\" data-echo=\"assets/images/products/Main/$ID"."a.png\" alt=\"\">

                                                        </a>

                                                        <div class=\"media-body\">
                                                            <span class=\"loop-product-categories\">
                                                                <a href=\"product.php?ID=$ID\" rel=\"tag\">".$Category[1]."</a>
                                                            </span>

                                                            <a href=\"product.php?ID=$ID\">
                                                                <h3>$DisplayLine</h3>
                                                            </a>

                                                            <div class=\"price-add-to-cart\">
                                                                <span class=\"price\">
                                                                    <span class=\"electro-price\">
                                                                        <ins><span class=\"amount\">&#8373; $SalePrice </span></ins>";
                                                                        if ($DiscountPrice > 0) {
                                                                            echo "<del><span class=\"amount\"> &#8373; $SP</span></del>";
                                                                        }
                                                                    echo "</span>
                                                                </span>

                                                                <a href=\"p-camera-video-and-audio.php?add_to_cart=$ID\" class=\"button add_to_cart_button\">Add to cart</a>
                                                            </div><!-- /.price-add-to-cart -->

                                                            <div class=\"hover-area\">
                                                                <div class=\"action-buttons\">

                                                                    <a href=\"p-camera-video-and-audio.php?add_to_wishlist=$ID\" class=\"add_to_wishlist\">
                                                                        Wishlist</a>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- /.product-inner -->
                                                </div><!-- /.product-outer -->

                                            </li><!-- /.products -->";
                                        }
                                        
                                      }
                                      echo "</ul>
                                       </div>
                                </div><!-- #home-v1-product-cards-careousel -->
                                </section>";
                                  }
                            ?>
                            
                            

                        </main><!-- #main -->
                    </div><!-- #primary -->

            		<?php include("div-prod-cat-side.php"); ?>

            	</div><!-- .container -->
            </div><!-- #content -->

            <?php include("footer.php"); ?>
        </div><!-- #page -->

        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/tether.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="assets/js/echo.min.js"></script>
        <script type="text/javascript" src="assets/js/wow.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="assets/js/electro.js"></script>

    </body>
</html>
