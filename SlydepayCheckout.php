<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //handling post from top up as well as posting into transaction table
        if (isset($_GET['OID'])) {
            $OrderID = $_GET['OID'];
            include('session.php');
        
            $ProductCount = 0;
            try{
                $db = new db();
                $db = $db->connect();
                $sql_order_items_query = "SELECT * from order_items, products where products.ID = order_items.Product_ID and Order_ID= :OrderID";
                $stmt = $db->prepare($sql_order_items_query);
                $stmt->bindParam(':OrderID', $OrderID);
                $stmt->execute();
                $sql_order_items = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_order_items) > 0){
                    for($i = 0; $i < sizeof($sql_order_items); $i++){
                        $ID[$ProductCount] = $sql_order_items[$i]->ID;
                        $DisplayLine[$ProductCount] = $sql_order_items[$i]->DisplayLine;
                        $Quantity[$ProductCount] = $sql_order_items[$i]->Quantity;
                        $SP[$ProductCount] = $sql_order_items[$i]->SP;
                        $Discount[$ProductCount] = $sql_order_items[$i]->Discount;
                        $DiscountPrice[$ProductCount] = $Discount[$ProductCount]/100 * $SP[$ProductCount];
                        $SalePrice[$ProductCount] = $SP[$ProductCount] - $Discount[$ProductCount]/100 * $SP[$ProductCount];
                        $ProductCount++;
                    }
                }else{
                header("Location: accounts/orders.php");
                exit();
             }

             try{
                $db = new db();
                $db = $db->connect();
                $sql_order_query = "SELECT * from orders where Order_ID= :OrderID";
                $stmt = $db->prepare($sql_order_query);
                $stmt->bindParam(':OrderID', $OrderID);
                $stmt->execute();
                $sql_order = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if(sizeof($sql_order) > 0){
                    for($i = 0; $i < sizeof($sql_order); $i++){
                        $Shipping = $sql_order[$i]->Shipping;
                    }
                }else{
                header("Location: accounts/orders.php");
                exit();
             }



        }else{
            header("Location: accounts/orders.php");
            exit();
        }
        include_once 'Integrator.class.php';

        
            $paylive="https://app.slydepay.com.gh/payLIVE/detailsnew.aspx?pay_token=";
            $ns="http://www.i-walletlive.com/payLIVE"; 
            $wsdl="https://app.slydepay.com.gh/webservices/paymentservice.asmx?wsdl";

            $settings = parse_ini_file("sample.ini");

            $api_version="1.3";
            $merchant_email="ceo@solutekworld.com";
            $merchant_secret_key="1466854163614";

            
            $service_type="C2B";
            $integration_mode=true;

            $slyde = new SlydepayConnector($ns, $wsdl, $api_version, $merchant_email, $merchant_secret_key, $service_type, $integration_mode);

            $Token= GUID();
            

            $comment1="";
            $order_items = array();
            $total = 0;
            for ($i=0; $i <  sizeof($ID); $i++) { 
                $price = floatval($SalePrice[$i]);
                $quantity = $Quantity[$i];
                $sub_total = $price * $quantity;
                $total+=$sub_total;
                $order_items[$i] = $slyde->buildOrderItem($DisplayLine[$i], "-", $price, $quantity, $sub_total);
            }
            
            try{
                $db = new db();
                $db = $db->connect();
                $update_order_query = "UPDATE orders SET SlydepayToken= :Token, TotalAmount= :total where Order_ID= :OrderID";
                $stmt = $db->prepare($update_order_query);
                $stmt->bindParam(':Token', $Token);
                $stmt->bindParam(':total', $total);
                $stmt->bindParam(':OrderID', $OrderID);
                $stmt->execute();
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }

            //calculating shipping
            
            if ($total >= 500) {
                $shipping_cost=0;
                //update shipping
                $shipping = '0';
            try{
                $db = new db();
                $db = $db->connect();
                $update_shipping_query = "UPDATE orders SET Shipping = :shipping where Order_ID= :OrderID";
                $stmt = $db->prepare($update_shipping_query);
                $stmt->bindParam(':shipping', $shipping);
                $stmt->bindParam(':OrderID', $OrderID);
                $stmt->execute();
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
            }else{
                $shipping_cost=$Shipping;
            }

            
            $tax_amount=0;


            $response = $slyde->ProcessPaymentOrder($Token, $total, 0, $tax_amount, ($total+$shipping_cost), $comment1, $comment2, $order_items);
//           Uncomment for debugging
//            var_dump($response);
//            var_dump($response->ProcessPaymentOrderResult);
            $redirect = $paylive.$response->ProcessPaymentOrderResult;


//Uncomment to use MobilePaymentOrder web method and comment ProcessPaymentOrder block

//            $response = $slyde->MobilePaymentOrder($order_id, $sub_total, $shipping_cost, $tax_amount, $total, $comment1, $comment2, $order_items);
//            var_dump($response);
//            var_dump($response->mobilePaymentOrderResult);
//            $redirect = $paylive.$response->mobilePaymentOrderResult->token;


//Displaying what the composed redirect url looks like before running the redirect command
//              var_dump($redirect);

            header("Location: $redirect");

        function GUID()
        {
            if (function_exists('com_create_guid') === true)
            {
                return trim(com_create_guid(), '{}');
            }

            return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        }

        ?>
    </body>
</html>
