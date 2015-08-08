<?php 
include '../../func.php';
if(IS_POST){
	$cons = $_POST['name'];
	echo $cons;
	$new_cons = addslashegs(htmlspecialchars($cons));
	echo $new_cons;
	$cons = new j
}

 ?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
	<br /><br /><br />
		<input type="text" name="name" />
		<input type="submit" />
		<h3></h3>
	</form>
</body>
</html>