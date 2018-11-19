<?php 
    include("session.php");
    include("mailinglistadd.php");
   

    if (!isset($_GET['ID'])){
        header("Location: blog.php");
        exit();
    }
    else{
        $article_id = $_GET['ID'];
        try{
            $db = new db();
            $db = $db->connect();
       
            $blog_article_query = "SELECT article_ID,article_category,article_title,article_content,imgPath_main,post_date from article";
            $stmt = $db->prepare($blog_article_query);
            
            //Execute
            $stmt->execute();
            $blog_article = $stmt->fetchAll(PDO::FETCH_OBJ);
       
            $db = null;
           
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
       
           if(sizeof($blog_article) > 0){
               for($i = 0; $i < sizeof($blog_article); $i++){
                   if($article_id == $blog_article[$i]->article_ID){
                       $category = $blog_article[$i]->article_category;
                       $title = $blog_article[$i]->article_title;
                       $content =$blog_article[$i]->article_content;
                       $image = $blog_article[$i]->imgPath_main;
                       $date = $blog_article[$i]->post_date;
                   }
               }
           }
}

try{
    $db = new db();
    $db = $db->connect();

    $blog_author_query = "SELECT * from manager";
    $stmt = $db->prepare($blog_author_query);
    
     //Execute
    $stmt->execute();
    $blog_author = $stmt->fetchAll(PDO::FETCH_OBJ);

    $db = null;
    
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
    if(sizeof($blog_author) > 0){
        for($i = 0; $i < sizeof($blog_author); $i++){
            $managerID = $blog_author[$i]->ID;
            $fname = $blog_author[$i]->FName;
            $lname = $blog_author[$i]->LName;
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
<script>
    close = document.getElementById("close");
    close.addEventListener('click', function() {
    note = document.getElementById("note");
    note.style.display = 'none';
    }, false);
</script>
<script>
    $("#button").click(function() {
        $("#fn").show();
        $("#ln").show();
        });
</script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog Single</title>

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
        <style>
            .up:hover{
                background-color:green;
            }
            .down:hover{
                background-color:red;
            }
            #note {
                position: absolute;
                z-index: 101;
                top: 0;
                left: 0;
                right: 0;
                font-size: 16px;
                color: white;
                text-align: center;
                line-height: 2.8;
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
        
    <script src="assets/js/modernizr.custom.80028.js"></script>
    </head>
    <body class="single-post right-sidebar">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php include("top-bar.php"); ?>
            <?php include("header-menu-bar.php"); ?>
            <?php include("nav-bar.php"); ?>
            <?php 
                ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">
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

                    <nav itemprop="breadcrumb" class="woocommerce-breadcrumb"><a href="blog.php">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span><a href="#"><?php echo $category ?></a><span class="delimiter"><i class="fa fa-angle-right"></i></span><?php echo $title ?></nav>

                    <div id="primary" class="content-area">
                  
                        <main id="main" class="site-main">
                            <article class="post type-post status-publish format-gallery has-post-thumbnail hentry" >
                                <div class="media-attachment">
                                    <div class="media-attachment-gallery">
                                        <div class=" ">
                                            <div class="item">
                                                <figure>
                                                    <img width=\"1144\" height=\"600\" src=manager-portal/management/<?php echo $image?> class=\"attachment-post-thumbnail size-post-thumbnail\" alt=\"1\" />
                                                </figure>
                                            </div><!-- /.item -->
                                        </div>
                                    </div><!-- /.media-attachment-gallery -->
                                </div>

                                <header class="entry-header">
                                    <h1 class="entry-title" itemprop="name headline"><?php echo $title ?><span class="comments-link"><a href="#comments">Leave a comment</a></span></h1>

                                    <div class="entry-meta">
                                        <span class="cat-links"><a href="#" rel="category tag"><?php echo $category ?></a></span>
                                        <span class="posted-on"><a href="#" rel="bookmark">
                                            <time class="entry-date published" datetime="2016-03-04T07:34:20+00:00"><?php echo $date ?></time> 
                                            </a>
                                        </span>
                                    </div>
                                </header><!-- .entry-header -->

                                <div class="entry-content" itemprop="articleBody">
                                    <p><?php echo $content ?></p>
                                </div><!-- .entry-content -->
                                <div class="post-readmore">
                                    <?php
                                       try{
                                        $db = new db();
                                        $db = $db->connect();
                                        $article_query =  "SELECT * from article";
                                        $stmt = $db->prepare($article_query);
                                        $stmt->execute();
                                        $article = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        $db = null;
                                        }catch(PDOException $e){
                                            echo '{"error": {"text": '.$e->getMessage().'}';
                                        }
                                        if(sizeof($article) > 0){
                                            for($i = 0; $i < sizeof($article); $i++){
                                                if($article_id == $article[$i]->article_ID){
                                                    $blog_id = $article[$i]->article_ID;
                                                }
                                            }
                                        }
                                         //echo $blog_id;
                                        if (isset($_POST['up'])) {
                                            if (!isset($_SESSION['Solushop_Customer_ID'])) {
                                                echo
                                                    "<div class=\"alert alert-danger alert-dismissable\">
                                                        <i class=\"fa fa-ban\"></i>
                                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                                        You need to be logged in to Vote
                                                    </div>";
                                            }else{
                                                    if($article_id == $blog_id){
                                                        try{
                                                            $db = new db();
                                                            $db = $db->connect();
                                                        
                                                            $upvote_blog_query = "INSERT INTO upvote (user_id,blog_id) values (:Customer_ID, :blog_id)";
                                                            $stmt = $db->prepare($upvote_blog_query);
                                                            $stmt->bindParam(':Customer_ID', $Customer_ID);
                                                            $stmt->bindParam(':blog_id', $blog_id);
                                                            $stmt->execute();
                                                            $db = null;
                                                            }catch(PDOException $e){
                                                                echo '{"error": {"text": '.$e->getMessage().'}';
                                                            }
                                                    }
                                                    echo 
                                                        "<div class='alert alert-success alert-dismissable'>
                                                        <i class='fa fa-check'></i>
                                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                            Your Vote has been recorded
                                                        </div>"; 
                                            }
                                                
                                            }
                                            try{
                                                $db = new db();
                                                $db = $db->connect();
                                            
                                                $upvote_count_query =  "SELECT count(*) as count from upvote where blog_id = :blog_id";
                                                $stmt = $db->prepare($upvote_count_query);
                                                $stmt->bindParam(':blog_id', $blog_id);
                                            
                                                //Execute
                                                $stmt->execute();
                                                $upvote_count = $stmt->fetchAll(PDO::FETCH_OBJ);
                                            
                                                $db = null;
                                                
                                                }catch(PDOException $e){
                                                    echo '{"error": {"text": '.$e->getMessage().'}';
                                                }
                                                if(sizeof($upvote_count) > 0){
                                                    for($i = 0; $i < sizeof($upvote_count); $i++){
                                                        $countUp = $upvote_count[$i]->count;
                                                    }
                                                }
                                    ?>

                                    <?php
                                        try{
                                            $db = new db();
                                            $db = $db->connect();
                                        
                                            $article_query =  "SELECT * from article";
                                            $stmt = $db->prepare($article_query);
                                        
                                            //Execute
                                            $stmt->execute();
                                            $article = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        
                                            $db = null;
                                            
                                            }catch(PDOException $e){
                                                echo '{"error": {"text": '.$e->getMessage().'}';
                                            }
                                            if(sizeof($article) > 0){
                                                for($i = 0; $i < sizeof($article); $i++){
                                                    if($article_id == $article[$i]->article_ID){
                                                        $blog_id = $article[$i]->article_ID;
                                                    }
                                                }
                                            }
                                             //echo $blog_id;
                                             
                                            if (isset($_POST['down'])) {
                                                if(!isset($_SESSION['Solushop_Customer_ID'])){
                                                    echo
                                                    "<div class=\"alert alert-danger alert-dismissable\">
                                                        <i class=\"fa fa-ban\"></i>
                                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                                        You need to be logged in to Vote
                                                    </div>"; 
                                                }else{
                                                    if($article_id == $blog_id){
                                                        try{
                                                            $db = new db();
                                                            $db = $db->connect();
                                                            $downvote_blog_query = "INSERT INTO downvote (user_id,blog_id) values (:Customer_ID, :blog_id)";
                                                            $stmt = $db->prepare($downvote_blog_query);
                                                            $stmt->bindParam(':Customer_ID', $Customer_ID);
                                                            $stmt->bindParam(':blog_id', $blog_id);
                                                            $stmt->execute();
                                                            $db = null;
                                                            }catch(PDOException $e){
                                                                echo '{"error": {"text": '.$e->getMessage().'}';
                                                            }
    
                                                    }
                                                    //$ActionSuccess = "Your Vote has been recorded";
                                                    echo 
                                                        "<div class='alert alert-success alert-dismissable'>
                                                        <i class='fa fa-check'></i>
                                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                            Your Vote has been recorded
                                                        </div>";
                                                }
                                            }
                                                try{
                                                    $db = new db();
                                                    $db = $db->connect();
                                                    $downvote_count_query =  "SELECT count(*) as count from downvote where blog_id = :blog_id";
                                                    $stmt = $db->prepare($downvote_count_query);
                                                    $stmt->bindParam(':blog_id', $blog_id);
                                                    $stmt->execute();
                                                    $downvote_count = $stmt->fetchAll(PDO::FETCH_OBJ);
                                                    $db = null;
                                                    }catch(PDOException $e){
                                                        echo '{"error": {"text": '.$e->getMessage().'}';
                                                    }
                                                    if(sizeof($downvote_count) > 0){
                                                        for($i = 0; $i < sizeof($downvote_count); $i++){
                                                            $countDown = $downvote_count[$i]->count;
                                                        }
                                                    }
                                                 
                                              //  }
                                            //}
                                    ?>

                                    <form method="post" action="#">
                                        <button name="up" type="submit" class="up" ><i class='fa fa-long-arrow-up'></i> Upvote | <?php echo $countUp ?></button>
                                        <button name='down' type="submit" class="down"><i class='fa fa-long-arrow-down'></i> Downvote | <?php echo $countDown ?></button>
                                    </form>
                                </div>
                            </article>
                            
                            <br></br>
                            <br></br>
                            <!--<div class="post-author-info">
                                <div class="media">
                                    <div class="media-left media-middle">

                                        <a href="#"><img src="assets/images/blog/avatar.jpg" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#"><?php echo $fname; echo " "; echo $lname; ?></a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum, leo metus luctus sem, vel vulputate diam ipsum sed lorem.</p>
                                    </div>
                                </div>
                            </div>-->
                
                            <div class="comments-area" id="comments">
                                 <?php
                                    try{
                                        $db = new db();
                                        $db = $db->connect();
                                        $sql_count_comment = "SELECT count(*) as count from blog_comment where articleID = :blog_id";
                                        $stmt = $db->prepare($sql_count_comment);
                                        $stmt->bindParam(':blog_id', $blog_id);
                                        $stmt->execute();
                                        $sql_count = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        $db = null;
                                        }catch(PDOException $e){
                                            echo '{"error": {"text": '.$e->getMessage().'}';
                                        }
                                        if(sizeof($sql_count) > 0){
                                            $comment_count = $sql_count[0]->count;
                                        }
                                 ?>                   
                                <h2 class="comments-title"><?php echo $comment_count; ?> Comment(s)</h2>
                                
                                <?php
                                
                                   try{
                                    $db = new db();
                                    $db = $db->connect();
                                    $blog_comment_query = "SELECT Name,comment_content,Email from blog_comment where articleID = :blog_id";
                                    $stmt = $db->prepare($blog_comment_query);
                                    $stmt->bindParam(':blog_id', $blog_id);
                                    $stmt->execute();
                                    $blog_comment = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    $db = null;
                                    }catch(PDOException $e){
                                        echo '{"error": {"text": '.$e->getMessage().'}';
                                    }
                                    date_default_timezone_set('UTC');
                                    $date = date("Y-m-d H:i:s");
                                    if(sizeof($blog_comment) > 0){
                                        for($i = 0; $i < sizeof($blog_comment); $i++){                                
                                        echo "
                                <ol class=\"comment-list\">
                                    <li id=\"comment-396\" class=\"comment even thread-even depth-1\">
                                        <div class=\"media\">
                                            <div class=\"gravatar-wrapper media-left\">
                                                <img class=\"avatar avatar-100 photo\" src=\"assets/images/blog/avatar.jpg\" >
                                            </div>
                                            <div class=\"comment-body media-body\">

                                                <div class=\"comment-content\" id=\"div-comment-396\">
                                                    <p>".$blog_comment[$i]->comment_content."</p>
                                                </div>

                                                <div class=\"comment-meta\" id=\"div-comment-meta-396\">
                                                    <div class=\"author vcard\">
                                                        <cite class=\"fn media-heading\">".$blog_comment[$i]->Name."</cite>
                                                    </div>

                                                    <div class=\"date\">
                                                        <a class=\"comment-date\" href=\"#\">$date</a>
                                                    </div>     
                                               </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>";
                                        }
                                    }
                                ?>
                                <?php
                                    if (isset($_POST['submitComment'])) {
                                        if (!isset($_SESSION['Solushop_Customer_ID'])) {
                                            echo
                                                "<div class=\"alert alert-danger alert-dismissable\">
                                                    <i class=\"fa fa-ban\"></i>
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                                    You need to be logged in to Comment
                                                </div>";
                                        }
                                        else{
                                            $Name = htmlspecialchars($_POST['author']);
                                            $content = htmlspecialchars($_POST['comment']);
                                            $email = htmlspecialchars($_POST['email']);
                                
                                            try{
                                                $db = new db();
                                                $db = $db->connect();
                                                $blog_insert_query = "INSERT INTO blog_comment (Name,comment_content,Email,articleID) values (:Name, :content, :email,:article_id)";
                                            
                                                $stmt = $db->prepare($blog_insert_query);
                                                $stmt->bindParam(':Name', $Name);
                                                $stmt->bindParam(':content', $content);
                                                $stmt->bindParam(':email', $email);
                                                $stmt->bindParam(':article_id', $article_id);
                                            
                                                //Execute
                                                $stmt->execute();
                                            
                                                $db = null;
                                                
                                                }catch(PDOException $e){
                                                    echo '{"error": {"text": '.$e->getMessage().'}';
                                                }
                                                echo 
                                                    "<div class='alert alert-success alert-dismissable'>
                                                    <i class='fa fa-check'></i>
                                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                        Your Comment has been recorded
                                                    </div>";  
                                        }
                                        
                                    }
                                ?>
                                <div class="comment-respond" id="respond">
                                    <h3 class="comment-reply-title" id="reply-title">Leave a Reply <small><a style="display:none;" href="#" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a></small></h3>
                                    <form novalidate="" class="comment-form" id="commentform" method="post" action="#">
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p><p class="comment-form-comment"><label for="comment">Comment</label> <textarea required="required" maxlength="65525" rows="8" cols="45" name="comment" id="comment"></textarea></p><p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input type="text" required="required" aria-required="true" maxlength="245" size="30" value="" name="author" id="author"></p>
                                        <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input type="email" required="required" aria-required="true" aria-describedby="email-notes" maxlength="100" size="30" value="" name="email" id="email"></p>
                                        <p class="form-submit"><input type="submit" value="Post Comment" name= "submitComment" class="submit"></p>
                                    </form>
                                </div><!-- #respond -->

                            </div>
                        </main><!-- #main -->
                    </div><!-- #primary -->

                    <div id="sidebar" class="sidebar-blog" role="complementary">
                        <aside class="widget widget_text">
                            <h3 class="widget-title">About Blog</h3>
                            <div class="textwidget">
                            Enjoy the latest information on technology,designs,events and social life trending news with friends and family across the Globe on Solushop Blog News.
                            </div>
                        </aside>
                        <!--<aside class="widget widget_categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                <li class="cat-item"><a href="#" >Design</a></li>
                                <li class="cat-item"><a href="#" >Events</a></li>
                                <li class="cat-item"><a href="#" >Links &amp; Quotes</a></li>
                                <li class="cat-item"><a href="#" >News</a></li>
                                <li class="cat-item"><a href="#" >Social</a></li>
                                <li class="cat-item"><a href="#" >Technology</a></li>
                                <li class="cat-item"><a href="#" >Uncategorized</a></li>
                                <li class="cat-item"><a href="#" >Videos</a></li>
                            </ul>
                        </aside>-->
                                            </div>
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
    <script type="text/javascript">
        
    </script>
    </body>
</html>
