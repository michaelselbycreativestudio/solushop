<?php 
	//sms api test

	include 'Hubtel/Api.php';
	
	$api = new ApiHost('wgysoijb', 'ptmddhwn');
	$api->setContextPath("v3");
	$message = new ApiMessage();
	$message->setFrom('Solushop-GH');
	$message->setTo('+233503788515');
	$message->setContent('hello, world!');
	$message->setRegisteredDelivery(true);
	$response = $api->getMessages()->send($message);
	# $response is an instance of ApiMessageResponse.

	exit();
                
?>