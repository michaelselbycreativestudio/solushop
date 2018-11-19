<?php 
	if (isset($_GET["cat"])) {
		$CategoryRedirectCodeString = $_GET["cat"];
		$CategoryRedirectCode = explode("||", $CategoryRedirectCodeString);
		if ($CategoryRedirectCode[0]=="main") {
				$CategoryRedirectCodePartA = explode(".", $CategoryRedirectCode[1]);
				switch ($CategoryRedirectCodePartA[0]) {
					case '1':
						$url = "p-computers-and-accessories.php";
						break;
					case '2':
						$url = "p-camera-video-and-audio.php";
						break;
					case '3':
						$url = "p-mobile-phones-and-tablets.php";
						break;
					case '4':
						$url = "p-movies-music-and-videogames.php";
						break;
					case '5':
						$url = "p-tv-and-audio.php";
						break;
					case '6':
						$url = "p-other-accessories.php";
						break;
					default:
						$url = "404.php";
						break;
				
			}
			header("Location: $url");
			exit();
		}elseif ($CategoryRedirectCode[0]=="sub") {
			header("location: shop.php?cat=".$CategoryRedirectCode[1]);
		}
	}else{
		header("Location: shop.php");
	}
?>