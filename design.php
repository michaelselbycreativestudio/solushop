<?php 
    include("session.php");
    include("mailinglistadd.php");
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

        <title>Blog</title>
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
        </style>
    </head>
    <script src="assets/js/modernizr.custom.80028.js"></script>
    <body class="blog blog-list right-sidebar">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php include("top-bar.php"); ?>
            <?php include("header-menu-bar.php"); ?>
            <?php include("nav-bar.php"); ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    <nav class="woocommerce-breadcrumb">
                        <a href="blog.php">Home</a>
                        <span class="delimiter"><i class="fa fa-angle-right"></i></span>Blog
                    </nav>

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                        
                        <?php
                        $rec_limit = 5;
                        ///getting the total records
                        try{
                            $db = new db();
                            $db = $db->connect();
                            $sql_article_query = "SELECT * from article";
                            $stmt = $db->prepare($sql_article_query);
                            $stmt->execute();
                            $sql_article = $stmt->fetchAll(PDO::FETCH_OBJ);
                            $db = null;
                            }catch(PDOException $e){
                                echo '{"error": {"text": '.$e->getMessage().'}';
                            }
                            $rec_count = sizeof($sql_article);
                            $pageCount = ceil(($rec_count/$rec_limit));

                            if (isset($_POST["page"])) {
                                $page   = $_POST["page"]-1;
                                $pageDisplay = $_POST["page"];
                                $offset = $rec_limit * $page;
                            } else {
                                $page   = 0;
                                $pageDisplay = 1;
                                $offset = 0;
                            }

                             $left_rec = $rec_count - ($page * $rec_limit);
                             try{
                                    $db = new db();
                                    $db = $db->connect();
                                    $sql_article_query = "SELECT * FROM article where article_category = 'design' limit $offset, $rec_limit";
                                    $stmt = $db->prepare($sql_article_query);
                                    $stmt->execute();
                                    $sql_article = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    $db = null;
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';
                                    }
                                    if(sizeof($sql_article) > 0){
                                        for($i = 0; $i < sizeof($sql_article); $i++){
                                            echo"
                                <article class='post format-gallery hentry'>
                                    <div class='media-attachment'>
                                        <a href='blog-single.php?ID=".$sql_article[$i]->article_ID."'>
                                        <img src=manager-portal/management/".$sql_article[$i]->imgPath_thumbnail." class='wp-post-image' /></a>
                                    </div>
                                           
                                   <div class='content-body'>
                                        <header class='entry-header'>
                                            <h1 class='entry-title' itemprop='name headline'>
                                                <a href='blog-single.php?ID=".$sql_article[$i]->article_ID."' rel='bookmark'>".$sql_article[$i]->article_title."</a>
                                            </h1>
    
                                            <div class='entry-meta'>
                                               
                                                    <a href='blog-single.php?ID=".$sql_article[$i]->article_ID."' rel='category tag'>".$sql_article[$i]->article_category."</a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                                <span class='posted-on'>
                                                    <a href='#' rel='bookmark'>
                                                        <time class='entry-date published' datetime='2016-03-04T07:34:20+00:00'>".$sql_article[$i]->post_date."</time>
                                                    </a>
                                                </span>
                                           </div>";
                                            $string = $sql_article[$i]->article_content;
                                            $string2 = substr($string , 0, 255);
                                           if(strlen($sql_article[$i]->article_content) <= 255){
                                            echo"
                                           <div class='entry-content'>
                                                <p>".$string."</p>
                                            </div>";
                                            }else{
                                                echo"
                                                <div class='entry-content'>
                                                    <p>".$string2.'........'."</p>
                                                </div>";
                                            }
                                            echo"
                                            <div class='post-readmore'>
                                                <a href='blog-single.php?ID=".$sql_article[$i]->article_ID."' class='btn btn-primary'>Read More</a>
                                            </div>
                                            <br></br>
                                        </header>
                                    </div>
                                </article>";
                                }
                            }else{
                                echo
                                    "<div class=\"alert alert-danger alert-dismissable\">
                                        <i class=\"fa fa-ban\"></i>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                        <h4 style='text-align:center'>No records found on this Category</h4>
                                    </div>";
                            }
                            
                         ?>
                            <div class="shop-control-bar-bottom">
                                <nav class="woocommerce-pagination">
                                    <form method="POST" action="#">
                                        <ul class="page-numbers">
                                        <?php
                                            for ($i=0; $i < $pageCount ; $i++) { 
                                                if ($pageDisplay == $i+1) {
                                                    echo "<li><input class=\"page-numbers current\" style=\"background-color: #efecec; color: black; width: 30px;height: 30px;padding: 4px;\" type=\"submit\" name=\"page\" value='".($i+1)."'></span></li>";
                                                }else{
                                                    echo "<li><input class=\"page-numbers\" style=\"width: 30px;height: 30px;padding: 4px;\" type=\"submit\" name=\"page\" value='".($i+1)."''></span></li>";
                                                }
                                            }
                                        ?>
                                        </ul>
                                    </form>
                                </nav>
                            </div>
                            
                        </main>
                    </div><!-- /#primary -->

                    <div id="sidebar" class="sidebar-blog" role="complementary">
                        
                                  <aside class="widget widget_text">
                            <h3 class="widget-title">About Blog</h3>
                            <div class="textwidget">
                            Enjoy the latest information on technology,designs,events and social life trending news with friends and family across the Globe on Solushop Blog News.
                            </div>
                        </aside>
                                    <aside class="widget widget_categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                <li class="cat-item"><a href="design.php" >Design</a></li>
                                <li class="cat-item"><a href="events.php" >Events</a></li>
                                <li class="cat-item"><a href="quotes.php" >Quotes</a></li>
                                <li class="cat-item"><a href="social.php" >Social</a></li>
                                <li class="cat-item"><a href="technology.php" >Technology</a></li>
                            </ul>
                        </aside>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.site-content -->

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
