<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<script src="jquery-1.11.3.min.js"></script>
	<script>
	$(function(){
		console.log(1);
		// $("#errormsg").html("ok").hide(3000);// 这个是渐渐消失
		$("#errormsg").html("ok").fadeTo(3000).hide();
	})
	</script>
</head>
<body>
	<div id="errormsg" style="width:100px;height:100px;border:1px solid skyblue;margin:50px auto;background:orange;">
		
	</div>
</body>
</html>