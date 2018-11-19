
  <?php
                     if (isset($ActionError)) {
                        echo "<div style='background-color:red' id=\"note\">
                                    $ActionError
                                </div>";
                    }elseif (isset($ActionSuccess)) {
                        echo "<div style='background-color:green' id=\"note\">
                                $ActionSuccess
                            </div>";
                    }
                ?>
<div class="top-bar">
    <div class="container">
        <nav>
            <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
                <li class="menu-item animate-dropdown"><a title="Welcome to Solushop" href="#">Welcome to Solushop</a></li>
            </ul>
        </nav>

        <nav>
            <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
                <li class="menu-item animate-dropdown"><a title="Track Your Order" href="track-your-order.php"><i class="ec ec-transport"></i>Track Your Order</a></li>
                <li class="menu-item animate-dropdown"><a title="Shop" href="shop.php"><i class="ec ec-shopping-bag"></i>Shop</a></li>
                <?php 
                    @session_start();
                    if (isset($_SESSION["Solushop_Customer_ID"])) {
                        echo "<li class=\"menu-item animate-dropdown\"><a title=\"My Account\" href=\"accounts/\"><i class=\"ec ec-user\"></i>".$_SESSION["Solushop_FName"]."</a></li>";
                        echo "<li class=\"menu-item animate-dropdown\"><a title=\"Logout\" href=\"logout.php\">Logout</a></li>";
                    }else{
                        echo "<li class=\"menu-item animate-dropdown\"><a title=\"My Account\" href=\"login.php\"><i class=\"ec ec-user\"></i>Login or Register</a></li>";
                    }
                ?>
                
            </ul>
        </nav>
    </div>
</div><!-- /.top-bar -->
