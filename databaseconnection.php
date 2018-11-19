<?php 
	
	$servername = "localhost";
    $username   = "solushop";
    $password   = "livinggooD1$";
    $dbname     = "solushop_database";	
			
	// Create connection
	$conn       = new mysqli($servername, $username, $password, $dbname);
			
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	

/*
	$host = 'localhost';
	$db   = 'solushop_database';
	$user = 'solushop';
	$pass = 'livinggooD1$';
	$charset = 'utf8';

	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$pdo = new PDO($dsn, $user, $pass, $opt);*/
?>
