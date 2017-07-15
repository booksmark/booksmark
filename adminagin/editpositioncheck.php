<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 17:15
 */
include_once "lib/pulic.php";
$id=$_REQUEST['positionid'];

$name=$_REQUEST['name'];
$sql="update position set name='$name' WHERE id=$id";
$result=$db->query($sql);

if($result){
    $mess="修改成功";
}else {
    $mess = "修改失败，请重新修改";
}
$src="manageposition.php";
include_once 'mess.html';