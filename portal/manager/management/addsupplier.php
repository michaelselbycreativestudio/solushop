<?php include("session.php"); ?>
<?php


//writing some functions
//phone number verify
//string verity
function StringVerify($String, $NameOfString){
    //check if string  is empty
    if (trim($String)=="") {
        return "<b>$NameOfString</b> cannot be empty. Please ensure it is filled.";
    }elseif (is_numeric($String)) {
        return "<b>$NameOfString</b> cannot be numeric";
    }else{
        return "good";
    }
}
function PhoneVerify($String, $NameOfString){
    //check if string  is empty
    if (trim($String)=="") {
        return "<b>$NameOfString</b> cannot be empty. Please ensure it is filled.";
    }elseif (!is_numeric($String)) {
        return "<b>$NameOfString</b> must be numeric";
    }elseif(!preg_match("/^[0-9]{12}$/", $String)) {
        return "<b>$NameOfString</b> has an unrecognized format";
    }else{
        return "good";
    }
}
    //updating Supplier details
    if (isset($_POST["AddSupplier"])) {
        //receive and sanitixe strings or post values
        if (StringVerify($_POST["Supplier_Name"], "Supplier Name")!="good") {
             $ErrorMessage = StringVerify($_POST["Supplier_Name"], "Supplier Name");
        }elseif (StringVerify($_POST["Supplier_Email"], "Supplier Email")!="good") {
             $ErrorMessage = StringVerify($_POST["Supplier_Email"], "Supplier Email");
        }elseif (PhoneVerify($_POST["Supplier_Phone"], "Supplier Phone")!="good") {
             $ErrorMessage = PhoneVerify($_POST["Supplier_Phone"], "Supplier Phone");
        }

        if (!isset($ErrorMessage)) {
            //valid inputs confirmed //Receiving Inputs.
            $Supplier_Name = $_POST["Supplier_Name"];
            $Supplier_Email = $_POST["Supplier_Email"];
            $Supplier_Phone = $_POST["Supplier_Phone"];
            if (isset($_POST["EmailVerified"])) {
                $Supplier_Email_Verified = '1';
            }else{
                $Supplier_Email_Verified = '0';
            }
            if (isset($_POST["PhoneVerified"])) {
                $Supplier_Phone_Verified = '1';
            }else{
                $Supplier_Phone_Verified = '0';
            }

            //Process name
            $Supplier_Name_Array = explode(" ", $Supplier_Name);
            $Supplier_Last_Name = $Supplier_Name_Array[sizeof($Supplier_Name_Array)-1];
            $Supplier_First_Name = $Supplier_Name_Array[0];

            //update Supplier details
            try{
                $db = new db(); //inititate db object
                $db = $db->connect();
            $update_suppliers = "UPDATE suppliers SET FName='$Supplier_First_Name', LName='$Supplier_Last_Name', Email='$Supplier_Email', EmailVerified='$Supplier_Email_Verified', Phone='$Supplier_Phone', PhoneVerified='$Supplier_Phone_Verified' where Supplier_ID='$SID'";
            $stmt = $db->prepare($update_suppliers);

            if ($stmt->execute()) {
                $SuccessMessage = "$Supplier_First_Name's details updated successfully.";
            }
        }catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';}

        }
        

    }
    $db = null;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager | Add Supplier</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../../assets/management/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../../assets/management/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../../assets/management/css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../../assets/management/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="../../assets/management/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/
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
                        Suppliers
                        <small>Add Supplier details</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Users</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        
                    </div>
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <form method="POST" action="#" enctype="multipart/form-data" >
                                <?php 
                                    if (isset($ErrorMessage)) {
                                         echo 
                                        "<div class=\"alert alert-danger alert-dismissable\">
                                            <i class=\"fa fa-ban\"></i>
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                            $ErrorMessage
                                        </div>";
                                    }
                                    elseif (isset($SuccessMessage)) {
                                        echo 
                                        "<div class='alert alert-success alert-dismissable'>
                                            <i class='fa fa-check'></i>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                            $SuccessMessage
                                        </div>";
                                    }

                                    echo "
                                <div class=\"box box-solid box-info\" >
                                    <div class=\"box-header\">
                                        <h3 class=\"box-title\" style=\"text-align: center;\"> Supplier Details</h3>
                                    </div><!-- /.box-header -->
                                    <div class=\"box-body no-padding\">
                                        
                                        <table class=\"table table-condensed\">
                                            <tr>
                                                <td width=\"30%\">Name</td>
                                                <td width=\"70%\"><input placeholder='' name = 'Supplier_Name' class=\"form-control input-sm\" type=\"text\" value=\"\"></td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Email</td>
                                                <td><input placeholder='' name = 'Supplier_Email' class=\"form-control input-sm\" type=\"text\" value=\"\">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Phone</td>
                                                <td><input placeholder='' name = 'Supplier_Phone' class=\"form-control input-sm\" type=\"text\" value=\"\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Alternate Phone</td>
                                                <td><input placeholder='' name = 'Supplier_Alt_Phone' class=\"form-control input-sm\" type=\"text\" value=\"\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\">Address</td>
                                                <td><input placeholder='' name = 'Supplier_Address' class=\"form-control input-sm\" type=\"text\" value=\"\"></td>
                                            </tr>
                                            <tr>
                                                <td width=\"30%\"></td>
                                                <td><input value='Add Supplier' type='submit' name='AddSupplier' class='btn btn-success btn-sm'\></td>
                                                <td></td>
                                            </tr>

                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                </form>";
                                
                               
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
