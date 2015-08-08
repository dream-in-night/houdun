<?php 
/*$size = disk_total_space('./windows');
var_dump($size / 1024 / 1024 / 1024);

$size_free = disk_free_space('C:');
echo $size_free/1024/1024/1024;
*/

$arr = array('temp/cache','module','templete');

foreach ($arr as $key => $value) {
	if(!is_dir($value)){
		mkdir($value,0777,true);
	}
}
	


 ?>