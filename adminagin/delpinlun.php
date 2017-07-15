<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/12
 * Time: 17:56
 */
$id=$_REQUEST['id'];
include_once "lib/pulic.php";
$sql="delete from message WHERE id=$id";
$result=$db->query($sql);
if($result){
    $mess="删除成功";
}else{
    $mess="删除失败";
}
$src="managepinlun.php";
include_once "mess.html";