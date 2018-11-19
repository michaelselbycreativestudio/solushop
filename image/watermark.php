<?php
// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('stamp.png');
$im = imagecreatefromjpeg('TestPicture.jpg');

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Get dimensions
$imageWidth=imagesx($im);
$imageHeight=imagesy($im);

$logoWidth=imagesx($stamp);
$logoHeight=imagesy($stamp);  

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
// Paste the logo
imagecopy(
   // destination
   $im, 
   // source
   $stamp, 
   // destination x and y 
   ($imageWidth-$logoWidth)/2, ($imageHeight-$logoHeight)/2,    
   // source x and y
   0, 0,
   // width and height of the area of the source to copy
   $logoWidth, $logoHeight);

// Output and free memory
imagejpeg($im, "compressed/test.jpg", 70);//header('Content-type: image/png');
//imagepng($im);
imagedestroy($im);
?>