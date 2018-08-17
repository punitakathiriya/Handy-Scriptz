<?php
session_start();

header('Content-type: image/jpeg');

$text = $_SESSION['secure'];
$font_size = 30;
$image_width = 200;
$image_height = 40;

$image = imagecreate($image_width , $image_height);
imagecolorallocate($image , 255 , 255 , 255);
$text_color = imagecolorallocate($image , 0 , 0 , 0);

$rand_x = rand(10 , 120);
$lines = 28;

for($x = 1 ; $x<$lines ; $x++)
{
    $x1 = rand( 0 , 200);
    $x2 = rand( 0 , 200);
    $y1 = rand( 0 , 40);
    $y2 = rand( 0 , 40);

    imageline($image , $x1 , $y1 , $x2 , $y2 , $text_color);
}

imagettftext($image , $font_size , 0 , $rand_x , 30 , $text_color , '../Captcha/captcha_font.ttf' , $text);
imagejpeg($image);

?>