<?php

	//getting the current url
	//use this locally
	$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//use this online
	//$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$relevant_current_url = explode('?', $current_url);
	$current_raw_url = $relevant_current_url[0];
	//getting the page only
	$partsOftheURL = explode("/", $current_raw_url);
	$pageOnly = $partsOftheURL[sizeof($partsOftheURL)-1];

	@session_start();
	//initiating session variables. Should be on all pages
	if (isset($_SESSION['Solushop_Manager_ID'])) {
	    $Solushop_Manager_FullName = $_SESSION['Solushop_Manager_FName']." ".$_SESSION['Solushop_Manager_LName'];
	    $Solushop_Manager_ID= $_SESSION['Solushop_Manager_ID'];
	}else{
		session_destroy();
		header("Location: login.php");
		exit;
	}
?>