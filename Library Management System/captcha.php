<?php 
session_start(); 

// Generate random number
$text = rand(10000, 99999); 
$_SESSION["vercode"] = $text; 

// Image dimensions
$width = 65; 
$height = 25; 

// Create image
$image_p = imagecreate($width, $height); 

// Allocate colors
$black = imagecolorallocate($image_p, 0, 0, 0); 
$white = imagecolorallocate($image_p, 255, 255, 255); 

// Fill background
imagefilledrectangle($image_p, 0, 0, $width, $height, $black);

// Set header for image output
header("Content-type: image/jpeg");

// Use a built-in font (1-5)
imagestring($image_p, 5, 10, 5, $text, $white);

// Output image
imagejpeg($image_p, null, 80);

// Free memory
imagedestroy($image_p); 
?>
