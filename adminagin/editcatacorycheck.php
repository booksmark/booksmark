<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/1
 * Time: 21:44
 */
include_once "lib/pulic.php";
$name=$_POST['name'];
$id=$_POST['id'];
$isshow=$_POST['isshow'];
$posid=$_REQUEST['posid'];
$sql="update catacory set name='$name',parentid=$posid,isshow=$isshow WHERE cid=$id";
$result=$db->query($sql);

if($result){
    $mess="修改成功";
}else{
    $mess="修改失败请重试";
}
$src="managecatacory.php";
include_once "mess.html";