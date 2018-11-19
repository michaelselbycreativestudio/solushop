<?php 
	@session_start();
	include("../../../config/db.php");
	//session checks go here
	if (isset($_SESSION["SupplierID"])) {
		$SupplierUsername = $_SESSION["username"];
		$SupplierID = $_SESSION["SupplierID"];
		$SupplierName = $_SESSION["SupplierName"];

	}else{
		header("Location: ../index.php");
		exit();
	}
?>