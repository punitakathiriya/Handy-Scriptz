<?php

// NOTE: The GD Library needs to be installed on your machine for execution

header('Content type: image/jpeg');

$email = $_GET['email'];
$email_length = strlen($email);

$font_size = 4;
$image_height = ImageFontHeight($font_size);
$image_width = ImageFontWidth($font_size) * $email_length;

$image = imagecreate($image_width , $image_height);

imagecolorallocate($image , 255 , 255 , 255);
$font_color = imagecolorallocate($image , 0 , 0 , 0);

imagestring($image , $font_size , 0 , 0 , $email , $font_color);
imagejpeg($image);
?>