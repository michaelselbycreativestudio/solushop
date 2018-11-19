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
	if (isset($_SESSION['Solushop_Customer_ID'])) {
		$Customer_Email = $_SESSION['Solushop_Email'];
	    $Customer_FullName = $_SESSION['Solushop_FullName'];
	    $Customer_ID = $_SESSION['Solushop_Customer_ID'];
		$Customer_FName = $_SESSION['Solushop_FName'];
	}elseif(!isset($_SESSION["Anon_User_ID"])){
		$_SESSION["Anon_User_ID"] = rand(0,99999);
		//get product count and save in session
		try{
			$db = new db();
			$db = $db->connect();
			$sql_product_query = "SELECT ID from products";
			$stmt = $db->prepare($sql_product_query);
			$stmt->execute();
			$sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null; 
		}catch(PDOException $e){
			echo '{"error": {"text": '.$e->getMessage().'}';
		}
		$_SESSION["ProductIDs"]=null;
		for ($i=0; $i < sizeof($sql_product); $i++) { 
			$_SESSION["ProductIDs"][$i] = $sql_product[$i]->ID;
			shuffle($_SESSION["ProductIDs"]);
		}
	}

	//check if current size of product differs from what you have 
	//get product count and save in session
	try{
		$db = new db();
		$db = $db->connect();
		$sql_product_query = "SELECT ID from products";
		$stmt = $db->prepare($sql_product_query);
		$stmt->execute();
		$sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null; 
	}catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
	
	if (!(sizeof($_SESSION["ProductIDs"]) == sizeof($sql_product))) {
		//get product count and save in session
		try{
			$db = new db();
			$db = $db->connect();
			$sql_product_query = "SELECT ID from products";
			$stmt = $db->prepare($sql_product_query);
			$stmt->execute();
			$sql_product = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null; 
		}catch(PDOException $e){
			echo '{"error": {"text": '.$e->getMessage().'}';
		}

		$_SESSION["ProductIDs"] = null;
		
		for ($i=0; $i < sizeof($sql_product); $i++) { 
			$_SESSION["ProductIDs"][$i] = $sql_product[$i]->ID;
			shuffle($_SESSION["ProductIDs"]);
		}
	}

?>