<!--Header Top Area Start--> 
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <!--Header Top Left Area Start-->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="header-top-menu">
                    <ul>
                        <li style="padding-right:10px; margin-right:0px;"><a href="shop.php"><i class="fa fa-shopping-cart"></i> &nbsp;Shop</a></li>
                        <li><a href="track-your-order.php"><i class="fa fa-truck"></i> &nbsp;Track Your Order</a></li>
                    </ul>
                </div>
            </div>
            <!--Header Top Left Area End-->
            <!--Header Top Right Area Start-->
            <div class="col-md-8 col-sm-8 hidden-xs text-right">
                <div class="header-top-menu">
                    <ul>
                        <li class="support"><span>Call or Whatsapp Support:  +233 503 788 515 </span></li>
                        <?php 
                        if (!isset($Customer_ID)) {
                            echo "<li class=\"\"><a href=\"login.php\"><i class=\"fa fa-user\"></i>&nbsp;&nbsp; Register / Login </a></li>";
                        }elseif(isset($Customer_ID)){
                            echo "
                            <li class=\"account\"><a href=\"#\">$Customer_Email<i class=\"fa fa-angle-down\"></i></a>
                                <ul class=\"ht-dropdown\">
                                    <li><a href=\"checkout.php\">Checkout</a></li>
                                    <li><a href=\"my-account.php\">My Account</a></li>
                                    <li><a href=\"shopping-cart.php\">Shopping Cart</a></li>
                                    <li><a href=\"wishlist.php\">Wishlist</a></li>
                                    <li><a href=\"logout.php\">Logout</a></li>
                                </ul>
                            </li>
                            ";
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>
            <!--Header Top Right Area End-->
        </div>
    </div>
</div>
<!--Header Top Area End-->