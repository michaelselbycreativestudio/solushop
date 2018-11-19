<?php
    include_once './classes/DbLayer.class.php';
    include_once './classes/Integrator.class.php';
    $settings = parse_ini_file("config/local.ini");
    $Status   = $_GET['status'];
    if (!$Status == 0) {
        header("Location: accounts/orders.php");
        exit();
    }
   /*
    $pay_token = $_GET["pay_token"];
    $status = $_GET["status"];
    $transac_id = $_GET["transac_id"];
    $cust_ref = $_GET["cust_ref"];
    header("Location: http://localhost/csgs/student/management/receivecallback.php?pay_token=$pay_token&status=$status&transac_id=$transac_id&cust_ref=$cust_ref");
    exit;

    */
    //select dessert
    //$Customer_ID = $_SESSION['customer_id'];

    //including database connection
    include("databaseconnection.php");
    

    
   
    
    $slydepayIntegrator = new SlydepayConnector($settings["api.slydepay.namespace"], $settings["api.slydepay.wsdl"], $settings["api.slydepay.version"], $settings["api.slydepay.merchantEmail"], $settings["api.slydepay.merchantKey"], $settings["api.slydepay.serviceType"], $settings["api.slydepay.integrationmode"]);
    $statusCode         = filter_input(INPUT_GET, "status", FILTER_SANITIZE_STRING);
    $transactionId      = filter_input(INPUT_GET, "transac_id", FILTER_SANITIZE_STRING);
    $slydepaytoken          = filter_input(INPUT_GET, "cust_ref", FILTER_SANITIZE_STRING);
    $paymentToken       = filter_input(INPUT_GET, "pay_token", FILTER_SANITIZE_STRING);
    if (null == $statusCode || null == $slydepaytoken || null == $paymentToken) {
        die("Not good, details are missing or someone is messing with you");
    }
    $paymentStatus = parseTransactionStatusCode($statusCode);
    if (null == $transactionId || strlen($transactionId) == 0) {
        //$db->updateOrder($bookingId, "", "FAILED");
        die("Empty or Null Transaction Id");
    }
    $OrderResult = $slydepayIntegrator->VerifyMobilePayment($slydepaytoken);
    if ($OrderResult->verifyMobilePaymentResult->success) {
        $DateTime = date("Y-m-d H:i:s"); 
        //select order details
        try{
            $db = new db();
            $db = $db->connect();
            $customer_orders_query = "SELECT * from orders, customers where orders.Customer_ID = customers.Customer_ID and SlydepayToken= :slydepaytoken";
            $stmt = $db->prepare($customer_orders_query);
            $stmt->bindParam(':slydepaytoken', $slydepaytoken);
            $stmt->execute();
            $customer_orders = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if(sizeof($customer_orders) > 0){
                for($i = 0; $i < sizeof($customer_orders); $i++){
                    $OrderID = $customer_orders[$i]->Order_ID;
                    $Customer_Name = $customer_orders[$i]->FName." ".$customer_orders[$i]->LName;
                    $TotalAmount = $customer_orders[$i]->TotalAmount;
                    $Fname = $customer_orders[$i]->FName;
                    $Lname = $customer_orders[$i]->LName;
                    $Phone = $customer_orders[$i]->Phone;
                    $Email = $customer_orders[$i]->Email;
                }
            }
        
       
        //update transaction, set to confirmed
        $state = '1';
        try{
            $db = new db();
            $db = $db->connect();
            $update_orders_query = "UPDATE orders SET Order_State= :state WHERE SlydepayToken= :slydepaytoken";
            $stmt = $db->prepare($update_orders_query);
            $stmt->bindParam(':slydepaytoken', $slydepaytoken);
            $stmt->bindParam(':state', $state);
            $stmt->execute();
            $db = null;
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }

        //debit cash
        $null = "Null";
        $dr = "Dr";
        $entity = "1";
        $payment = 'Payment for Order $OrderID by $Customer_Name to Solushop Ghana confirmed (PAY-IN)';
        try{
            $db = new db();
            $db = $db->connect();
            $account_transaction_query = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) 
            VALUES (:null , :dr , :entity , :TotalAmount, :payment, :DateTime');";
            $stmt = $db->prepare($account_transaction_query);
            $stmt->bindParam(':null', $null);
            $stmt->bindParam(':dr', $dr);
            $stmt->bindParam(':entity', $entity);
            $stmt->bindParam(':TotalAmount', $TotalAmount);
            $stmt->bindParam(':payment', $payment);
            $stmt->bindParam(':DateTime', $DateTime);
            $stmt->execute();
            $db = null;
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }

        //credit customers
        $null = "Null";
        $cr = "Cr";
        $entity = "2";
        $payment = 'Payment for Order $OrderID by $Customer_Name to Solushop Ghana confirmed (PAY-IN)';
        try{
            $db = new db();
            $db = $db->connect();
            $account_transaction_query = "INSERT INTO `account_transactions` (`Transaction_ID`, `Transaction_Type`, `Transaction_Entity_ID`, `Transaction_Amount`, `Transaction_Description`, `Transaction_Date`) 
            VALUES (:null , :cr , :entity , :TotalAmount, :payment, :DateTime');";
            $stmt = $db->prepare($account_transaction_query);
            $stmt->bindParam(':null', $null);
            $stmt->bindParam(':cr', $cr);
            $stmt->bindParam(':entity', $entity);
            $stmt->bindParam(':TotalAmount', $TotalAmount);
            $stmt->bindParam(':payment', $payment);
            $stmt->bindParam(':DateTime', $DateTime);
            $stmt->execute();
            $db = null;
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
       
       //send phone number verification code
                $message = "Hi $Fname, your order $OrderID has been received. We will be calling you to confirm and begin processing soon. Thanks for choosing Solushop!";
                 $URL = "http://api.mytxtbox.com/v3/messages/send?" . "From=Solushop-GH" . "&To=%2B" . urlencode("$Phone") . "&Content=" . urlencode($message) . "&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
                //if (isset($_GET["site"])) { $URL = $_GET["site"]; }
                 $ch     = curl_init();
                    //echo "URL = $URL <br>\n";
                    curl_setopt($ch, CURLOPT_VERBOSE, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_URL, $URL);
                    //curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
                    curl_exec($ch);

                $Smessage = "ALERT: NEW ORDER\nCustomer: $Fname $Lname\nPhone: $Phone";
                 $URL = "http://api.mytxtbox.com/v3/messages/send?" . "From=Solushop-GH" . "&To=%2B233559538887&Content=" . urlencode($Smessage) . "&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
                //if (isset($_GET["site"])) { $URL = $_GET["site"]; }
                 $ch     = curl_init();
                    //echo "URL = $URL <br>\n";
                    curl_setopt($ch, CURLOPT_VERBOSE, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_URL, $URL);
                    //curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
                    curl_exec($ch);

                //send email verification email
                $to = $Email;
                $subject = "Solushop GH - Order Received!";

                $htmlContent = "
                  <div style='font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#eeeeee'>
                  <table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
                    <tbody>
                        <tr>
                          <td>
                                <table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
                                <tbody>
                                  <tr>
                                      <td>
                                      <table width='690' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
                                            <tbody>
                                              <tr>
                                                    <td colspan='3' height='80' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='padding:0;margin:0;font-size:0;line-height:0'>
                                                        <table width='690' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                          <tr>
                                                              <td width='30'></td>
                                                                <td align='left' valign='middle' style='padding:0;margin:0;font-size:0;line-height:0'><a href='https://solushop.com.gh' target='_blank'><img src='https://solushop.com.gh/email/SolushopEmailLogo.png' width='200px' height='80px' alt='Solushop' ></a></td>
                                                                <td width='30'></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </td>
                                          </tr>
                                               
                                            <tr bgcolor='#ffffff'>
                                                <td width='30' bgcolor='#eeeeee'></td>
                                                <td>
                                                    <table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                    <tbody>
                                                      <tr>
                                                          <td colspan='4' align='center'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan='4' align='center'><h2 style='font-size:24px'>Hey $Fname!</h2></td>
                                                        </tr>
                                                      
                                                          <td colspan='5' height='40' style='padding:0;margin:0;font-size:0;line-height:0'></td>
                                                        <tr>
                                                          <td width='120' align='right' valign='top'><img src='http://twa.photos/images/tick.png' alt='creditibility' width='120' height='120' class='CToWUd'></td>
                                                            <td width='30'></td>
                                                            <td align='left' valign='middle'>
                                                              <h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>We've got you!</h3>
                                                                <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                                <div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>Your order $OrderID has been received. We will be calling you to confirm and begin processing soon.<br><br>Remember, if there's anything you need help with, be it deciding which products to buy, or troubles with your order, please feel free to contact customer care via call or whatsapp on 0559538887.<br><br> </div>
                                                              <div style='line-height:10px;padding:0;margin:0'>&nbsp;</div>
                                                            </td>
                                                            <td width='30'></td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan='4'>&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                    <table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                    <tbody>
                                                      
                                                        <tr>
                                                          <td align='center'>
                                                                <div style='text-align:center;width:100%;padding:40px 0'>
                                                                    <table align='center' cellpadding='0' cellspacing='0' style='margin:0 auto;padding:0'>
                                                                    <tbody>
                                                                      <tr>
                                                                          <td align='center' style='margin:0;text-align:center'><a href='https://solushop.com.gh/shop' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#0787ea;;font-weight:bold;border-radius:2px;background-color:white;padding:14px 40px;display:block' target='_blank'>Happy Shopping!</a></td>
                                                                      </tr>
                                                                    </tbody>
                                                                  </table>
                                                                </div>
                                                          </td>
                                                      </tr>
                                                      <tr><td>&nbsp;</td>
                                                      </tr></tbody></table></td>
                                                <td width='30' bgcolor='#eeeeee'></td>

                                            </tr>
                                            </tbody>

                                                      <br><br><br><br>
                                            </table>

                                        <table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
                                            <tbody>
                                              <tr>
                                                  <td>
                                                        <table width='630' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
                                                        <tbody>
                                                          <tr><td colspan='2' height='30'></td></tr>
                                                            <tr>
                                                              <td width='360' valign='top'>
                                                                  <div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'>&copy; 2017 Solushop Ghana. All rights reserved.</div>
                                                                  <div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
                                                            </td>
                                                                <td align='right' valign='top'>
                                                                  <span style='line-height:20px;font-size:10px'><a href='facebook.com/SolushopGhana' target='_blank'><img src='http://i.imgbox.com/BggPYqAh.png' alt='fb'></a>&nbsp;</span>
                                                                    <span style='line-height:20px;font-size:10px'><a href='twitter.com.gh/SolushopGhana' target='_blank'><img src='http://i.imgbox.com/j3NsGLak.png' alt='twit'></a>&nbsp;</span>
                                                                </td>
                                                            </tr>
                                                            <tr><td colspan='2' height='5'></td></tr>
                                                           
                                                        </tbody>
                                                        </table>
                                                    </td>
                                          </tr>
                                            </tbody>
                                            </table>
                                      </td>
                                  </tr>
                                </tbody>
                                </table>
                            </td>
                    </tr>
                  </tbody>
                    </table>
                </div>
                ";


                // Set content-type for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // Additional headers
                $headers .= 'From: Solushop Ghana <support@solushop.com.gh>' . "\r\n";
                // Send email
                if(mail($to,$subject,$htmlContent,$headers)):
                    $successMsg = 'Email has sent successfully.';
                else:
                    $errorMsg = 'Some problem occurred, please try again.';
                endif;

        

        //redirect to accounts page
         header("Location: accounts/orders.php");
         exit();
        $slydepayIntegrator->ConfirmTransaction($paymentToken, $transactionId);


     } else {
        echo "Something seems to be wrong with your order, Kindly start afresh";
        $slydepayIntegrator->CancelTransaction($paymentToken, $transactionId);
    }
    function parseTransactionStatusCode($statusCode) {
        $status = "";
        switch ($statusCode) {
            case "0":
                $status = "success";
                break;
            case "-2":
                $status = "cancelled";
                break;
            case "-1":
                $status = "error";
                break;
            default:
                $status = "unknown";
        }
        return $status;
    }
?>