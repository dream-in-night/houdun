<?php 
include '../../func.php';
// if(!empty($_FILES)){
	p($_FILES);
// }

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="" method="post" enctype="multipart/form-data">
 		选择一个文件: <input name="upload" type="file" style="width::500px;height:30px;border:1px solid red">
 		<input type="submit" value="上传">
 	</form>
 </body>
 </html>