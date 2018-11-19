<?php include("session.php"); ?>
<?php 
    $DateTime = date("Y-m-d H:i:s"); 
    if (isset($_POST["RecordPayOut"])) {
        if (trim($_POST["Description"])=="") {
            $ErrorMessage = "Please enter a description for the pay-out";
        }
        elseif ($_POST["Receipient"]==0) {
            $ErrorMessage = "Please select a Receipient for the pay-out";
        }
        elseif (trim($_POST["Amount"])=="") {
            $ErrorMessage = "Please enter an amount for the pay-out";
        }
        elseif (is_numeric($_POST["Amount"])==false) {
            $ErrorMessage = "Please enter a valid amount for the pay-out";
        }
        try{
                $db = new db(); //inititate db object
                $db = $db->connect();

        
        if (!isset($ErrorMessage)) {
            if ($_POST["Receipient"] == 1) {
                //AM Technologies
                //Cr suppliers and Dr Payout
                $Amount = $_POST["Amount"];
                $Description = $_POST["Description"];
                
                $insert_acc_trans = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Dr', '6', :Amount, :Description | Supplier - 0907201700001', :DateTime)";
                $stmt = $db->prepare($insert_acc_trans);
                $stmt->bindParam(':Amount', $Amount);
                $stmt->bindParam(':Description', $Description);
                $stmt->bindParam(':DateTime', $DateTime);
                $stmt->execute();

                //credit revenue
            $insert_acc_tran = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Cr', '3', :Amount, :Description (PAY-OUT | Supplier - 0907201700001)', :DateTime)";
            $stmt = $db->prepare($insert_acc_tran);
            $stmt->bindParam(':Amount', $Amount);
            $stmt->bindParam(':Description', $Description);
            $stmt->bindParam(':DateTime', $DateTime);
            $stmt->execute();
            }
            elseif ($_POST["Receipient"] == 2) {
                //EEGL
                //Cr delivery and Dr Payout
                $Amount = $_POST["Amount"];
                $Description = $_POST["Description"];
            //debit payout
            $insert_ac_tran = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Dr', '6', :Amount, :Description, :DateTime)";
            $stmt = $db->prepare($insert_ac_tran);
            $stmt->bindParam(':Amount', $Amount);
            $stmt->bindParam(':Description', $Description);
            $stmt->bindParam(':DateTime', $DateTime);
            $stmt->execute();

                //credit revenue
            $insert_ac_trans = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Cr', '4', :Amount, :Description (PAY-OUT)', :DateTime)";
            $stmt = $db->prepare($insert_ac_trans);
            $stmt->bindParam(':Amount', $Amount);
            $stmt->bindParam(':Description', $Description);
            $stmt->bindParam(':DateTime', $DateTime);
            $stmt->execute();

                # code...
            }
            elseif ($_POST["Receipient"] == 3) {

                //other
                //Cr revenue and Dr Payout
                $Amount = $_POST["Amount"];
                $Description = $_POST["Description"];
            //debit payout
            $insert_accdr_trans = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Dr', '6', :Amount, :Description, :DateTime)";
            $stmt = $db->prepare($insert_accdr_trans);
            $stmt->bindParam(':Amount', $Amount);
            $stmt->bindParam(':Description', $Description);
            $stmt->bindParam(':DateTime', $DateTime);
            $stmt->execute();

                //credit revenue
            $$insert_acc_cr_trans = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) VALUES (NULL, 'Cr', '5', :Amount, '$Description (PAY-OUT)', :DateTime)";
            $stmt = $db->prepare($insert_acc_cr_trans);
            $stmt->bindParam(':Amount', $Amount);
            $stmt->bindParam(':DateTime', $DateTime);
            $stmt->execute();

                $db = null;

            }
        }
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Accounts</title>
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
                        Accounts Summaries
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Accounts</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    
                    <!-- Main row -->
                    <div class="row">

                        <!-- Left col -->
                        <?php
                       
                            //get total cash
                            //select all debits to cash
                        $first_day_this_month = date('Y-m-01 00:00:00'); // hard-coded '01' for first day
                        $last_day_this_month  = date('Y-m-t 23:59:59');
                        $TotalDebitToCash = 0.00;
                        $TotalCreditFromCash = 0.00;
                        try{
                            $db = new db(); //inititate db object
                            $db = $db->connect();

                              //selecting credits for this month
                            $select_trans = "SELECT * FROM  account_transactions 
                                WHERE Transaction_Entity_ID='1'";
                           $stmt = $db->prepare($select_trans);
                            //Execute
                            $stmt->execute();
                            $trans_results = $stmt->fetchAll(PDO::FETCH_OBJ);
                        }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';}
                                
                        if (sizeof($trans_results) > 0) {
                             for($i=0; $i<sizeof($trans_results);$i++){
                                if ($trans_results[$i]->Transaction_Type == "Cr") {
                                    $TotalCreditFromCash += $trans_results[$i]->Transaction_Amount;
                                }elseif ($trans_results[$i]->Transaction_Type == "Dr") {
                                    $TotalDebitToCash += $trans_results[$i]->Transaction_Amount;
                                }

                            }
                        }

                        $TotalDebitToCash;
                        $TotalUnapportionedCash = round(($TotalDebitToCash - $TotalCreditFromCash), 2);
                        if ($TotalUnapportionedCash== -0) {
                            $TotalUnapportionedCash=0;
                        }


                        $SuppliersTotalDebitToCash = 0.00;
                        $SuppliersTotalCreditFromCash = 0.00;
                        //selecting credits for this month
                        try{
                            $select_credits = "SELECT * FROM  account_transactions 
                                WHERE Transaction_Entity_ID='3'";
                            $stmt = $db->prepare($select_credits);
                            $stmt->execute();
                            $credits_results = $stmt->fetchAll(PDO::FETCH_OBJ);
                        }catch(PDOException $e){
                            echo '{"error": {"text": '.$e->getMessage().'}';}
                        
                       
                         if (sizeof($credits_results)  > 0) {
                            for($i=0; $i<sizeof($credits_results); $i++) {
                                if ($credits_results[$i]->Transaction_Type == "Cr") {
                                    $SuppliersTotalCreditFromCash += $credits_results[$i]->Transaction_Amount;
                                }elseif ($credits_results[$i]->Transaction_Type == "Dr") {
                                    $SuppliersTotalDebitToCash += $credits_results[$i]->Transaction_Amount;
                                }

                            }
                        }
                        $SuppliersTotalCashReserves = round(($SuppliersTotalDebitToCash - $SuppliersTotalCreditFromCash),2);

                        $NEGLTotalDebitToCash = 0.00;
                        $NEGLTotalCreditFromCash = 0.00;
                        try{
                            //selecting credits for this month
                            $select_ac_4 = "SELECT * FROM  account_transactions 
                            WHERE Transaction_Entity_ID='4'";
                            $stmt = $db->prepare($select_credits);
                            $stmt->execute();
                            $ac_4_results = $stmt->fetchAll(PDO::FETCH_OBJ);
                        }catch(PDOException $e){
                            echo '{"error": {"text": '.$e->getMessage().'}';}
                        
                       
                         if (sizeof($ac_4_results)  > 0) {
                            for($i=0; $i<sizeof($ac_4_results); $i++) {
                                if ($ac_4_results[$i]->Transaction_Type == "Cr") {
                                    $NEGLTotalCreditFromCash  += $ac_4_results[$i]->Transaction_Amount;
                                }elseif ($ac_4_results[$i]->Transaction_Type == "Dr") {
                                    $NEGLTotalDebitToCash += $ac_4_results[$i]->Transaction_Amount;
                                }

                            }
                        }
                        
                        $NEGLTotalCashReserves = round(($NEGLTotalDebitToCash - $NEGLTotalCreditFromCash), 2);
                        $RevenueTotalDebitToCash = 0.00;
                        $RevenueTotalCreditFromCash = 0.00;
                        
                        try{
                            
                            //selecting credits for this month
                            $select_ac = "SELECT * FROM  account_transactions 
                                WHERE Transaction_Entity_ID='5'";
                            $stmt = $db->prepare($select_ac);
                            $stmt->execute();
                            $ac_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                        }catch(PDOException $e){
                            echo '{"error": {"text": '.$e->getMessage().'}';
                        }
                        if (sizeof($ac_result) > 0) {
                            for($i=0; $i< sizeof($ac_result); $i++) {
                                if ($ac_result[$i]->Transaction_Type == "Cr") {
                                    $RevenueTotalCreditFromCash += $ac_result[$i]->Transaction_Amount;
                                }elseif ($ac_result[$i]->Transaction_Type == "Dr") {
                                    $RevenueTotalDebitToCash += $ac_result[$i]->Transaction_Amount;
                                }

                            }
                        }
                        $RevenueTotalCashReserves = $RevenueTotalDebitToCash - $RevenueTotalCreditFromCash;
                        
                        //now we have the total
                        //TotalCashReserves, SuppliersTotalCashReserves, NEGLTotalCashReserves

                        $TotalCashReserves = round(($TotalUnapportionedCash + $NEGLTotalCashReserves + $SuppliersTotalCashReserves + $RevenueTotalCashReserves), 2);
                        
                            $TotalUnapportionedCashPercentage = ($TotalUnapportionedCash/$TotalCashReserves) * 100;
                            $NEGLTotalCashReservesPercentage = ($NEGLTotalCashReserves/$TotalCashReserves) * 100;
                            $SuppliersTotalCashReservesPercentage = ($SuppliersTotalCashReserves/$TotalCashReserves) * 100;
                            $RevenueCashPercentage = ($RevenueTotalCashReserves/$TotalCashReserves) * 100;
                        
                        
                        
                        $db = null;
                        ?>
                        
                        <section class="col-lg-7 connectedSortable">
                        
                            <?php 
                                 echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Recent Transactions</h3>
                                    </div><!-- /.box-header -->";
                                
                                    try{
                                        $db = new db(); //inititate db object
                                        $db = $db->connect();
                                        //selecting customer addresses from the database
                                        $select_ac_entities = "SELECT * FROM account_transactions, account_entities WHERE account_transactions.Transaction_Entity_ID = account_entities.Entity_ID ORDER BY Transaction_ID DESC";
                                        $stmt = $db->prepare($select_ac_entities);
                                        //Execute
                                        $stmt->execute();
                                        $ac_entiries_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';}

                                   
                                
                                if (sizeof($ac_entiries_result) > 0) {
                                    $ProductReleaseEminnent = 'Yes';
                                    echo "<div class=\"box-body table-responsive no-padding\" style=\"height: 700px; overflow: auto;\">
                                        <table class=\"table table-hover\">
                                            <tbody><tr>
                                                <th width=\"5%\">ID</th>
                                                <th width=\"15%\">Entity</th>
                                                <th width=\"10%\">Type</th>
                                                <th width=\"10%\">Amount</th>
                                                <th width=\"40%\">Description</th>
                                                <th width=\"20%\">Date</th>
                                            </tr>";
                                    for($i=0; $i < sizeof($ac_entiries_result); $i++) {
                                         echo 
                                            "<tr>
                                                <td>".$ac_entiries_result[$i]->Transaction_ID."</td>
                                                <td>".$ac_entiries_result[$i]->Entity_Description."</td>";
                                                if (strpos($ac_entiries_result[$i]->Transaction_Description, "PAY-IN") !== false) {
                                                        echo "<td><img src='../../assets/management/images/MoneyMoveExternalIn.png' style=' width:25px; height:25px;'></td>";
                                                }elseif (strpos($ac_entiries_result[$i]->Transaction_Description, "PAY-OUT") !== false) {
                                                    echo "<td><img src='../../assets/management/images/MoneyMoveExternalOut.png' style='width:25px; height:25px;'></td>";
                                                }elseif ($ac_entiries_result[$i]->Transaction_Type =="Cr") {
                                                   echo "<td><img src='../../assets/management/images/MoneyMoveInternalOut.png' style='width:25px; height:25px;'></td>";
                                                }elseif ($ac_entiries_result[$i]->Transaction_Type =="Dr") {
                                                   echo "<td><img src='../../assets/management/images/MoneyMoveInternalIn.png' style='width:25px; height:25px;'></td>";
                                                }
                                                echo"
                                                <td>".$ac_entiries_result[$i]->Transaction_Amount."</td> 
                                                <td>".$ac_entiries_result[$i]->Transaction_Description."</td> 
                                                <td>".$ac_entiries_result[$i]->Transaction_Date."</td> 
                                            </tr>";
                                    }
                                }else{
                                    echo "<div class=\"box-body table-responsive no-padding\">
                                        <table class=\"table table-hover\">
                                            <tbody>
                                        <br><br><h4 style='text-align:center;'> No transactions made yet.</h4><br><br>";
                                }
                                        echo "</tbody></table>";
                                    echo "</div><!-- /.box-body -->
                                </div><!-- /.box -->";
                            ?>
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

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Total Cash Reserves : GHS <?php echo $TotalCashReserves; ?></h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <table class="table">
                                    <tr>
                                    <?php
                                        echo "<td width=\"25%\" style=\"text-align: center;\">
                                            <div class=\"progress progress-striped vertical\">

                                                <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"$TotalUnapportionedCashPercentage\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"height: $TotalUnapportionedCashPercentage%\">
                                                    <span class=\"sr-only\">$TotalUnapportionedCashPercentage%</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td width=\"25%\" style=\"text-align: center;\">
                                            <div class=\"progress progress-striped vertical\">

                                                <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"$SuppliersTotalCashReservesPercentage\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"height: $SuppliersTotalCashReservesPercentage%\">
                                                    <span class=\"sr-only\">$SuppliersTotalCashReservesPercentage%</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td width=\"25%\" style=\"text-align: center;\">
                                            <div class=\"progress progress-striped vertical\">

                                                <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"$NEGLTotalCashReservesPercentage\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"height: $NEGLTotalCashReservesPercentage%\">
                                                    <span class=\"sr-only\">$NEGLTotalCashReservesPercentage%</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td width=\"25%\" style=\"text-align: center;\">
                                            <div class=\"progress progress-striped vertical\">

                                                <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"$RevenueCashPercentage\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"height: $RevenueCashPercentage%\">
                                                    <span class=\"sr-only\">$RevenueCashPercentage%</span>
                                                </div>
                                            </div>
                                        </td>";
                                    ?>
                                        
                                    </tr>
                                    <tr>
                                        <td width="25%" style="text-align: center;">Unapportioned Cash: GHS <?php echo $TotalUnapportionedCash; ?></td>
                                        <td width="25%" style="text-align: center;">Suppliers Due: GHS <?php echo $SuppliersTotalCashReserves; ?></td>
                                        <td width="25%" style="text-align: center;">National Express Due: GHS <?php echo $NEGLTotalCashReserves; ?></td>
                                        <td width="25%" style="text-align: center;">Revenue: GHS <?php echo $RevenueTotalCashReserves; ?></td>
                                    </tr>
                                </table>
                            </div>


                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Credits &amp; Debits <small>(Should <span style="color:red">always</span> show the same figure.)</small></h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <?php 
                                    $first_day_this_month = date('Y-m-01 00:00:00'); // hard-coded '01' for first day
                                    $last_day_this_month  = date('Y-m-t 23:59:59');
                                    $TotalDebit = 0.00;
                                    $TotalCredit = 0.00;

                                    try{
                                            //selecting credits for this month
                                            $ac_all_select = "SELECT * FROM  account_transactions";
                                            $stmt = $db->prepare($ac_all_select);
                                            //Execute
                                            $stmt->execute();
                                            $ac_all_result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';}
                                                          
                                    
                                     if (sizeof($ac_all_result) > 0) {
                                        for($i=0; $i<sizeof($ac_all_result);$i++){
                                            if ($ac_all_result[$i]->Transaction_Type == "Cr") {
                                                $TotalCredit += $ac_all_result[$i]->Transaction_Amount;
                                            }elseif ($ac_all_result[$i]->Transaction_Type == "Dr") {
                                                $TotalDebit += $ac_all_result[$i]->Transaction_Amount;
                                            }

                                        }
                                    }
                                    $db = null;
                                ?>
                                <table class="table">
                                    <tr>
                                        <?php 
                                            //use color codes to show if everything is good or not
                                            if ($TotalCredit != $TotalDebit) {
                                                echo "<td width=\"50%\" style=\"text-align: center;\">
                                                        <h2 style='color: red'>GHS $TotalCredit </h2>
                                                    </td>
                                                    <td width=\"50%\" style=\"text-align: center;\">
                                                        <h2 style='color: red'>GHS $TotalDebit </h2>
                                                    </td>";
                                            }elseif ($TotalCredit == $TotalDebit) {
                                                echo "<td width=\"50%\" style=\"text-align: center;\">
                                                        <h2 style='color: green'>GHS $TotalCredit </h2>
                                                    </td>
                                                    <td width=\"50%\" style=\"text-align: center;\">
                                                        <h2 style='color: green'>GHS $TotalDebit </h2>
                                                    </td>";
                                            }
                                        ?>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td width="50%" style="text-align: center;">Total Credits</td>
                                        <td width="50%" style="text-align: center;">Total Debits</td>

                                    </tr>
                                </table>
                            </div>

                            <?php 


                            ?>
                            <!-- Calendar -->
                            <form action="#" enctype="multipart/form-data" method="POST">
                                
                                <div class="box box-solid box-info">
                                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                                        <h3 class="box-title" style="text-align: center;"> Record Pay-Out</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        
                                        <table class="table table-condensed">
                                            <tbody><tr>
                                                <td width="30%">Receipient</td>
                                                <td><select name="Receipient" class="form-control">
                                                    <option value="0" >Select Receipient</option>
                                                    <option value="1" >AM Technologies</option>
                                                    <option value="2" >Eagle Express</option>
                                                    <option value="3" >Other, Specify in description</option>
                                                </select></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="30%">Amount</td>
                                                <td width="70%"><input name="Amount" class="form-control input-sm" type="text" placeholder="Enter amount e.g 20.00" value=""></td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td width="30%">Description</td>
                                                <td><input name="Description" class="form-control input-sm" type="text" placeholder="" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="30%"></td>
                                                <td><input name="RecordPayOut" class="btn btn-success btn-sm" type="submit" value="Record Pay-Out" ></td>
                                                <td></td>
                                            </tr>

                                        </tbody></table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                </form>
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
