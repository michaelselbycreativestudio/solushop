<!--Header Middel Area Start-->
<div class="header-middel-area">
    <div class="container">
        <div class="row">
            <!--Logo Start-->
            <div class="col-md-2 col-sm-3 col-xs-12">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                </div>
            </div>
            <!--Logo End-->
            <!--Search Box Start-->
            <div class="col-md-7 col-sm-5 col-xs-12">
                <div class="search-box-area">
                    <form action="#">
                        <div class="select-area">
                        <select data-placeholder="Choose Category" class="select" tabindex="1">
                            <option value="">All Categories</option>
                            <option>Dallas Cowboys</option>
                            <option>New York Giants</option>
                            <option>Philadelphia Eagles</option>
                            <option>Washington Redskins</option>
                        </select>
                    </div>
                        <div class="search-box">
                            <input type="text" name="search" id="search" placeholder="" value='Search product...' onblur="if(this.value==''){this.value='Search product...'}" onfocus="if(this.value=='Search product...'){this.value=''}">
                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                        </div>
                    </form> 
                </div>
            </div>
            <!--Search Box End-->
            <!--Mini Cart Start-->
            <?php 
                //Selection Count or Favorites
                if(isset($Customer_ID)){
                    try{
                        $db = new db();
                        $db = $db->connect();
                        $select_count_cart = "SELECT *, products.Id as product_ID, cart.Quantity as Cart_Quantity FROM cart, products WHERE cart.Product_ID = products.ID AND cart.User_ID = '$Customer_ID'";
                        $stmt = $db->prepare($select_count_cart); 
                        $stmt->execute();
                        $cart_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }

                    if (is_null($cart_result)) {
                       $CartCount = 0;
                    }else{
                        $CartCount = sizeof($cart_result);
                    }
                }else{
                    $CartCount = 0;
                }
               
                
               
                if(isset($Customer_ID)){
                    //Selecting count favorites
                    try{
                        $db = new db();
                        $db = $db->connect();
                        $wishlist_count = "SELECT * FROM wishlist, products WHERE wishlist.Product_ID = products.ID AND wishlist.User_ID = '$Customer_ID'";
                        $stmt = $db->prepare($wishlist_count);
                        $stmt->execute();
                        $wishlist_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }

                    if (is_null($wishlist_result)) {
                        $WishlistCount = 0;
                     }else{
                         $WishlistCount = sizeof($wishlist_result);
                     }
                }else{
                    $WishlistCount = 0;
                }
           
                
               
            ?>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="mini-cart-area" style="text-align: center;">
                    <ul>
                        <li ><a href="wishlist.php"><i class="ion-android-star" style="color:white;"></i><span class="cart-add" style="color:white;"><?php echo $WishlistCount?></span></a></li>
                        <?php 
                            if ($CartCount < 1) {
                                echo "<li><a href=\"cart.php\"><i class=\"ion-android-cart\"></i><span class=\"cart-add\"> $CartCount</span></a></li>";
                            }else{
                                echo "<li><a href=\"#\"><i class=\"ion-android-cart\"></i><span class=\"cart-add\">$CartCount</span></a>
                                <ul class=\"cart-dropdown\">";
                                $Sub_Total = 0;
                                for ($i=0; $i < $CartCount; $i++) { 
                                    echo " <li class=\"cart-item\">
                                        <div class=\"cart-img\">
                                            <a href=\"product.php?PID=".$cart_result[$i]->product_ID."\"><img src=\"assets/img/products/thumbnails/".$cart_result[$i]->product_ID."a.jpg\" alt=\"\"></a>
                                        </div>
                                        <div class=\"cart-content\">
                                            <h4><a href=\"product.php?PID=".$cart_result[$i]->product_ID."\">".$cart_result[$i]->DisplayLine."</a></h4>
                                            <p class=\"cart-quantity\">Qty : ".$cart_result[$i]->Cart_Quantity."</p>
                                            <p class=\"cart-price\">¢ ".($cart_result[$i]->SP-$cart_result[$i]->Discount)."</p>
                                        </div>
                                        <div class=\"cart-close\">
                                            <a href=\"#\" title=\"Remove\"><i class=\"ion-android-close\"></i></a>
                                        </div>
                                    </li>";
                                    $Sub_Total += $cart_result[$i]->Cart_Quantity * ($cart_result[$i]->SP-$cart_result[$i]->Discount);
                                }
                                echo "<li class=\"cart-total-amount mtb-20\">
                                         <h4>SubTotal : <span class=\"pull-right\">¢ $Sub_Total</span></h4>
                                    </li>
                                    <!--Cart Total End-->
                                    <!--Cart Button Start-->
                                    <li class=\"cart-button\">
                                        <a href=\"shopping-cart.php\" class=\"button2\">View cart</a>
                                        <a href=\"checkout.php\" class=\"button2\">Check out</a>
                                    </li>
                                    <!--Cart Button End-->
                                </ul>
                            </li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <!--Mini Cart End-->
        </div>
    </div>
</div>
<!--Header Middel Area End-->