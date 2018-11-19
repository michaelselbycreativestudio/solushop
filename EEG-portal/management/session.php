<?php 
	@session_start();
	//session checks go here
	if (isset($_SESSION["Manager_ID"])) {
		$ManagerFullName = $_SESSION["FName"]." ".$_SESSION["LName"];
		$ManagerUsername = $_SESSION["Username"];

	}else{
		header("Location: ../index.php");
		exit();
	}
?>