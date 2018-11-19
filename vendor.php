<?php 
    include("config/db.php");
    include("session.php");
    include("mailinglistadd.php");

    if (!isset($_GET["VID"])) {
        header("Location: shop.php");
        exit;
    }else{
        $vendor_id = $_GET["VID"];
    }
    
    function sanitize($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = str_replace("'", "", $data);
            $data = str_replace("\"", "", $data);
            $data = str_replace("=", "", $data);
            return $data;
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

    //select vendor
    try{
        $db = new db();
        $db = $db->connect();
        $sql_product_query = "SELECT * from suppliers where ID = :vendor_id";
        $stmt = $db->prepare($sql_product_query);
        $stmt->bindParam(':vendor_id', $vendor_id);
        $stmt->execute();
        $vendor = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }  

    if (sizeof($vendor)!=1) {
        header("Location: shop.php");
        exit;
    }

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $vendor[0]->Name; ?></title>
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
		                            <li>Lewis Selby Clothing</li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Heading Banner Area End-->
        <?php 

            //limit settings for product display
            $NoOfRecords = sizeof($_SESSION["ProductIDs"]);
            $RecordLimitPerPage = 12;

            //Number of Pages
            $NoOfPages = ceil($NoOfRecords/$RecordLimitPerPage);
            
            if (!isset($_GET["PG"]) ) {
                $PG = 0;
            }else{
                $PG = $_GET["PG"]-1;
            }

            //check for garbage page number
            if ($PG < 0 OR $PG > ($NoOfPages-1)) {
                echo "
                    <script type=\"text/javascript\">
                    window.location.href = '404.php';
                    </script>";
            }
            $StartLimit = $PG * $RecordLimitPerPage;
            $EndLimit = $StartLimit + ($RecordLimitPerPage-1);

            
            //selecting product to display
            $ProductToDisplayCounter = $StartLimit;
            $SubProductsCounter = 0;

        
            while ($ProductToDisplayCounter < $NoOfRecords AND $SubProductsCounter < $RecordLimitPerPage){
                $ProductToDisplay[$SubProductsCounter] = $_SESSION["ProductIDs"][$ProductToDisplayCounter];
                $ProductToDisplayCounter++;
                $SubProductsCounter++;
            }

            //Current Page
            $CPG = $PG+1;
            
            
            //selecting records | building a dynamic query string.
            try{
                $db = new db();
                $db = $db->connect();
                $sql_product_query = "SELECT *, products.ID as productsID from products, suppliers WHERE products.Supplier_ID = suppliers.ID AND suppliers.ID = '$vendor_id' AND(products.ID = '".$ProductToDisplay[0]."'";

                for ($i=1; $i < sizeof($ProductToDisplay); $i++) { 
                    $sql_product_query .= " OR products.ID = '".$ProductToDisplay[$i]."'";
                }
                $sql_product_query .= ")";
                $stmt = $db->prepare($sql_product_query);
                $stmt->execute();
                $display_product = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null; 
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }

            
        ?>
		<!--Product List Grid View Area Start-->
		<div class="product-list-grid-view-area mt-20">
		    <div class="container">
		        <div class="row">
		            <!--Shop Product Area Start-->
		            <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3">
		                <div class="shop-desc-container">
		                    <div class="row">
                                <!--Shop Product Image Start-->
		                        <div class="col-md-12">
		                            <div class="shop-product-img mb-30 img-full">
		                                <img src="assets/img/vendor-banner/<?php echo $vendor_id.".jpg" ?>" alt="">
		                            </div>
		                        </div>
		                        <!--Shop Product Image Start-->
		                    </div>
		                  </div>
                          <!--Shop Tab Menu Start-->
                          <div class="shop-tab-menu">
                            <div class="row">
                                <!--List & Grid View Menu Start-->
                                <div class="col-md-5 col-sm-5 col-lg-6 col-xs-12">
                                    <div class="shop-tab">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                                <!--List & Grid View Menu End-->
                                <!-- View Mode Start-->
                                <div class="col-md-7 col-sm-7 col-lg-6 hidden-xs text-right">
                                    <div class="show-result">
                                        <p>
                                            <?php
                                                if ($NoOfRecords < $RecordLimitPerPage) {
                                                    echo "Showing ".($StartLimit+1)." – ".($NoOfRecords)." of $NoOfRecords results";
                                                } 
                                                elseif ($EndLimit == $NoOfRecords) {
                                                    echo "Showing ".($StartLimit+1)." – ".($NoOfRecords)." of $NoOfRecords results";
                                                }
                                                else{
                                                    echo "Showing ".($StartLimit+1)." – ".($EndLimit+1)." of $NoOfRecords results";
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <!-- View Mode End-->
                            </div>
                        </div>
                          <!--Shop Tab Menu End-->
                          <!--Shop Product Area Start-->
                          <div class="shop-product-area">
                              <div class="tab-content">
                                  <!--Grid View Start-->
                                  <div id="grid-view" class="tab-pane fade in active">
                                      <div class="row">
                                      <div class="product-container">
                                            <!--Single Product Start-->
                                            <?php 
                                              //product container counter
                                              $ProductContainerCounter = 0;
                                              for ($i=0; $i < sizeof($display_product); $i++) { 
                                                echo "
                                                <div class=\"col-md-3 col-sm-3 item-col2\">
                                                    <div class=\"single-product\">
                                                        <div class=\"product-img\">
                                                            <a href=\"single-product.php\">
                                                                <img class=\"first-img\" src=\"assets/img/products/thumbnails/".$display_product[$i]->productsID."a.jpg\" alt=\"\">
                                                                <img class=\"hover-img\" src=\"assets/img/product/24.jpg\" alt=\"\">
                                                            </a>
                                                            <ul class=\"product-action\">
                                                                <li><a href=\"vendor.php?VID=$vendor_id&add_to_wishlist=".$display_product[$i]->productsID."\" data-toggle=\"tooltip\" title=\"Add to Wishlist\"><i class=\"ion-android-favorite-outline\"></i></a></li>
                                                                <li><a href=\"vendor.php?VID=$vendor_id&add_to_cart=".$display_product[$i]->productsID."\" data-toggle=\"tooltip\" title=\"Add to Cart\"><i class=\"ion-ios-cart\"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class=\"product-content\">
                                                            <h2 style='margin-bottom:5px;'><a href=\"single-product.php\">".$display_product[$i]->DisplayLine."</a></h2>
                                                            <div class=\"product-price\">
                                                                <span class=\"new-price\">¢ ".$display_product[$i]->SP."</span>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>";
                                               
                                                $ProductContainerCounter++;
                                              } 
                                            ?>
                                              
                                              
                                              <!--Single Product End-->
                                          </div>
                                      </div>
                                  </div>
                                  <!--Grid View End-->
                              </div>
                          </div>
                          <!--Shop Product Area End-->
                          <!--Pagination Start-->
                          <div class="pagination pb-10">
                             <ul class="page-number">
                                <?php 
                                    for ($i=1; $i <= $NoOfPages; $i++) { 
                                        if ($i == $CPG) {
                                            echo "<li class=\"active\"><a href=\"shop.php?PG=$i\">$i</a></li>";
                                        }else{
                                            echo "<li><a href=\"shop.php?PG=$i\">$i</a></li>";
                                        }
                                    }
                                ?>
                             </ul> 
                          </div>
                          <!--Pagination End--> 
		            </div>
		            <!--Shop Product Area End-->
		            <!--Left Sidebar Start-->
		            <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9">
		                <img src ='assets/img/offer/advertise-here.jpg' >
		            </div>
		            <!--Left Sidebar End-->
		        </div>
		    </div>
		</div>
		<!--Product List Grid View Area End-->
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
