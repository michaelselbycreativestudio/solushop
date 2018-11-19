<div id="sidebar" class="sidebar" role="complementary">
    <aside class="widget widget_products">
        <h3 class="widget-title">Featured Products</h3>
        <ul class="product_list_widget">
            <?php 
                //selecting featured elements
                try{
                    $db = new db();
                    $db = $db->connect();
                    $select_featured_query = "SELECT featured FROM index_display";
                    $stmt = $db->prepare($select_featured_query);
                
                    //Execute
                    $stmt->execute();
                    $select_featured = $stmt->fetchAll(PDO::FETCH_OBJ);
                
                    $db = null;
                    
                    }catch(PDOException $e){
                        echo '{"error": {"text": '.$e->getMessage().'}';
                    }
                
                    if(sizeof($select_featured) > 0){
                        for($i = 0; $i < sizeof($select_featured); $i++){
                            $featuredIDString = $select_featured[$i]->featured;
                            $featuredID = explode(",", $featuredIDString);
                        }
                    }
                    $featureZero = $featuredID['0'];
                    $featureOne = $featuredID['1'];
                    $featureTwo = $featuredID['2'];
                    $featureThree = $featuredID['3'];
                    $featureFour = $featuredID['4'];
                    $featureFive = $featuredID['5'];

                  try{
                        $db = new db();
                        $db = $db->connect();
                        $select_product_query = "SELECT * FROM products, product_categories where products.Category = product_categories.CategoryCode and (ID = :featureZero OR ID = :featureOne OR ID = :featureTwo  OR ID = :featureThree  OR ID = :featureFour OR ID = :featureFive)";
                        $stmt = $db->prepare($select_product_query);
                        $stmt->bindParam(':featureZero', $featureZero);
                        $stmt->bindParam(':featureOne', $featureOne);
                        $stmt->bindParam(':featureTwo', $featureTwo);
                        $stmt->bindParam(':featureThree', $featureThree);
                        $stmt->bindParam(':featureFour', $featureFour);
                        $stmt->bindParam(':featureFive', $featureFive);

                        //Execute
                        $stmt->execute();
                        $select_product = $stmt->fetchAll(PDO::FETCH_OBJ);

                        $db = null;
                        
                        }catch(PDOException $e){
                            echo '{"error": {"text": '.$e->getMessage().'}';
                        }

                        if(sizeof($select_product) > 0){
                            for($i = 0; $i < sizeof($select_product); $i++){
                                $ID = $select_product[$i]->ID;
                                $CategoryCode = $select_product[$i]->CategoryCode;
                                $CategoryString = $select_product[$i]->CategoryDescription;
                                $Category = explode(">", $CategoryString);
                                $DisplayLine = $select_product[$i]->DisplayLine;
                                $ProductDescription = $select_product[$i]->ProductDescription;
                                $ProductSpecification = $select_product[$i]->ProductSpecification;
                                $TagsString = $select_product[$i]->Tags;
                                $Tags = explode(",", $TagsString);
                                $SP = $select_product[$i]->SP;
                                $DisplayPicture = $select_product[$i]->DisplayPicture;
                                $Discount = $select_product[$i]->Discount;
                                $DiscountPrice = $Discount/100 * $SP;
                                $SalePrice = $SP - $Discount/100 * $SP;
                                $Brand = $select_product[$i]->Brand;
                                $HighlightedFeaturesString = $select_product[$i]->HighlightedFeatures;
                                $HighlightedFeatures = explode(",", $HighlightedFeaturesString);
                                $ProductIntroductoryLine = $select_product[$i]->ProductIntroductoryLine;
                            echo "<li>
                                <a href=\"product.php?ID=$ID\" title=\"DisplayLine\">
                                    <img width=\"180\" height=\"180\" src=\"assets/images/products/thumbnails/$ID"."a".".png\" class=\"wp-post-image\" alt=\"\"/><span class=\"product-title\">$DisplayLine</span>
                                </a>
                                <span class=\"electro-price\">
                                    <ins><span class=\"amount\">&#8373; $SalePrice</span></ins>";
                        if ($DiscountPrice > 0) {
                                 echo "<del><span class=\"amount\">&#8373; $SP</span></del>";
                        }            
                         echo "</span>
                            </li>";
                    }
                }
            ?>
            
        </ul>
    </aside>
    <aside class="widget widget_text">
        <div class="textwidget">
            <a href="shop.php?cat=3.1" target="_blank"><img src="assets/images/banner/infinixflagship.jpg" /></a>
        </div>
    </aside>
</div>