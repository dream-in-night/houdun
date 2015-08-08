<?php 
include '../../func.php';
p(del('./a'));

function del($dir_name){
	if(!is_dir($dir_name)){
		return false;
	}
	foreach (glob($dir_name.'/*') as $key => $value) {
		echo '['.$key.']'.$value.'<br/>';
	}
}

 ?>