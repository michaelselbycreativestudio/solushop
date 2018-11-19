<?php 
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<ul class="sidebar-menu">
    <li >
        <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="orders.php">
            <i class="fa fa-shopping-cart"></i> <span>Orders</span> <!--<small class="badge pull-right bg-green">new</small>-->
        </a>
    </li>
    
    <li>
        <a href="pickups.php">
            <i class="fa fa-truck"></i>
            <span>Pick-Ups</span>
        </a>
    </li>
    <li>
        <a href="deliveries.php">
            <i class="fa fa-automobile"></i>
            <span>Deliveries</span>
        </a>
    </li>
    <li>
        <a href="accounts.php">
            <i class="fa fa-money"></i> <span>Accounts</span> <!--<small class="badge pull-right bg-green">new</small>-->
        </a>
    </li>
    <li class="treeview">
        <a href="help.php">
            <i class="fa fa-question-circle"></i>
            <span>Help</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="orderhelp.php"><i class="fa fa-angle-double-right"></i> Orders</a></li>
            <li><a href="pickupshelp.php"><i class="fa fa-angle-double-right"></i> Pick-Ups</a></li>
            <li><a href="deliveryhelp.php"><i class="fa fa-angle-double-right"></i> Delivery</a></li>
            <li><a href="accountshelp.php"><i class="fa fa-angle-double-right"></i> Accounts</a></li>
            <br>
        </ul>
    </li>
</ul>