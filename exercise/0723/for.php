<?php 

include '../function.php';
$arr = range('a','z');
// p($arr);

do{
	echo key($arr).'=>'.current($arr).' <br/>';
}while(next($arr));











?>