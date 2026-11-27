<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
$code = '';
for ($i = 0; $i < 5; $i++) { $code .= $chars[random_int(0, strlen($chars) - 1)]; }

$_SESSION['captcha'] = $code;

$width = 180;
$height = 50;
$image = imagecreatetruecolor($width, $height);

$backgroundColor = imagecolorallocate($image, 244, 244, 244);
$textColor = imagecolorallocate($image, 30, 30, 30);
$pointsColor = imagecolorallocate($image, 150, 150, 150);

imagefilledrectangle($image, 0, 0, $width, $height, $backgroundColor);

for ($i = 0; $i < 150; $i++) {
    imagesetpixel($image, random_int(0, $width), random_int(0, $height), $pointsColor);
}

for ($i = 0; $i < strlen($code); $i++) {
    $x = 22 + ($i * 30);
    $y = random_int(12, 22);
    imagestring($image, 5, $x, $y, $code[$i], $textColor);
}

header('Content-Type: image/png');
header('Cache-Control: no-store, no-cache, must-revalidate');
imagepng($image);
imagedestroy($image);