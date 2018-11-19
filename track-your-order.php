<?php 
    include("session.php");
    include("mailinglistadd.php");
    $OrderGoodShow = "No";

    if (isset($_POST["track-your-order"])) {
        //take details from post
        if (trim($_POST["orderid"]) == "") {
            $ErrorMessage = "Please enter an order ID";
        }elseif (trim($_POST["order_email"]) == "") {
            $ErrorMessage = "Please enter your order email";
        }else{
            $OrderEmail = $_POST["order_email"];
            $Order_ID = $_POST["orderid"];
        }

        try{
            $db = new db();
            $db = $db->connect();
            $sql_order_query = "SELECT * FROM orders, customers where orders.Customer_ID = customers.Customer_ID and Email= :OrderEmail and Order_ID= :Order_ID";
            $stmt = $db->prepare($sql_order_query);
            $stmt->bindParam(':OrderEmail', $OrderEmail);
            $stmt->bindParam(':Order_ID', $Order_ID);
            $stmt->execute();
            $sql_order = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if(sizeof($sql_order) > 0){
                $OID = $Order_ID;
            }else{
            $ErrorMessage = "Order not found in combination with that email";
        }


        //select order details
        if (isset($OID)) {
            
            try{
                $db = new db();
                $db = $db->connect();
                $sql_order_query = "SELECT *, orders.Order_ID as OID FROM orders, order_state, order_items where orders.Order_ID=order_items.Order_ID and order_state.ID = orders.Order_State and orders.Order_ID= :OID";
                $stmt = $db->prepare($sql_order_query);
                $stmt->bindParam(':OID', $OID);
                $stmt->execute();
                $sql_order = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_order) > 0){
                    for($i = 0; $i < sizeof($sql_order); $i++){
                        $Order_ID = $sql_order[$i]->OID;
                        $Order_Date = $sql_order[$i]->Order_Date;
                        $Order_State = $sql_order[$i]->UserDescription;
                        $Order_State_ID = $sql_order[$i]->Order_State;
                        $Order_Total= $sql_order[$i]->TotalAmount;
                        $Shipping = $sql_order[$i]->Shipping;
                        $Order_State_Description = $sql_order[$i]->UserRawDescription;
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

        <title>Track Your Order</title>

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
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php include("top-bar.php"); ?>
            <?php include("header-menu-bar.php"); ?>
            <?php include("nav-bar.php"); ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">
                <?php
                   include("errorandsuccessmessages.php");;                    
                ?>

                    <nav class="woocommerce-breadcrumb" >
                        <a href="home.html">Home</a>
                        <span class="delimiter"><i class="fa fa-angle-right"></i></span>Track your Order
                    </nav><!-- .woocommerce-breadcrumb -->

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">


                            <article id="post-2181" class="post-2181 page type-page status-publish hentry">

                                <header class="entry-header">
                                    <h1 class="entry-title" itemprop="name">Track your Order</h1>
                                </header><!-- .entry-header -->

                                <?php 
                                    if (!isset($OID)) {
                                        echo "<div class=\"entry-content\" itemprop=\"mainContentOfPage\">
                                                <div class=\"woocommerce\">
                                                    <form action=\"#\" method=\"post\" class=\"track_order\">

                                                        <p>To track your order please enter your Order ID in the box below and press the \"Track\" button. This was given to you on your receipt and in the confirmation email you should have received.</p>

                                                        <p class=\"form-row form-row-first\">
                                                            <label for=\"orderid\">Order ID</label>
                                                            <input class=\"input-text\" type=\"text\" name=\"orderid\" id=\"orderid\" placeholder=\"Found in your order confirmation email.\" />
                                                        </p>

                                                        <p class=\"form-row form-row-last\">
                                                            <label for=\"order_email\">Billing Email</label>
                                                            <input class=\"input-text\" type=\"text\" name=\"order_email\" id=\"order_email\" placeholder=\"Email you used during checkout.\" />
                                                        </p>

                                                        <div class=\"clear\"></div>

                                                        <p class=\"form-row\" style=\"text-align: center;\">
                                                            <input type=\"submit\" class=\"button\" name=\"track-your-order\" value=\"Track\" />
                                                        </p>
                                                    </form>
                                                </div>
                                            </div><!-- .entry-content -->";
                                    }
                                ?>
                                
                            <div>
                                <?php 


                                if (isset($OID)) {
                                    echo "<div class=\"row\">
                                        <div class=\"col-lg-4 col-md-4 col-xs-12\">
                                          <aside class=\"widget clearfix\">
                                            <div class=\"body\">
                                            </div>
                                          </aside>
                                        </div>
                                        <div class=\"col-lg-4 col-md-4 col-xs-12\">
                                          <aside class=\"widget clearfix\">
                                            <div class=\"body\">
                                            </div>
                                          </aside>
                                        </div>
                                        <div class=\"col-lg-4 col-md-4 col-xs-12\">
                                          <aside class=\"widget clearfix\">
                                            <div class=\"body\">
                                              <ul class=\"product_list_widget\" style=\"text-align: center;\">
                                                <h4 style='text-align: right;'>$OID</h2>
                                                <h4 style='text-align: right;'>$Order_State_Description</h3>
                                              </ul>
                                            </div>
                                          </aside>
                                        </div>
                                    </div><br>";

                                    try{
                                        $db = new db();
                                        $db = $db->connect();
                                        $order_quantity_query = "SELECT *, order_items.Quantity as OrderQuantity, order_items.State as OrderItemState FROM order_items, order_items_state, products where 
                                        products.ID=order_items.Product_ID and order_items_state.ID = order_items.State and order_items.Order_ID= :OID";
                                        
                                        $stmt = $db->prepare($order_quantity_query);
                                        $stmt->bindParam(':OID', $OID);
                                        $stmt->execute();
                                        $order_quantity = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        $db = null;
                                        }catch(PDOException $e){
                                            echo '{"error": {"text": '.$e->getMessage().'}';
                                        }
                                        if(sizeof($sql_order) > 0){
                                                 echo "<form method='POST' action='#'>
                                                    <table class=\"shop_table shop_table_responsive cart\">
                                                        <thead>
                                                            <tr>
                                                                <th class=\"product-remove\">Order Item ID</th>
                                                                <th class=\"product-thumbnail\">&nbsp;</th>
                                                                <th class=\"product-name\">Product</th>
                                                                <th class=\"product-price\">Quantity</th>
                                                                <th class=\"product-subtotal\">Item State</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>";
                                            for($i = 0; $i < sizeof($order_quantity); $i++) {
                                                if ($order_quantity[$i]->OrderItemState == "0") {
                                                    $OrderItemState = "Awaiting Order Confirmation";
                                                }elseif ($order_quantity[$i]->OrderItemState == "1") {
                                                    $OrderItemState = "Being picked Up";
                                                }elseif ($order_quantity[$i]->OrderItemState == "2") {
                                                    $OrderItemState = "Delivering";
                                                }elseif ($order_quantity[$i]->OrderItemState == "3") {
                                                    $OrderItemState = "Delivered";
                                                }elseif ($order_quantity[$i]->OrderItemState == "4") {
                                                    $OrderItemState = "Cancelled";
                                                }
                                               echo "<tr class=\"cart_item\">

                                                    <td class=\"product_name\">
                                                        <a  href=\"\">$OID-".$row['ID']."</a>
                                                    </td>

                                                    <td class=\"product-thumbnail\">
                                                        <a href=\"product.php?ID=".$row['ID']."\"><img width=\"180\" height=\"180\" src=\"assets/images/products/thumbnails/".$row['ID']."a.png\" alt=\"\"></a>
                                                    </td>

                                                    <td data-title=\"Product\" class=\"product-name\">
                                                        <a href=\"product.php?ID=".$row['ID']."\">".$row['DisplayLine']."</a>
                                                    </td>

                                                    <td data-title=\"Quantity\" class=\"product-price\">
                                                        <span class=\"amount\"> x ".$row['OrderQuantity']."</span>
                                                    </td>
                                                     <td data-title=\"State\" class=\"product-price\">
                                                        <span class=\"amount\">".$OrderItemState."</span>
                                                    </td>
                                                </tr>";
                                            }

                                               

                                            
                                        }

                                        echo "
                                 <tr>

                                                
                                                <td class=\"actions\" colspan=\"6\" style='padding-top:0;'>

                                                    <div class=\"cart-collaterals\">

                                                        <div class=\"cart_totals\">

                                                            <h2>Order Totals</h2>

                                                            <table class=\"shop_table shop_table_responsive\">

                                                                <tbody>
                                                                    <tr class=\"cart-subtotal\">
                                                                        <th>Subtotal</th>
                                                                        <td data-title=\"Subtotal\"><span class=\"amount\">$Order_Total</span></td>
                                                                    </tr>
                                                                    <tr class=\"cart-subtotal\">
                                                                        <th>Shipping</th>
                                                                        <td data-title=\"Shipping\"><span class=\"amount\">$Shipping</span></td>
                                                                    </tr>
                                                                    <tr class=\"cart-subtotal\">
                                                                        <th>Total</th>
                                                                        <td data-title=\"Total\"><span class=\"amount\">".($Shipping+$Order_Total)."</span></td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>

                                                        </div>

                                                    </div>

                                                 
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>";
                                    }
                           
                                ?>

                            </div>


                </div><!-- .col-full -->
            </div><!-- #content -->
            </div>
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
