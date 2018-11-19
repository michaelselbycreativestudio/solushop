<?php include("session.php"); ?>
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
                        $first_day_this_month = date('Y-m-01 00:00:00'); // hard-coded '01' for first day
                        $last_day_this_month  = date('Y-m-t 23:59:59');
                        $NEGLTotalDebitToCash = 0.00;
                        $NEGLTotalCreditFromCash = 0.00;
                        //selecting credits for this month
                        try{
                            $db = new db(); //inititate db object
                            $db = $db->connect();
                            
                            $select_trans = "SELECT * FROM  account_transactions 
                                WHERE Transaction_Entity_ID='4'";
                           $stmt = $db->prepare($select_trans);
                            //Execute
                            $stmt->execute();
                            $trans_results = $stmt->fetchAll(PDO::FETCH_OBJ);
                        }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';}
                        
                         if (sizeof($trans_results) > 0) {
                             for($i=0; $i<sizeof($trans_results);$i++){
                                if ($trans_results[$i]->Transaction_Type == "Cr") {
                                    $NEGLTotalCreditFromCash += $trans_results[$i]->Transaction_Amount;
                                }elseif ($trans_results[$i]->Transaction_Type == "Dr") {
                                    $NEGLTotalDebitToCash += $trans_results[$i]->Transaction_Amount;
                                }

                            }
                        }
                        $NEGLTotalCashReserves = $NEGLTotalDebitToCash - $NEGLTotalCreditFromCash;

                        
                        

                        ?>
                        
                        <section class="col-lg-7 connectedSortable">
                         <?php 
                                 echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Recent Transactions</h3>
                                    </div><!-- /.box-header -->";
                                    //selecting customer addresses from the database
                                    try{
                                        $select_trans2 = "SELECT * FROM account_transactions, account_entities WHERE account_transactions.Transaction_Entity_ID = account_entities.Entity_ID and Transaction_Entity_ID='4' ORDER BY Transaction_ID DESC";
                                        $stmt = $db->prepare($select_trans2);
                                        //Execute
                                        $stmt->execute();
                                        $trans_result2 = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    }
                                    catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';}
                                
                                if (sizeof($trans_result2) > 0) {
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
                                    for($i=0; $i < sizeof($trans_result2); $i++) {
                                         echo 
                                            "<tr>
                                                <td>".$trans_result2[$i]->Transaction_ID."</td>
                                                <td>".$trans_result2[$i]->Entity_Description."</td>";
                                                if (strpos($trans_result2[$i]->Transaction_Description, "PAY-IN") !== false) {
                                                        echo "<td><img src='images/MoneyMoveExternalIn.png' style=' width:25px; height:25px;'></td>";
                                                }elseif (strpos($trans_result2[$i]->Transaction_Description, "PAY-OUT") !== false) {
                                                    echo "<td><img src='images/MoneyMoveExternalIn.png' style='width:25px; height:25px;'></td>";
                                                }elseif ($trans_result2[$i]->Transaction_Type=="Cr") {
                                                   echo "<td><img src='images/MoneyMoveInternalOut.png' style='width:25px; height:25px;'></td>";
                                                }elseif ($trans_result2[$i]->Transaction_Type=="Dr") {
                                                   echo "<td><img src='images/MoneyMoveInternalIn.png' style='width:25px; height:25px;'></td>";
                                                }
                                                echo"
                                                <td>".$trans_result2[$i]->Transaction_Amount."</td> 
                                                <td>".$trans_result2[$i]->Transaction_Description."</td> 
                                                <td>".$trans_result2[$i]->Transaction_Date."</td> 
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
                                    <h3 class="box-title">Total Cash Earned : GHS <?php echo $NEGLTotalCashReserves; ?> </h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>

                                <table class="table">
                                    <tr>
                                    <?php
                                        echo "
                                        <td width=\"25%\" style=\"text-align: center;\">
                                            <div class=\"progress progress-striped vertical active\">

                                                <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"height: 50%\">
                                                    <span class=\"sr-only\">50%</span>
                                                </div>
                                            </div>
                                        </td>";
                                    ?>
                                        
                                    </tr>
                                    <tr>
                                        <td width="25%" style="text-align: center;">Due: GHS <?php echo $NEGLTotalCashReserves; ?></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Calendar -->
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
