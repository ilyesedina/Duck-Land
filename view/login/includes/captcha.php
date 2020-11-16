<?php
session_start();
$chars = "qMwQrERtWyuOiPaSdFGhjJkLZxcVbvm";
$rand_str = '';

for($i = 0; $i <8; $i++){
    $rand_str .= $chars[rand(0, strlen($chars) - 1)];
}

$_SESSION['captcha_test'] = $rand_str;

$str = $rand_str;

$img = imagecreate(150,50);
$img_bg = imagecolorallocate($img, 255, 255, 255);
$text_color = imagecolorallocate($img, 51, 122, 183);
imagestring($img,4,30,25, $str,$text_color);
imagesetthickness($img, 6);
header("Content-type: image/png");
imagepng($img);
imagecolordeallocate($img, $img_bg);
imagecolordeallocate($img, $text_color);
imagedestroy($img);
