<?php 
class ValidateCode {
 private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//随机因子
 private $code;//验证码
 private $codelen = 4;//验证码长度
 private $width = 130;//宽度
 private $height = 50;//高度
 private $img;//图形资源句柄
 private $font;//指定的字体
 private $fontsize = 20;//指定字体大小
 private $fontcolor;//指定字体颜色
 //构造方法初始化
 public function __construct() {
  $this->font = dirname(__FILE__).'/font/elephant.ttf';//注意字体路径要写对，否则显示不了图片
 }
 //生成随机码
 private function createCode() {
  $_len = strlen($this->charset)-1;
  for ($i=0;$i<$this->codelen;$i++) {
   $this->code .= $this->charset[mt_rand(0,$_len)];
  }
 }
 //生成背景
 private function createBg() {
  $this->img = imagecreatetruecolor($this->width, $this->height);
  $color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
  imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
 }
 //生成文字
 private function createFont() {
  $_x = $this->width / $this->codelen;
  for ($i=0;$i<$this->codelen;$i++) {
   $this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
   imagettftext($this->img,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
  }
 }
 //生成线条、雪花
 private function createLine() {
  //线条
  for ($i=0;$i<6;$i++) {
   $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
   imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
  }
  //雪花
  for ($i=0;$i<100;$i++) {
   $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
   imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
  }
 }
 //输出
 private function outPut() {
  header('Content-type:image/png');
  imagepng($this->img);
  imagedestroy($this->img);
 }
 //对外生成
 public function doimg() {
  $this->createBg();
  $this->createCode();
  $this->createLine();
  $this->createFont();
  $this->outPut();
 }
 //获取验证码
 public function getCode() {
  return strtolower($this->code);
 }
}
?>
输出实例：

使用方法：
1、先把验证码类保存为一个名为 ValidateCode.class.php 的文件；
2、新建一个名为 captcha.php 的文件进行调用该类；
captcha.php
复制代码 代码如下:

session_start();
require './ValidateCode.class.php';  //先把类包含进来，实际路径根据实际情况进行修改。
$_vc = new ValidateCode();  //实例化一个对象
$_vc->doimg();  
$_SESSION['authnum_session'] = $_vc->getCode();//验证码保存到SESSION中

3、引用到页面中，代码如下：
复制代码 代码如下:

<img  title="点击刷新" src="./captcha.php" align="absbottom" onclick="this.src='captcha.php?'+Math.random();"></img>

4、一个完整的验证页面，代码如下：
复制代码 代码如下:

<?php
session_start();
//在页首先要开启session,
//error_reporting(2047);
session_destroy();
//将session去掉，以每次都能取新的session值;
//用seesion 效果不错，也很方便
?>
<html>
<head>
<title>session 图片验证实例</title>
<style type="text/css">
#login p{
margin-top: 15px;
line-height: 20px;
font-size: 14px;
font-weight: bold;
}
#login img{
cursor:pointer;
}
form{
margin-left:20px;
}
</style>
</head>
<body>

<form id="login" action="" method="post">
<p>此例为session验证实例</p>
<p>
<span>验证码：</span>
<input type="text" name="validate" value="" size=10>
<img  title="点击刷新" src="./captcha.php" align="absbottom" onclick="this.src='captcha.php?'+Math.random();"></img>
</p>
<p>
<input type="submit">
</p>
</form>
<?php
//打印上一个session;
//echo "上一个session：<b>".$_SESSION["authnum_session"]."</b><br>";
$validate="";
if(isset($_POST["validate"])){
$validate=$_POST["validate"];
echo "您刚才输入的是：".$_POST["validate"]."<br>状态：";
if($validate!=$_SESSION["authnum_session"]){
//判断session值与用户输入的验证码是否一致;
echo "<font color=red>输入有误</font>";
}else{
echo "<font color=green>通过验证</font>";
}
}
?>
