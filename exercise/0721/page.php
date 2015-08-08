<?php
header('Content-type:text/html;charset=utf-8');
$page = isset($_GET['page']) ? intval($_GET('page')) : 1;
if($page > 0){
    echo '你将看到第'.$page.'页!';
}else{
    echo '页码不正确';
}




/**
 * Created by PhpStorm.
 * User: Symo
 * Date: 2015/7/21
 * Time: 15:36
 */
