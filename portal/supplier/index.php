<?php 
	if (isset($_POST['submit'])) {

		//form has been submitted
		//processing
		$usernameForm = htmlspecialchars($_POST["username"]);
		$passwordForm = htmlspecialchars($_POST["password"]);
		$matchFound = 0;

		//select records from database
		include("../../config/db.php");
		try{
			$db = new db(); //inititate db object
			$db = $db->connect();

		
			//select users with that username
			$check_user_query = "SELECT * from suppliers where Username = :usernameForm";
			$stmt = $db->prepare($check_user_query);
			$stmt->bindParam(':usernameForm', $usernameForm);
			//Execute
			$stmt->execute();
			$user_result = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null;
		}catch(PDOException $e){
			echo '{"error": {"text": '.$e->getMessage().'}';
		}

		       //check if you have a matching record;   
		   		if ($usernameForm==$user_result[0]->Username and $passwordForm == $user_result[0]->PIN){
		   			$username = $user_result[0]->Username;
		   			$SupplierID = $user_result[0]->ID;
		   			$SupplierName = $user_result[0]->Name;
		   			$matchFound = 1;
		   		}

		if ($matchFound == 1) {
			@session_start();
			$_SESSION["username"] = $usernameForm;
			$_SESSION["SupplierID"] = $SupplierID;
			$_SESSION["SupplierName"] = $SupplierName;
			header("Location: management");
			exit();
		}else{
			$error = "Incorrect username or password";
		}
	}
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Supplier Login</title>
  
  
  
      <link rel="stylesheet" href="../assets/login/css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Abel|Fjalla+One|PT+Sans+Narrow|Playfair+Display|Quicksand" rel="stylesheet">
  <style type="text/css">

  body { 
  background: url(wallpaper.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

  button {
	  margin:0 auto; /* this will center  it */
	  font-family: inherit;
	  color: white;
	  background: #2dcc70;
	  outline: none;
	  border: none;
	  padding: 5px 15px;
	  font-size: 1.3em;
	  font-weight: 400;
	  border-radius: 3px;
	  box-shadow: 0px 0px 10px rgba(51, 51, 51, 0.4);
	  cursor: pointer;
	  transition: all 0.15s ease-in-out;
}
  </style>
</head>

<body>
  
<form method="POST" action="#">
	<div style="text-align:center;">
	  
	  <header style="font-family: 'Quicksand', sans-serif;"><img src="logo.png" width="200px" height="80px"><br>Supplier Portal</header>
	  <?php 
	  	if (isset($error)) {
	  		echo "<br><span style='color:red;'>$error</span><br>";
	  	}
	  ?>
	  <label style="font-family: 'Quicksand', sans-serif;">Username <span> *</span></label>
	  <input type="text" name="username" required/>
	  <div class="help" style="font-family: 'Quicksand', sans-serif;">At least 6 character</div>
	  <label style="font-family: 'Quicksand', sans-serif;">Password <span> *</span></label>
	  <input name="password" type="password"  />
	  <div class="help" style="font-family: 'Quicksand', sans-serif;">Use upper and lowercase lettes as well</div>
	  <br>
	  <div style="text-align:center;" style="font-family: 'Quicksand', sans-serif;">
		    <button name="submit" type="submit" value="submit" style="font-family: 'Quicksand', sans-serif;">Login</button>
		</div>
	</div>
	<br>
</form>
  
  
</body>
</html>
