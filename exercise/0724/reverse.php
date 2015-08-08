<?php 
include '../../function.php';
$letter = array(
	'a'=>'A',
	'b'=>'B',
	'c'=>array('d'=>'D','e'=>'E','f'=>'F'),
	'g'=>'G',
	);

function changeCase($arr){
	// 遍历
	foreach ($arr as $key => $value) {
		// 判断
		if(is_array($value)){
			// 改变下标为大写
				$newarr = array_change_key_case($valueC,ASE_UPPER);
				return $newarr;
		}
	}
}
p($letter);

$re = changeCase($letter);
p($re);
?>

 