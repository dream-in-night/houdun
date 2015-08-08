<?php 
header('Content-type:image/png');
$flag = imagecreatetruecolor(500,350);
$red = imagecolorallocate($flag, 255, 0, 0);
$blue = imagecolorallocate($flag, 0, 0, 255);
$white = imagecolorallocate($flag, 255, 255, 255);
imagefill($flag, 0, 0, $red);
imagefilledrectangle($flag, 0, 0, 200, 150, $blue);
imagefilledellipse($flag, 100, 75, 80, 80, $white);
imagefilledpolygon($flag, points, num_points, color)


imagepng($flag);
imagedestroy($flag);
 ?>