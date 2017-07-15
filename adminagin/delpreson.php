<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/12
 * Time: 18:16
 */
include_once "lib/pulic.php";
$id=$_REQUEST['id'];
$sql="delete from createsqls.use WHERE id=$id";
$result=$db->query($sql);
if($result){
    $mess="删除成功";
}else{
    $mess="删除失败";
}
$src="preson.php";
include_once "mess.html";