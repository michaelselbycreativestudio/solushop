<?php 
	//checking if submit button is hit
	if (isset($_POST["submit"])) {
		//testing if file is actually uploaded
		/*
		var_dump($_FILES["image"]);
		exit();
		*/
		$stamp = imagecreatefrompng('stamp.png');
		//moving file to a visible folder
		$UploadPath = "uploads/".$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"], $UploadPath);

		$im = imagecreatefromjpeg($UploadPath);
		list($width, $height) = getimagesize($UploadPath);


		// Set the margins for the stamp and get the height/width of the stamp image
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);

		// Copy the stamp image onto our photo using the margin offsets and the photo 
		// width to calculate positioning of the stamp. 
		imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

		imagejpeg($im);
		//creating thumbnail
		$newWidth = 150;
		$newHeight = ($height/$width) * $newWidth;

		$tmp = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresampled($tmp, $im, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

		imagejpeg($tmp, "uploads/thumbnail.jpg", 100);


		imagedestroy($tmp);
		imagedestroy($im);

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Upload and Edit Test</title>
</head>
<body>
	<form action="#" method="POST" enctype="multipart/form-data">
		<input type="file" name="image" >
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>