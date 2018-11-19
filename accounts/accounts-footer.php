

<section class="brands-carousel">
              <h2 class="sr-only" id="Brands">Brands Carousel</h2>
              <div class="container">
                <div id="owl-brands" class="owl-brands owl-carousel unicase-owl-carousel owl-outer-nav">
                <?php 
                  $sql = "SELECT * FROM brands";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                      $ID = $row["ID"];
                      $Description = $row["Description"];

                      echo "<div class=\"item\">


                          <figure>
                            <figcaption class=\"text-overlay\">
                              <div class=\"info\">
                                <h4>$Description</h4>
                              </div>
                            </figcaption>

                             <img src=\"../assets/images/brands/$ID.png\" class=\"img-responsive\" alt=\"\">

                          </figure>
                      </div>";

                    }
                  }
                ?>

                </div>

              </div>
            </section>


<footer id="colophon" class="site-footer">
  <div class="footer-widgets">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12">
          <aside class="widget clearfix">
            <div class="body">
              <h4 class="widget-title">Featured Products</h4>
              <ul class="product_list_widget">
              <?php 
                  $sql = "SELECT featured FROM index_display";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $featuredIDString = $row["featured"];
                        $featuredID = explode(",", $featuredIDString);
                      }
                  }
                  $sql = "SELECT * FROM products, product_categories where products.Category = product_categories.CategoryCode and (ID ='".$featuredID['0']."' OR ID ='".$featuredID['1']."' OR ID ='".$featuredID['2']."')";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {

                      $ID = $row["ID"];
                      $CategoryCode = $row["CategoryCode"];
                      $CategoryString = $row["CategoryDescription"];
                      $Category = explode(">", $CategoryString);
                      $DisplayLine = $row["DisplayLine"];
                      $ProductDescription = $row["ProductDescription"];
                      $ProductSpecification = $row["ProductSpecification"];
                      $TagsString = $row["Tags"];
                      $Tags = explode(",", $TagsString);
                      $SP = $row["SP"];
                      $DisplayPicture = $row["DisplayPicture"];
                      $Discount = $row["Discount"];
                      $DiscountPrice = $Discount/100 * $SP;
                      $SalePrice = $SP - $Discount/100 * $SP;
                      $Brand = $row["Brand"];
                      $HighlightedFeaturesString = $row["HighlightedFeatures"];
                      $HighlightedFeatures = explode(",", $HighlightedFeaturesString);
                      $ProductIntroductoryLine = $row["ProductIntroductoryLine"];

                      echo "<li>
                              <a href=\"../product.php?ID=$ID\" title=\"$DisplayLine\">
                                <img class=\"wp-post-image\" data-echo=\"../assets/images/products/main/".$ID."a.png\" src=\"../assets/images/blank.gif\" alt=\"\">
                                <span class=\"product-title\">$DisplayLine</span>
                              </a>
                              <span class=\"electro-price\"><span class=\"amount\">&#8373; $SalePrice</span></span>
                            </li>";

                    }
                  }
              ?>
              </ul>
            </div>
          </aside>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <aside class="widget clearfix">
            <div class="body"><h4 class="widget-title">Onsale Products</h4>
              <ul class="product_list_widget">
              <?php 
                  $sql = "SELECT onSale FROM index_display";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $onSaleIDString = $row["onSale"];
                        $onSaleID = explode(",", $onSaleIDString);
                      }
                  }
                  $sql = "SELECT * FROM products, product_categories where products.Category = product_categories.CategoryCode and (ID ='".$onSaleID['0']."' OR ID ='".$onSaleID['1']."' OR ID ='".$onSaleID['2']."')";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {

                        $ID = $row["ID"];
                        $CategoryCode = $row["CategoryCode"];
                        $CategoryString = $row["CategoryDescription"];
                        $Category = explode(">", $CategoryString);
                        $DisplayLine = $row["DisplayLine"];
                        $ProductDescription = $row["ProductDescription"];
                        $ProductSpecification = $row["ProductSpecification"];
                        $TagsString = $row["Tags"];
                        $Tags = explode(",", $TagsString);
                        $SP = $row["SP"];
                        $DisplayPicture = $row["DisplayPicture"];
                        $Discount = $row["Discount"];
                        $DiscountPrice = $Discount/100 * $SP;
                        $SalePrice = $SP - $Discount/100 * $SP;
                        $Brand = $row["Brand"];
                        $HighlightedFeaturesString = $row["HighlightedFeatures"];
                        $HighlightedFeatures = explode(",", $HighlightedFeaturesString);
                        $ProductIntroductoryLine = $row["ProductIntroductoryLine"];

                      echo "<li>
                              <a href=\"../product.php?ID=$ID\" title=\"$DisplayLine\">
                                <img class=\"wp-post-image\" data-echo=\"../assets/images/products/main/".$ID."a.png\" src=\"../assets/images/blank.gif\" alt=\"\">
                                <span class=\"product-title\">$DisplayLine</span>
                              </a>
                              <span class=\"electro-price\"><span class=\"amount\">&#8373; $SalePrice</span></span>
                            </li>";

                    }
                  }
              ?>
              </ul>
            </div>
          </aside>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <aside class="widget clearfix">
            <div class="body">
              <h4 class="widget-title">Top Rated Products</h4>
              <ul class="product_list_widget">
                <?php 
                  $sql = "SELECT topRated FROM index_display";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $topRatedIDString = $row["topRated"];
                        $topRatedID = explode(",", $topRatedIDString);
                      }
                  }
                  $sql = "SELECT * FROM products, product_categories where products.Category = product_categories.CategoryCode and (ID ='".$topRatedID['0']."' OR ID ='".$topRatedID['1']."' OR ID ='".$topRatedID['2']."')";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {

                      $ID = $row["ID"];
                      $CategoryString = $row["CategoryDescription"];
                      $Category = explode(">", $CategoryString);
                      $DisplayLine = $row["DisplayLine"];
                      $SP = $row["SP"];
                      $DisplayPicture = $row["DisplayPicture"];

                      echo "<li>
                              <a href=\"../product.php?ID=$ID\" title=\"$DisplayLine\">
                                <img class=\"wp-post-image\" data-echo=\"../assets/images/products/main/".$ID."a.png\" src=\"../assets/images/blank.gif\" alt=\"\">
                                <span class=\"product-title\">$DisplayLine</span>
                              </a>
                              <span class=\"electro-price\"><span class=\"amount\">&#8373; $SalePrice</span></span>
                            </li>";

                    }
                  }
              ?>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-7">
          <h5 class="newsletter-title">Sign up to Newsletter</h5>
          <span class="newsletter-marketing-text">...and be the <strong>1st</strong> to know about our top products!</span>
        </div>
        <div class="col-xs-12 col-sm-5">
          <form action="#" method="POST">
            <div class="input-group">
              <input type="email" style="background-color: white; height: 49px;"class="form-control" name="Email" placeholder="Enter your email address" required/>
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit" name="mailinglist" class="">Sign Up</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom-widgets">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7 col-md-push-5">
          <div class="columns">
            <aside id="nav_menu-2" class="widget clearfix widget_nav_menu">
              <div class="body">
                <h4 class="widget-title">Find It Fast</h4>
                <div class="menu-footer-menu-1-container">
                  <ul id="menu-footer-menu-1" class="menu">
                    <li class="menu-item"><a href="../p-computers-and-accessories.php">Laptops &#038; Computers</a></li>
                    <li class="menu-item"><a href="../p-camera-video-and-audio.php">Cameras &#038; Photography</a></li>
                    <li class="menu-item"><a href="../p-mobile-phones-and-tablets.php">Smart Phones &#038; Tablets</a></li>
                    <li class="menu-item"><a href="../p-movies-music-and-videogames.php">Video Games &#038; Consoles</a></li>
                    <li class="menu-item"><a href="../p-tv-and-audio.php">TV &#038; Audio</a></li>
                  </ul>
                </div>
              </div>
            </aside>
          </div><!-- /.columns -->

          <div class="columns">
            <aside id="nav_menu-3" class="widget clearfix widget_nav_menu">
              <div class="body">
                <h4 class="widget-title">Information</h4>
                <div class="menu-footer-menu-2-container">
                  <ul id="menu-footer-menu-2" class="menu">
                    <li class="menu-item"><a href="../faq.php">FAQs</a></li>
					<li class="menu-item "><a href="../privacy-policy.php">Privacy Policy</a></li>
					<li class="menu-item "><a href="../returns-refunds-policy.php">Returns/Refunds</a></li>
                    <li  class="menu-item"><a href="../terms-and-conditions.php">Terms and Conditions</a></li>
                  </ul>
                </div>
              </div>
            </aside>
          </div><!-- /.columns -->

          <div class="columns">
            <aside id="nav_menu-4" class="widget clearfix widget_nav_menu">
              <div class="body">
                <h4 class="widget-title">Customer Care</h4>
                <div class="menu-footer-menu-3-container">
                  <ul id="menu-footer-menu-3" class="menu">
                    <li class="menu-item"><a href="../wishlist.php">Wishlist</a></li>
					<li class="menu-item"><a href="index.php">My Account</a></li>
                    <li class="menu-item"><a href="../track-your-order.php">Track your Order</a></li>
                  </ul>
                </div>
              </div>
            </aside>
          </div><!-- /.columns -->

        </div><!-- /.col -->

        <div class="footer-contact col-xs-12 col-sm-12 col-md-5 col-md-pull-7">
          <div class="footer-logo">
            <img src="assets/images/logo.png">
                <!--
            <svg version="1.1" x="0px" y="0px" width="175.748px"
              height="42.52px" viewBox="0 0 175.748 42.52" enable-background="new 0 0 175.748 42.52">
              <ellipse class="ellipse-bg" fill-rule="evenodd" clip-rule="evenodd" fill="#FDD700" cx="170.05" cy="36.341" rx="5.32" ry="5.367"/>
              <path fill-rule="evenodd" clip-rule="evenodd" fill="#333E48" d="M30.514,0.71c-0.034,0.003-0.066,0.008-0.056,0.056
              C30.263,0.995,29.876,1.181,29.79,1.5c-0.148,0.548,0,1.568,0,2.427v36.459c0.265,0.221,0.506,0.465,0.725,0.734h6.187
              c0.2-0.25,0.423-0.477,0.669-0.678V1.387C37.124,1.185,36.9,0.959,36.701,0.71H30.514z M117.517,12.731
              c-0.232-0.189-0.439-0.64-0.781-0.734c-0.754-0.209-2.039,0-3.121,0h-3.176V4.435c-0.232-0.189-0.439-0.639-0.781-0.733
              c-0.719-0.2-1.969,0-3.01,0h-3.01c-0.238,0.273-0.625,0.431-0.725,0.847c-0.203,0.852,0,2.399,0,3.725
              c0,1.393,0.045,2.748-0.055,3.725h-6.41c-0.184,0.237-0.629,0.434-0.725,0.791c-0.178,0.654,0,1.813,0,2.765v2.766
              c0.232,0.188,0.439,0.64,0.779,0.733c0.777,0.216,2.109,0,3.234,0c1.154,0,2.291-0.045,3.176,0.057v21.277
              c0.232,0.189,0.439,0.639,0.781,0.734c0.719,0.199,1.969,0,3.01,0h3.01c1.008-0.451,0.725-1.889,0.725-3.443
              c-0.002-6.164-0.047-12.867,0.055-18.625h6.299c0.182-0.236,0.627-0.434,0.725-0.79c0.176-0.653,0-1.813,0-2.765V12.731z
              M135.851,18.262c0.201-0.746,0-2.029,0-3.104v-3.104c-0.287-0.245-0.434-0.637-0.781-0.733c-0.824-0.229-1.992-0.044-2.898,0
              c-2.158,0.104-4.506,0.675-5.74,1.411c-0.146-0.362-0.451-0.853-0.893-0.96c-0.693-0.169-1.859,0-2.842,0h-2.842
              c-0.258,0.319-0.625,0.42-0.725,0.79c-0.223,0.82,0,2.338,0,3.443c0,8.109-0.002,16.635,0,24.381
              c0.232,0.189,0.439,0.639,0.779,0.734c0.707,0.195,1.93,0,2.955,0h3.01c0.918-0.463,0.725-1.352,0.725-2.822V36.21
              c-0.002-3.902-0.242-9.117,0-12.473c0.297-4.142,3.836-4.877,8.527-4.686C135.312,18.816,135.757,18.606,135.851,18.262z
              M14.796,11.376c-5.472,0.262-9.443,3.178-11.76,7.056c-2.435,4.075-2.789,10.62-0.501,15.126c2.043,4.023,5.91,7.115,10.701,7.9
              c6.051,0.992,10.992-1.219,14.324-3.838c-0.687-1.1-1.419-2.664-2.118-3.951c-0.398-0.734-0.652-1.486-1.616-1.467
              c-1.942,0.787-4.272,2.262-7.134,2.145c-3.791-0.154-6.659-1.842-7.524-4.91h19.452c0.146-2.793,0.22-5.338-0.279-7.563
              C26.961,15.728,22.503,11.008,14.796,11.376z M9,23.284c0.921-2.508,3.033-4.514,6.298-4.627c3.083-0.107,4.994,1.976,5.685,4.627
              C17.119,23.38,12.865,23.38,9,23.284z M52.418,11.376c-5.551,0.266-9.395,3.142-11.76,7.056
              c-2.476,4.097-2.829,10.493-0.557,15.069c1.997,4.021,5.895,7.156,10.646,7.957c6.068,1.023,11-1.227,14.379-3.781
              c-0.479-0.896-0.875-1.742-1.393-2.709c-0.312-0.582-1.024-2.234-1.561-2.539c-0.912-0.52-1.428,0.135-2.23,0.508
              c-0.564,0.262-1.223,0.523-1.672,0.676c-4.768,1.621-10.372,0.268-11.537-4.176h19.451c0.668-5.443-0.419-9.953-2.73-13.037
              C61.197,13.388,57.774,11.12,52.418,11.376z M46.622,23.343c0.708-2.553,3.161-4.578,6.242-4.686
              c3.08-0.107,5.08,1.953,5.686,4.686H46.622z M160.371,15.497c-2.455-2.453-6.143-4.291-10.869-4.064
              c-2.268,0.109-4.297,0.65-6.02,1.524c-1.719,0.873-3.092,1.957-4.234,3.217c-2.287,2.519-4.164,6.004-3.902,11.007
              c0.248,4.736,1.979,7.813,4.627,10.326c2.568,2.439,6.148,4.254,10.867,4.064c4.457-0.18,7.889-2.115,10.199-4.684
              c2.469-2.746,4.012-5.971,3.959-11.063C164.949,21.134,162.732,17.854,160.371,15.497z M149.558,33.952
              c-3.246-0.221-5.701-2.615-6.41-5.418c-0.174-0.689-0.26-1.25-0.4-2.166c-0.035-0.234,0.072-0.523-0.045-0.77
              c0.682-3.698,2.912-6.257,6.799-6.547c2.543-0.189,4.258,0.735,5.52,1.863c1.322,1.182,2.303,2.715,2.451,4.967
              C157.789,30.669,154.185,34.267,149.558,33.952z M88.812,29.55c-1.232,2.363-2.9,4.307-6.13,4.402
              c-4.729,0.141-8.038-3.16-8.025-7.563c0.004-1.412,0.324-2.65,0.947-3.726c1.197-2.061,3.507-3.688,6.633-3.612
              c3.222,0.079,4.966,1.708,6.632,3.668c1.328-1.059,2.529-1.948,3.9-2.99c0.416-0.315,1.076-0.688,1.227-1.072
              c0.404-1.031-0.365-1.502-0.891-2.088c-2.543-2.835-6.66-5.377-11.704-5.137c-6.02,0.288-10.218,3.697-12.484,7.846
              c-1.293,2.365-1.951,5.158-1.729,8.408c0.209,3.053,1.191,5.496,2.619,7.508c2.842,4.004,7.385,6.973,13.656,6.377
              c5.976-0.568,9.574-3.936,11.816-8.354c-0.141-0.271-0.221-0.604-0.336-0.902C92.929,31.364,90.843,30.485,88.812,29.55z"/>
            </svg>
                -->
            </svg>
          </div><!-- /.footer-contact -->

          <div class="footer-call-us">
            <div class="media">
              <span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
              <div class="media-body">
                <span class="call-us-text">Got Questions ? Call us 24/7!</span>
                <span class="call-us-number">055-953-8887</span>
              </div>
            </div>
          </div><!-- /.footer-call-us -->


          <div class="footer-address">
            <strong class="footer-address-title">Contact Info</strong>
            <address>Accra &amp; Kumasi, Ghana</address>
          </div><!-- /.footer-address -->

          <div class="footer-social-icons">
            <ul class="social-icons list-unstyled">
              <li><a class="fa fa-facebook" href="https://www.facebook.com/solushopghana/"></a></li>
              <li><a class="fa fa-twitter" href="https://twitter.com/SolushopGhana"></a></li>
              <li><a class="fa fa-instagram" href="https://www.instagram.com/solushopghana/"></a></li>
              <li><a class="fa fa-youtube" href="https://www.youtube.com/channel/UC6RdTmn3tuhoK2NI5Zj-4yA"></a></li>
              </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="copyright-bar">
    <div class="container">
      <div class="pull-left flip copyright">&copy; <a href="http://solutek.world">Solutek</a> - All Rights Reserved</div>
      <div class="pull-right flip payment">
        <div class="footer-payment-logo">
          <ul class="cash-card card-inline">
            <li class="card-item"><img src="../assets/images/payment-methods/visa.png" alt="" width="52"></li>
            <li class="card-item"><img src="../assets/images/payment-methods/master-card.png" alt="" width="52"></li>
            <li class="card-item"><img src="../assets/images/payment-methods/slydepay.png" alt="" width="52"></li>
            <li class="card-item"><img src="../assets/images/payment-methods/mtn-mobile-money.png" alt="" width="52"></li>
            <li class="card-item"><img src="../assets/images/payment-methods/tigo-cash.png" alt="" width="52"></li>
            <li class="card-item"><img src="../assets/images/payment-methods/airtel-money.png" alt="" width="52"></li>
          </ul>
        </div><!-- /.payment-methods -->
      </div>
    </div><!-- /.container -->
  </div><!-- /.copyright-bar -->
</footer><!-- #colophon -->
