<?php 
    include("session.php");
    include("mailinglistadd.php");
    if (!isset($_SESSION['Solushop_Customer_ID'])) {
        header("Location: login.php");
        exit();
    }
    if (isset($_POST["update_cart"])) {
        for ($i=0; $i < $_POST["CartCount"]; $i++) {
            $quantity = $_POST["quantity$i"];
            $ID = $_POST["CartID$i"];
            try{
                $db = new db();

                $db = $db->connect();
                $UpdateCartItem_query = "UPDATE cart SET Quantity = :quantity where ID = :ID";

                $stmt = $db->prepare($UpdateCartItem_query);
                $stmt->bindParam(':quantity', $quantity);
                $stmt->bindParam(':ID', $ID);

                //execute
                $stmt->execute();
                $db = null;

            }catch (PDOexception $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            } 
        }
        $UpdateCartSuccessMessage = "Cart updated successfully.";
    }
    

elseif (isset($_GET["remove_item_from_cart"])) {
        $remove_item_from_cart = $_GET["remove_item_from_cart"];
        try{
            $db = new db();
            $db = $db->connect();

            $delete_cart_query = "SELECT cart.ID, cart.Product_ID, products.DisplayLine, products.SP, products.Discount, cart.Quantity FROM cart, products where cart.Product_ID = products.ID and cart.User_ID = :Customer_ID and cart.ID = :remove_item_from_cart";

            $stmt = $db->prepare($delete_cart_query);
            $stmt->bindParam(':Customer_ID', $Customer_ID);
            $stmt->bindParam(':remove_item_from_cart', $remove_item_from_cart);
        
            //Execute
            $stmt->execute();
            $delete_cart = $stmt->fetchAll(PDO::FETCH_OBJ);
        
            $db = null;
            
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if(sizeof($delete_cart) > 0){
                for($i = 0; $i < sizeof($delete_cart); $i++){
                    $DisplayLine = $delete_cart[$i]->DisplayLine;
                    try{
                        $db = new db();
                        $db = $db->connect();
                        $removeFromCart_query = "DELETE From cart where ID = :remove_item_from_cart";

                        $stmt = $db->prepare($removeFromCart_query);
                        $stmt->bindParam(':remove_item_from_cart', $remove_item_from_cart);

                        //Execute
                        //$stmt->execute();
                        $db = null;
                    }catch (PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
                    if($stmt->execute()){
                        $RemoveItemFromCartSuccess = "$DisplayLine removed from cart successfully.";
                    }else{
                        $RemoveItemFromCartError = "Something went wrong. Please try again.";
                    }
                }
            }else{
                $RemoveItemFromCartError = "Item not found in your cart";
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

        <title>Cart</title>

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
        </style>
    </head>
    <script src="assets/js/modernizr.custom.80028.js"></script>
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php include("top-bar.php"); ?>
            <?php include("header-menu-bar.php"); ?>
            <?php include("nav-bar.php"); ?>
            <?php include("errorandsuccessmessages.php"); ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    <nav class="woocommerce-breadcrumb"><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Cart</nav>

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article class="page type-page status-publish hentry">
                                <header class="entry-header"><h1 itemprop="name" class="entry-title">Cart</h1></header><!-- .entry-header -->
                                <?php 
                                
                                        try{
                                            $db = new db();
                                            $db = $db->connect();
                                            $customer_cart_query = "SELECT cart.ID, cart.Product_ID, products.DisplayLine, products.SP, products.Discount, cart.Quantity FROM cart, products where cart.Product_ID = products.ID and cart.User_ID = :Customer_ID";
        
                                            $stmt = $db->prepare($customer_cart_query);
                                            $stmt->bindParam(':Customer_ID', $Customer_ID);
        
                                            //Execute
                                            $stmt->execute();
                                            $customer_cart = $stmt->fetchAll(PDO::FETCH_OBJ);
        
                                            $db = null;
                                        }catch (PDOexception $e){
                                            echo '{"error": {"text": '.$e->getMessage().'}';
                                        }
        
                                        $CartTotal = 0;
                                        $CartCount = 0;
                                        $j = 0;
                                        if (sizeof($customer_cart) > 0) {
                                            //record found
                                            for ($i=0; $i <sizeof($customer_cart); $i++) {
                                               $CartItemID[$j] = $customer_cart[$i]->ID;
                                               $CartItemProductID[$j] = $customer_cart[$i]->Product_ID;
                                               $CartItemDisplayLine[$j] = $customer_cart[$i]->DisplayLine;
                                               $CartItemSP[$j] = $customer_cart[$i]->SP * ((100-$customer_cart[$i]->Discount)/100);
                                               $CartItemQuantity[$j] = $customer_cart[$i]->Quantity;
                                               $CartItemTotal[$j] = $CartItemSP[$j]*$CartItemQuantity[$j];
                                               $CartTotal += $CartItemSP[$j]*$CartItemQuantity[$j];
                                               $CartCount += 1;
                                               $j++;
                                            }
                                            echo $CartCount;
                                        echo "<form method='POST' action='#'>
                                                <table class=\"shop_table shop_table_responsive cart\">
                                                    <thead>
                                                        <tr>
                                                            <th class=\"product-remove\">&nbsp;</th>
                                                            <th class=\"product-thumbnail\">&nbsp;</th>
                                                            <th class=\"product-name\">Product</th>
                                                            <th class=\"product-price\">Price</th>
                                                            <th class=\"product-quantity\">Quantity</th>
                                                            <th class=\"product-subtotal\">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";

                                        for ($j=0; $j < $i; $j++) { 
                                           echo "<tr class=\"cart_item\">

                                                <td class=\"product-remove\">
                                                    <a class=\"remove\" href=\"cart.php?remove_item_from_cart=".$CartItemID[$j]."\">×</a>
                                                </td>

                                                <td class=\"product-thumbnail\">
                                                    <a href=\"product.php?ID=".$CartItemProductID[$j]."\"><img width=\"180\" height=\"180\" src=\"assets/images/products/thumbnails/".$CartItemProductID[$j]."a.png\" alt=\"\"></a>
                                                </td>

                                                <td data-title=\"Product\" class=\"product-name\">
                                                    <a href=\"single-product.html\">".$CartItemDisplayLine[$j]."</a>
                                                </td>

                                                <td data-title=\"Price\" class=\"product-price\">
                                                    <span class=\"amount\"> &#8373; ".$CartItemSP[$j]."</span>
                                                </td>

                                                <td data-title=\"Quantity\" class=\"product-quantity\">
                                                    <div class=\"quantity\">
                                                        <label>Quantity:</label>
                                                         <input type=\"number\" name=\"quantity$j\" value=\"".$CartItemQuantity[$j]."\" name=\"carttest[".$CartItemQuantity[$j]."]\" title=\"Qty\" class=\"input-text qty text\" min='1'/>
                                                    </div>
                                                </td>

                                                <td data-title=\"Total\" class=\"product-subtotal\">
                                                    <span class=\"amount\"> &#8373; ".$CartItemTotal[$j]."</span>
                                                </td>
                                                 <input type='hidden' name='CartID$j' value='".$CartItemID[$j]."'>
                                            </tr>";

                                        }
                                        echo "<input type='hidden' name='CartCount' value='$CartCount'>";
                                    }else{
                                        echo "<table class=\"shop_table shop_table_responsive cart\">
                                                    
                                                    <tbody>
                                                    <br><br>
                                                    <div style='text-align:center;'><h3>No products in cart yet</h3></div>";

                                            $CartEmpty = 'Yes';
                                    }
                           
                                ?>
                                       
                                            <tr>

                                                
                                                <td class="actions" colspan="6">

                                                    <div class="coupon">

                                                        <label for="coupon_code">Coupon:</label> <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code"> <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">

                                                    </div>
                                                    <input type="submit" value="Update Cart" name="update_cart" class="button">
                                                    <br><br>
                                                    <div class="cart-collaterals">

                                                        <div class="cart_totals ">

                                                            <h2>Cart Totals</h2>

                                                            <table class="shop_table shop_table_responsive">

                                                                <tbody>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Subtotal</th>
                                                                        <td data-title="Subtotal"><span class="amount"><?php echo $CartTotal; ?></span></td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>

                                                        </div>

                                                    </div>

                                                    
                                                    <?php 
                                                        if (!isset($CartEmpty)) {
                                                                echo "<div class=\"wc-proceed-to-checkout\">

                                                                        <a class=\"checkout-button button alt wc-forward\" href=\"checkout.php\">Proceed to Checkout</a>
                                                                    </div>";
                                                        }

                                                    ?>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                
                            </article>
                        </main><!-- #main -->
                    </div><!-- #primary -->
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
