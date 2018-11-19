<?php
	/*
    include './Hubtel/Api.php';

	//testing the hubtel API
	$Phone = "503788515";
	$Message = "You are successful!";

	$api = new SmsghApi('wgysoijb', 'ptmddhwn');
	$api->setContextPath("v3");
	$message = new ApiMessage();
	$message->setFrom('Solushop Ghana');
	$message->setTo($Phone);
	$message->setContent($Message);
	$message->setRegisteredDelivery(true);
	$response = $api->getMessages()->send($message);
	var_dump($response);
	exit();
	# $response is an instance of ApiMessageResponse.
	*/

	
	require './Hubtel/Api.php';

	$auth = new BasicAuth("wgysoijb", "ptmddhwn");
	// instance of ApiHost
	$apiHost = new ApiHost($auth);
	// instance of AccountApi
	$accountApi = new AccountApi($apiHost);
	// Get the account profile
	// Let us try to send some message
	$messagingApi = new MessagingApi($apiHost);
	try {
	    // Send a quick message
	    $messageResponse = $messagingApi->sendQuickMessage("Solushop Ghana", "+233503788515", "Welcome to planet Solushop!");

	    if ($messageResponse instanceof MessageResponse) {
	        echo $messageResponse->getStatus();
	        exit();
	    } elseif ($messageResponse instanceof HttpResponse) {
	        echo "\nServer Response Status : " . $messageResponse->getStatus();
	        exit();
	    }
	} catch (Exception $ex) {
	    echo $ex->getTraceAsString();
	}

	/*

	$Message = "Test";
	$Phone = "503788515";
    $URL    = "https://api.smsgh.com/v3/messages/send?" . "From=Solushop Ghana"."&To=%2B233" . urlencode($Phone) . "&Content=" . urlencode($Message) . "&ClientReference=1"."&ClientId=dylsfikt" . "&ClientSecret=rrllqthk" . "&RegisteredDelivery=true";
    $ch     = curl_init();
    //echo "URL = $URL <br>\n";
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_URL, $URL);
    //curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
    $result = curl_exec($ch);
    var_dump($result);
	*/
?>