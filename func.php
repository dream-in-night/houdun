<?php 
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
session_start();
// 如果已经提交表单则定义常量IS_POST为true,否则false
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	define('IS_POST',true);
}else{
	define('IS_POST',false);
};

if(!empty($_FILES)){
	define('IS_FILES',true);
}else{
	define('IS_FILES',false);
};



// html排版print_r
function p($var){
	echo '<pre>';
	print_r ($var);
	echo '</pre>';
}
// 获得代码运行时间,开始参数'go',终止参数'end'
function getRuntime($pos){
	static $s = 0;
	if($pos == 'go'){
		$s = microtime(true);
	}elseif($pos == 'end'){
		return microtime(true) - $s;
	}
}
// html排版var_dump
function dump($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}
// 将数组转换成字符串写入文件
function write_file($arr,$file){
	$str = var_export($arr,true);
	$str = <<<end
<?php
return {$str};
?>
end;
	file_put_contents($file,$str);
}

// 跳转回页面,参数为要跳转的url
 function success($url){
	$str = <<<end
<script>
location.href='{$url}'
</script>
end;
echo $str;
}

function del($dirname){
	if(!is_dir($dirname)) return false;
	foreach (glob($dirname . '/*') as $v) {
		is_dir($v) ? del($v) : unlink($v);
	}
	return rmdir($dirname);
}


function __autoload($name){
	include "./class/{$name}.class.php";
}
